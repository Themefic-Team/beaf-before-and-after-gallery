; (function ($) { 
    'use strict';
    $(window).on('load', function () { 
        $(".bafg-twentytwenty-container").each(function () {
            if ($(this).attr('bafg-move-slider-on-hover') == 'no') {
                var moveSliderHover = false;
            } else {
                var moveSliderHover = true;
            }

            if ($(this).attr('bafg-overlay') == 'yes') {
                var overlay = false;
            } else {
                var overlay = true;
            }

            if ($(this).attr('bafg-click-to-move') == 'no') {
                var clickToMove = false;
            } else {
                var clickToMove = true;
            }

            $(this).twentytwenty({
                orientation: $(this).attr('bafg-orientation'),
                default_offset_pct: $(this).attr('bafg-default-offset'),
                before_label: $(this).attr('bafg-before-label'),
                after_label: $(this).attr('bafg-after-label'),
                no_overlay: overlay,
                move_slider_on_hover: moveSliderHover,
                click_to_move: clickToMove
            });

            var beforeImageW = $(this).find('img.twentytwenty-before').width(); 
            $(this).css('max-width', beforeImageW + 'px');

            //Label OutSide
            var bafgLabelOutside = $(this).data('label_outside');
            var orientation = $(this).attr('bafg-orientation');
            if (bafgLabelOutside == true && orientation == 'vertical') {
                $('.bafg-outside-label-wrapper.twentytwenty-vertical .bafg-twentytwenty-container').css('margin', 50 + 'px' + ' auto');

                $('.bafg-outside-label-wrapper.twentytwenty-vertical .twentytwenty-overlay>.twentytwenty-before-label').css('display', 'none');
                $('.bafg-outside-label-wrapper.twentytwenty-vertical .twentytwenty-overlay .twentytwenty-after-label').css('display', 'none');
            }

        });
        $(window).trigger("resize.twentytwenty");
    });
    
    $(window).on('scroll', function () {
        $(window).trigger("resize.twentytwenty");
    });

  

   
})(jQuery);

jQuery(document).ready(function($) {
    // Select the section
    
    var section = $('.bafg-preloader');
    section.each(function(){
        var imageHeight = $(".bafg-twentytwenty-container").find('img:first').height();
        var imageWidth = $(".bafg-twentytwenty-container").find('img:first').width();
        $(".bafg-twentytwenty-container").css('height',imageHeight)
        
        $(this).css('height',imageHeight);
        $(this).css('width',imageWidth);
            
      
   });
     
});
// Hide the preloader once the page has loaded
jQuery(window).on('load', function() {
    var section = jQuery('.bafg-preloader');
    section.hide();
});