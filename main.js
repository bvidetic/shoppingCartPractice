$(function() {

	// Model
	var cart = {
	};

	// Click Add ----------------------------------------------------------
	$('.products button').on('click', function() {
		
		// Get our class name r esource
		var className = $(this).parent().attr('class');

		// Update our Model
		if (cart[className]) {
			cart[className]++;
		} else {
		 	cart[className] = 1;
		}

		renderView();

	});

	// Click Remove One-------------------------------------------------------
	// If your target is not going to exist until after the page is loaded,
	// Then you have to write all of your events slightly differently. The
	// way that its different, is that now the second argument is the target
	$('body').on('click', '.cart button', function() {
		var className = $(this).parent().attr('class');
		
		if (cart[className] > 1) {
			cart[className]--;
		} else {
			delete cart[className];
		}

		renderView();
	});

	// Remove All------------------------------------------------------------
	$('.remove-all').on('click', function() {

		// loop and delete all contents
		// for (i in cart) {
		// 	delete cart[i];
		// }

		// A better way, just reset the cart object
		cart = {};

		renderView();
		
	});



	// Render the View--------------------------------------------------------
	var renderView = function() {

		// Wipe out whatever DOM is currently in the cart
		$('.cart').html('');

		// Loop the entire cart, and build the whole thing
		for (i in cart) {

			$('<li>')
				.append(i + ': ' + cart[i])
				.append('<button>Remove</button>')
				.addClass(i)
				.appendTo('.cart');

		}

	}
//CART CHECKIN BUTTONS-------------------------------------------------------
	$('body').on('click', '.checkout', function() {
		$("#div1").fadeIn(1000);
		});

	$('body').on('click', '.keepshopping', function() {
		$("#div1").fadeOut(1000);
		});


//BELOW IS ONE WAY TO OPERATE THE CHECKOUT BUTTON, BUT ITS BETTER TO HAVE "BODY.ONCLICK" AS ABOVE.
	// $(".checkout").click(function(){
 //    	$("#div1").fadeIn(1000);
 //  	});

	// As soon as the page loads, we render the whole thing
	renderView();
});



// $(document).ready(function(){
//   $("checkout").click(function(){
//     $("#div1").fadeToggle();
//     $("#div2").fadeToggle("slow");
//     $("#div3").fadeToggle(3000);
//   });
// });

// $(function() {
// 	$('.checkout').on('click', function()

// 		// renderView();
		
// 	});
// });