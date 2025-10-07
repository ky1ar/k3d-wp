<?php
$product_id = get_the_ID();
$categories = wp_get_post_terms($product_id, 'product_cat');

$common_banners = [
	['link' => '/afiliados/', 
     'pc' => '/wp-content/uploads/2025/01/b-afiliados-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/b-afiliados-movil.webp'],
    ['link' => '/trueke/', 
     'pc' => '/wp-content/uploads/2025/01/b-trueke-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/b-trueke-movil.webp'],
    ['link' => '/beneficios/', 
     'pc' => '/wp-content/uploads/2025/01/new-beneficios-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/new-beneficios-mov.webp'],
    ['link' => '/sorteos/', 
     'pc' => '/wp-content/uploads/2025/01/b-sorteos-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/b-sorteos-movil.webp']
];

$common_banners_son = [
    ['link' => '/beneficios/', 
     'pc' => '/wp-content/uploads/2025/01/new-beneficios-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/new-beneficios-mov.webp'],
    ['link' => '/sorteos/', 
     'pc' => '/wp-content/uploads/2025/01/b-sorteos-pc.webp', 
     'mobile' => '/wp-content/uploads/2025/01/b-sorteos-movil.webp']
];
$category_banners = [
    'impresoras3d' => $common_banners,
	
    'filamentos' => array_merge([
        ['link' => '/prime/', 
         'pc' => '/wp-content/uploads/2025/01/b-prime-filamentos-pc.webp', 
         'mobile' => '/wp-content/uploads/2025/01/b-prime-filamentos-movil.webp']
    ], $common_banners_son),
    
    'resinas' => array_merge([
        ['link' => '/prime/', 
         'pc' => '/wp-content/uploads/2025/01/b-prime-resinas-pc.webp', 
         'mobile' => '/wp-content/uploads/2025/01/b-prime-resinas-movil.webp']
    ], $common_banners_son),
    
    'repuestos' => array_merge([
        ['link' => '/prime/', 
         'pc' => '/wp-content/uploads/2025/01/b-prime-repuestos-pc.webp', 
         'mobile' => '/wp-content/uploads/2025/01/b-prime-repuestos-movil.webp']
    ], $common_banners_son),
	
	'upgrades' => array_merge([
        ['link' => '/prime/', 
         'pc' => '/wp-content/uploads/2025/01/b-prime-upgrades-pc.webp', 
         'mobile' => '/wp-content/uploads/2025/01/b-prime-upgrades-movil.webp']
    ], $common_banners_son),
	
	'cortadoras-laser' => $common_banners,
	'maquinas-cnc' => $common_banners,
	'escaneres3d' => $common_banners,
	'drones' => $common_banners,
	'realidadvirtual' => $common_banners,
];

$selected_banners = [];

if (!empty($categories) && !is_wp_error($categories)) {
    foreach ($categories as $category) {
        if ($category->slug == 'repuestos') {
            $selected_banners = $category_banners['repuestos'];
            break;
        }
    }

    if (empty($selected_banners)) {
        foreach ($categories as $category) {
            if ($category->slug == 'upgrades') {
                $selected_banners = $category_banners['upgrades'];
                break; 
            }
        }
    }

    if (empty($selected_banners)) {
        foreach ($categories as $category) {
            if (array_key_exists($category->slug, $category_banners)) {
                $selected_banners = $category_banners[$category->slug];
                break;
            }
        }
    }
}

if (!empty($selected_banners)): ?>
    <div id="ban-show">
        <div class="swiffy-slider slider-item-nosnap-touch slider-nav-autoplay slider-nav-autopause slider-indicators-round" data-slider-nav-autoplay-interval="4000">
            <ul class="slider-container">
                <?php foreach ($selected_banners as $banner): ?>
                    <li>
                        <a href="<?php echo esc_url($banner['link']); ?>">
                            <picture>
                                <source srcset="<?php echo esc_url($banner['mobile']); ?>" media="(max-width: 992px)">
                                <img src="<?php echo esc_url($banner['pc']); ?>" alt="Banner">
                            </picture>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
			<ul class="slider-indicators">
				<?php foreach ($selected_banners as $index => $banner): ?>
					<li <?php echo $index === 0 ? 'class="active"' : ''; ?>></li>
				<?php endforeach; ?>
			</ul>
        </div>
    </div>
<?php endif; ?>
