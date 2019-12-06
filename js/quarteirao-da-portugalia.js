(function($) {
    $(document).ready(function(){
       // Cache references to DOM elements for performance
        var dom = {
            $html:               $('html'),
            $window:             $(window),
            $body:               $('body'),
            $siteHeader:         $('#site-header'),
            $siteSideNav:        $('#site-side-nav'),
            $siteSideNavClose:   $('#site-side-nav .side-nav-close'),
        };

        var breakpoints = {
            sTablet:  576,
            tablet:  768,
            desktop: 992,
            wide:    1200
        }


        // @ Homepage
        if( dom.$body.hasClass('home') ) {
            stickyHeader();

            taglinesLoop($('#hero').data('tagline-interval'));

            // On mobile, list images become a slider
            if(window.innerWidth < breakpoints.tablet) {
                listImagesSlider();
            }
            
            $(window).resize(function(e){
                // Init/Destroy list images slider on resize
                if(window.innerWidth < breakpoints.tablet) {
                    if(!$('.c-list-images').hasClass('slick-initialized')){
                        listImagesSlider();
                    }
                } else {
                    if($('.c-list-images').hasClass('slick-initialized')){
                        $('.c-list-images').slick('unslick');
                    }
                }
            });

            // Timeline
            $('.c-timeline .event').click(function(){
                var id = $(this).attr('id');
                var $modal = $('.c-timeline .c-modal#modal-' + id.split('-')[1]);
                if($modal.find('.modal-slider').length) {
                    $('.modal-slider').slick({
                        arrows: false,
                        dots: true,
                        autoplay: true
                    });
                }
                openModal($modal);
            });

            $('.c-modal .modal-close').click(function(){

                var $modal = $(this).parent();
                if($modal.find('.modal-slider').length) {
                    var $slider = $modal.find('.modal-slider');
                    if($slider.hasClass('slick-initialized')){
                        $slider.slick('unslick');
                    }
                }
                closeModal($modal);
            });

            function closeModal(modal) {
                modal.removeClass('active');
                //unlockScroll();
                $('#c-blueprint .filters li.active').removeClass('active');
            }

            function openModal(modal) {
                modal.addClass('active');
                //lockScroll();
            }

            function lockScroll() {
                var scrollPosition = [
                    self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                    self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
                ];
                
                dom.$html.data('scroll-position', scrollPosition);
                dom.$html.data('previous-overflow', dom.$html.css('overflow'));
                dom.$html.css('overflow', 'hidden');
                window.scrollTo(scrollPosition[0], scrollPosition[1]);
            }

            function unlockScroll() {
                var scrollPosition = dom.$html.data('scroll-position');
                if(typeof scrollPosition !== 'undefined') {
                    console.log(scrollPosition);
                    dom.$html.css('overflow', dom.$html.data('previous-overflow'));
                    window.scrollTo(scrollPosition[0], scrollPosition[1]);
                }
            }

            $( document ).on( 'keydown', function ( e ) {
                if ( e.keyCode === 27 ) { // ESC
                    closeModal($('.c-modal.active'));
                }
            });

            $(document).mouseup(function(e) {
                var container = $(".c-modal.active");
                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    closeModal(container);
                }
            });

            // Blueprint
            $('#c-blueprint .filters li').click(function(e){
                $(this).siblings( ".active" ).removeClass('active');
                $(this).addClass('active');
                var id = $(this).attr('id');
                var $modal = $('#c-blueprint #modal-' + id.split('-')[1]);
                $modal.siblings( ".active" ).removeClass('active');
                openModal($modal);
                e.stopPropagation();
            });

            var $blueprint;
            $('#c-blueprint .filters').on('mouseenter', '> li', function(e) {
                var id = $(this).attr('id');
                $blueprint = $('#c-blueprint #blueprint-' + id.split('-')[1]);
                $blueprint.addClass('active');
            }).on('mouseleave', '> li', function (e) {
                $blueprint.removeClass('active');
            });


            // Slider
            $('.c-slider').slick({
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: false,
                responsive: [
                    {
                        breakpoint: breakpoints.tablet,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: breakpoints.sTablet,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1
                        }
                    }
                ]
            });

            // FAQS
            $('#faqs .btn-more').click(function(){
                if($(this).hasClass('active')) {
                     $('.faqs-list li:not(.active)').hide(350);
                }
                else {
                    $('.faqs-list li:not(.active)').show(350);
                }
                $(this).toggleClass('active');
            });
        }


        // @ Article
        if(dom.$body.hasClass('single-post')) {
            var $share = $('.share-this'); // cache share
            if ( $share.length ) {
                // Facebook
                $share.find('.facebook a').on('click', function(e){
                    e.preventDefault();
                    var href = $(this).attr('href');
                    window.open(href, "Facebook", "toolbar=0,status=0,width=548,height=325");
                });

                // Twitter
                $share.find('.twitter a').on('click', function(e){
                    e.preventDefault();
                    var href = $(this).attr('href');
                    window.open(href, "Twitter", "toolbar=0,status=0,width=548,height=325");
                });
            }
        }

        // Menu Spy
        new MenuSpy(document.querySelector('#site-header-cloned'));
        new MenuSpy(document.querySelector('#site-side-nav'));

        // Smooth Scroll to Anchor
        $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();
        
            $('html, body').animate({
                scrollTop: ($($.attr(this, 'href')).offset().top)-60
            }, 800);
        });

        // Accordion
        $('.accordion .toggle').click(function(e) { 
            var $this = $(this);
            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('.inner').removeClass('show');
                $this.parent().parent().find('.inner').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }
        });

        $('.site-cheeseburger').click(function(){
            dom.$body.addClass('side-nav-open');
        });

        dom.$siteSideNavClose.click(function(){
            dom.$body.removeClass('side-nav-open');
        });

        new WOW().init();

        // ######################################################
        // Global Functions
        // ######################################################
        function taglinesLoop(interval) {
            interval = (typeof interval !== 'undefined') ? interval : 5000;
            var $list = $('#hero li');
            if($list.length > 1) {
                var $cur = $list.first().addClass('fadeIn'),
                $next = $cur.next();
                setInterval(function () {
                    $cur.removeClass('fadeIn').addClass('fadeOut');
                    $cur = $next.addClass('fadeIn').removeClass('fadeOut');
                    $next = $cur.next();
                    if (!$next.length) {
                        $next = $list.first();
                    }
                }, interval);
            } else {
                $list.first().addClass('fadeIn');
            }
        }

        function listImagesSlider() {
            $('.c-list-images').slick({
                autoplay: true,
                arrows: false
            });
        }

        function stickyHeader() {
            dom.$siteHeader
            .clone()
            .insertBefore( '#site-header' )
            .attr( 'id', function(i, str) { return str + '-cloned';} );
            dom.$siteHeaderClone = $('#site-header-cloned');
            var src = dom.$siteHeaderClone.find('.site-logo img').attr('src').replace("white", "black");
            dom.$siteHeaderClone.find('.site-logo img').attr('src', src);
            
            var winH = dom.$window.height();   // Get the window height.

            dom.$window.on("scroll", function () {
                if ($(this).scrollTop() > winH ) {
                    dom.$siteHeaderClone.addClass('sticky');
                } else {
                    dom.$siteHeaderClone.removeClass('sticky');
                }
            });
        }
    });
}(jQuery));