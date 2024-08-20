// Navbar
$(".hamburger").on("click", function () {
  $(".vertical-menu").css("transform", "translateX(0)");
  $(".hamburger").addClass("d-none");
  $(".nav-close").removeClass("d-none");
});

$(".nav-close").on("click", function () {
  $(".vertical-menu").css("transform", "translateX(-100%)");
  $(".hamburger").removeClass("d-none");
  $(".nav-close").addClass("d-none");
});
