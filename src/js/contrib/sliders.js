jQuery(function ($) {
  "use strict";

  var adveoCarrousel = $(".rpe-carrousel");
  adveoCarrousel.owlCarousel({
    loop: true,
    nav: true,
    dot: false,
    margin: 10,
    navSpeed: 300,
    responsiveClass: true,
    navText: ['<i class="bi bi-arrow-left-short"></i>', '<i class="bi bi-arrow-right-short"></i>'],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  var galleryCarrousel = $(".gallery-carousel");
  galleryCarrousel.owlCarousel({
    loop: true,
    nav: true,
    dot: false,
    margin: 0,
    mouseDrag: false,
    touchDrag: false,
    animateOut: "fadeOut",
    navSpeed: 300,
    responsiveClass: true,
    navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
    items: 1,
  });
});
