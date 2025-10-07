<?php 
/* Template Name: Grilla de Productos */
defined('ABSPATH') || exit;

get_header();
include get_theme_file_path('templates/slider.php');
include get_theme_file_path('templates/blocks.php');

$parentCategory = get_queried_object();
$tax = $parentCategory->taxonomy;

if ( !$tax ) {
    $archiveHtml = '';

} elseif ( $tax != 'pwb-brand' ) {

    $categoryId = $parentCategory->term_id;
    $category_slug = $parentCategory->slug;
    $category_partent = $parentCategory->parent;
    
    if ( $category_partent != 0 ) {
        
        $categoryId = $parentCategory->parent;
        $category = get_term_by( 'id', $categoryId, 'product_cat' );
        $category_slug = $category->slug;

        $term_slugs = [
            'caracteristicas' => 'impresoras3d',
            'aplicaciones' => 'resinas',
        ];

        if ( array_key_exists( $category_slug, $term_slugs ) ) {
            $category = get_term_by( 'slug', $term_slugs[ $category_slug ], 'product_cat' );
            $categoryId = $category->term_id;
            $category_slug = $category->slug;
        }
    }

    $cats = get_field( 'categorias_destacadas','product_cat_'.$categoryId );

	if (!empty($cats)) {
		$archiveHtml = '
			<section id="taxonomySelector">
				<h3>Categorías Destacadas</h3>
				<div class="wrapper">
		';

		foreach ( $cats as $cat_id ) {
			$category = get_term( $cat_id, 'product_cat' );

			$archiveHtml .= '
				<a href="/productos/'.$category_slug.'/'.$category->slug.'">
			';

			if ( $category_slug != 'filamentos' ) {
				$archiveHtml .= '
					<svg width="24" height="24">
						<use xlink:href="#icon-'.$category->slug.'"></use>
					</svg>
				';
			}
			$archiveHtml .= ($category->slug == 'policarbonato' ? 'PC' : $category->name).'
				</a>
			';
		}
		$archiveHtml .= '</div>
			</section>
		';
	}
}

if ($archiveHtml) {
    echo $archiveHtml;
}
?>

<div id="producGrid" class="wrapper">
	<div id="showFiltersButton">
		Mostrar Filtros
		<svg width="16" height="16">
			<use xlink:href="#icon-right"></use>
		</svg>
	</div>

	<div id="showFilters">
	<?php echo do_shortcode( "[wpf-filters id=2]" ); ?>
	
	</div>

	<div class="grid">
		<?php
		if ( woocommerce_product_loop() ) {

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					global $product;
					do_action( 'woocommerce_shop_loop' );

					global $product;
					include get_theme_file_path('/templates/product.php');?>
				<?php
				}
			}
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			do_action( 'woocommerce_no_products_found' );
		}
		do_action( 'woocommerce_after_main_content' );
		?>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		if (window.location.pathname.includes('/productos/filamentos/')) {
			var interval = setInterval(function() {
				var wpfLoaderLayout = document.querySelector('.wpfLoaderLayout');

				if (wpfLoaderLayout) {

					wpfLoaderLayout.insertAdjacentHTML('beforebegin', `
						<div class="customFilter">
							<div class="title">Color</div>
							<ul class="list">
								<li>
									<a title="" href="/productos/filamentos/?s=amarillo">
										<span style="background: #fdd033"></span>
										Amarillo
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=anaranjado">
										<span style="background: #fe9c44"></span>
										Anaranjado
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=arcoiris">
										<span style="background: url(https://www.tiendakrear3d.com/wp-content/uploads/2024/10/arc.webp)"></span>
										Arcoiris
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=azul">
										<span style="background: #2178bd"></span>
										Azul
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=beige">
										<span style="background: #e3cdb4"></span>
										Beige
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=bigaro">
										<span style="background: #9449b0"></span>
										Bígaro
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=blanco">
										<span style="background: #ffffff"></span>
										Blanco
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=bronce">
										<span style="background: linear-gradient(45deg, #c15f2e 50%, #ce7944 50%)"></span>
										Bronce
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=cafe">
										<span style="background: #c7651a"></span>
										Café
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=capuchino">
										<span style="background: #d5b491"></span>
										Capuchino
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=chocolate">
										<span style="background: #d15f36"></span>
										Chocolate
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=cian">
										<span style="background: #00ffff"></span>
										Cian
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=crema">
										<span style="background: #efe8d7"></span>
										Crema
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=fucsia">
										<span style="background: #eb52c7"></span>
										Fucsia
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=gris">
										<span style="background: #9da0a8"></span>
										Gris
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=magenta">
										<span style="background: #eb50eb"></span>
										Magenta
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=marron">
										<span style="background: #805742"></span>
										Marrón
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=morado">
										<span style="background: #a583d3"></span>
										Morado
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=natural">
										<span style="background: #e8dfcd"></span>
										Natural
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=negro">
										<span style="background: #3a3a3b"></span>
										Negro
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=oro">
										<span style="background: linear-gradient(45deg, #dd9c18 50%, #eeae25 50%)"></span>
										Oro
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=plata">
										<span style="background: #929292"></span>
										Plata
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=rojo">
										<span style="background: #f84343"></span>
										Rojo
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=rosado">
										<span style="background: #fc96b6"></span>
										Rosado
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=transparente">
										<span style="background: url(https://www.tiendakrear3d.com/wp-content/uploads/2024/10/tra.webp)"></span>
										Transparente
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=turquesa">
										<span style="background: #73c5c7"></span>
										Turquesa
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=verde">
										<span style="background: #55c556"></span>
										Verde
									</a>
								</li>
								<li>
									<a title="" href="/productos/filamentos/?s=celeste">
										<span style="background: #89d5f2"></span>
										Celeste
									</a>
								</li>
							</ul>
						</div>
					`);
					clearInterval(interval);
				}
			}, 500);
		}
		if (window.location.pathname.includes('/productos/resinas/')) {
			var interval = setInterval(function() {
				var wpfLoaderLayout = document.querySelector('.wpfLoaderLayout');

				if (wpfLoaderLayout) {

					wpfLoaderLayout.insertAdjacentHTML('beforebegin', `
						<div class="customFilter">
							<div class="title">Color</div>
							<ul class="list">
								<li>
									<a title="" href="/productos/resinas/?s=amarillo">
										<span style="background: #fdd033"></span>
										Amarillo
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=anaranjado">
										<span style="background: #fe9c44"></span>
										Anaranjado
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=azul">
										<span style="background: #2178bd"></span>
										Azul
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=beige">
										<span style="background: #e3cdb4"></span>
										Beige
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=blanco">
										<span style="background: #ffffff"></span>
										Blanco
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=gris">
										<span style="background: #9da0a8"></span>
										Gris
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=marron">
										<span style="background: #805742"></span>
										Marrón
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=morado">
										<span style="background: #a583d3"></span>
										Morado
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=negro">
										<span style="background: #3a3a3b"></span>
										Negro
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=rojo">
										<span style="background: #f84343"></span>
										Rojo
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=rosado">
										<span style="background: #fc96b6"></span>
										Rosado
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=transparente">
										<span style="background: url(https://www.tiendakrear3d.com/wp-content/uploads/2024/10/tra.webp)"></span>
										Transparente
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=turquesa">
										<span style="background: #73c5c7"></span>
										Turquesa
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=verde">
										<span style="background: #55c556"></span>
										Verde
									</a>
								</li>
								<li>
									<a title="" href="/productos/resinas/?s=celeste">
										<span style="background: #89d5f2"></span>
										Celeste
									</a>
								</li>
							</ul>
						</div>
					`);
					clearInterval(interval);
				}
			}, 500);
		}
	});


	jQuery(document).ready(function($) {
		$(document).on('mouseenter', '.linked-mini', function() {
			const $variation = $(this);
			const variationImage = $variation.data('image');
			const variationTitle = $variation.data('title');
			const variationBadge = $variation.data('badge');

			const $parent = $variation.closest('.productItem');
			const $thumbnail = $parent.find('.thumbnail');
			const $title = $parent.find('.title');
			const $badge = $parent.find('.badge');

			$thumbnail.attr('src', variationImage);
			$title.text(variationTitle);
			$badge.text(variationBadge);

			// Actualizar clases de la etiqueta (badge)
			$badge.removeClass('pre custom').addClass(
				variationBadge === 'Preventa' ? 'pre' :
				variationBadge === 'En Stock' ? '' : 'custom'
			);
		});

		$(document).on('mouseleave', '.linked-mini', function() {
			const $parent = $(this).closest('.productItem');
			const defaultImage = $parent.data('image');
			const defaultTitle = $parent.data('title');
			const defaultBadge = $parent.data('badge');

			const $thumbnail = $parent.find('.thumbnail');
			const $title = $parent.find('.title');
			const $badge = $parent.find('.badge');

			$thumbnail.attr('src', defaultImage);
			$title.text(defaultTitle);
			$badge.text(defaultBadge);

			// Actualizar clases de la etiqueta (badge)
			$badge.removeClass('pre custom').addClass(
				defaultBadge === 'Preventa' ? 'pre' :
				defaultBadge === 'En Stock' ? '' : 'custom'
			);
		});
	});
</script>
<?php get_footer();
