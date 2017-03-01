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
    var id="#one";
    jQuery('.sub-page-title .page-item-38 a').mouseover(function(){
        list.hide().filter('#page-item-38').show();

    });

    jQuery('.sub-page-title .page-item-34 a').mouseover(function(){
        list.hide().filter('#page-item-34').css({'display': 'flex'});

    });

     jQuery('.sub-page-title .page-item-36 a').mouseover(function(){
        list.hide().filter('#page-item-36').css({'display': 'flex'});

    });
    
});