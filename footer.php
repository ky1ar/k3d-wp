<?php
wp_reset_query();
$seo_field = get_field('seo');

if (is_product_category() || is_category()) {
	$term = get_queried_object();
    $seo_field = get_field('seo', $term);
}

/*if ( !$seo_field ) {
	if ( $cat ) {
		$cat = get_queried_object(); 
		$cat_id = $cat->term_id;	
		$seo_field = get_field( 'seo','product_cat'.'_'.$cat_id );
	}
}
*/
if ( $seo_field ): ?>
	<section id="seoSection">
		<div class="wrapper">
			<div class="seoCard" id="seoContent">
				<?= $seo_field ?>
			</div>

			<div class="seoExtend">
				<span id="openSeo">
					<p>Ver más</p>
					<svg width="12" height="12">
						<use xlink:href="#icon-right"></use>
					</svg>
				</span>
			</div>
		</div>
	</section>

	<script>
		const openSeo = document.getElementById('openSeo');
		const seoButton = openSeo.querySelector('p');
		const seoContent = document.getElementById('seoContent');
		
		openSeo.addEventListener('click', function() {
			if (seoContent.classList.contains('open')) {
				seoContent.classList.remove('open');
				seoButton.textContent = 'Ver más';
			} else {
				seoContent.classList.add('open');
				seoButton.textContent = 'Ver menos';
			}
		}); 
	</script>
<?php endif; ?>

<div id="leslie">
	<svg width="20" height="20">
		<use xlink:href="#icon-right"></use>
	</svg>
</div>
<a id="whatsapp-redir" href="https://api.whatsapp.com/send?phone=51982001288" target="_blank">
    <img src="/wp-content/uploads/2024/10/whatsapp-icon-home.webp">
</a>
<footer>
	<div class="activ">
		<div class="c">
			<img src="/wp-content/uploads/2025/05/up_s.webp">
		</div>
	</div>
	<div class="top">
		<div class="wrapper">
			<div class="item">
				<svg class="logo" width="152" height="32">
					<use xlink:href="#icon-k3d-simple"></use>
				</svg>
				<ul>
					<li><a href="https://bit.ly/2ZzWUeK" target="_blank">Calle Javier Fernandez 262<br>Miraflores - Lima</a></li>
					<li><p>Lun - Sáb de 9:00 am a 7:00 pm</p></li>
				</ul>
			</div>
			
			<div class="item">
				<b>Empresa</b>
				<ul>
					<li><a href="/empresa">Nosotros</a></li>
					<li><a href="/contacto">Contacto</a></li>
					<li><a href="/trabaja-con-nosotros">Trabaja con nosotros</a></li>
				</ul>
			</div>
			
			<div class="item">
				<b>Atención al cliente</b>
				<ul>
					<li><p>Lun - Vie de 9:00 am a 6:00 pm</p></li>
					<li class="ac-s"><a href="mailto:atencionalcliente@krear3d.com" target="_blank" rel="nofollow noopener">atencionalcliente<br>@krear3d.com</a></li>
					<li>
						<a href="https://api.whatsapp.com/send?phone=51981104030" target="_blank" rel="nofollow noopener">
							<svg width="14" height="14">
								<use xlink:href="#icon-whatsapp"></use>
							</svg>
							981 104 030
						</a>
					</li>
				</ul>
			</div>

			<div class="item">
				<b>Novedades</b>
				<ul>
					<li><a href="/comparar-productos/">Comparar</a></li>
					<li><a href="/catalogo/">Catálogo</a></li>
					<li><a href="/sala-de-prensa/">Sala de Prensa</a></li>
					<li><a href="/blog/">Blog</a></li>
				</ul>
			</div>
			
			<div class="item">
				<b>Programas</b>
				<ul>
					<li><a href="/afiliados/">Afiliados</a></li>
					<li><a href="/beneficios/">Beneficios</a></li>
					<li><a href="/sorteos/">Sorteos</a></li>
					<li><a href="/eventos/">Eventos</a></li>
				</ul>
			</div>
			
			<div class="item">
				<b>Medios de Pago</b>
				<ul>
					<li><img class="med-pag" src="https://www.tiendakrear3d.com/wp-content/uploads/2024/08/medios-de-pago-1.webp"></li>
				</ul>
			</div>
			<div class="item">
				<b>Siguenos en</b>
				<ul class="ftr-dot">
					<li>
						<a href="https://www.instagram.com/krear3d_peru/" target="_blank">
							<svg width="20" height="20">
								<use xlink:href="#icon-instagram"></use>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.tiktok.com/@krear3d_peru " target="_blank">
							<svg width="20" height="20">
								<use xlink:href="#icon-tiktok"></use>
							</svg>
						</a>
					</li>
					<li>
						<a href=" https://facebook.com/krear3d/" target="_blank">
							<svg width="20" height="20">
								<use xlink:href="#icon-facebook"></use>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/user/Krear3D" target="_blank">
							<svg width="20" height="20">
								<use xlink:href="#icon-youtube"></use>
							</svg>
						</a>
					</li>
				</ul>
			</div>
			<div class="item peru">
				<img src="/wp-content/uploads/2025/03/logo-marcaperu.webp">
				<p>Tecnología y creatividad <br>con sello peruano</p>
			</div>
		</div>
	</div>
	
	<div class="ftr-bot">
		<div class="wrapper">
			<ul>
				<li><a href="/terminos/terminos-condiciones-y-garantia/">Políticas y Condiciones</a></li>
				<li><a href="/terminos/politicas-de-garantia-y-soporte-tecnico/">Políticas de Garantía</a></li>
				<li><a href="/terminos/politicas-de-capacitaciones-virtuales/">Políticas de Capacitaciones</a></li>
				<li><a href="/terminos/politicas-de-envios-lima-y-provincias/">Políticas de Envíos</a></li>
				<li>
					<a href="/libro-de-reclamaciones/">
						<img class="libro" src="/wp-content/uploads/2024/09/libro.webp" alt="Libro de Reclamaciones" width="32" height="14">
						Libro de Reclamaciones
					</a>
				</li>
			</ul>
			
    		<span class="ftr-cpy">
    Fabricaciones Digitales del Perú S.A. | RUC 20556316890<br>
    Krear 3D © <?php echo date('Y'); ?>. Todos los derechos reservados.
</span>
		</div>
	</div>
</footer>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const trigger = document.querySelector('footer .activ .c');
  const footer = document.querySelector('footer');

  if (trigger && footer) {
    trigger.addEventListener('click', function () {
      const wasOpen = footer.classList.contains('open');
      footer.classList.toggle('open');
      if (!wasOpen) {
        setTimeout(() => {
          footer.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }, 100);
      }
    });
  }

  const checkPswp = setInterval(() => {
        const pswpWrap = document.querySelector('.pswp__scroll-wrap');
        if (pswpWrap) {
            clearInterval(checkPswp);

            const productSection = document.querySelector('#productPage');
            if (productSection) {
                const classes = productSection.className.split(' ');
                classes.forEach(c => pswpWrap.classList.add(c));
            }
        }
    }, 300);

});
</script>
<?php wp_footer(); ?>
</body>
</html>