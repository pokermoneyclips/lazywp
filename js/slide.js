jQuery(document).ready(function($) {
	var mytimer;
	var cards = $(".card");
	var cardcount = $(cards).length;
	var mydelay = 8500;
	
	
	/*
	help from http://stackoverflow.com/questions/4553204/jquery-cycle-a-class-with-timer
	set and remove the active class from the elements
	*/
	var cardrotate = function() {    
		var $active = $(".active");
		if($active.length == 0) {
			$active = $(".card:first");
		}
		$(".card").removeClass("previous");
		$active.removeClass("active").addClass("previous");
		if($active.next(".card").length > 0) {
			$active.next(".card").addClass("active");
		} else {
			$(".card:first").addClass("active");
		}
		if($active.prev(".card").length > 0) {
			$active.prev(".card").removeClass("previous");
		}
	}

	// This starts the card rotate() function above
	mytimer = setInterval(cardrotate, mydelay);

	// resets our setinterval function
	var stoprotate = function() {
	  clearInterval(mytimer);
	}


	// hovering over current text to stop the rotator
	$(".front").hover(function() {
		stoprotate();
	},
		function() {
			mytimer = setInterval(cardrotate, mydelay);
	});	
	
	// Clicking on the back card to select a new active
	$(".back").click(function() {
		stoprotate();
		var $activeCard = $(".active");
		$(".card").removeClass("previous");
		$($activeCard).removeClass("active");
		$($activeCard).addClass("previous");
		$(this).parent().addClass("active");
		mytimer = setInterval(cardrotate, mydelay);		
	});	

	// Puts all the heights into an array then returns the largest height
	function getFrontHeight() {
		var $frontHeight = [];
		$('.front').each(function(){
			$frontHeight.push($(this).height());
		});
					
		Array.max = function( array ){
			return Math.max.apply( Math, array );
		};
			
		var $frontHeightMax = Array.max($frontHeight);
		return $frontHeightMax;
	}
	
	// This runs on load to add the right height to the element
	$(".front").css("height",  getFrontHeight() + "px");

	// This runs on window resize to correct the height of the element	
	$(window).resize(function() { 
		$(".front").removeAttr("style");
		$(".front").css("height",  getFrontHeight() + "px");
	});
	
// End Onload
}); 