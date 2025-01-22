document.addEventListener("DOMContentLoaded", () => {
    const mediaContainer = document.getElementById("media-container");
    const folderId = "1Wj5eBVJXGrn5bxDVIR8ybKKkCrc2-5kK"; // Your Google Drive folder ID
    const apiKey = "AIzaSyBM2i5vrVbfWl8cqmsgPshUr66SkyY4pbg"; // Your API Key
  
    // Function to fetch media from Google Drive
    const fetchMedia = async () => {
      try {
        const response = await fetch(
          `https://www.googleapis.com/drive/v3/files?q='${folderId}'+in+parents&key=${apiKey}&fields=files(id,name,createdTime,thumbnailLink,mimeType)`
        );
  
        const data = await response.json();
        if (data.files && data.files.length > 0) {
          const mediaData = data.files
            .filter(file => file.mimeType.startsWith("image/")) // Only include images
            .map(file => ({
              id: file.id,
              caption: file.name || "No Caption", // Fallback for missing name
              image: file.thumbnailLink, // Use thumbnailLink for display
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
  
        mediaCard.addEventListener("click", () => {
          displayMediaModal(media);
        });
  
        mediaContainer.appendChild(mediaCard);
      });
    };
  
    // Modal to display enlarged media
    const displayMediaModal = (media) => {
      const modal = document.createElement("div");
      modal.classList.add("media-modal");
  
      modal.innerHTML = `
        <div class="modal-content">
          <button class="close-modal" aria-label="Close Modal">&times;</button>
          <img src="${media.image}" alt="${media.caption}" loading="lazy">
          <div class="media-caption">${media.caption}</div>
        </div>
      `;
  
      document.body.appendChild(modal);
  
      modal.querySelector(".close-modal").addEventListener("click", () => {
        document.body.removeChild(modal);
      });
  
      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          document.body.removeChild(modal);
        }
      });
    };
  
    fetchMedia(); // Fetch media on page load
  });