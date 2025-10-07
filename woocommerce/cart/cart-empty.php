<?php

defined( 'ABSPATH' ) || exit;
?>

<div id="shoppingCartEmpty">
	 <div class="wrapper">
		 <div class="crt-ttl"><h3>Carrito de Compras</h3></div>
		 <?php do_action( 'woocommerce_cart_is_empty' );
		 if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
		 	<div class="cont-img"><img src="https://tiendakrear3d.com/wp-content/uploads/2024/08/cart-empty.webp"></div>	
			<div class="emp-txt"><p>Parece que aún no has añadido nada a tu carrito de compras. Agrega algo y regresa.</p></div>
			<a class="emp-bck" href="/productos/impresoras3d"><?php esc_html_e( 'Return to shop', 'woocommerce' ); ?></a>
		<?php endif; ?>
	</div>
</div>