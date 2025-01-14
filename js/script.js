document.addEventListener("DOMContentLoaded", () => {
  const menu = document.getElementById("menu"); // The menu containing LOCATE and EXAMINE
  const menuTopOffset = menu.offsetTop; // Get the position of the menu

  // Create a placeholder for the menu
  const placeholder = document.createElement("div");
  placeholder.className = "placeholder";
  placeholder.style.height = `${menu.offsetHeight}px`; // Match the height of the menu
  placeholder.style.display = "none"; // Hide by default
  menu.parentNode.insertBefore(placeholder, menu);

  // Snowflake scrolling logic
  const snowflake = document.querySelector(".snowflake"); // The snowflake element
  const snowflakeStopPoint = 50; // Adjust this value to determine where the snowflake stops

  // Scroll event listener
  window.addEventListener("scroll", () => {
    // Sticky menu logic
    if (window.scrollY >= menuTopOffset) {
      menu.classList.add("fixed"); // Add sticky class to menu
      placeholder.style.display = "block"; // Show placeholder to prevent jump
    } else {
      menu.classList.remove("fixed"); // Remove sticky class
      placeholder.style.display = "none"; // Hide placeholder
    }

    // Snowflake position logic
    if (window.scrollY >= snowflakeStopPoint) {
      snowflake.style.position = "fixed"; // Fix the snowflake
      snowflake.style.top = "25px"; // Keep it at the top of the viewport
    } else {
      snowflake.style.position = "absolute"; // Allow it to scroll
      snowflake.style.top = "16px"; // Reset its position
    }
  });
});