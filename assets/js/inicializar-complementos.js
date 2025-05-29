// Inicialización de AOS

document.addEventListener('DOMContentLoaded', function () {
    AOS.init();
});

// Inicialización de Swiper

const swiper = new Swiper('.swiper', {
    slidesPerView: 3,
    direction: 'horizontal',
    loop: true,

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    scrollbar: {
        el: '.swiper-scrollbar',
    },

    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    }
});


const marcasSwiper = new Swiper('.swiper-marcas', {
slidesPerView: 5,
spaceBetween: 15,
loop: true,
autoplay: {
    delay: 3000,
    disableOnInteraction: false,
},
breakpoints: {
    576: {
    slidesPerView: 3,
    },
    768: {
    slidesPerView: 4,
    },
    992: {
    slidesPerView: 5,
    },
    1200: {
    slidesPerView: 6,
    }
},
navigation: {
    nextEl: '.swiper-marcas .marcas-next',
    prevEl: '.swiper-marcas .marcas-prev',
}
});
