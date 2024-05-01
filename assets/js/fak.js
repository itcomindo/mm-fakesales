window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {
        //jquery code start here

        //run slick slider start
        function fakSlickSlider() {
            var $statusSlide = jQuery('#fak-wr').attr('data-fak-slide');
            if ('true' === $statusSlide) {
                var $duration = jQuery('#fak-wr').attr('data-fak-duration');
                $duration = parseInt($duration);
                jQuery('#fak-wr').slick({
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    autoplay: true,
                    autoplaySpeed: $duration,
                    arrows: false,
                    fade: true,
                    cssEase: 'linear',
                    draggable: false,
                });
            }
        }
        fakSlickSlider();
        //run slick slider end

        //find this
        function fakFindThis() {
            var imgs = jQuery('img.fak-find-this');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }
        // Fungsi debounce untuk membatasi frekuensi pemanggilan fungsi
        function fak_debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };
        fakFindThis();


        jQuery(window).on('resize', fak_debounce(function () {
            fakFindThis();
        }, 250));
        //find this



        //jquery code end above here
    });
});