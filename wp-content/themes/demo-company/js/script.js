jQuery(document).ready(function(){
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: 3000,
        items: 1,
        autoplayHoverPause: true,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp'
    });
});