<?php

defined( 'ABSPATH' ) || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

$fch = get_field('principal_ficha');
$blq = get_field('bloque_unico');

echo wc_get_stock_html($product);

if ($product->is_in_stock()): ?>
	<div id="buyButtons">
        <button class="buy-add add-to-cart-btn" data-product-id="<?php echo $product->get_id(); ?>">
            <span class="update">Agregado</span>
            <svg class="cart" width="20" height="20">
                <use xlink:href="#icon-cart"></use>
            </svg>
            <span class="text">Añadir al carrito</span>
        </button>
        <a class="buy-wsp" href="//api.whatsapp.com/send?phone=51982001288" target="_blank">Comprar por Whatsapp</a>
	</div>
	<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.add-to-cart-btn').addEventListener('click', function(e) {
                e.preventDefault();
                const button = document.querySelector('.add-to-cart-btn');
                const product_ids = button.getAttribute('data-product-id');

                button.setAttribute('disabled', 'disabled');
                button.classList.add('step1');

                fetch('<?= admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'ajax_add_to_cart_bulk',
                        product_ids: product_ids,
                        quantity: 1
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
						
						cartDiv.classList.add('scale-effect');
                		cartCountMobile.classList.add('scale-effect');
                        setTimeout(function() {
                            cartDiv.classList.remove('scale-effect');
                    		cartCountMobile.classList.remove('scale-effect');
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
<?php endif; ?>
