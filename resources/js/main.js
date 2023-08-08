// START animation title header
let watch = document.querySelectorAll('.watch')
function callback(items) {
    items.forEach(item => {
        if (item.isIntersecting) {
            item.target.classList.add("in-page");
        }
    });
}
let observer = new IntersectionObserver(callback,{threshold:0.6});
watch.forEach(element => {
    observer.observe(element);
});
// END animation title header ------------------------------------------------------------------------------------------------

// START animation color navbar ----------------------------------------------------------------------------------------------
let navbar = document.querySelector('#navbar');
window.addEventListener('scroll', ()=>{
    let scrolled = window.scrollY;
    if (scrolled > 0) {
        navbar.classList.add("bg-nav");
    }else{
        navbar.classList.remove("bg-nav");
        navbar.classList.add("bg-nav-mobile");
    }
});
// END animation color navbar ------------------------------------------------------------------------------------------------

// START controllo swiper del dettaglio --------------------------------------------------------------------------------------
let swiperThumbs = new Swiper(".swiperThumbs", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,

    mousewheel: {
    releaseOnEdges: true,
    },
});

let swiperMain = new Swiper(".swiperMain", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiperThumbs,
    },
});
// END controllo swiper del dettaglio ----------------------------------------------------------------------------------------

// START controllo swiper header ---------------------------------------------------------------------------------------------
let swiperHeader = new Swiper(".swiperHeader", {
    loop: true,
    speed: 1500,
    effect: 'fade',         
    fadeEffect: {           
        crossFade: true     
    },
    autoplay: {
        delay: 3500,
    }, 
});
// END controllo swiper header -------------------------------------------------------------------------------------------------


