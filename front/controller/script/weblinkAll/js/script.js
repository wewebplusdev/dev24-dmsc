// Function to initialize Swiper
function initializeSwiper(selector, config) {
    return new Swiper(selector, config);
}

// Swiper configuration
const swiperConfig = {
    slidesPerView: 4,
    spaceBetween: 45,
    watchSlidesProgress: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1200: {
            slidesPerView: 4,
        }
    }
};

// Initialize Swiper
let eachYearSwiper = initializeSwiper(".each-year .swiper", swiperConfig);

// Function to toggle layout classes
function toggleLayout(isGrid) {
    const layoutView = $('.layout-view');
    const downloadList = $('#download-list');
    const colThumb = $('.col-thumb');
    const colHead = $('.col-head');

    if (isGrid) {
        layoutView.removeClass('layout-list').addClass('layout-grid');
        downloadList.removeClass('-layout-list').addClass('-layout-grid');
        colThumb.removeClass('col-auto').addClass('col-12');
        colHead.removeClass('col').addClass('col-12');
    } else {
        layoutView.removeClass('layout-grid').addClass('layout-list');
        downloadList.removeClass('-layout-grid').addClass('-layout-list');
        colThumb.removeClass('col-12').addClass('col-auto');
        colHead.removeClass('col-12').addClass('col');
    }
}

// Event listener for layout view buttons
$('.layout-view button').click(function () {
    toggleLayout($(this).hasClass('btn-grid'));
});
