<!DOCTYPE html>
<?php
$setings = get_options_page_id( 'settings' );
$headerField = get_field( 'header', $setings );
?>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-FLK8NWFK4T"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-FLK8NWFK4T');
	</script>
    <link rel="icon" href="<?= $headerField['favicon'] ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#ea7134">
	<meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>	
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-960739955"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-960739955');
    </script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
		function updateCartCount() {
			console.log('updateCartCount function called');
			var xhr = new XMLHttpRequest();
			xhr.open('POST', ajax_params.ajax_url, true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

			xhr.onload = function() {
				if (xhr.status >= 200 && xhr.status < 300) {
					var response = JSON.parse(xhr.responseText);
					console.log('AJAX response:', response);
					if (response.success) {
						var cartCount = response.data;
						console.log('Cart count:', cartCount);

						// Actualiza el contador de inmediato
						document.getElementById('cart-count').textContent = cartCount;
						document.getElementById('cart-count-mobile').textContent = cartCount;

						// Aplica la clase si la cantidad es 1 o mayor
						if (cartCount >= 1) {
							document.querySelector('header .links .cart').classList.add('cart-highlight');
						} else {
							document.querySelector('header .links .cart').classList.remove('cart-highlight');
						}
					}
				} else {
					console.error('Request failed with status:', xhr.status);
				}
			};

			xhr.onerror = function() {
				console.error('Request error');
			};

			xhr.send('action=get_cart_count');
		}

		updateCartCount();

		//setInterval(updateCartCount, 5000); // Update every 5 seconds
	});
    </script>
</head>
<body <?php body_class(); ?>>
<?php
get_template_part('templates/sprites');
get_template_part('templates/header');
