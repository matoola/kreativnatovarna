export default {
  init() {

    // count total slide in sliders (plz note: only one slider per page - it's ID based!)
    var totalSlides = $('#carouselLatest > .carousel-inner > .carousel-item').length;
    $('span.counter > span.counter-total').append(totalSlides);

    // carousel swipe
    $('.carousel').on('touchstart', function(event){
      var xClick = event.originalEvent.touches[0].pageX;
        $(this).one('touchmove', function(event){
            var xMove = event.originalEvent.touches[0].pageX;
            if( Math.floor(xClick - xMove) > 5 ){
                $(this).carousel('next');
            }
            else if( Math.floor(xClick - xMove) < -5 ){
                $(this).carousel('prev');
            }
        });
        $('.carousel').on('touchend', function(){
            $(this).off('touchmove');
        });
    });

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
