<?php

function ky1ar_enqueue_scripts() {
    $version = '0.874';

	wp_enqueue_style('css-styles', get_template_directory_uri() . '/assets/css/client.css', array(), $version, 'all');
	
	wp_enqueue_style('swiffy-styles', get_template_directory_uri() . '/assets/css/swiffy-slider.min.css', array(), $version, 'all');
	wp_enqueue_style('fancybox CSS', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', 'null', $version, 'all');
	
	wp_enqueue_script('ky1ar Script', get_template_directory_uri() . '/assets/js/ky1ar.js', array('jquery'), $version, 'false');
	wp_enqueue_script('Swiffy Script', get_template_directory_uri() . '/assets/js/swiffy-slider.min.js', array('jquery'), $version, 'false');
	wp_enqueue_script('fancybox JS', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), $version, 'false');
}
add_action( 'wp_enqueue_scripts', 'ky1ar_enqueue_scripts' );


function ky1ar_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ky1ar_add_woocommerce_support' );


function support_woocommerce_theme() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'support_woocommerce_theme');


function new_loop_shop_per_page($cols) {
    $cols = 25;
    return $cols;
}
add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);


function selected_variation_price_replace_variable_price_range(){
    global $product;

    if( $product->is_type('variable') ): ?>
        <style> .woocommerce-variation-price {display:none;} </style>
        <script>
        jQuery(function($) {
            const price = $('p.price');
            const defaultText = price.html();

            $('form.cart').on('show_variation', function( event, data ) {
                if ( data.price_html ) {
                    price.html(data.price_html);
                }
            }).on('hide_variation', function( event ) {
                price.html(defaultText);
            });
        });
        </script>
    <?php
    endif;
}
add_action('woocommerce_before_add_to_cart_form', 'selected_variation_price_replace_variable_price_range');

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);
    wp_localize_script('custom-ajax', 'wp_vars', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function add_variation_stock_check_js() {
   global $product;

    if( $product->is_type('variable') ):
        ?>
        <script type="text/javascript">
            jQuery(function($) {
                $('form.cart').on('show_variation', function(event, data) {
                    const variationAvailability = $('.woocommerce-variation-availability');
                    const productPage = $('#productPage');
                    const mainBadge = productPage.find('.badge');
                    const deliveryMethods = productPage.find('.met-itm');
                    const addToCart = productPage.find('.add-to-cart-btn');

                    if (variationAvailability.find('.out-of-stock').length > 0) {
                        mainBadge.text('Preventa').addClass('pre');
                        deliveryMethods.addClass('itm-off');
                        addToCart.prop('disabled', true);
                    } else {
                        mainBadge.text('En Stock').removeClass('pre');
                        deliveryMethods.removeClass('itm-off');
                        addToCart.prop('disabled', false);
                    }
                });
            });
        </script>
        <?php
    endif;
}
add_action('woocommerce_before_add_to_cart_form', 'add_variation_stock_check_js');


function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // Wordpress core
	wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );


function remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_global_styles' );


function disable_wp_blocks() {
    $wstyles = array(
        'wp-block-library',
        'wc-blocks-style',
        'wc-blocks-style-active-filters',
        'wc-blocks-style-add-to-cart-form',
        'wc-blocks-packages-style',
        'wc-blocks-style-all-products',
        'wc-blocks-style-all-reviews',
        'wc-blocks-style-attribute-filter',
        'wc-blocks-style-breadcrumbs',
        'wc-blocks-style-catalog-sorting',
        'wc-blocks-style-customer-account',
        'wc-blocks-style-featured-category',
        'wc-blocks-style-featured-product',
        'wc-blocks-style-mini-cart',
        'wc-blocks-style-price-filter',
        'wc-blocks-style-product-add-to-cart',
        'wc-blocks-style-product-button',
        'wc-blocks-style-product-categories',
        'wc-blocks-style-product-image',
        'wc-blocks-style-product-image-gallery',
        'wc-blocks-style-product-query',
        'wc-blocks-style-product-results-count',
        'wc-blocks-style-product-reviews',
        'wc-blocks-style-product-sale-badge',
        'wc-blocks-style-product-search',
        'wc-blocks-style-product-sku',
        'wc-blocks-style-product-stock-indicator',
        'wc-blocks-style-product-summary',
        'wc-blocks-style-product-title',
        'wc-blocks-style-rating-filter',
        'wc-blocks-style-reviews-by-category',
        'wc-blocks-style-reviews-by-product',
        'wc-blocks-style-product-details',
        'wc-blocks-style-single-product',
        'wc-blocks-style-stock-filter',
        'wc-blocks-style-cart',
        'wc-blocks-style-checkout',
        'wc-blocks-style-mini-cart-contents',
        'classic-theme-styles-inline'
    );

    foreach ( $wstyles as $wstyle ) {
        wp_deregister_style( $wstyle );
    }

    $wscripts = array(
        'wc-blocks-middleware',
        'wc-blocks-data-store'
    );

    foreach ( $wscripts as $wscript ) {
        wp_deregister_script( $wscript );
    }
}
add_action( 'init', 'disable_wp_blocks', 100 );

  
function dl_imagen_producto_checkout( $name, $cart_item, $cart_item_key ) {
    if ( ! is_checkout() ) return $name;
    $product = $cart_item['data'];
    $thumbnail = $product->get_image( array( '55', '55' ), array( 'class' => 'img_product' ) );
    return $thumbnail . $name;
}
add_filter( 'woocommerce_cart_item_name', 'dl_imagen_producto_checkout', 9999, 3 );


function custom_quantity_buttons() {
    if ( is_cart() ) :
        ?>
        <script>
            jQuery(document).ready(function($) {
                $('.qty').each(function() {
                    const $input = $(this);
                    const $container = $('<div class="custom-number-input"></div>');
                    const $minusButton = $('<img src="https://tiendakrear3d.com/wp-content/uploads/2024/07/menos.webp" class="custom-button custom-minus" alt="Restar">');
                    const $plusButton = $('<img src="https://tiendakrear3d.com/wp-content/uploads/2024/07/mas.webp" class="custom-button custom-plus" alt="Sumar">');

                    $input.wrap($container);
                    $input.before($minusButton);
                    $input.after($plusButton);

                    $minusButton.click(function() {
                        const currentVal = parseInt($input.val());
                        if (!isNaN(currentVal) && currentVal > parseInt($input.attr('min'))) {
                            $input.val(currentVal - 1).change();
                        }
                    });

                    $plusButton.click(function() {
                        const currentVal = parseInt($input.val());
                        if (!isNaN(currentVal) && (currentVal < parseInt($input.attr('max')) || $input.attr('max') === '')) {
                            $input.val(currentVal + 1).change();
                        }
                    });
                });

                $('div.woocommerce').on('change', '.qty', function() {
                    $("[name='update_cart']").prop("disabled", false);
                    $("[name='update_cart']").trigger("click");
                });
            });
        </script>
        <?php
    endif;
}
add_action( 'wp_footer', 'custom_quantity_buttons' );


function removeStringAndSpace($substring, $string) {
    $position = strpos($string, $substring);

    if ($position !== false) {
        $length = strlen($substring) + 1;
        $string = substr_replace($string, '', $position, $length);
    }
    return $string;
}


function handle_search_suggestions() {
    global $wpdb;

    $keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';

    if (!$keyword) {
        wp_send_json([]);
        return;
    }

    $query = "
        SELECT p.ID, p.post_title, pm.meta_value as thumbnail
        FROM $wpdb->posts p
        LEFT JOIN $wpdb->postmeta pm ON p.ID = pm.post_id AND pm.meta_key = '_thumbnail_id'
        INNER JOIN $wpdb->postmeta stock_pm ON p.ID = stock_pm.post_id AND stock_pm.meta_key = '_stock_status'
        WHERE p.post_title LIKE %s
        AND p.post_type = 'product'
        AND p.post_status = 'publish'
        AND stock_pm.meta_value = 'instock'
        ORDER BY p.post_date DESC
        LIMIT 5
    ";

    $results = $wpdb->get_results($wpdb->prepare($query, '%' . $wpdb->esc_like($keyword) . '%'));

    $suggestions = array_map(function($result) {
        return array(
            'title' => $result->post_title,
            'url' => get_permalink($result->ID),
            'thumbnail' => wp_get_attachment_image_src($result->thumbnail, 'thumbnail')[0] // Obtiene la URL de la miniatura
        );
    }, $results);

    wp_send_json($suggestions);
}
add_action('wp_ajax_search_suggestions', 'handle_search_suggestions');
add_action('wp_ajax_nopriv_search_suggestions', 'handle_search_suggestions');


function ajax_add_to_cart_bulk() {
    if (!isset($_POST['product_ids'])) {
        wp_send_json_error(['message' => 'No product IDs provided']);
        return;
    }

    $product_ids = explode(',', sanitize_text_field($_POST['product_ids']));
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $added_count = 0;

    foreach ($product_ids as $product_id) {
        $product_id = intval(trim($product_id));
        if ($product_id > 0) {
            WC()->cart->add_to_cart($product_id, $quantity);
            $added_count += $quantity;
        }
    }

    wp_send_json_success(['added_count' => $added_count]);
}
add_action('wp_ajax_ajax_add_to_cart_bulk', 'ajax_add_to_cart_bulk');
add_action('wp_ajax_nopriv_ajax_add_to_cart_bulk', 'ajax_add_to_cart_bulk');


function add_ajax_params() {
    ?>
    <script type="text/javascript">
        var ajax_params = {
            ajax_url: "<?php echo admin_url('admin-ajax.php'); ?>"
        };
    </script>
    <?php
}
add_action('wp_head', 'add_ajax_params');

function get_cart_count() {
    // Obtiene el conteo de productos en el carrito.
    $cart_count = WC()->cart->get_cart_contents_count();

    // Si hay un carrito, devuelve el conteo.
    wp_send_json_success($cart_count);
}
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');



add_action( 'woocommerce_edit_account_form', 'custom_profile_picture_field' );
function custom_profile_picture_field() {
	$user_id = get_current_user_id();
	$image_url = get_user_meta( $user_id, 'custom_profile_picture', true );
	?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="profile_picture"><?php _e( 'Imagen de perfil', 'woocommerce' ); ?></label><br>
		<?php if ( $image_url ) : ?>
			<img src="<?php echo esc_url( $image_url ); ?>" alt="Imagen actual" style="max-width:100px;display:block;margin-bottom:10px;">
		<?php endif; ?>
		<input type="file" name="profile_picture" id="profile_picture" accept="image/*" />
	</p>
	<?php
}

add_action( 'woocommerce_save_account_details', 'save_custom_profile_picture', 10, 1 );
function save_custom_profile_picture( $user_id ) {
	if ( isset( $_FILES['profile_picture'] ) && ! empty( $_FILES['profile_picture']['name'] ) ) {

		$file = $_FILES['profile_picture'];
		if ( $file['size'] > 2 * 1024 * 1024 ) {
			wc_add_notice( __( 'La imagen no debe superar los 2MB.', 'woocommerce' ), 'error' );
			return;
		}
		$allowed_mimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
		$check = wp_check_filetype( $file['name'] );

		if ( ! in_array( $check['type'], $allowed_mimes ) ) {
			wc_add_notice( __( 'Formato de imagen no permitido.', 'woocommerce' ), 'error' );
			return;
		}
		$ext = pathinfo( $file['name'], PATHINFO_EXTENSION );
		$random_code = substr( md5( uniqid( '', true ) ), 0, 4 );
		$new_filename = date('Ymd_His') . '-' . $random_code . '.' . $ext;
		$file['name'] = sanitize_file_name( $new_filename );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$upload = wp_handle_upload( $file, ['test_form' => false] );

		if ( ! isset( $upload['error'] ) && isset( $upload['url'] ) ) {
			update_user_meta( $user_id, 'custom_profile_picture', esc_url_raw( $upload['url'] ) );
		} else {
			wc_add_notice( __( 'Error al subir la imagen: ', 'woocommerce' ) . $upload['error'], 'error' );
		}
	}
}


add_action( 'template_redirect', 'redirect_to_first_order_if_on_orders_page' );
function redirect_to_first_order_if_on_orders_page() {
	if ( is_account_page() && is_wc_endpoint_url( 'orders' ) && is_user_logged_in() ) {
		$user_id = get_current_user_id();
		$customer_orders = wc_get_orders([
			'customer_id' => $user_id,
			'limit'       => 1,
		]);

		if ( ! empty( $customer_orders ) ) {
			$first_order = $customer_orders[0];
			wp_safe_redirect( $first_order->get_view_order_url() );
			exit;
		}
	}
}

