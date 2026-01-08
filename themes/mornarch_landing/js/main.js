 AOS.init({
	duration: 800,
	easing: 'slide'
 });

  (function($){ 
  	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	
	// Search Box Toggle
	document.getElementById("search").addEventListener("click", function() {
		const box = document.getElementById("search_input_box");
		box.style.display = "block";
		box.style.animation = "slideDown 0.3s ease";
		document.getElementById("search_input").focus();
	});

	// Close search box
	document.getElementById("close_search").addEventListener("click", function() {
		document.getElementById("search_input_box").style.display = "none";
	});

	// Submit with Enter key
	document.getElementById("search_input").addEventListener("keypress", function(event){
		if (event.key === "Enter") {
			event.preventDefault();
			this.closest("form").submit();
		}
	});

	// End Of Search Box Toggle

	document.addEventListener("DOMContentLoaded", function () {
		// Show the pop-up after a delay (e.g., 3 seconds)
		setTimeout(function () {
			document.getElementById("popupContainer").style.display = "block";
		}, 3000);
	});
	  
	function closePopup() {
		document.getElementById("popupContainer").style.display = "none";
	}

	$(document).ready(function() {
		$('.dropdown').on('mouseenter', function() {
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
		});
	
		$('.dropdown').on('mouseleave', function() {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(150);
		});
	
		// Ensure dropdowns are still functional on click (for mobile devices)
		$('.dropdown-toggle').on('click', function(e) {
			if ($(window).width() > 768) {
				location.href = this.href;
			}
		});
	});

	$(document).ready(function(){
		$('.dropdown').hover(function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown(200);
		}, function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp(200);
		});
	});

	$(window).stellar({
		responsive: true,
		parallaxBackgrounds: true,
		parallaxElements: true,
		horizontalScrolling: false,
		hideDistantElements: false,
		scrollProperty: 'scroll'
	});


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

   $('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});

	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();


	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();


	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	$('#book_pick_date,#book_off_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});
	$('#time_pick').timepicker();

	$(document).ready(function() {
		// Like button click event
		$('.like-button').click(function() {
			var likeCountElem = $(this).find('.like-count');
			var likeCount = parseInt(likeCountElem.text());
			likeCount++;
			likeCountElem.text(likeCount);
		});

		// Comment button click event
		$('.comment-button').click(function() {
			$('.comment-section').toggle();
		});

		// Comment form submit event
		$('#commentForm').submit(function(event) {
			event.preventDefault();
			var commentText = $('#comment').val();
			if (commentText) {
				var commentItem = $('<li></li>').text(commentText);
				$('.comment-list').append(commentItem);

				var commentCountElem = $('.comment-button').find('.comment-count');
				var commentCount = parseInt(commentCountElem.text());
				commentCount++;
				commentCountElem.text(commentCount);

				$('#comment').val('');
			}
		});
	});

	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.read-more').forEach(function(readMoreLink) {
			readMoreLink.addEventListener('click', function() {
				var shortText = this.previousElementSibling.previousElementSibling;
				var fullText = this.previousElementSibling;
	
				// Toggle the display of short and full text
				if (fullText.style.display === 'none') {
					fullText.style.display = 'inline';
					shortText.style.display = 'none';
					this.textContent = 'Read Less';
				} else {
					fullText.style.display = 'none';
					shortText.style.display = 'inline';
					this.textContent = 'Read More';
				}
			});
		});
	});

	$(document).on('click', '.read-more', function() {
		var $this = $(this);
		var $fullText = $this.prev('.full-text');
		var $shortText = $this.prevAll('.short-text');

		if ($fullText.is(':hidden')) {
			$fullText.show();
			$shortText.hide();
			$this.text('Read Less');
		} else {
			$fullText.hide();
			$shortText.show();
			$this.text('Read More');
		}
	});

	var limit = 2;
        var offset = 2; // start from the third item
        var loading = false;
        var burl = '<?= BURL ?>';

        function shortenText(text, maxLength) {
            return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
        }

        function loadPosts(limit, offset) {
            if (loading) return;
            loading = true;
            $('#loading-spinner').show();

            $.ajax({
                url: burl + "logic/index/fetch_posts",
                type: 'GET',
                data: {
                    limit: limit,
                    offset: offset
                },
                success: function(data) {
                    var posts = JSON.parse(data);
                    posts.forEach(function(post) {
                        $('#post-container .col-md-6').append(`
                            <div class="card m-3">
                                <div class="card-body">
                                    <img src="${burl + post.blog_img}" alt="Blog Image" class="img-fluid rounded img-custom">
                                    <h5 class="card-title">${post.title_of_blog}</h5>
                                    <p class="card-text">
                                        <span class="short-text">${shortenText(post.blog_content, 100)}</span>
                                        <span class="full-text" style="display: none;">${post.blog_content}</span>
                                        ${post.blog_content.length > 100 ? '<a href="javascript:void(0);" class="read-more">Read More</a>' : ''}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary like-button">
                                            <i class="fa fa-thumbs-up"></i> Like (<span class="like-count">0</span>)
                                        </button>
                                        <button class="btn btn-secondary comment-button">
                                            <i class="fa fa-comments"></i> Comment (<span class="comment-count">0</span>)
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-section mt-3" style="display: none;">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="commentForm">
                                            <div class="form-group">
                                                <label for="comment">Leave a comment:</label>
                                                <textarea class="form-control" id="comment" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                        <div class="mt-3">
                                            <h5>Comments:</h5>
                                            <ul class="list-unstyled comment-list"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                    offset += limit;
                    loading = false;
                    $('#loading-spinner').hide();
                },
                error: function() {
                    loading = false;
                    $('#loading-spinner').hide();
                }
            });
        }

        $(window).on('scroll', function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loadPosts(limit, offset);
            }
        });

		function shareScripture(text) {
			if (navigator.share) {
				navigator.share({
					title: "Scripture of the Day",
					text: text
				});
			}
		}

    const widget = document.getElementById('scriptureWidget');
    if (!widget) return;

    const ONE_MINUTE = 60 * 1000;
    const TWENTY_FOUR_HOURS = 24 * 60 * 60 * 1000;

    const now = Date.now();
    const lastShown = localStorage.getItem('scripture_last_shown');

    // If shown within last 24hrs → don't show
    if (lastShown && (now - lastShown < TWENTY_FOUR_HOURS)) {
        widget.style.display = 'none';
        return;
    }

    // Show scripture
    widget.style.display = 'block';
    localStorage.setItem('scripture_last_shown', now);

    // Hide after 1 minute
    setTimeout(() => {
        widget.classList.add('hide');

        // Fully remove after fade
        setTimeout(() => {
            widget.style.display = 'none';
        }, 800);

    }, ONE_MINUTE);



  })(jQuery);