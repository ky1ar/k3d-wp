<?php
$images = $block['images'];
?>

<?php if (!empty($images)): ?>
<div class="cont-newbanpage">
        <div class="superbanner">
            <div class="swiffy-slider slider-nav-autoplay slider-nav-autopause slider-item-nogap slider-indicators-round" data-slider-nav-autoplay-interval="10000">
                <ul class="slider-container">
                    <?php foreach ($images as $image): ?>
                        <li>
                            <a href="<?= esc_url($image['ruta']); ?>">
                                <picture>
                                    <source srcset="<?= esc_url($image['mobile']); ?>" media="(max-width: 992px)">
                                    <img src="<?= esc_url($image['pc']); ?>" alt="Banner">
                                </picture>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
				<button type="button" class="slider-nav"></button>
    			<button type="button" class="slider-nav slider-nav-next"></button>
                <ul class="slider-indicators">
                    <?php foreach ($images as $index => $image): ?>
                        <li <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="wrapper-two">
            <div class="category-slide">
                <div class="swiffy-slider slider-item-show6 slider-item-snapstart slider-nav-visible">
                    <ul class="slider-container">
                        <li class="slide-visible">
                            <a class="cont" href="/productos/impresoras3d/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondocat_1-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/impresoras-3d_k5.webp" alt="" />
                                <p>IMPRESORAS 3D</p>
                            </a>
                        </li>
                        <li class="slide-visible">
                            <a class="cont" href="/productos/filamentos/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo_filamentos-scaled-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/FILAMENTOS_k5.webp" alt="" />
                                <p>FILAMENTOS</p>
                            </a>
                        </li>
                        <li class="slide-visible">
                            <a class="cont" href="/productos/resinas/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondocat_3-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/RESINAS_k5.webp" alt="" />
                                <p>RESINAS</p>
                            </a>
                        </li>
                        <li class="slide-visible">
                            <a class="cont" href="/productos/upgrades/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondocat_4-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/UPGRADES_k5.webp" alt="" />
                                <p>UPGRADES</p>
                            </a>
                        </li>
                        <li class="slide-visible">
                            <a class="cont" href="/productos/repuestos/">
                                <img class="fond" src="/wp-content/uploads/2025/05/banner_grande_copia_4.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/REPUESTOS_k5.webp" alt="" />
                                <p>REPUESTOS</p>
                            </a>
                        </li>
                        <li class="slide-visible">
                            <a class="cont" href="/productos/cortadoras-laser/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo_abs_4.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/CORTADORAS-LASER_k5.webp" alt="" />
                                <p>CORTADORAS LÁSER</p>
                            </a>
                        </li>
                        <li>
                            <a class="cont" href="/productos/maquinas-cnc/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo-rojo-abstract-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/CNC_k5.webp" alt="" />
                                <p>ROUTERS CNC</p>
                            </a>
                        </li>
                        <li>
                            <a class="cont" href="/productos/escaneres3d/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo_escaneresh-scaled-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/ESCANERES-3D_k5.webp" alt="" />
                                <p>ESCÁNERES 3D</p>
                            </a>
                        </li>
                        <li>
                            <a class="cont" href="/productos/scooters/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo_scooters-scaled-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/SCOOTERS_k5.webp" alt="" />
                                <p>SCOOTERS</p>
                            </a>
                        </li>
                        <li>
                            <a class="cont" href="/productos/drones/">
                                <img class="fond" src="/wp-content/uploads/2025/05/dji_mini_4_pro_banner_desktop.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/DRONES_k5.webp" alt="" />
                                <p>DRONES</p>
                            </a>
                        </li>
                        <li>
                            <a class="cont" href="/productos/realidadvirtual/">
                                <img class="fond" src="/wp-content/uploads/2025/05/fondo_rv-scaled-1.webp" alt="" />
                                <img class="product" src="/wp-content/uploads/2025/05/RV_k5.webp" alt="" />
                                <p>REALIDAD VIRTUAL</p>
                            </a>
                        </li>
                    </ul>

					<button type="button" class="slider-nav"></button>
    				<button type="button" class="slider-nav slider-nav-next"></button>
                </div>
            </div>
        </div>
</div>
<?php endif; ?>
