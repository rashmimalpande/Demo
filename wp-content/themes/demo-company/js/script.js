jQuery(document).ready(function(){
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: 3000,
        items: 1,
        autoplayHoverPause: true,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp'
    });

    var list = jQuery('.content-list');
    jQuery('#display .menu-item').mouseover(function(){
        list.hide().filter('#page-'+ this.id).css({'display': 'flex'});

    });

    
});