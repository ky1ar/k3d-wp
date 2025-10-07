<?php
/* Template Name: Categories */
$brands = $block[ 'marcas' ];
?>
<section id="categories">
    <div class="wrapper content">
        <?php foreach ( $brands as $brand ): ?>
            <?php
            $brandID = $brand[ 'marca' ];
            $term = get_term($brandID, 'pwb-brand');
            $permalink = get_term_link($term);

            $brandLogos = get_field('logos', 'pwb-brand_' . $brandID);

            $logo = $brandLogos['logo'];
            $background = $brandLogos['fondo'];
            $size = $brandLogos['size'];
            ?>
        <a href="<?= $permalink; ?>"  aria-label="link">
            <img class="below" width="392" height="120" src="<?= $background; ?>" alt="">
            <span class="fill"></span>
            <div class="above">
                <img width="100" height="24" style="width: <?= $size; ?>%;" src="<?= $logo; ?>" alt="">
            </div>
        </a>
        <?php endforeach ?>
    </div>
</section>
