jQuery(function ($) {
	$nav = $("nav");
	$(".toggle-menu").on("click", function () {
		$nav.toggleClass("open");
	});
}(jQuery))
