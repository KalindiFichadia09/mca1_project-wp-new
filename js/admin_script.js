// Manage user - show & update button click event
document.addEventListener("DOMContentLoaded", function () {
  // Show detailed info
  document.querySelectorAll(".show-btn").forEach((button) => {
    button.addEventListener("click", function () {
      let target = document.querySelector(this.getAttribute("data-target"));
      target.style.display =
        target.style.display === "none" ? "table-row" : "none";
    });
  });

  // Show update form
  document.querySelectorAll(".update-btn").forEach((button) => {
    button.addEventListener("click", function () {
      let target = document.querySelector(
        this.getAttribute("data-target-update")
      );

      // Toggle the form display
      target.style.display =
        target.style.display === "none" ? "table-row" : "none";
    });
  });
});

document.getElementById("toggle-btn").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("active");
});

document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", function () {
    document.getElementById("sidebar").classList.remove("active");
  });
});

// category form visibile - Insert
document
  .getElementById("toggleFormBtnI")
  .addEventListener("click", function () {
    document.getElementById("formBlockInsert").style.display =
      document.getElementById("formBlockInsert").style.display === "none"
        ? "block"
        : "none";
  });

// category form visibile - Update
document.querySelectorAll("#toggleFormBtnU").forEach((button) => {
  button.addEventListener("click", function () {
    document.getElementById("formBlockUpdate").style.display =
      document.getElementById("formBlockUpdate").style.display === "none"
        ? "block"
        : "none";
  });
});

// User form visibile - Update
document.getElementById("BtnUpdate").addEventListener("click", function () {
  var formBlock = document.getElementById("formUpdate");
  if (formBlock.style.display === "none" || formBlock.style.display === "") {
    formBlock.style.display = "block";
  } else {
    formBlock.style.display = "none";
  }
});
