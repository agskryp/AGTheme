/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

( function( $ ) {
    $( 'img.aligncenter' ).wrap( '<figure class="centered-image"></figure>' );
    
    $( '.homepage-menu-item a' ).on( 'hover', function() {
        $( '.homepage-menu-button', this ).toggleClass( 'homepage-menu-button-hover' );
    });
    
    $( '.homepage-menu-item a' ).on( 'focus', function() {
        $ ( this ).find( '.homepage-menu-button' ).addClass( 'homepage-menu-button-hover' );
    });
    
    $( '.homepage-menu-item a' ).on( 'focusout', function() {
        $ ( this ).find( '.homepage-menu-button' ).removeClass( 'homepage-menu-button-hover' );
    });
})( jQuery );