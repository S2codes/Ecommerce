;(function($) {
	$.fn.imagesDelay = function(distance) {
		var $images = $(this);
		var $H = $(window).height();
		var $D = 100;
		if (typeof(distance) == 'number') {
			 $D = distance;
		}
		window.onload = window.onscroll = function() {
			var $S = $(window).scrollTop();
			$.each($images, function(index, val) {
				var $val = $(val);
				if(!($val.attr('data-src'))) {
					return ;
				}
				if ($H + $S + $D > $val.offset().top) {
					$val.attr('src', $val.attr('data-src'));
					$val.removeAttr('data-src');
				}

			});
		}
	}
})(jQuery);