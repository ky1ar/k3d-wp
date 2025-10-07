<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;
$currentProductID = $product->get_id();
$price = $product->get_price();

$categoriasPermitidas = [
    'filamentos' => 0.9,
    'resinas' => 0.9, 
    'repuestos' => 0.95,
    'upgrades' => 0.95,
];

$marcasOmitidas = ['dji', 'dji-osmo'];
$brand = wp_get_post_terms($currentProductID, 'pwb-brand');
$esMarcaOmitida = false;

if (!empty($brand) && !is_wp_error($brand)) {
    $brandSlug = strtolower($brand[0]->slug);
    if (in_array($brandSlug, $marcasOmitidas, true)) {
        $esMarcaOmitida = true;
    }
}
$precioCalculado = $price;
$mostrarPrecio = false;
$allCategories = wp_get_post_terms($currentProductID, 'product_cat');

if (!$esMarcaOmitida && !empty($allCategories) && !is_wp_error($allCategories)) {
    foreach ($allCategories as $category) {
        if (array_key_exists(strtolower($category->slug), $categoriasPermitidas)) {
            $precioCalculado = $precioCalculado * $categoriasPermitidas[strtolower($category->slug)];
            $mostrarPrecio = true;
            break;
        }
    }
}
?>
<p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>">
    <?php echo $product->get_price_html(); ?>
</p>
<?php if ($mostrarPrecio): ?>
    <p class="prime-prices">
        <img src="/wp-content/uploads/2024/11/prime-logo-white.webp" alt=""> 
        S/<?= esc_html(number_format($precioCalculado, 2)); ?>
    </p>
<?php endif; ?>
