/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

( function( $ ) {
    // Wraps class around figured images (?)
    $( 'img.aligncenter' ).wrap( '<figure class="centered-image"></figure>' );
    
    // Applys hover class on homepage menu
    $( '.homepage-menu-item a' )
        .on( 'hover', function() {
            $( '.homepage-menu-button', this ).toggleClass( 'homepage-menu-button-hover' );
      }).on( 'focus', function() {
            $( '.homepage-menu-button', this ).addClass( 'homepage-menu-button-hover' );
      }).on( 'focusout', function() {
            $( '.homepage-menu-button', this ).removeClass( 'homepage-menu-button-hover' );
    });
    
    // TweenLite Animation on homepage
    TweenMax.from(".site-title-top", 2, {
        paddingLeft: "1em",
        opacity: 0,
        ease: Power1.easeInOut
    });

    TweenMax.from(".site-title-bottom", 2, {
        paddingRight: "1em",
        opacity: 0,
        ease: Power1.easeInOut
    });

    TweenMax.staggerFrom(".site-description span", 1, {
        bottom: "1em",
        opacity: 0,
        delay: 1.5
    }, -0.3);

    TweenMax.staggerFrom(".homepage-menu-item", 1, {
        bottom: "1em",
        opacity: 0,
        delay: 2
    }, 0.2); 

})( jQuery );