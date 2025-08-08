const swiper = new Swiper('.swiper_sobre', {

    // Navigation arrows
    navigation: {
        nextEl: ".btn_next_card_avaliacao",
        prevEl: ".btn_prev_card_avaliacao",
      },

      pagination: {
        el: ".swiper-pagination-sobre",
      },


      centeredSlides: true, // Garante que os slides estarão no centro
      slidesPerView: 'auto', // Adapta os slides para centralização
      spaceBetween: 50, // Adiciona espaço entre os slides

    breakpoints: {
        
        520: {
          slidesPerView: 1,
          spaceBetween: 100
        },
    
        661: {
          slidesPerView: 2,
          spaceBetween: 50
    
        },

        985: {
          slidesPerView: 1,
          spaceBetween: 100
        },
    
        1220: {
          slidesPerView: 1,
          spaceBetween: 500
        },
    
        1420: {
          slidesPerView: 1,
          spaceBetween:500
    
        }
      }
    
  
  
  });