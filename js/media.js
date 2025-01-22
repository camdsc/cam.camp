document.addEventListener("DOMContentLoaded", () => {
    const mediaContainer = document.getElementById("media-container");
    const folderId = "1Wj5eBVJXGrn5bxDVIR8ybKKkCrc2-5kK"; // Replace with your Google Drive folder ID
    const apiKey = "AIzaSyBM2i5vrVbfWl8cqmsgPshUr66SkyY4pbg"; // Replace with your Google Drive API key
  
    // Function to fetch media from Google Drive
    const fetchMedia = async () => {
      try {
        const response = await fetch(
          `https://www.googleapis.com/drive/v3/files?q='${folderId}'+in+parents&key=${apiKey}&fields=files(id,name,createdTime,mimeType)`
        );
  
        const data = await response.json();
        if (data.files && data.files.length > 0) {
          const mediaData = data.files
            .filter(file => file.mimeType.startsWith("image/")) // Only include images
            .map(file => ({
              id: file.id,
              caption: file.name,
              image: `https://drive.google.com/uc?export=view&id=${file.id}`,
              date: file.createdTime,
            }));
  
          renderMedia(mediaData.sort((a, b) => new Date(b.date) - new Date(a.date))); // Sort newest to oldest
        } else {
          mediaContainer.innerHTML = "<p>No media found in the folder.</p>";
        }
      } catch (error) {
        console.error("Error fetching media:", error);
        mediaContainer.innerHTML = "<p>Failed to load media. Please try again later.</p>";
      }
    };
  
    // Function to render media in the grid
    const renderMedia = (mediaData) => {
      mediaContainer.innerHTML = ""; // Clear existing media
      mediaData.forEach(media => {
        const mediaCard = document.createElement("div");
        mediaCard.classList.add("media-card");
        mediaCard.dataset.id = media.id;
  
        mediaCard.innerHTML = `
          <img src="${media.image}" alt="${media.caption}">
          <div class="media-caption">${media.caption}</div>
        `;
  
        // Add click event to enlarge media
        mediaCard.addEventListener("click", () => {
          displayMediaModal(media); // Function to handle media modal
        });
  
        mediaContainer.appendChild(mediaCard);
      });
    };
  
    // Function to display a modal with enlarged media
    const displayMediaModal = (media) => {
      const modal = document.createElement("div");
      modal.classList.add("media-modal");
  
      modal.innerHTML = `
        <div class="modal-content">
          <span class="close-modal">&times;</span>
          <img src="${media.image}" alt="${media.caption}">
          <div class="media-caption">${media.caption}</div>
        </div>
      `;
  
      document.body.appendChild(modal);
  
      // Add event listener to close the modal
      modal.querySelector(".close-modal").addEventListener("click", () => {
        document.body.removeChild(modal);
      });
  
      // Close modal on background click
      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          document.body.removeChild(modal);
        }
      });
    };
  
    fetchMedia(); // Fetch media on page load
  });