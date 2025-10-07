<?php
$currentProductID = $product->get_id();
$productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $currentProductID ), array('300','300'), true );

$isVariableProduct= false;
if($product->is_type('variable')){
    $isVariableProduct = true;
} 

$brand = wp_get_post_terms( $currentProductID, 'pwb-brand' );
$brand = $brand[0];
$brandName = $brand->name;

$title = get_the_title( $currentProductID );
$productName = removeStringAndSpace($brandName, $title);

$brandID = $brand->term_id;
$brandLogos = get_field('logos', 'pwb-brand_' . $brandID);
$logo = $brandLogos['logo'];
$size = $brandLogos['size'];

$CF_principal = get_field( 'principal', $currentProductID );

$allCategories = wp_get_post_terms($currentProductID, 'product_cat');
$allowCategories = ['gaming', 'impresoras3d', 'maquinas-cnc', 'cortadoras-laser', 'escaneres3d', 'drones', 'realidadvirtual', 'plotters', 'scooters', 'robotica']; // Slugs de categorías permitidas
$showSpecs = false;

foreach ($allCategories as $cat) {
    if (in_array($cat->slug, $allowCategories)) {
        $showSpecs = true;
        break;
    }
}

$categories = get_queried_object();
$productCategory = $categories->slug;

if ( $productCategory == "resinas") {
    $productName = removeStringAndSpace('Resina', $productName);
}

if (!empty($CF_principal['etiqueta'])) {
    $currentBadge = !empty($CF_principal['texto']) 
        ? htmlspecialchars($CF_principal['texto']) 
        : 'Etiqueta personalizada';
} else {
    $currentBadge = $CF_principal['stock'] ? 'En Stock' : 'Preventa';
}
?>

<div
    class="productItem"
    data-product="<?= $currentProductID; ?>"
    data-image="<?= esc_url($productImage[0]); ?>"
    data-title="<?= $productName; ?>"
    data-badge="<?= $currentBadge; ?>"
>
    <a class="link" href="<?= get_permalink($currentProductID); ?>">
        <img class="thumbnail" alt="" width="192" height="192" src="<?= $productImage[0]; ?>">
        <div class="name">
            <div class="brand">
                <img height="32" style="width: <?= $size; ?>%;" src="<?= esc_url($logo); ?>" alt="">
            </div>
            <?php if ($productCategory == "filamentos" || $productCategory == "resinas"): ?>
                <h4 class="title fixed"><?= $productName; ?></h4>
            <?php else: ?>
                <h4 class="title"><?= $productName; ?></h4>
            <?php endif; ?>
        </div>

        <?php
        if ($showSpecs && !$isVariableProduct) {
            $CF_template = get_field( 'plantilla', $currentProductID );
    
            $default = true;
            switch ( $CF_template ) {
                case 'impfdm':
                    $CF_techSpecs = get_field( 'impresora_3d_fdm', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'impresora_3d_fdm', $currentProductID ); break;
                case 'impresin':
                    $CF_techSpecs = get_field( 'impresora_3d_resina', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'impresora_3d_resina', $currentProductID ); break;
                case 'filament':
                    $CF_techSpecs = get_field( 'filamentos', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'filamentos', $currentProductID ); break;
                case 'resin':
                    $CF_techSpecs = get_field( 'resinas', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'resinas', $currentProductID ); break;
                case 'repuesto':
                    $CF_techSpecs = get_field( 'repuestos', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'repuestos', $currentProductID ); break;
                case 'film':
                    $CF_techSpecs = get_field( 'film', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'film', $currentProductID ); break;
                case 'cortadora':
                    $CF_techSpecs = get_field( 'cortadoras_laser', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'cortadoras_laser', $currentProductID ); break;
                case 'polyterra':
                    $CF_techSpecs = get_field( 'plantilla_polyterra', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'plantilla_polyterra', $currentProductID ); break;
                case 'polylitesedoso':
                    $CF_techSpecs = get_field( 'plantilla_polylite_sedoso', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'plantilla_polylite_sedoso', $currentProductID ); break;
                case 'boquilla':
                    $CF_techSpecs = get_field( 'plantilla_boquilla', $currentProductID );
                    $CF_techSpecsObject = get_field_object( 'plantilla_boquilla', $currentProductID ); break;
				case 'realidad_virtual':
					$CF_techSpecs = get_field('realidad_virtual', $currentProductID);
					$CF_techSpecsObject = get_field_object('realidad_virtual', $currentProductID); break;
				case 'drones':
					$CF_techSpecs = get_field('drones', $currentProductID);
					$CF_techSpecsObject = get_field_object('drones', $currentProductID); break;
				case 'accesorio_especifico':
					$CF_techSpecs = get_field('accesorio_especifico', $currentProductID);
					$CF_techSpecsObject = get_field_object('accesorio_especifico', $currentProductID); break;
				case 'escaneres3d':
					$CF_techSpecs = get_field('escaneres3d', $currentProductID);
					$CF_techSpecsObject = get_field_object('escaneres3d', $currentProductID); break;	
				case 'cnc':
					$CF_techSpecs = get_field('cnc', $currentProductID);
					$CF_techSpecsObject = get_field_object('cnc', $currentProductID); break;
				case 'plotters':
					$CF_techSpecs = get_field('plotters', $currentProductID);
					$CF_techSpecsObject = get_field_object('plotters', $currentProductID); break;
				case 'scooters':
					$CF_techSpecs = get_field('scooters', $currentProductID);
					$CF_techSpecsObject = get_field_object('scooters', $currentProductID); break;
                default:
                    $CF_techSpecs = get_field( 'personalizado', $currentProductID );
                    $default = false;
            }
    
            if ( $default ){
                $CF_techSpecsObject = $CF_techSpecsObject['sub_fields'];
            }
            if (!is_array($CF_techSpecs)) {
				$CF_techSpecs = [];
			}
            $key = 0;
            $limit = 3;
            $techSpecsToShow = array_slice($CF_techSpecs, 0, $limit);
            echo '
                <div class="techSpec">
            ';
            foreach ($techSpecsToShow as $techSpec) {
                if ( !empty( $techSpec) ) {
                    if( $default ) {
                        $TSlabel = $CF_techSpecsObject[ $key ][ 'label' ];
                        $TSlabel = str_replace(
                            ['Volumen de impresión', 'Volumen de Impresión', 'Resolución de Capa', 'Velocidad Máxima'],
                            ['Volumen', 'Volumen', 'Resolución', 'Vel. máx.'],
                            $TSlabel
                        );

						if ($productCategory == 'cortadoras-laser') {
							$TSlabel = str_replace(
								['Área de Grabado', 'Profundidad de Corte'],
								['Área', 'Corte'],
								$TSlabel
							);
						}
                        echo '<pre>
                                <em>' . $TSlabel . '</em>
                                <em>' . $techSpec . '</em>
                            </pre>';
                    } else {
                        $TSlabel = $techSpec[ 'etiqueta' ];
                        $TSlabel = str_replace(
                            ['Volumen de impresión', 'Volumen de Impresión', 'Resolución de Capa', 'Velocidad Máxima'],
                            ['Volumen', 'Volumen', 'Resolución', 'Vel. máx.'],
                            $TSlabel
                        );
						
						 if ($productCategory == 'cortadoras-laser') {
							$TSlabel = str_replace(
								['Área de Grabado', 'Profundidad de Corte'],
								['Área', 'Corte'],
								$TSlabel
							);
						}
    
                        echo '
                            <pre>
                                <em>' . $TSlabel . '</em>
                                <em>' . $techSpec[ 'texto' ] . '</em>
                            </pre>
                        ';
                    }
                    $limit--;
                }
                $key++;
            }
            echo '
                </div>
            ';
        }
        if ( $isVariableProduct ) {

            $var = $product->get_available_variations();
            $var_cnt = count($var);
            $text = $var_cnt === 1 ? 'Opción' : 'Opciones';
    
    		echo '<div class="itm-var">' . $var_cnt . ' ' . $text . '</div>';
        } 
        ?>
    </a>

    <?php
	$allowedCategoriesForTags = [
    "filamentos", "resinas", "film-fep", "motores", 
    "pantallas", "plcas-electronicas", "plataformas", 
    "protectores-de-pantalla", "resistencias", "termistores",
	"tanques", "correas", "hotends", "repuestos", "materiales", 
		"upgrades", "pinturas", "accesorios", "peis", "tubos-ptfe", "ventiladores", "fundas", "extractor-filtro"];
	if (in_array($productCategory, $allowedCategoriesForTags)) {
		$wordpressTags = get_the_terms($currentProductID, 'product_tag');
		if (!empty($wordpressTags)) {
			$linkedTag = '';
			foreach ( $wordpressTags as $singleTag ) {
				if ( strpos( $singleTag->name, 'tag-' ) === 0 ) {
					$linkedTag = $singleTag;
					break;
				}
			}

			if ($linkedTag) {
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
				$categoriesWithCount = [
					"film-fep", "motores", "pantallas", 
					"plcas-electronicas", "plataformas", "protectores-de-pantalla",
					"resistencias", "termistores", "tanques", "correas", "hotends", "repuestos", 
					"materiales", "upgrades", "pinturas", "accesorios", "peis", "tubos-ptfe", "ventiladores", "fundas", "extractor-filtro"];
				if ($query->have_posts()): ?>
					<?php if (!$isVariableProduct && in_array($productCategory, $categoriesWithCount) && $query->found_posts > 1) : ?>
						<div class="related-count-f"><?= $query->found_posts; ?> Opciones</div>
					<?php elseif ($isVariableProduct): ?>
						<!-- No muestra nada si es un producto variable -->
					<?php elseif ($query->found_posts > 1): ?>
						<ul class="linked-products">
							<?php
							$counter = 0;
							while ($query->have_posts()):
								$query->the_post();
								$counter++;
								if ($counter > 4) break;
								$productID = get_the_ID();
								$WCproduct = wc_get_product($productID);
								$attributes = $WCproduct->get_attributes();
								foreach ($attributes as $attribute) {
									$attributeID = $attribute->get_options();
									$attributeID = $attributeID[0];

									$attributeTax = $attribute->get_taxonomy();
									$attributeData = get_term_by('id', $attributeID, $attributeTax);
									$hex = $attributeData->description;
								}

								$title = get_the_title( $productID );
								$productName = removeStringAndSpace($brandName, $title);
								if ($productCategory == "resinas") {
									$productName = removeStringAndSpace('Resina', $productName);
								}

								$productImage = wp_get_attachment_image_src(get_post_thumbnail_id($productID), array(300, 300), true);
								$currentPrincipal = get_field( 'principal', $productID );
								if (!empty($currentPrincipal['etiqueta'])) {
									$productBadge = !empty($currentPrincipal['texto']) 
										? htmlspecialchars($currentPrincipal['texto']) 
										: 'Oferta';
								} else {
									$productBadge = !empty($currentPrincipal['stock']) ? 'En Stock' : 'Preventa';
								}
								?>
								<li class="linked-mini" 
									data-image="<?= esc_url($productImage[0]); ?>" 
									data-title="<?= htmlspecialchars($productName); ?>" 
									data-badge="<?= htmlspecialchars($productBadge); ?>">
									<a title="<?= htmlspecialchars($productName); ?>" href="<?php the_permalink(); ?>" style="background: <?= $hex; ?>"></a>
								</li>
							<?php endwhile; ?>

							<?php if ($query->found_posts > 4):?>
								<li>
									<a href="<?= get_permalink( $currentProductID ); ?>">
										<img src="/wp-content/uploads/2024/10/more_product.webp" alt="Más productos"> 
									</a>
								</li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				<?php endif;
				wp_reset_postdata();
			}
		}
	}

	$priceRaw = $product->get_price();
	if ($priceRaw < 50) {
		$priceDecimals = ($priceRaw - floor($priceRaw)) * 100;
		$firstDecimal = floor($priceDecimals / 10);
		if ($firstDecimal > 0) {
			$price = number_format($priceRaw, 2, '.', ',');
		} else {
			$price = number_format($priceRaw, 0, '.', ',');
		}
	} else {
		$price = number_format($priceRaw, 0, '.', ',');
	}
	?>
	<?php 
		$evento = !empty($CF_principal['evento']) ? $CF_principal['evento'] : '';
		$color = !empty($CF_principal['color']) ? $CF_principal['color'] : '';
		if (!empty($evento) && !empty($color)) {
			$colorStyle = 'background: ' . esc_attr($color);
			echo '<div class="evento-container"><p style="' . $colorStyle . '">' . esc_html($evento) . '</p></div>';
		}
	?>
    <a class="footer" href="<?= get_permalink( $currentProductID ); ?>">
        <?php 
		if (!empty($CF_principal['etiqueta'])) { 
			$customLabel = !empty($CF_principal['texto']) 
				? htmlspecialchars($CF_principal['texto']) 
				: 'Sin Etiqueta';
			echo '<div class="badge custom">' . $customLabel . '</div>';
		} else {
			echo (!empty($CF_principal['stock']) 
				? '<div class="badge">En Stock</div>' 
				: '<div class="badge pre">Preventa</div>'
			);
		}
		?>
        <span class="price">
            <? if ( $isVariableProduct ): ?>
                <b>Desde</b>
            <? endif;?>
            S/ <?= $price; ?>
        </span>
    </a>
	<?php 
	$categoriasPermitidas = [
		'filamentos' => 0.9,
		'resinas' => 0.9,
		'filamentos' => 0.9,
		'repuestos' => 0.95,
		'upgrades' => 0.95,
	];
	$price = str_replace(',', '', $price);
    $precioCalculado = $price;
    $mostrarPrecio = false;
    
    $brand = wp_get_post_terms($currentProductID, 'pwb-brand');
    $esDJI = false;
    $marcasOmitidas = ['dji', 'dji-osmo'];
    if (!empty($brand) && !is_wp_error($brand)) {
        $brandSlug = strtolower($brand[0]->slug);
        if (in_array($brandSlug, $marcasOmitidas, true)) {
            $esDJI = true;
        }
    }
    
    if (!$esDJI && !empty($allCategories) && !is_wp_error($allCategories)) {
        foreach ($allCategories as $category) {
            if (array_key_exists(strtolower($category->slug), $categoriasPermitidas)) {
                $precioCalculado = $price * $categoriasPermitidas[strtolower($category->slug)];
                $mostrarPrecio = true;
                break;
            }
        }
    }
	if ($mostrarPrecio) {
		?>
		<p class="prime-prices">
			<img src="/wp-content/uploads/2024/11/prime-logo-white.webp" alt=""> 
			S/<?= esc_html(number_format($precioCalculado, 2)); ?>
		</p>
		<?php
	}
	?>
    <a title="Comprar" class="viewMore" href="<?= get_permalink( $currentProductID ); ?>">
        <svg width="16" height="16">
            <use xlink:href="#icon-cart"></use>
        </svg>
    </a>
</div>
