// // function for navbar
document.addEventListener("DOMContentLoaded", function () {
  const currentPage = window.location.pathname.split("/").pop(); // Get current page
  const navLinks = document.querySelectorAll(".nav-link"); // Get all nav links

  navLinks.forEach((link) => {
    const pageName = link.getAttribute("href");
    if (currentPage === pageName) {
      link.classList.add("active"); // Add active class to the current link
    } else {
      link.classList.remove("active"); // Remove active class from other links
    }
  });
});



//function for change image in single-product
function changeImage(imageUrl) {
  document.getElementById("mainProductImage").src = imageUrl;
}

//function for eye button in password field
function showPassword(id) {
  const passwordField = document.getElementById(id);
  const type = passwordField.type === "password" ? "text" : "password";
  passwordField.type = type;
}
