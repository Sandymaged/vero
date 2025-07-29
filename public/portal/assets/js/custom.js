$(function () {
    if ($('.our_business').length) {
        $('.our_business .our_business_slider').slick({
            // infinite: true,
            arrows: true,
            slidesPerRow: 4,
            rtl: false,

            rows: 2,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesPerRow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesPerRow: 2,
                    dots: true,
                    arrows: false
                }
            }
            ]
        });

    }

    if ($('.ltn__brand-logo-active-2').length) {
        $('.ltn__brand-logo-active-2').slick({
            rtl: false,
            arrows: false,
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            prevArrow: '<a href="#" class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a href="#" class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
});
