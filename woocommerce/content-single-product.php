<?php
defined( 'ABSPATH' ) || exit;
global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$sim = $product->get_price();
$met_ent = get_field('metodos_de_entrega');
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="headerBox">
        <?php /* sale_flash | product_images */ do_action( 'woocommerce_before_single_product_summary' ); ?>
        <div class="summary entry-summary">
            <?php /* title | rating | price | excerpt | add_to_cart | meta | sharing */ do_action( 'woocommerce_single_product_summary' ); ?>
			<?php
			if ( has_term( 'impresoras3d', 'product_cat', $product->get_id() ) ) {
				echo '<a href="https://soporte.krear3d.com/stl" id="promo-pack" target="_blank">
						<img src="/wp-content/uploads/2025/03/pack-stls-v3.webp" alt="">
						<p>Por tu compra llévate GRATIS un Pack de 100 STLs</p>
					  </a>';
			}
			?>
			<?php echo '<div id="deliveryMethods">
			<h4>Métodos de entrega</h4>
			<div class="met-cnt">';
			$met_dat = [ 
				['me1', 'Despacho Programado', 'Envíos a todo el Perú. Precios disponibles en el carrito.'],
				['me3', 'Retiro en Tienda', 'Disponible para recojo en tienda en 24 horas desde la compra.'],
				['me2', 'Compra en Tienda', 'Puedes comprar el producto en Calle Javier Fernandez 262 - Miraflores.'],
			];
			$key_dat = ['one', 'two', 'thr'];

			$key = 0;
			$fch = get_field('principal');
			foreach ( $met_ent as $value ) {
				if ( !$fch [ 'stock' ] ) $value = 0;
				echo '<div class="method-'.$key_dat[$key].' met-itm ' .( $value == 1 ? '':'itm-off' ). '">
					<img width="32" height="32" src="http://tiendakrear3d.com/wp-content/uploads/kyro11/svg/' . $met_dat[ $key ][ 0 ] . '.svg">
					<div>
						<h5>' . $met_dat[ $key ][ 1 ] . '</h5>
						<p>' . ( $value == 1 ? $met_dat[ $key ][ 2 ] :'No disponible' ) . '</p>
					</div>
				</div>';
				$key++;
			}	
			echo '</div>
		</div>';
			?>
        </div>
	</div>
	<?php include get_theme_file_path('/templates/content.php'); ?>
	<?php /* tabs | upsell | related */ do_action( 'woocommerce_after_single_product_summary' ); ?>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
