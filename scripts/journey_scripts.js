jQuery(function ($) {

	var app = window.JOURNEY = window.JOURNEY || {};
	$window = $(window);


	app.mobileNav = function () {
		var $nav = $("nav"),
		$menuToggleButton = $(".toggle-menu");

		$menuToggleButton.on("click", function () {
			$nav.toggleClass("open");
		});
	}

	app.contentHeight = function () {
		var $contentWrapper = $('.content-wrapper'),
			$mainHeader = null,
			$secondaryContent = null;

		var checkHeight = function () {

			if ( $window.width() < 1024 ) {
				$contentWrapper.css({'height' : ''});
				return false;
			}

			adjustHeight();
		}

		function adjustHeight () {
			$mainHeader = $('header.main');
			$secondaryContent = $('.secondary');

			var desiredHeight = ( $mainHeader.height() + $secondaryContent.height() );
			if ($contentWrapper.height() <= desiredHeight) {
				$contentWrapper.height(desiredHeight);
			}
		}

		var resizeTimeout = null;
		$(window).resize(function(){
		  clearTimeout(resizeTimeout);
		  resizeTimeout = setTimeout(checkHeight, 100);
		});

		setTimeout( adjustHeight, 10 ); //run initially

	}

	app.init = function () {
		app.mobileNav();
		app.contentHeight();
	}

	// init on document ready
	$(JOURNEY.init);

}(jQuery))
