<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<div id="compare-k3d">
    <div class="cont">
        <div class="menu">
            <div class="categorias">
				<button data-category="fdm" class="selected">Impresoras 3D Filamento</button>
				<button data-category="lcd">Impresoras 3D Resina</button>
                <button data-category="filamentos">Filamentos</button>
                <button data-category="resinas">Resinas</button>
                <button data-category="cortadoras-laser">Cortadoras Láser</button>
                <button data-category="maquinas-cnc">CNC</button>
                <button data-category="escaneres3d">Escáneres 3D</button>
                <button data-category="drones">Drones</button>
                <button data-category="realidadvirtual">Realidad Virtual</button>
            </div>
        </div>  
        
        <form class="product-form" method="POST" action="">
            <?php
			add_filter('posts_where', 'exclude_products_by_name');
			function exclude_products_by_name($where) {
				global $wpdb;
				$words_to_exclude = array('colorante', 'makeup','tinta','modulo','punta');
				$conditions = array();
				foreach ($words_to_exclude as $word) {
					$conditions[] = "{$wpdb->posts}.post_title NOT LIKE '%" . esc_sql($word) . "%'";
				}
				if (!empty($conditions)) {
					$where .= " AND " . implode(" AND ", $conditions);
				}
				return $where;
			}
			$exclude_product_ids = array(22016,23157,27903,20369,20446,27899,27113,21188,
										 23075,23062,25767,16776,25726,20629,16789,19398);
            $args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => array(
							'fdm',
							'lcd',
							'filamentos',
							'resinas',
							'cortadoras-laser',
							'maquinas-cnc',
							'escaneres3d',
							'drones',
							'realidadvirtual'
						),
						'operator' => 'IN',
					),
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => array(
							'postprocesado',
							'cortadoras-laser-accesorios' ,
							'extractor-filtro',
							'accesorios-drones',
							'escaner-accesorios',
							'accesorios',
							'robots',
							'termoformado'
						),
						'operator' => 'NOT IN',
					),
				),
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key'     => '_stock_status',
						'value'   => 'instock', 
						'compare' => '='
					),
					array(
						'key'     => '_backorders',
						'value'   => 'notify',
						'compare' => '='
					),
				),
				'orderby' => 'title',
				'order'   => 'ASC',
				'post__not_in' => $exclude_product_ids,
			);

            $products = new WP_Query($args);
			remove_filter('posts_where', 'exclude_products_by_name');
            $product_list = [];
			
            if ($products->have_posts()) {
                while ($products->have_posts()) {
                    $products->the_post();
                    $product_id = get_the_ID();
                    $CF_template = get_field('plantilla', $product_id);

                    $CF_techSpecs = [];
                    $CF_techSpecsObject = [];

                    $default = true;
                    switch ($CF_template) {
                        case 'impfdm':
                            $CF_techSpecs = get_field('impresora_3d_fdm', $product_id);
                            $CF_techSpecsObject = get_field_object('impresora_3d_fdm', $product_id);
                            break;
                        case 'impresin':
                            $CF_techSpecs = get_field('impresora_3d_resina', $product_id);
                            $CF_techSpecsObject = get_field_object('impresora_3d_resina', $product_id);
                            break;
                        case 'filament':
                            $CF_techSpecs = get_field('filamentos', $product_id);
                            $CF_techSpecsObject = get_field_object('filamentos', $product_id);
                            break;
                        case 'polyterra':
                            $CF_techSpecs = get_field('plantilla_polyterra', $product_id);
                            $CF_techSpecsObject = get_field_object('plantilla_polyterra', $product_id);
                            break;
                        case 'polylitesedoso':
                            $CF_techSpecs = get_field('plantilla_polylite_sedoso', $product_id);
                            $CF_techSpecsObject = get_field_object('plantilla_polylite_sedoso', $product_id);
                            break;
                        case 'resin':
                            $CF_techSpecs = get_field('resinas', $product_id);
                            $CF_techSpecsObject = get_field_object('resinas', $product_id);
                            break;
                        case 'cortadora':
                            $CF_techSpecs = get_field('cortadoras_laser', $product_id);
                            $CF_techSpecsObject = get_field_object('cortadoras_laser', $product_id);
                            break;
                        case 'cnc':
                            $CF_techSpecs = get_field('cnc', $product_id);
                            $CF_techSpecsObject = get_field_object('cnc', $product_id);
                            break;
                        case 'escaneres3d':
                            $CF_techSpecs = get_field('escaneres3d', $product_id);
                            $CF_techSpecsObject = get_field_object('escaneres3d', $product_id);
                            break;
                        case 'drones':
                            $CF_techSpecs = get_field('drones', $product_id);
                            $CF_techSpecsObject = get_field_object('drones', $product_id);
                            break;
                        case 'realidad_virtual':
                            $CF_techSpecs = get_field('realidad_virtual', $product_id);
                            $CF_techSpecsObject = get_field_object('realidad_virtual', $product_id);
                            break;
						case 'accesorio_especifico':
                            $CF_techSpecs = get_field('accesorio_especifico', $product_id);
                            $CF_techSpecsObject = get_field_object('accesorio_especifico', $product_id);
                            break;
						case 'plotters':
                            $CF_techSpecs = get_field('plotters', $product_id);
                            $CF_techSpecsObject = get_field_object('plotters', $product_id);
                            break;
                        default:
                            $CF_techSpecs = get_field('personalizado', $product_id);
                            $CF_techSpecsObject = get_field_object('personalizado', $product_id);
                            $default = false;
                            break;
                    }

                    if ($default) {
                        $CF_techSpecsObject = $CF_techSpecsObject['sub_fields'];
                    }
                    if (!is_array($CF_techSpecs)) {
                        $CF_techSpecs = [];
                    }

                    $brand = wp_get_post_terms($product_id, 'pwb-brand');
                    $brandID = !empty($brand) ? $brand[0]->term_id : 0;
                    $logoSrc = !empty($brandID) ? get_field('logos', 'pwb-brand_' . $brandID)['logo'] : '';
                    $regular_price = get_post_meta($product_id, '_regular_price', true);
                    $sale_price = get_post_meta($product_id, '_sale_price', true);
                    $display_price = $sale_price ? $sale_price : $regular_price;

                    $categories = get_the_terms($product_id, 'product_cat');
                    $category_slug = 'no identificado'; 
					
                    if ($categories && !is_wp_error($categories)) {
                        $allowed_categories = [
							'fdm',
							'lcd',
                            'filamentos',
                            'resinas',
                            'cortadoras-laser',
                            'maquinas-cnc',
                            'escaneres3d',
                            'drones',
                            'realidadvirtual'
                        ];
                        foreach ($categories as $category) {
							if (($category->parent === 0 || in_array($category->slug, ['fdm', 'lcd'])) && in_array($category->slug, $allowed_categories)) {
								$category_slug = $category->slug;
								break;
							}
						}
                    }
					$product_title = get_the_title();
					if ($category_slug === 'resinas') {
						$product_title = str_replace('Resina', '', $product_title);
					}
					
                    $product_list[] = [
                        'id' => $product_id,
                        'name' => trim($product_title),
                        'image' => get_the_post_thumbnail_url($product_id, 'full'), 
                        'price' => $display_price,
                        'tech_specs' => $CF_techSpecs,
                        'url' => get_permalink($product_id),
                        'add_to_cart_url' => '?add-to-cart=' . $product_id,
                        'logo' => $logoSrc,
                        'category_slug' => $category_slug
                    ];
                }
            }
            wp_reset_postdata();
			$selected_ids = [21902, 19167, 22412, 
							 21262, 21333, 23288, 
							 16492, 23301, 27290,
							 19927, 23341, 19344,
							 17598, 21283, 18903,
							 16643, 23448, 23150,
							 21608, 21272, 21117,
							 26477, 23159, 27997,
							 26465, 26485, 28085];
			$selected_products = array_filter($product_list, function($product) use ($selected_ids) {
				return in_array($product['id'], $selected_ids);
			});
			$other_products = array_filter($product_list, function($product) use ($selected_ids) {
				return !in_array($product['id'], $selected_ids);
			});
			$selected_products = array_values($selected_products);
			$other_products = array_values($other_products);
			$product_list = array_merge($selected_products, $other_products);
            if (count($product_list) < 3) {
                echo "No hay suficientes productos disponibles para seleccionar.";
            } else {
                for ($i = 0; $i < 3; $i++):
                    $selected_product = isset($product_list[$i]) ? $product_list[$i] : null;
                    ?>
                    <div class="product-selection">
                        <select name="product_list_<?php echo $i + 1; ?>" class="product-select select2" data-index="<?php echo $i; ?>">
                            <?php foreach ($product_list as $product):
                                $selected = $selected_product && $selected_product['id'] == $product['id'] ? 'selected' : '';
                            ?>
                                <option value="<?php echo $product['id']; ?>" <?php echo $selected; ?>
                                    data-tech-specs="<?php echo json_encode($product['tech_specs']); ?>"
                                    data-image="<?php echo $product['image']; ?>"
                                    data-url="<?php echo $product['url']; ?>"
                                    data-price="<?php echo $product['price']; ?>"
                                    data-logo="<?php echo $product['logo']; ?>"
                                    data-category="<?php echo $product['category_slug']; ?>">
                                    <?php echo $product['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="logo-image" id="logo-image-<?php echo $i; ?>"></div>
                        <div class="product-image" id="product-image-<?php echo $i; ?>">
                            <img src="" />
                        </div>
                        <div class="product-price" id="product-price-<?php echo $i; ?>"></div>
                    </div>
                <?php endfor;
            }
            ?>
        </form>

        <div id="templates-container" class="espec">
            <div id="template-0" class="template-box"></div>
            <div id="template-1" class="template-box"></div>
            <div id="template-2" class="template-box"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const selects = document.querySelectorAll(".product-select");
    const logoContainers = [
        document.getElementById("logo-image-0"),
        document.getElementById("logo-image-1"),
        document.getElementById("logo-image-2")
    ];
    const templateContainers = [
        document.getElementById("template-0"),
        document.getElementById("template-1"),
        document.getElementById("template-2")
    ];
    const imageContainers = [
        document.getElementById("product-image-0"),
        document.getElementById("product-image-1"),
        document.getElementById("product-image-2")
    ];
    const priceContainers = [
        document.getElementById("product-price-0"),
        document.getElementById("product-price-1"),
        document.getElementById("product-price-2")
    ];
    const categoryButtons = document.querySelectorAll(".categorias button");
    let currentCategory = "fdm";

    const productList = <?php echo json_encode($product_list); ?>;

    function formatLabel(key) {
        return key.replace(/_/g, " ").replace(/(^|\s)\S/g, letter => letter.toUpperCase());
    }

    function getFilteredProducts() {
        return productList.filter(product => product.category_slug === currentCategory);
    }

    function updateContent() {
        selects.forEach((select, index) => {
            const selectedOption = select.options[select.selectedIndex];
            if (!selectedOption) return;

            const techSpecs = JSON.parse(selectedOption.getAttribute("data-tech-specs") || "{}");
            const imageUrl = selectedOption.getAttribute("data-image") || "";
            const price = selectedOption.getAttribute("data-price") || "";
            const productID = selectedOption.value;
            const product = <?php echo json_encode($product_list); ?>.find(product => product.id == productID);
            const productUrl = product.url;
            const addToCartUrl = product.add_to_cart_url;
            const logoSrc = selectedOption.getAttribute("data-logo") || "";

            logoContainers[index].innerHTML = logoSrc ? `<img src="${logoSrc}" />` : "";
            imageContainers[index].innerHTML = imageUrl ? `<img src="${imageUrl}" />` : "";

            templateContainers[index].innerHTML = Object.keys(techSpecs).length > 0 
                ? Object.entries(techSpecs).map(([key, value]) => {
                    const label = formatLabel(key);
                    const displayValue = value.trim() === "" ? "N.A." : value;
        			return `<strong>${label}:</strong> <p>${displayValue}</p>`;
                }).join("")
                : "No hay detalles técnicos disponibles.";

            priceContainers[index].innerHTML = price ? `
                <strong>S/.${price}</strong>
                <a href="${addToCartUrl}" class="add-to-cart-button">Comprar</a>
                <a href="${productUrl}" target="_blank">Ver producto</a>
            ` : "";

            const selectedCategory = selectedOption.getAttribute("data-category");
            if (selectedCategory !== "filamentos" && selectedCategory !== "resinas") {
                const downloadButtonHtml = `
                    <a href="${productUrl}?action=genpdf&id=${productID}" class="download-ficha">
                        Ficha Técnica
                        <img src="/wp-content/uploads/2024/12/descargar-pdf-compare.webp" alt="Descargar ficha">
                    </a>
                `;
                templateContainers[index].innerHTML += downloadButtonHtml;
            }
        });

        updateDisabledOptions();
    }

    document.querySelectorAll('.product-select').forEach(select => {
        select.addEventListener('change', () => {
            updateContent();
            updateDisabledOptions();
        });
    });

    function updateProductOptions() {
        const filteredProducts = getFilteredProducts();
        selects.forEach((select, index) => {
            select.innerHTML = "";
            filteredProducts.forEach(product => {
                const option = document.createElement("option");
                option.value = product.id;
                option.textContent = product.name;
                option.setAttribute("data-tech-specs", JSON.stringify(product.tech_specs || {}));
                option.setAttribute("data-image", product.image || "");
                option.setAttribute("data-url", product.url || "");
                option.setAttribute("data-price", product.price || "");
                option.setAttribute("data-logo", product.logo || "");
                option.setAttribute("data-category", product.category_slug);

                if (index < filteredProducts.length) {
                    if (filteredProducts[index].id === product.id) {
                        option.selected = true;
                    }
                }
                select.appendChild(option);
            });

            $(select).select2();
        });
        updateContent();
    }

    categoryButtons.forEach(button => {
        button.addEventListener("click", function () {
            categoryButtons.forEach(btn => btn.classList.remove("selected"));
            this.classList.add("selected");
            currentCategory = this.getAttribute("data-category");
            updateProductOptions();
        });
    });

    function updateDisabledOptions() {
		const isSmallScreen = window.innerWidth < 992;
		if (isSmallScreen) {
			const selectedValues = Array.from(selects).slice(0, 2).map(select => select.value);
			selects.forEach(select => {
				if (select !== selects[2]) { // Excluye el tercer selector
					select.querySelectorAll("option").forEach(option => {
						option.disabled = selectedValues.includes(option.value) && select.value !== option.value;
					});
				}
			});
		} else {
			const selectedValues = Array.from(selects).map(select => select.value);
			selects.forEach(select => {
				select.querySelectorAll("option").forEach(option => {
					option.disabled = selectedValues.includes(option.value) && select.value !== option.value;
				});
			});
		}
		selects.forEach(select => $(select).select2());
	}
    function initializeSelectors() {
        updateProductOptions();
        updateDisabledOptions();
    }

    selects.forEach(select => {
        select.addEventListener("change", () => {
            updateContent();
            updateDisabledOptions();
        });
        $(select).on('select2:select', () => {
            updateContent();
            updateDisabledOptions();
        });
    });
    initializeSelectors();

    const firstButton = document.querySelector("#compare-k3d .categorias button");
    if (firstButton) {
        firstButton.click();
    }

});
</script>