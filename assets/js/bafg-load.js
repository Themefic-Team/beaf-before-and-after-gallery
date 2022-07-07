// ; (function ($) { 
//     'use strict'; 
//     $( document ).ready(function() {
 
//         $(".popup_button").click(function() {
//             // alert(bafg_ajax_url.ajax_url);
//             var id = $(this).attr("data-id"); 
//             jQuery.ajax({
//                 url : bafg_ajax_url.ajax_url+'/inc/popup-load.php',
//                 type : 'post',
//                 data : { 
//                     id : id, 
//                 },
//                 success : function( response ) { 
//                     $("#bafg_popup_wrap").html(response);
//                     $.ajax({
//                         type: "GET",
//                         url: bafg_ajax_url.ajax_url+'assets/js/bafg-custom-js.js',
//                         dataType: "script"
//                       });
//                     before_after_function()
//                     $.ajax({
//                         type: "GET",
//                         url: bafg_ajax_url.ajax_url+'assets/js/jquery.event.move.js',
//                         dataType: "script"
//                       });
                      
//                     // $(".bafg_popup_preview").fadeIn(500);
//                     $(".bafg_popup_preview").show();
//                 }
//             }); 
            

            
//           });
//           $(".close").click(function() {
//             $(".bafg_popup_preview").fadeOut(500);
//           });
    
       
//     });

// })(jQuery);
