
const sidebarToggleBtns = document.querySelectorAll(".sidebar-toggle");
const sidebar = document.querySelector(".sidebar");
const searchForm = document.querySelector(".search-form");
const menuLinks = document.querySelectorAll(".menu-link");

sidebar.classList.add("collapsed");

sidebarToggleBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    updateThemeIcon();
  });
});
searchForm.addEventListener("click", () => {
  if (sidebar.classList.contains("collapsed")) {
    sidebar.classList.remove("collapsed");
    searchForm.querySelector("input").focus();
  }
});
// if (window.innerWidth > 768) sidebar.classList.remove("collapsed");


$(".personal-toggle").on("click", function () {
  $(this).next().slideToggle();
});

$(".filter-btn").on("click", function () {
  $(".filter-btn").removeClass("active");
  $(this).addClass("active");
})