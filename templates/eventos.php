<?php 
/**
 * Template Name: Eventos
 */
get_header();
defined('ABSPATH') || exit;
?>

<div class="pageViewCreality">
  <div class="wrapper">
    <div class="conS">

      <?php 
      if (have_rows('eventos')): 

        $evento_slides = [];
        $evento_contenido = [];

        while (have_rows('eventos')): the_row();

          if (get_row_layout() === 'slider'):
            $slides = get_sub_field('slides');
            if ($slides): ?>
              <div class="evento-slider">
                <div class="swiffy-slider slider-indicators-round" data-slider-nav-autoplay-interval="3000">
                  <ul class="slider-container">
                    <?php foreach ($slides as $slide): ?>
                      <li>
                        <picture>
                          <source media="(max-width: 767px)" srcset="<?= esc_url($slide['movil']) ?>">
                          <img src="<?= esc_url($slide['desktop']) ?>" loading="lazy" alt="Banner evento" />
                        </picture>
                      </li>
                    <?php endforeach; ?>
                  </ul>
					<ul class="slider-indicators" style="margin-bottom: 0.5rem;">
                    <?php foreach ($slides as $index => $slide): ?>
                        <li <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                    <?php endforeach; ?>
                </ul>
                </div>
              </div>
            <?php endif;

          elseif (get_row_layout() === 'evento'):
            $id = uniqid('ev_');
            $imagen = esc_url(get_sub_field('imagen'));
            $intro = get_sub_field('intro'); // grupo con 'desktop' y 'movil'
            $form_id = get_sub_field('form');
            $datos = get_sub_field('datos');
            $tema_color = get_sub_field('tema') ?: '#000000';

            $evento_slides[] = [
              'id' => $id,
              'imagen' => $imagen
            ];

            $evento_contenido[] = [
              'id' => $id,
              'intro' => $intro,
              'form' => $form_id,
              'datos' => $datos,
              'tema' => $tema_color
            ];
          endif;

        endwhile;
      ?>

        <?php if (!empty($evento_slides)): ?>
        <div class="pageViewCreality__slider">
          <div class="swiffy-slider slider-item-show2 slider-nav-caretfill">
            <ul class="slider-container">
              <?php foreach ($evento_slides as $ev): ?>
                <li>
                  <div class="pageViewCreality__thumb" data-target="<?= $ev['id'] ?>">
                    <img src="<?= $ev['imagen'] ?>" alt="Evento <?= $ev['id'] ?>" />
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <button type="button" class="slider-nav" aria-label="Anterior"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Siguiente"></button>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($evento_contenido)): ?>
        <div class="pageViewCreality__detalles">
          <?php foreach ($evento_contenido as $i => $ev): ?>
            <div id="<?= $ev['id'] ?>" class="pageViewCreality__detalle" style="<?= $i === 0 ? '' : 'display:none;' ?>">
              <?php if (!empty($ev['intro']['desktop'])): ?>
                <div class="evento-intro">
                  <picture>
                    <?php if (!empty($ev['intro']['movil'])): ?>
                      <source media="(max-width: 767px)" srcset="<?= esc_url($ev['intro']['movil']) ?>">
                    <?php endif; ?>
                    <img src="<?= esc_url($ev['intro']['desktop']) ?>" alt="Intro evento" loading="lazy" />
                  </picture>
                </div>
              <?php endif; ?>

              <?php if (!empty($ev['datos'])): ?>
                <div class="datos">
                  <?php foreach ($ev['datos'] as $dato): 
                    $color = esc_attr($dato['color'] ?? '#ffffff');
                    $icono = !empty($dato['icono']) ? esc_url($dato['icono']) : '';
                    $subt = esc_html($dato['subt'] ?? '');
                    $info = $dato['info'] ?? '';
                  ?>
                    <div class="dato">
                      <div class="image" style="background-color: <?= $color ?>">
                        <?php if ($icono): ?><img src="<?= $icono ?>" alt="" /><?php endif; ?>
                      </div>
                      <div class="flow">
						  <p class="spe"><?= $subt ?></p>
						  <p class="nor"><?= $info ?></p>
						</div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($ev['form'])): ?>
                <div class="evento-form">
                  <div class="info">
                    <p>REGÍSTRATE</p>
                    <span style="background-color: <?= esc_attr($ev['tema']) ?>;">AHORA</span>
                  </div>
                  <?= do_shortcode('[wpforms id="' . esc_attr($ev['form']) . '"]') ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

      <?php endif; ?>

    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.pageViewCreality .pageViewCreality__thumb').forEach(item => {
    item.addEventListener('click', () => {
      const targetId = item.getAttribute('data-target');
      document.querySelectorAll('.pageViewCreality .pageViewCreality__detalle').forEach(el => el.style.display = 'none');
      const target = document.querySelector('.pageViewCreality #' + targetId);
      if (target) target.style.display = 'block';
    });
  });

  // Forzar que el campo solo acepte números, sin limitar caracteres ni usar máscara
  document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.pageViewCreality .conS .pageViewCreality__detalle .evento-form .wpforms-container .solo-num input');
    if (input) {
      input.setAttribute('type', 'text');
      input.setAttribute('inputmode', 'numeric');
      input.setAttribute('pattern', '[0-9]*');

      input.addEventListener('input', () => {
        input.value = input.value.replace(/\D/g, '');
      });
    }
  });
</script>


<?php get_footer(); ?>
