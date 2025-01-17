document.addEventListener("DOMContentLoaded", () => {
    // Fetch and insert the header into the page
    fetch('/header.html')
      .then((response) => {
        if (!response.ok) {
          throw new Error('Header not found!');
        }
        return response.text();
      })
      .then((html) => {
        document.body.insertAdjacentHTML('afterbegin', html);
  
        const header = document.getElementById("header");
        const menu = document.getElementById("menu");
        const expandedMenu = document.getElementById("expanded-menu");
        const snowflake = document.querySelector(".snowflake");
        let isFixed = false;
        let isExpanded = false;
  
        // Handle scroll behavior for fixing the header
        window.addEventListener("scroll", () => {
          if (window.scrollY > 100 && !isFixed) {
            header.style.position = "fixed";
            header.style.top = "0";
            isFixed = true;
          } else if (window.scrollY <= 100 && isFixed) {
            header.style.position = "absolute";
            header.style.top = "0";
            isFixed = false;
          }
        });
  
        // Handle snowflake click
        snowflake.addEventListener("click", () => {
          // Toggle expanded menu
          isExpanded = !isExpanded;
          expandedMenu.classList.toggle("active", isExpanded);
  
          // Add spin animation
          const animationClass = isExpanded ? "spin-clockwise" : "spin-counterclockwise";
          snowflake.classList.add(animationClass);
  
          // Remove animation class after animation ends
          setTimeout(() => {
            snowflake.classList.remove(animationClass);
          }, 700);
        });
      })
      .catch((error) => console.error("Error loading header:", error));
  });