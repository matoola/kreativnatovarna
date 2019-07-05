export default {
  init() {

    // fancybox for gallery: add attribute and options
    $('.gallery > .gallery-item > .gallery-icon > a').attr('data-fancybox', 'gallery');

    $('.gallery-item').each(function(){
      var caption = $(this).find('.wp-caption-text').text();
      $(this).find('a').attr('data-caption', caption);
    });

    $('[data-fancybox="gallery"]').fancybox({
      // Options will go here
    });

    $('a[href$="jpg"], a[href$="png"], a[href$="jpeg"]').fancybox();

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
