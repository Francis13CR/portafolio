jQuery(function($){
    // if (window.location.href.indexOf('/category/') > -1) {
    //     $('.footer').addClass('ocultar');
    // }
    $('.moretag').text(" Ver más...")
    $('.wp-block-columns').css('opacity', 0); // Ocultar inicialmente los elementos
  
    $('.wp-block-columns').waypoint(function(direction) {
      if (direction === 'down') {
        $(this.element).animate({ opacity: 1 }, 1000); // Fade-in
      } else if (direction === 'up') {
        $(this.element).animate({ opacity: 0 }, 1000, function() {
          $(this).css('opacity', 0); // Restablecer la opacidad a 0 al completar el fade-out
        }); // Fade-out
      }
    }, {
      offset: '98%',
      handler: function(direction) {
        if (direction === 'up') {
          $(this.element).css('opacity', 0); // Ocultar los elementos cuando se vuelven invisibles
        }
      }
    });
  
   
})