; (function ($) { 
    'use strict';
    
    jQuery(document).ready(function($) {
        // Select the section    
        // var section = $('.bafg-twentytwenty-container');
        // console.log(section);
        // section.each(function(){
        //     var imageHeight = $(this).find('img:first').prop('naturalHeight');
        //     var imageWidth = $(this).find('img:first').prop('naturalWidth');
        //     // $(this).css('height',imageHeight)
        //     // console.log(imageWidth);
        //     $(this).css('height',imageHeight+'px');
        //     $(this).css('width',imageWidth+'px');
                
        
        // });
        
    });
    // Hide the preloader once the page has loaded
    jQuery(window).on('load', function() {
        var section = jQuery('.bafg-preloader');
        section.hide();
    });
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
            
            
            // $(this).find('img').css('min-width',imageWidth+'px');
            // console.log($(this).find('img'));
            // $(this).css('height',imageHeight+'px');
            // $(this).css('width',imageWidth+'px');


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
            if(beforeImageW == 0){ 
                var imageHeight = $(this).find('img:first').prop('naturalHeight'); 
                var imageWidth = $(this).find('img:first').prop('naturalWidth'); 
                if(imageHeight != 0){ 
                    $(this).css('max-width', imageWidth + 'px');
                    $(this).css('max-height', imageHeight + 'px');
                } 
                
                
            }else{
                $(this).css('max-width', beforeImageW + 'px');
            }
            
            

            //Label OutSide
            var bafgLabelOutside = $(this).data('label_outside');
            var orientation = $(this).attr('bafg-orientation');
            if (bafgLabelOutside == true && orientation == 'vertical') {
                $('.bafg-outside-label-wrapper.twentytwenty-vertical .bafg-twentytwenty-container').css('margin', 50 + 'px' + ' auto');

                $('.bafg-outside-label-wrapper.twentytwenty-vertical .twentytwenty-overlay>.twentytwenty-before-label').css('display', 'none');
                $('.bafg-outside-label-wrapper.twentytwenty-vertical .twentytwenty-overlay .twentytwenty-after-label').css('display', 'none');
            }
            
            // var imageHeight = $(this).find('img:first').prop('naturalHeight');
            // var imageWidth = $(this).find('img:first').prop('naturalWidth');
            // $(this).css('min-height',imageHeight+'px');
            // $(this).css('min-width',imageWidth+'px');


            // $(this).find('.twentytwenty-before').css('clip','rect(0px, '+imageWidth+'px, '+imageHeight+'px, 320px)');
            // console.log($(this).find('.twentytwenty-after'));
            // $(this).find('.twentytwenty-after').css('clip','rect(0px, '+imageWidth+'px, '+imageHeight+'px, 320px)');
            
            $(window).trigger("resize.twentytwenty");
        });
        
    });
    
    $(window).on('scroll', function () {
        $(window).trigger("resize.twentytwenty");
    });
 
})(jQuery);
