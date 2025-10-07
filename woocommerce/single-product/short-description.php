<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;

$currentProductID = $post->ID;
$wcProduct = wc_get_product();
$productCategories = wp_get_post_terms( $currentProductID, 'product_cat' );
foreach ( $productCategories as $category ) {
    if ( $category->parent == 0 ) {
        $productCategory = $category->slug;
        break;
    }
}

$CF_principal = get_field( 'principal' );
if ( $CF_principal [ 'ficha_tecnica' ] ) {
    echo do_shortcode( "[WORDPRESS_PDF]" );
}

$CF_settings = get_options_page_id( 'settings' );
$CF_bloqueUnico = get_field( 'bloque_unico' );
$CF_comboProducts = get_field( 'combo_products', $CF_settings );

$variations = false;
$wordpressTags = get_the_terms( $post->ID, 'product_tag' );
$current_url = get_permalink();

/********************************************* Product Tags *********************************************/
if (!empty($wordpressTags)):
    $linkedTag = '';
    foreach ( $wordpressTags as $singleTag ) {
        if ( strpos( $singleTag->name, 'tag-' ) === 0 ) {
            $linkedTag = $singleTag;
            break;
        }
    }

    if ($linkedTag):
        $tagID = $linkedTag->term_id;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_tag',
                    'field'    => 'term_id',
                    'terms'    => $tagID,
                ),
            ),
        );
    
        $query = new WP_Query($args);
        if ($query->have_posts()): ?>
            <div class="linked-products">
                <?php
                $variations = true;
                if ( $productCategory == 'filamentos' || $productCategory == 'resinas') {
                    echo '<h4>Colores disponibles:</h4>';
                } else {
                    echo '<h4>Variaciones:</h4>';
                }
                ?>
                <ul class="product-list">
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        $productID = get_the_ID();
                        $productImageOriginal = wp_get_attachment_image_src(get_post_thumbnail_id($productID), 'full');
                        $productImageSmall = wp_get_attachment_image_src(get_post_thumbnail_id($productID), array(100, 100), true);
                        $thumbnail_url = get_the_post_thumbnail_url();

                        $product_permalink = get_permalink();
						$brand = wp_get_post_terms( $productID, 'pwb-brand' );
						$brand = $brand[0];
						$brandName = $brand->name;
						$productNameVariant = removeStringAndSpace($brandName, get_the_title($productID));
                        $is_current_page = $product_permalink === $current_url;

                        $currentPrincipal = get_field( 'principal', $productID );
						if (!empty($currentPrincipal['etiqueta'])) {
							$productBadge = !empty($currentPrincipal['texto']) 
								? htmlspecialchars($currentPrincipal['texto']) 
								: 'Oferta';
						} else {
							$productBadge = $currentPrincipal['stock'] ? 'En Stock' : 'Preventa';
						}
						?>

						<li class="linked-preview" data-image="<?= esc_url( $thumbnail_url ); ?>" data-badge="<?= $productBadge; ?>" data-title="<?= $productNameVariant; ?>">
							<a class="<?= $is_current_page ? 'active' : ''; ?> 
									   <?= $productBadge == 'Preventa' ? 'pre' : ''; ?> 
									   <?= $productBadge == 'En Stock' ? '' : ($productBadge != 'Preventa' ? 'custom' : ''); ?>" 
							   title="<?= $etiqueta['nombre'] ?>" href="<?= $product_permalink; ?>">
								<img alt="" width="64" height="64" src="<?= $productImageSmall[0]; ?>" data-image="<?= $productImageOriginal[0]; ?>">
								<span><?php the_title(); ?></span>
							</a>
						</li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
			const linkedVariations = document.querySelectorAll('.linked-preview');
			const mainImage = document.querySelector('.wp-post-image');
			const originalSrc = mainImage.getAttribute('data-src');
			const originalSrcset = mainImage.getAttribute('srcset');
			const mainBadge = document.querySelector('#productPage .badge');
			const originalBadge = mainBadge.getAttribute('data-badge');
			const titleElement = document.querySelector('#product-title');
			const originalTitle = titleElement.textContent;

			linkedVariations.forEach(item => {
				item.addEventListener('mouseenter', function() {
					const variation = this;
					const variationImage = variation.getAttribute('data-image');
					const variationBadge = variation.getAttribute('data-badge');
					const variationTitle = variation.getAttribute('data-title');

					mainImage.setAttribute('src', variationImage);
					mainImage.setAttribute('srcset', variationImage);
					mainImage.setAttribute('data-src', variationImage);
					mainBadge.textContent = variationBadge;

					if (titleElement) {
						titleElement.textContent = variationTitle;
					}

					if (variationBadge == 'Preventa') {
						mainBadge.classList.add('pre');
						mainBadge.classList.remove('custom');
					} else if (variationBadge == 'En Stock') {
						mainBadge.classList.remove('pre');
						mainBadge.classList.remove('custom');
					} else { 
						mainBadge.classList.remove('pre');
						mainBadge.classList.add('custom');
					}
				});

				item.addEventListener('mouseleave', function() {
					mainImage.setAttribute('src', originalSrc);
					mainImage.setAttribute('srcset', originalSrcset);
					mainImage.setAttribute('data-src', originalSrc);
					mainBadge.textContent = originalBadge;
					if (titleElement) {
						titleElement.textContent = originalTitle;
					}
					if (originalBadge == 'Preventa') {
						mainBadge.classList.add('pre');
						mainBadge.classList.remove('custom');
					} else if (originalBadge == 'En Stock') {
						mainBadge.classList.remove('pre');
						mainBadge.classList.remove('custom');
					} else {
						mainBadge.classList.remove('pre');
						mainBadge.classList.add('custom');
					}
				});
			});
		});
    </script>
    <?php endif; ?>
<?php endif; ?>

<?php
/********************************************* *********************************************/
if ($wcProduct->is_type('variable')) :

/********************************************* Product Benefits *********************************************/
elseif ($CF_bloqueUnico['bloque']): ?>
    <div id="productBenefits" data-pro="<?= $post->ID; ?>">
        <?php
        $template = get_field('plantilla');
        $fields_mapping = [
            'impfdm' => 'impresora_3d_fdm',
            'impresin' => 'impresora_3d_resina',
            'filament' => 'filamentos',
            'resin' => 'resinas',
            'repuesto' => 'repuestos',
            'film' => 'film',
            'cortadora' => 'cortadoras_laser',
            'polyterra' => 'plantilla_polyterra',
            'polylitesedoso' => 'plantilla_polylite_sedoso',
			'plotters' => 'plotters',
			'scooters' => 'scooters',
            'boquilla' => 'plantilla_boquilla',
            'custom' => 'personalizado',
        ];

        $field_name = $fields_mapping[$template];
        $default = ($template != 'custom');

        $dataTable = get_field($field_name);
        if ($default) {
            $tbn = get_field_object($field_name)['sub_fields'];
        }

        $key = 0; $lmt = 3;
        $html ='<ul class="list">';
        foreach ( $dataTable as $data ) {
            if ( !empty( $data ) && $lmt > 0 ) {
                $label = $default ? $tbn[ $key ]['label'] : $data['etiqueta'];
                $value = $default ? $data : $data['texto'];
                $html .= "<li>$label: $value</li>";
                $lmt--;
            }
            $key++;
        }
        $html .='</ul>';
        echo $html;
        ?>
        <h4>Complementa tu compra con</h4>
        <div class="content">
            <?php
            $assembly = $CF_bloqueUnico['precio'];
            $assemblyMapping = [
                'fdms' => 16281,
                'fdmm' => 16283,
                'fdml' => 16284,
                'resins' => 16285,
                'resinm' => 16287,
                'resinl' => 16288,
                'prusa' => 16289,
                's1500' => 18274,
                's1000' => 18275,
                's500' => 18311,
            ];
            $typeMapping = [
                'fdms' => 'fdm',
                'fdmm' => 'fdm',
                'fdml' => 'fdm',
                'resins' => 'resina',
                'resinm' => 'resina',
                'resinl' => 'resina',
                'prusa' => 'fdm',
                's1500' => 'fdm',
                's1000' => 'fdm',
                's500' => 'fdm',
            ];

            $assemblyProduct = isset($assemblyMapping[$assembly]) ? $assemblyMapping[$assembly] : '16281';
            $typeProduct = isset($typeMapping[$assembly]) ? $typeMapping[$assembly] : 'fdm';
            
            $combos = [];
            array_push($combos, $CF_comboProducts[$typeProduct][0]);
            array_push($combos, $assemblyProduct);

            foreach( $combos as $combo ):
                $prd = wc_get_product( $combo );
                $p_img = wp_get_attachment_image_src( get_post_thumbnail_id( $combo ), array('300','300'), true );
                ?>
                <div class="itemBenefit" data-pro="<?= $combo; ?>">
                    <img class="itm-tmb" alt="Miniatura" width="192" height="192" src="<?= $p_img[0];?>">
                    <div class="data">
                        <h3><?= get_the_title( $combo ) ?></h3>
                        <b>+ S/ <?= number_format($prd->get_price()); ?></b>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
/********************************************* Templates *********************************************/
else :
    if ( !$wcProduct->is_type('variable') && !$variations) :

        $template = get_field('plantilla');
        $fields_mapping = [
            'impfdm' => 'impresora_3d_fdm',
            'impresin' => 'impresora_3d_resina',
            'filament' => 'filamentos',
            'resin' => 'resinas',
            'repuesto' => 'repuestos',
            'film' => 'film',
            'cortadora' => 'cortadoras_laser',
            'polyterra' => 'plantilla_polyterra',
            'polylitesedoso' => 'plantilla_polylite_sedoso',
			'accesorio_especifico' => 'accesorio_especifico',
			'realidad_virtual' => 'realidad_virtual',
			'drones' => 'drones',
			'escaneres3d' => 'escaneres3d',
			'cnc' => 'cnc',
            'boquilla' => 'plantilla_boquilla',
			'plotters' => 'plotters',
			'scooters' => 'scooters',
            'custom' => 'personalizado',
        ];

        $field_name = $fields_mapping[$template];
        $def = ($template != 'custom');

        $tbl = get_field($field_name);
        if ($def) {
            $tbn = get_field_object($field_name)['sub_fields'];
        }
        $key = 0;
        $lmt = 6;

        $html ='<div id="ky1-sht-spc"> <h4>Características Principales</h4>';

        if (is_array($tbl)) {
            foreach ( $tbl as $data ) {
                if ( !empty( $data ) && $lmt > 0 ) {
                    $label = $def ? $tbn[ $key ]['label'] : $data['etiqueta'];
                    $value = $def ? $data : $data['texto'];

                    $html .= "<span><pre><em>$label</em><em>$value</em></pre></span>";
                    $lmt--;
                }
                $key++;
            }
        }
        $html .='</div>';
        echo $html;

    endif;

endif;

?>