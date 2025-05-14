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
