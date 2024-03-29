// 'use strict';

(function($) {

  var IMM = IMM || {};


  IMM = {

    init: function( config ) {
      IMM.config = {
        $triggerBtn: $('.js-trigger-overlay'),
        $overlay: $('.overlay'),
        $closeBttn: $('.overlay__close')
      };

      if ( IMM.config && typeof( IMM.config ) == 'object' ) {
          $.extend( IMM.config, config );
      }


      if ( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        var isMobile = true;
      }

      var $section_container = $('.isotope'),
          $isotope_container = $('.isotope'),
          $filters = $('#filters input'),
          windowH = $(window).outerHeight(),
          dataLayout;

      // var $container = $('#container').imagesLoaded( function() {
      //   $container.packery({
      //       // "columnWidth": ".row",
      //       // "itemSelector": ".item"
      //     });
      // });

      // var resizeImg = function() {
        //return $('img').resizeToParent({parent: 'article'});
      // }


      // Init overlay
      this.Overlay.init();

      // console.log(this);



      // var windowH = $('.isotope').outerHeight()
      //     dataLayout;


      $('.item').each(function( index, element ) {
        //$(element).outerHeight(windowH / 2);
      });

      $('.bxslider').bxSlider({
        // mode: 'fade',
        captions: true
      });



      // $smart_container.mixItUp();



      // Sizes


      $('.item article').imagecover();

      // $(window).on('resize', function(){
      //     $smart_container.isotope();
      // });

      // $('.isotope').pagepiling();
      if ( $isotope_container.length ) {
        if ( !isMobile ) {
          $isotope_container.fullpage({
            css3: true,
            navigation: true,
            // responsive: 1,
            navigationPosition: 'right',
            // navigationTooltips: ['First', 'Second', 'Third'],
          });
        } else {
          $('html, body').css('overflow', 'auto');
        }

        $('.js-go-top').on('click', function(event) {
          event.preventDefault();
          $.fn.fullpage.moveTo(1);
        });


        $section_container.isotope({
          resizesContainer: false,
          layoutMode: 'packery',
          itemSelector: '.item',
        });

        // var elems = $section_container.isotope('getItemElements');

        // console.log(elems.length);

        $section_container.isotope('on', 'layoutComplete', function( isoInstance, laidOutItems ) {
          if ( isoInstance.filteredItems.length <= 6 ) {
            // $.fn.fullpage.moveTo(1);
            // $.fn.fullpage.destroy('all');
            // $('.section').hide();
            // $('.section.active').show();
            $.fn.fullpage.reBuild();
          } else {
            // $('.section').show();
          }
        });
      };


      $filters.on( 'change', function() {
        var filters = [];
        // get checked checkboxes values
        $filters.filter(':checked').each(function(){
          filters.push( this.value );
        });

        filters = filters.join(', ');
        $section_container.isotope({ filter: filters });
        $section_container.isotope('shuffle');


        // $('.section').each(function(index, el) {
        //   if ( $('.section').children('.item:hidden') ) {
        //     console.log($(this))
        //   }
        // });

      });

      // Stories carousel
      $('.js-stories').slick({
        slide: 'li',
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

      // Shares count
      // TODO


      // Sticky
      if ( !isMobile ) {
        $('.videobg, .media_picture').waypoint('sticky');
      };

      $('.entry__video').waypoint(function( direction ) {
        if ( direction === 'down' ) {
          $(this).find('video').get(0).play();
        }
      }, {
        offset: '0',
        triggerOnce: true
      });

      // $('.my-sticky-element').waypoint('unsticky');

      // sidebar switch

      $('.sidebar__switch').on('click', function() {
        $('.sidebar').toggleClass('sidebar--closed');
        console.log();
        // $section_container.isotope('reloadItems');
        $section_container.isotope();
      });

      sidebarHandler();
      $(window).on('resize', sidebarHandler);

      function sidebarHandler() {
        if ( $(window).width() < 1024 ) {
          $('.sidebar').addClass('sidebar--closed');
        } else if ( $('.sidebar').hasClass('sidebar--closed') ) {
          $('.sidebar').removeClass('sidebar--closed');
        }
      }

    },

    Overlay: {
      init: function() {
        // Overlay trigger
        var self = this;

        IMM.config.$triggerBtn.on('click', function( event ) {
          event.preventDefault();
          self.toggleOverlay();
        });
        IMM.config.$closeBttn.on('click', function( event ) {
          event.preventDefault();
          self.toggleOverlay();
        });
      },

      // triggerBttn.addEventListener( 'click', toggleOverlay );
      // closeBttn.addEventListener( 'click', toggleOverlay );

      toggleOverlay: function() {
        var transEndEventNames = {
              'WebkitTransition': 'webkitTransitionEnd',
              'MozTransition': 'transitionend',
              'OTransition': 'oTransitionEnd',
              'msTransition': 'MSTransitionEnd',
              'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            support = { transitions : Modernizr.csstransitions };


        if ( IMM.config.$overlay.hasClass('overlay--open') ) {
          IMM.config.$overlay.removeClass('overlay--open').addClass('overlay--close');

          // var onEndTransitionFn = function( event ) {
          //   if ( support.transitions ) {
          //     console.log(this.event.propertyName);
          //     if ( this.event.propertyName !== 'visibility' ) return;
          //     this.removeEventListener( transEndEventName, onEndTransitionFn );
          //   }
          //   IMM.config.$overlay.removeClass('close');
          // };
          // if ( support.transitions ) {
          //   // IMM.config.$overlay.addEventListener( transEndEventName, onEndTransitionFn );
          //   IMM.config.$overlay.on("transEndEventName", onEndTransitionFn());
          // }
          // else {
          //   onEndTransitionFn();
          // }
        } else {
          IMM.config.$overlay.removeClass('overlay--close').addClass('overlay--open');
        }
      }
    }
  };

  $(function() {
    // Init main
    IMM.init();


  });


})(jQuery);



