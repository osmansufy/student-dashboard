$('.btn-expand-collapse').click(function(e) {
    $('.navbar-primary').toggleClass('collapsed');
});

// percentage
(function() {
	window.onload = function() {
    var totalProgress, progress;
		const circles = document.querySelectorAll('.progress_bar');
		for(var i = 0; i < circles.length; i++) {
			totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
			progress = circles[i].parentElement.getAttribute('data-percent');

			circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 100;
      
		}
	}
})();

// owl sir

  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	dots:false,
	navText: [
		"<i class='fas fa-chevron-left'></i>",
		"<i class='fas fa-chevron-right'></i>"
	  ],
    responsive:{
        0:{
            items:0
        },
        700:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
