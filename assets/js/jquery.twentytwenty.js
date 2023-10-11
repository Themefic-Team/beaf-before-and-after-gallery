(function($){

  $.fn.twentytwenty = function(options) {
    var options = $.extend({
      default_offset_pct: 0.5,
      orientation: 'horizontal',
      before_label: 'Before',
      after_label: 'After',
      no_overlay: false,
      move_slider_on_hover: false,
      move_with_handle_only: true,
      click_to_move: false
    }, options);

    return this.each(function() { 
      var sliderPct = options.default_offset_pct;
      var container = $(this);
      var sliderOrientation = options.orientation;
      var beforeDirection = (sliderOrientation === 'vertical') ? 'down' : 'left';
      var afterDirection = (sliderOrientation === 'vertical') ? 'up' : 'right';

      container.wrap("<div class='twentytwenty-wrapper bafg-twentytwenty-wrapper twentytwenty-" + sliderOrientation + "'></div>");
      if(!options.no_overlay) {
        container.append("<div class='twentytwenty-overlay'></div>");
        var overlay = container.find(".twentytwenty-overlay");

        /* Prepend Overlay Label outside of image */
        var labelOutside = $('.bafg-twentytwenty-container').data('label_outside');
        if(labelOutside == true && sliderOrientation == 'vertical' ){
          var bafgWrapper = $(".twentytwenty-wrapper");
          bafgWrapper.wrap("<div class='bafg-outside-label-wrapper twentytwenty-" + sliderOrientation + "'></div>");
          var outsideLabel = $(".bafg-outside-label-wrapper");
          outsideLabel.prepend("<div class='twentytwenty-after-label' data-content='"+options.after_label+"'></div>");
          outsideLabel.prepend("<div class='twentytwenty-before-label' data-content='"+options.before_label+"'></div>");
        }
        /* Prepend Overlay Label outside of image end */

        overlay.append("<div class='twentytwenty-before-label' data-content='"+options.before_label+"'></div>");
        overlay.append("<div class='twentytwenty-after-label' data-content='"+options.after_label+"'></div>");
      }
      var beforeImg = container.find("img:first");
      var afterImg = container.find("img:last");
      
      //for video slider
      let sliderMethod = container.data('slider-method');
      let beforeVdo    = container.find("iframe:first");
      let afterVdo     = container.find("iframe:last");
      let beforeSelfVdo = container.find("video:first");
      let afterSelfVdo = container.find("video:last");
      beforeVdo.addClass('twentytwenty-before');
      afterVdo.addClass('twentytwenty-after');
      beforeSelfVdo.addClass('twentytwenty-before')
      afterSelfVdo.addClass('twentytwenty-after')
      
      
      container.append("<div class='twentytwenty-handle'></div>");
      var slider = container.find(".twentytwenty-handle");

	  if( container.hasClass('design-7') ) {
	  	  slider.wrap("<div class='bafg-handle-wrapper'></div>");
	  }

    if(container.hasClass('design-1')){
      slider.wrapInner( "<div class='handle-trnasf'></div>" );
    }
		
	  slider.append("<span class='twentytwenty-" + beforeDirection + "-arrow'></span>");
	  slider.append("<span class='twentytwenty-" + afterDirection + "-arrow'></span>");
      container.addClass("twentytwenty-container");
      beforeImg.addClass("twentytwenty-before");
      afterImg.addClass("twentytwenty-after");
      
      var videoType = container.data('video-type');
      var calcOffset = function(dimensionPct) {
        if(sliderMethod == 'method_4'){
          if( videoType != undefined && videoType == 'self' ){
            var w = beforeSelfVdo.width();
            var h = beforeSelfVdo.height();
          }else{
            var w = beforeVdo.width();
            var h = beforeVdo.height();
          }
          
          if(w == 0 && h == 0){
            if( videoType != undefined && videoType == 'self' ){
              var videoHeight = container.find('video:first').height();
              var videoWidth = container.find('video:last').width();
            }else{
              var videoHeight = container.find('iframe:first').height();
              var videoWidth = container.find('iframe:last').width();
            }
            
            w = videoWidth;
            h = videoHeight;    
              container.css("height", dimensionPct*h+"px");
          }else{
            container.css("height", h+"px");
          }
        }else{
          var w = beforeImg.width();
          var h = beforeImg.height();
          
          if(w == 0 && h == 0){
            var imageHeight = container.find('img:first').prop('naturalHeight'); 
            var imageWidth = container.find('img:first').prop('naturalWidth'); 
            
            w = imageWidth;
            h = imageHeight;    
              container.css("height", dimensionPct*h+"px");
          }else{
            container.css("height", h+"px");
          }
        }
        container.css('max-width', w+'px');  
        return {
          w: w+"px",
          h: h+"px",
          cw: (dimensionPct*w)+"px",
          ch: (dimensionPct*h)+"px"
        };
      };
      
      var adjustContainer = function(offset) {
      	if (sliderOrientation === 'vertical') {
          beforeImg.css("clip", "rect(0,"+offset.w+","+offset.ch+",0)");
          afterImg.css("clip", "rect("+offset.ch+","+offset.w+","+offset.h+",0)");
          if( videoType == 'self' ){
            beforeSelfVdo.css("clip", "rect(0, "+offset.w + ", " + offset.ch+", 0)");
            afterSelfVdo.css("clip", "rect("+offset.ch+", "+offset.w+", "+offset.h+", 0)");
          }else{
            beforeVdo.css("clip", "rect(0, "+offset.w + ", " + offset.ch+", 0)");
            afterVdo.css("clip", "rect("+offset.ch+" ,"+offset.w+", "+offset.h+", 0)");
          }
      	} else {
          beforeImg.css("clip", "rect(0,"+offset.cw+","+offset.h+",0)");
          afterImg.css("clip", "rect(0,"+offset.w+","+offset.h+","+offset.cw+")");
          // beforeVdo.css("clip-path", "inset(0 "+offset.cw+" "+offset.h+" 0)");
          // afterVdo.css("clip-path", "inset(0 "+offset.w+" "+offset.h+" "+offset.cw+")");
          if( videoType == 'self' ){
            beforeSelfVdo.css("clip", "rect(0, "+offset.cw+","+offset.h+",0)");
            afterSelfVdo.css("clip", "rect(0,"+offset.w+","+offset.h+","+offset.cw+")");
          }else{
            beforeVdo.css("clip", "rect(0, "+offset.cw+","+offset.h+",0)");
            afterVdo.css("clip", "rect(0,"+offset.w+","+offset.h+","+offset.cw+")");
          }
           
    	}
        // container.css( "height", offset.h);
      };

      var adjustSlider = function(pct) {
        var offset = calcOffset(pct);
        slider.css((sliderOrientation==="vertical") ? "top" : "left", (sliderOrientation==="vertical") ? offset.ch : offset.cw);
        adjustContainer(offset);
      };

      // Return the number specified or the min/max number if it outside the range given.
      var minMaxNumber = function(num, min, max) {
        return Math.max(min, Math.min(max, num));
      };

      // Calculate the slider percentage based on the position.
      var getSliderPercentage = function(positionX, positionY) {
        if( sliderMethod === 'method_4' ){
          if( videoType == 'self' ){
            videoWidth = selfVideoWidth;
            videoHeight = selfVideoHeight;
          }
          var sliderPercentage = (sliderOrientation === 'vertical') ?
          (positionY-offsetY)/videoHeight :
          (positionX-offsetX)/videoWidth;

        }else{
          var sliderPercentage = (sliderOrientation === 'vertical') ?
          (positionY-offsetY)/imgHeight :
          (positionX-offsetX)/imgWidth;
        }

        return minMaxNumber(sliderPercentage, 0, 1);
      };

      $(window).on("resize.twentytwenty", function(e) {
        adjustSlider(sliderPct);
      });

      var offsetX = 0;
      var offsetY = 0;
      var imgWidth = 0;
      var imgHeight = 0;
      var videoHeight = 0;
      var videoWidth = 0;
      var selfVideoWidth = 0;
      var selfVideoHeight = 0;
      /**
       * Handles the start of a move event.
       *
       * @param {Object} e - The event object.
       */
      var onMoveStart = function(e) {
        if (((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) && sliderOrientation !== 'vertical') {
          e.preventDefault();
        }
        else if (((e.distX < e.distY && e.distX < -e.distY) || (e.distX > e.distY && e.distX > -e.distY)) && sliderOrientation === 'vertical') {
          e.preventDefault();
        }
        container.addClass("active");
        offsetX = container.offset().left;
        offsetY = container.offset().top;
        imgWidth = beforeImg.width(); 
        imgHeight = beforeImg.height();
        videoHeight = beforeVdo.height();
        videoWidth = beforeVdo.width();
        selfVideoWidth = beforeSelfVdo.width();
        selfVideoHeight = beforeSelfVdo.height();

      };
      var onMove = function(e) {
        if (container.hasClass("active")) {
          sliderPct = getSliderPercentage(e.pageX, e.pageY);
          adjustSlider(sliderPct);
        }
      };
      var onMoveEnd = function() {
          container.removeClass("active");
      };

      var moveTarget = options.move_with_handle_only ? slider : container;
      moveTarget.on("movestart",onMoveStart);
      moveTarget.on("move",onMove);
      moveTarget.on("moveend",onMoveEnd);

      if (options.move_slider_on_hover) {
        container.on("mouseenter", onMoveStart);
        container.on("mousemove", onMove);
        container.on("mouseleave", onMoveEnd);
      }

      slider.on("touchmove", function(e) {
        e.preventDefault();
      });

      container.find("img").on("mousedown", function(event) {
        event.preventDefault();
      });

      container.find("iframe").on("mousedown", function(event) {
        event.preventDefault();
      });

      container.find("video").on("mousedown", function(event) {
        event.preventDefault();
      });

      if (options.click_to_move) {
        container.on('click', function(e) {
          offsetX   = container.offset().left;
          offsetY   = container.offset().top;
          imgWidth  = beforeImg.width();
          imgHeight = beforeImg.height();

          sliderPct = getSliderPercentage(e.pageX, e.pageY);
          adjustSlider(sliderPct);
        });
      }

      $(window).trigger("resize.twentytwenty");
      
      //on screen orientation change
      window.addEventListener("orientationchange", function() {
        let screenOrientation = screen.orientation.type;

        if( screenOrientation == 'portrait-primary' || screenOrientation == 'landscape-primary' ){
          $(window).trigger("resize.twentytwenty");
        }
      });
    });
  };

})(jQuery);
