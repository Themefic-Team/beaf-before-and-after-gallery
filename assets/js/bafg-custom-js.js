; (function ($) { 
    'use strict';
    $(window).on('load', function () {
        // $( document ).ready(function() {
            before_after_function()
      

    });
    function before_after_function(){
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

        $(".twentytwenty-wrapper .design-1 .twentytwenty-handle").wrapInner("<div class='handle-trnasf' />"); 
        $(window).trigger("resize.twentytwenty");
    }

    $(window).on('scroll', function () {

        $(window).trigger("resize.twentytwenty");

    });
    $( document ).ready(function() {
        $('.twentytwenty-wrapper').css('max-width', "100% !important");
        $(".popup_button").click(function() {
            // alert(bafg_ajax_url.ajax_url);
            var id = $(this).attr("data-id"); 
            jQuery.ajax({
                url : bafg_ajax_url.ajax_url+'/inc/popup-load.php',
                type : 'post',
                data : { 
                    id : id, 
                },
                success : function( response ) {  
                    $("#bafg_popup_wrap").html(response);  
                    $(".bafg_popup_preview .popup_button").remove();
                    $(".bafg_popup_preview").fadeIn(10);
                    before_after_function()  
                }
            }); 
            

            
          });
          $(".close").click(function() {
            $(".bafg_popup_preview").fadeOut(500);
          });
    
       
    });



})(jQuery);
