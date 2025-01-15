document.addEventListener("DOMContentLoaded", () => {
  const menu = document.getElementById("menu"); // Menu container
  const menuTopOffset = menu.offsetTop; // Get the menu position

  // Create a placeholder for the menu
  const placeholder = document.createElement("div");
  placeholder.className = "placeholder";
  placeholder.style.height = `${menu.offsetHeight}px`; // Match the height of the menu
  placeholder.style.display = "none"; // Hide placeholder initially
  menu.parentNode.insertBefore(placeholder, menu);

  const snowflake = document.querySelector(".snowflake"); // Snowflake element
  const snowflakeStopPoint = 50; // Where the snowflake stops

  const setSnowflakePosition = () => {
    if (window.innerWidth <= 768) {
      // Mobile-specific snowflake position
      snowflake.style.left = "auto";
      snowflake.style.right = "20px";
    } else {
      // Desktop-specific snowflake position
      snowflake.style.left = "calc(50% + 120px)";
      snowflake.style.right = "auto";
    }

    // Scroll behavior for snowflake
    if (window.scrollY >= snowflakeStopPoint) {
      snowflake.style.position = "fixed";
      snowflake.style.top = "10px";
    } else {
      snowflake.style.position = "absolute";
      snowflake.style.top = "17px";
    }
  };

  // Ensure menu stays fixed and snowflake behaves correctly on scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY >= menuTopOffset) {
      menu.classList.add("fixed");
      placeholder.style.display = "block"; // Show placeholder to prevent layout shift
    } else {
      menu.classList.remove("fixed");
      placeholder.style.display = "none"; // Hide placeholder
    }

    setSnowflakePosition(); // Update snowflake position
  });

  // Ensure snowflake position is updated on window resize
  window.addEventListener("resize", setSnowflakePosition);

  // Set initial positions on page load
  setSnowflakePosition();
});