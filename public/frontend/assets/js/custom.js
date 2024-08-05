(function ($) {

	"use strict";

	// Page loading animation
	$(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });


	$(window).scroll(function() {
	  var scroll = $(window).scrollTop();
	  var box = $('.header-text').height();
	  var header = $('header').height();

	  if (scroll >= box - header) {
	    $("header").addClass("background-header");
	  } else {
	    $("header").removeClass("background-header");
	  }
	})

	$('.owl-banner').owlCarousel({
	  center: true,
      items:1,
      loop:true,
      nav: true,
	  dots:true,
	  navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      margin:30,
      responsive:{
        992:{
            items:1
        },
		1200:{
			items:1
		}
    }
	});

	var width = $(window).width();
		$(window).resize(function() {
		if (width > 767 && $(window).width() < 767) {
			location.reload();
		}
		else if (width < 767 && $(window).width() > 767) {
			location.reload();
		}
	})

	const elem = document.querySelector('.properties-box');
	const filtersElem = document.querySelector('.properties-filter');
	if (elem) {
		const rdn_events_list = new Isotope(elem, {
			itemSelector: '.properties-items',
			layoutMode: 'masonry'
		});
		if (filtersElem) {
			filtersElem.addEventListener('click', function(event) {
				if (!matchesSelector(event.target, 'a')) {
					return;
				}
				const filterValue = event.target.getAttribute('data-filter');
				rdn_events_list.arrange({
					filter: filterValue
				});
				filtersElem.querySelector('.is_active').classList.remove('is_active');
				event.target.classList.add('is_active');
				event.preventDefault();
			});
		}
	}


	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	// Menu elevator animation
	$('.scroll-to-section a[href*=\\#]:not([href=\\#])').on('click', function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				var width = $(window).width();
				if(width < 991) {
					$('.menu-trigger').removeClass('active');
					$('.header-area .nav').slideUp(200);
				}
				$('html,body').animate({
					scrollTop: (target.offset().top) - 80
				}, 700);
				return false;
			}
		}
	});


	// Page loading animation
	$(window).on('load', function() {
		if($('.cover').length){
			$('.cover').parallax({
				imageSrc: $('.cover').data('image'),
				zIndex: '1'
			});
		}

		$("#preloader").animate({
			'opacity': '0'
		}, 600, function(){
			setTimeout(function(){
				$("#preloader").css("visibility", "hidden").fadeOut();
			}, 300);
		});
	});



})(window.jQuery);
document.addEventListener("DOMContentLoaded", function () {
    const filters = document.querySelectorAll(".properties-filter a");
    const packages = document.querySelectorAll(".tab-pane.package");

    // Hide all packages except the first one
    packages.forEach((pkg, index) => {
        if (index !== 0) {
            pkg.style.display = "none";
        }
    });
// code of home page package filter
    filters.forEach(filter => {
        filter.addEventListener("click", function (e) {
            e.preventDefault();

            filters.forEach(f => f.classList.remove("is_active")); // Remove active class from all filters

            this.classList.add("is_active"); // Add active class to the clicked filter

            const filterCategory = this.getAttribute("data-filter"); // Get the filter category

            // Show/Hide packages based on the selected category
            packages.forEach(pkg => {
                if (filterCategory === "*" || pkg.classList.contains(filterCategory.substring(1))) {
                    pkg.style.display = "block";
                } else {
                    pkg.style.display = "none";
                }
            });
        });
    });
    // Auto-select the first filter
    if (filters.length > 0) {
        filters[0].click();
    }
});
//  for copy link ( refferal code )
document.getElementById('refButton').addEventListener('click', function() {
    var referralLink = document.getElementById('inputReferral').value;
    navigator.clipboard.writeText(referralLink).then(function() {
        alert('Link copied to clipboard!');
    }).catch(function(err) {
        console.error('Failed to copy: ', err);
    });
});
