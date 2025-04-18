document.addEventListener("DOMContentLoaded", () => {
    const mediaContainer = document.getElementById("media-container");
    const folderId = "1Wj5eBVJXGrn5bxDVIR8ybKKkCrc2-5kK";

    const folderEmbed = document.createElement('iframe');
    folderEmbed.src = `https://drive.google.com/embeddedfolderview?id=${folderId}#grid`;
    folderEmbed.style.width = '100%';
    folderEmbed.style.height = '100vh';
    folderEmbed.style.border = 'none';
    
    mediaContainer.appendChild(folderEmbed);
});