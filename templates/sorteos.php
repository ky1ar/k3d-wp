<?php 
/**
 * Template Name: Sorteos
 *
 */
get_header();
defined('ABSPATH') || exit;

global $post;
$post_slug = $post->post_name;

include get_theme_file_path('templates/slider.php');

$header = get_field( 'sorteo_header' );
$sorteos = get_field( 'sorteo' );

?>
<div id="ky1-nrf">
	<div class="rff-hdr spe">
        <div class="wrapper">
            <div class="swiffy-slider slider-item-show2  slider-nav-chevron slider-nav-dark slider-nav-autopause slider-nav-outside slider-nav-visible" id="swiffy-animation">
				<ul class="slider-container">
					<?php 
					$first = true;
					foreach ( $sorteos as $sorteo):
						$principal = $sorteo['principal'];
						if ( $principal['visible'] ):
							?>
							<li class="rff-box <?= $first ? 'rff-act' : '' ?>" data-slug="<?= $principal['slug'] ?>">
								<div class="box-img"><img src="<?= $principal['imagen'] ?>"/></div>
								<div>
									<span><?= $principal['fecha'] ?></span>
									<h2><?= $principal['titulo'] ?></h2>
									<p><?= $principal['texto'] ?></p>
									<div class="rff-ky1">Participar</div>
								</div>
							</li>
							<?php
						$first = false;
						endif;
					endforeach;					  
					?>
                </ul>
				<button type="button" class="slider-nav" aria-label="Go to previous"></button>
    			<button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
            </div>
        </div>
    </div>
	<?php 
	$init = true;
	foreach ( $sorteos as $sorteo ):
		$principal = $sorteo['principal'];
	
		if ( $principal['visible'] ):
			$sec_pas = $sorteo['seccion_pasos'];
			$pasos = $sec_pas['pasos'];

			$sec_prz = $sorteo['seccion_premios'];
			$premios = $sec_prz['premios'];

			$frm = $sorteo['formulario'];
			?>
			<div class="rff-unq" id="<?= $principal['slug'] ?>" <?= $init ? '' : 'style="display: none;"' ?>>
				<div class="rff-prz">
					 <div class="wrapper">
						<h1><?= $principal['titulo'] ?></h1>
						 <p><?= $principal['texto'] ?></p>
						<ul>
							<?php 
							foreach ( $premios as $premio ):
								$prz_prd = $premio['producto'];
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $prz_prd->ID ), array('300','300'), true );
								$link = get_permalink( $prz_prd->ID );

								$brands = wp_get_post_terms( $prz_prd->ID, 'pwb-brand' );
								$brand = $brands[0];
								$brand_id = get_term_meta( $brand->term_id, 'pwb_brand_image',1 );
								$brand_src = wp_get_attachment_image_src( $brand_id, 'wc_pwb_admin_tab_brand_logo_size', true );

								?>
								<li>
									<a href="<?= $link ?>" class="prz-lnk">
										<div class="prz-box">
											<img height="32" class="prz-brd" src="<?= $brand_src[0] ?>"/>
											<img width="192" height="192" class="prz-img" src="<?= $image[0] ?>"/>
										</div>
									</a>
									<h2><a href="<?= $link ?>"><?= $premio['titulo'] ?></a></h2>
									<p><?= $premio['texto'] ?></p>
								</li>
								<?php
							endforeach;
							?>
						</ul>
					</div>
				</div>
				<div class="rff-stp">
					 <div class="wrapper">
						<h1><?= $sec_pas['titulo'] ?></h1>
						<ul>
							<?php 
							foreach ( $pasos as $paso ):
								?>
								<li>
									<img src="<?= $paso['icono'] ?>"/>
									<div>
										<h2><?= $paso['titulo'] ?></h2>
										<p><?= $paso['parrafo'] ?></p>
									</div>
								</li>
								<?php
							endforeach;
							?>
						</ul>
					</div>
				</div>
				<div class="rff-frm">
					<div class="wrapper">
						<div class="frm-lft">
							<div>
								<p>Confirma</p>
								<span>AQUÍ</span>
							</div>
						</div>
						<div class="frm-rgt"><?php echo do_shortcode($frm); ?></div>
					</div>
				</div>
			</div>
			<?php
			$init = false;
		endif;
	endforeach;
	?>

	<div class="rff-bar">
        <div class="bar-img"><img class="bar-img" src="/wp-content/uploads/2023/10/plane.webp"/></div>
        <div class="rff-bar-txt"><span>¡Pronto tendremos más sorteos increíbles!</span></div>
        <div class="bar-img"><img class="bar-img" src="/wp-content/uploads/2023/10/plane.webp"/></div>
    </div>

	<script>
		var rff_box = document.querySelectorAll(".rff-box");

		rff_box.forEach(function(box) {
			box.addEventListener("click", function() {

				rff_box.forEach(function(box) { box.classList.remove("rff-act"); });
				this.classList.add("rff-act");

				var rff_unq = document.querySelectorAll(".rff-unq");
				rff_unq.forEach(function(section) { section.style.display = "none"; });

				var unq = this.getAttribute("data-slug");
				document.getElementById(unq).style.display = "block";

				var tar = document.getElementById(unq);
        		tar.scrollIntoView({ behavior: "smooth" });
			});
		});

		document.querySelector('.wpcf7').addEventListener('submit', function (event) {
			if (document.querySelector('.ajax-loader').classList.contains('is-active')) {
				var sub_btn = document.querySelector('input[type="submit"]');
				sub_btn.setAttribute('disabled', 'disabled');

				setTimeout(function () {
					sub_btn.removeAttribute('disabled');
				}, 5000);
			}
		});
	</script>
</div>



<?php get_footer();?>