/*! 
 * Featured Pages Customizer - Front javascript
 * 
 * Copyright 2014 Nicolas Guillaume, GPLv2+ Licensed 
 */
jQuery(document).ready(function () {
    ! function ($) {
        //prevents js conflicts
        "use strict";

        //adds theme name class to the body tag
        $('body').addClass(FPCFront.ThemeName);

        //adds hover class on hover
        $(".fpc-widget-front").hover(function () {
            $(this).addClass("hover")
        }, function () {
            $(this).removeClass("hover")
        });

        $(window).on( 'load' , function () {
          //Resizes FP Container dynamically if too small
          var $FPContainer  = $('.fpc-container'),
              SpanValue     = FPCFront.Spanvalue || 4,
              CurrentSpan   = 'fpc-span' + SpanValue,
              $FPBlocks     = $( '.' + CurrentSpan , $FPContainer);                        

          function ChangeFPClass() {
            var is_resp       = ( $(window).width() > 767 - 15 ) ? false : true;
            switch ( SpanValue) {
              case '6' :
                if ( $FPContainer.width() <= 480 ) {
                  $FPBlocks.removeClass(CurrentSpan).addClass('fpc-span12');
                } else if ( $FPContainer.width() > 480) {
                  $FPBlocks.removeClass('fpc-span12').addClass(CurrentSpan);
                }
              break;

              case '3' :
                if ( $FPContainer.width() <= 950 ) {
                  $FPBlocks.removeClass(CurrentSpan).addClass('fpc-span12');
                } else if ( $FPContainer.width() > 950) {
                  $FPBlocks.removeClass('fpc-span12').addClass(CurrentSpan);
                }
              break;

              /*case '4' :
              console.log($FPContainer.width());
                if ( $FPContainer.width() <= 800 ) {
                  $FPBlocks.removeClass(CurrentSpan).addClass('fpc-span12');
                } else if ( $FPContainer.width() > 800) {
                  $FPBlocks.removeClass('fpc-span12').addClass(CurrentSpan);
                }
              break;*/

              default :
                if ( $FPContainer.width() <= 767 ) {
                  $FPBlocks.removeClass(CurrentSpan).addClass('fpc-span12');
                } else if ( $FPContainer.width() > 767 ) {
                  $FPBlocks.removeClass('fpc-span12').addClass(CurrentSpan);
                }
              break;
            }
           
          }

          ChangeFPClass();
          $(window).resize(function () {
              setTimeout(ChangeFPClass, 200);
          });
        });//end of on load

    }(window.jQuery)
});