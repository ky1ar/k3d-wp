<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php
	do_action( 'woocommerce_before_add_to_cart_button' );
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
   	<div id="buyButtons">
   		<button type="submit" class="buy-add add-to-cart-btn" data-product-id="<?php echo absint( $product->get_id() ); ?>" data-variation-id="0">
            <span class="update">Agregado</span>
            <svg class="cart" width="20" height="20">
                <use xlink:href="#icon-cart"></use>
            </svg>
            <span class="text">Añadir al carrito</span>
        </button>
        <a class="buy-wsp" href="//api.whatsapp.com/send?phone=51982001288" target="_blank">Comprar por Whatsapp</a>
    </div>
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			document.querySelector('.add-to-cart-btn').addEventListener('click', function(e) {
				e.preventDefault();
				const button = document.querySelector('.add-to-cart-btn');
				const product_id = button.getAttribute('data-product-id');
				const variation_id = document.querySelector('.variation_id').value;
				const quantity = document.querySelector('.qty').value || 1;
				
				const selected = document.querySelector('.select_box_label');
				const hasSelectedChild = selected.querySelector('.select_option_label.selected') !== null;
				
				const variations = document.querySelector('.variations');
				const label = variations.querySelector('.label'); 
				
				if (!hasSelectedChild ) {
					if (!label.querySelector('span')) {
						const span = document.createElement('span');
						span.textContent = 'Seleccione una opción';
						label.appendChild(span);
						setTimeout(() => {
							if (label.contains(span)) { 
								label.removeChild(span);
							}
						}, 3000);
					}
						return;
				}
				
				button.setAttribute('disabled', 'disabled');
				button.classList.add('step1');

				fetch('<?= admin_url('admin-ajax.php'); ?>', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: new URLSearchParams({
						action: 'ajax_add_to_cart_bulk',
						product_ids: variation_id || product_id,
						quantity: quantity
					}).toString(),
				})
				.then(response => response.json())
				.then(data => {
					if (!data.error) {
						const cartCount = document.getElementById('cart-count');
						const cartDiv = document.querySelector('header .links .cart');
						const cartCountMobile = document.getElementById('cart-count-mobile');
						const newCount = parseInt(cartCount.textContent) + data.data.added_count;

						cartCount.textContent = newCount;
						cartDiv.classList.add('change');
						cartCountMobile.textContent = newCount;
						cartCountMobile.classList.add('change');

						setTimeout(function() {
							cartDiv.classList.remove('change');
							cartCountMobile.classList.remove('change');
						}, 400);

						button.classList.add('step2');
						setTimeout(function() {
							button.classList.remove('step1','step2');
							button.removeAttribute('disabled');
						}, 1000);
					} else {
						console.log(data.message);
						button.removeAttribute('disabled');
						button.classList.remove('step1');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					button.removeAttribute('disabled');
					button.classList.remove('step1');
				});
			});
		});
		</script>
</div>
