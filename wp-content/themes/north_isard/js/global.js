jQuery(function ($) {

    // Scroll back to top	
    function WPEXBackTopScroll() {

        $('a[href=#top]').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 'normal');
            return false;
        });

    }

    // Scroll to comments	
    function WPEXCommentScroll() {

        $('.comment-scroll a').click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 'normal');
        });

    }

    // Responsive navbar
    function WPEXResponsiveNav() {
        var nav = $('#site-navigation'), button, menu;
        $('.nav-toggle').on('click', function () {
            $('.nav-menu').toggleClass('toggled-on');
            $('.nav-toggle').find('.toggle-icon').toggleClass('icon-arrow-down icon-arrow-up');
        });
    }

    //Toggle sidebar
    $('a#toggle-btn').click(function () {
        $('div#toggle-wrap').slideToggle();
        //$('div#toggle-wrap').toggle("slow");
        $(this).find('i').toggleClass('icon-reorder icon-remove');
    })

    // Masonry Widths
    function WPEXMasonry() {
        var $windowWidth = $(window).width();
        var $gridWidth = $('.grid').width();
        var $colWidth = $windowWidth / 240;
        var $gutter = 20;
        var $cols = 490;
        
        if ($.browser.msie && parseInt($.browser.version, 10) === 8) {

            $('.grid').masonry({
                itemSelector: '.loop-entry',
                gutterWidth: 30,
                columnWidth: 240,
                isAnimated: false,
              //  isFitWidth: true
            });

            // Decent browsers		
        } else {



           if ($windowWidth > 959 && $windowWidth <= 1024) {
               
                //var $colWidth = ($('.container-right').width() - 40) / 3;
                var $colWidth = ($windowWidth - 550) / 2;
               //  alert(1111+"*"+$colWidth);
                $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth: 20,
                    columnWidth: $colWidth,
                    isAnimated: true,
                  //  isFitWidth: true
                });
                $('.loop-entry').width($colWidth);

            } else if ($windowWidth > 700 && $windowWidth <= 959) {
              //  alert(2222);
                $colWidth = ($windowWidth - 120) / 3;
                $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth: 20,
                    columnWidth: $colWidth,
                    isAnimated: true,
                   // isFitWidth: true
                });
                $('.loop-entry').width($colWidth);


            } else if ($windowWidth > 400 && $windowWidth < 700) {
               // alert(3333);
                $colWidth = ($windowWidth - 100) / 2;
                $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth: 20,
                    columnWidth: $colWidth,
                    isAnimated: true,
                   // isFitWidth: true
                });
                $('.loop-entry').width($colWidth);

            } else if ($windowWidth > 1024 && $windowWidth < 1300) {
            $colWidth = ($windowWidth - 590) / 3;
           // alert($gridWidth+" / "+$colWidth);
            $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth : $gutter,
                   columnWidth: $colWidth,
                    isAnimated: true,
                    //isFitWidth: true
                });
                $('.loop-entry').width($colWidth);
        
            } else if ($windowWidth > 1301 && $windowWidth < 1550) {
            $colWidth = ($windowWidth - 620) / 4;
            
            $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth : $gutter,
                   columnWidth: $colWidth,
                    isAnimated: true,
                   // isFitWidth: true
                });
                $('.loop-entry').width($colWidth);
        }else if ($windowWidth > 1501 && $windowWidth < 1750) {
            $colWidth = ($windowWidth - 650) / 5;
            
            $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth : $gutter,
                   columnWidth: $colWidth,
                    isAnimated: true,
                    //isFitWidth: true
                });
                $('.loop-entry').width($colWidth);
        }
            else {
              //  var $multi = parseInt(($gridWidth  ) / 200);
               // var $multi = (($gridWidth  ) / 250);
             //   var $colWidth = ($gridWidth ) / $multi ;
             //   var $gutter = ($gridWidth - $multi * 250 ) / $multi;
                //alert($gridWidth+" / "+$multi+" / "+$colWidth+ " gut "+ $gutter);
                var $colWidth = ($windowWidth - $cols) / 7;
                $colWidth = 240;
                $('.grid').masonry({
                    itemSelector: '.loop-entry',
                    gutterWidth : $gutter,
                   columnWidth: $colWidth,
                    isAnimated: true,
                   // isFitWidth: true
                });
                $('.loop-entry').width($colWidth);
            }
        }
    }

    $(document).ready(function () {

        WPEXBackTopScroll();
        WPEXCommentScroll();
        WPEXResponsiveNav();
        WPEXMasonry();
    });


    $(window).load(function () {
        WPEXMasonry();
    });


    $(window).resize(function () {
        WPEXMasonry();
    });

    if (document.addEventListener) {
        window.addEventListener("orientationchange", function () {
            WPEXMasonry();
        });

        window.addEventListener("resize", function () {
            WPEXMasonry();
        });
    }


});