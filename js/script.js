document.addEventListener("DOMContentLoaded", () => {
  const menu = document.getElementById("menu"); // The menu containing LOCATE and EXAMINE
  const menuTopOffset = menu.offsetTop; // Get the position of the menu

  // Create a placeholder for the menu
  const placeholder = document.createElement("div");
  placeholder.className = "placeholder";
  placeholder.style.height = `${menu.offsetHeight}px`; // Match the height of the menu
  placeholder.style.display = "none"; // Hide by default
  menu.parentNode.insertBefore(placeholder, menu);

  // Scroll event listener for the menu only
  window.addEventListener("scroll", () => {
    if (window.scrollY >= menuTopOffset) {
      menu.classList.add("fixed"); // Add sticky class to menu
      placeholder.style.display = "block"; // Show placeholder to prevent jump
    } else {
      menu.classList.remove("fixed"); // Remove sticky class
      placeholder.style.display = "none"; // Hide placeholder
    }
  });
});