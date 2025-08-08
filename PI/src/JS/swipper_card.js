const swiper = new Swiper('.swiper', {
  loop: true,
  grabCursor: true,
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: ".btn_next_card",
    prevEl: ".btn_prev_card",
  },

  breakpoints: {
    // when window width is >= 320px
    
    520: {
      slidesPerView: 1,
      spaceBetween: 25
    },

    661: {
      slidesPerView: 2,
      spaceBetween: 25

    },
    // when window width is >= 480px
    985: {
      slidesPerView: 3,
      spaceBetween: 50
    },
    // when window width is >= 640px
    1220: {
      slidesPerView: 3,
      spaceBetween: 25
    },

    1420: {
      slidesPerView: 4,
      spaceBetween:90

    }
  }


});





var swiperMenu = new Swiper(".mySwiperMenu", {
  pagination: {
    el: ".swiper-pagination",
  },

  breakpoints: {
    // when window width is >= 320px
    520: {
      slidesPerView: 1,
      spaceBetween: 25
    },
  }
});