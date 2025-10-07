<div id="trueke">
      <div class="procedimiento">
        <h1>¿CÓMO <span>FUNCIONA?</span></h1>
        <div class="cards">
          <div>
            <div class="im">
				<img src="/wp-content/uploads/2025/01/trueke-1.webp" alt="" />
			  </div>
            <p><span>Visítanos en</span><br>nuestra tienda en Miraflores</p>
          </div>
			<div>
           <div class="im">
				<img src="/wp-content/uploads/2025/01/trueke-2.webp" alt="" />
			  </div>
            <p><span>Entrega tu Impresora 3D</span><br>antigua para una evaluación</p>
          </div>
          <div>
           <div class="im">
				<img src="/wp-content/uploads/2025/01/trueke-pago-2.webp" alt="" />
			  </div>
            <p><span>Te daremos el valor</span><br>como parte de pago</p>
          </div>
          <div>
            <div class="im">
				<img src="/wp-content/uploads/2025/01/trueke-4.webp" alt="" />
			  </div>
            <p><span>Elige tu nueva Impresora 3D</span><br>disponible dentro del plan</p>
          </div>
          <div>
          <div class="im">
				<img src="/wp-content/uploads/2025/01/trueke-5.webp" alt="" />
			  </div>
            <p><span>¡Y Trueke listo!</span><br>Renueva tu Impresora 3D</p>
          </div>
        </div>
      </div>
	<div class="equipos">
		<div class="par">
			<p>ENCUENTRA TU <span><br>IMPRESORA 3D</span></p>
			<p>¿Ya sabes con qué equipo hacer el Trueke? Aquí te dejamos el listado disponible y las características principales.</p>
		</div>  
		<div class="selector">
			<div class="sel fdm">
				<img id="fdm-img" src="" alt="">
				<label for="fdm-select" id="fdm-label"></label>
				<select id="fdm-select" name="fdm-products">
				<?php
				$fdm_products = wc_get_products([
					'category' => ['fdm'],
					'limit' => -1,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => [
						[
							'taxonomy' => 'pwb-brand',
							'field'    => 'slug',
							'terms'    => ['ankermake', 'anycubic', 'apexmaker', 'artillery', 'bambu-lab', 'creality', 'elegoo', 'flashforge', 'flsun', 'kingroon', 'phrozen', 'qiditech', 'sovol', 'twotrees', 'uniformation', 'voron-ldo']
						]
					],
					'post_status' => 'publish'
				]);
				foreach ($fdm_products as $product) {
					if ($product->get_stock_status() != 'instock' && $product->get_backorders() != 'notify') {
						continue; 
					}
					$CF_techSpecs = get_field('impresora_3d_fdm', $product->get_id());
					$CF_techSpecsObject = get_field_object('impresora_3d_fdm', $product->get_id());
					$specs = isset($CF_techSpecsObject['value']) ? array_slice($CF_techSpecsObject['value'], 0, 3) : [];
					$specsText = ''; 
					foreach ($specs as $key => $value) {
						$specsText .= $key . ': ' . $value . '<br>';
					}

					echo "<option value='" . $product->get_id() . "' data-img='" . wp_get_attachment_url($product->get_image_id()) . "' data-price='" . $product->get_price() . "' data-specs='$specsText'>" . $product->get_name() . "</option>";
				}
				?>
				</select>
			</div>
			<div id="fdm-specs" class="specs"></div>
			
			<div class="sel lcd">
				<img id="lcd-img" src="" alt="">
				<label for="lcd-select" id="lcd-label"></label>
				<select id="lcd-select" name="lcd-products">
				<?php
				$lcd_products = wc_get_products([
					'category' => ['lcd'],
					'limit' => -1,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => [
						[
							'taxonomy' => 'pwb-brand',
							'field'    => 'slug',
							'terms'    => ['ankermake', 'anycubic', 'apexmaker', 'artillery', 'bambu-lab', 'creality', 'elegoo', 'flashforge', 'flsun', 'kingroon', 'phrozen', 'qiditech', 'sovol', 'twotrees', 'uniformation', 'voron-ldo']
						]
					],
					'post_status' => 'publish'
				]);
				foreach ($lcd_products as $product) {
					if ($product->get_stock_status() != 'instock' && $product->get_backorders() != 'notify') {
						continue;
					}
					$CF_techSpecs = get_field('impresora_3d_resina', $product->get_id());
					$CF_techSpecsObject = get_field_object('impresora_3d_resina', $product->get_id());
					$specs = isset($CF_techSpecsObject['value']) ? array_slice($CF_techSpecsObject['value'], 0, 3) : [];
					$specsText = ''; 
					foreach ($specs as $key => $value) {
						$specsText .= $key . ': ' . $value . '<br>';
					}
					echo "<option value='" . $product->get_id() . "' data-img='" . wp_get_attachment_url($product->get_image_id()) . "' data-price='" . $product->get_price() . "' data-specs='$specsText'>" . $product->get_name() . "</option>";
				}
				?>
				</select>
			</div>
			<div id="lcd-specs" class="specs"></div>
		</div>
	</div>
<div class="niveles">
        <h1>NIVELES DE <span>TRUEKE</span></h1>
        <p>
          Conoce el rango de descuento que obtendrás por tu impresora 3D antigua y después de la evaluación te daremos el valor final que te servirá como parte de pago.
        </p>
        <div class="nivs">
          <div class="niv">
            <p>NIVEL 1</p>
            <p>
              Impresoras 3D en buenas condiciones, capaces de generar impresiones 3D y con detalles de uso menores.
            </p>
            <p><span>DESCUENTO</span>S/300 - S/500</p>
          </div>
          <div class="niv">
            <p>NIVEL 2</p>
            <p>
              Impresoras 3D funcionales, pero no producen impresiones de buena calidad y requieren mantenimiento correctivo.
            </p>
            <p><span>DESCUENTO</span>S/100 - S/300</p>
          </div>
          <div class="niv">
            <p>NIVEL 3</p>
            <p>
              Impresoras 3D con daños graves que impiden su funcionamiento y cuya reparación supera el valor del equipo.
            </p>
            <p><span>DESCUENTO</span>S/10 - S/100</p>
          </div>
          <div class="niv">
            <p>NIVEL 4</p>
            <p>
              Impresoras 3D en cualquier grado que quieras donar para proyectos sociales a través de una ONG.
            </p>
            <p>DONACIÓN</p>
          </div>
        </div>
      </div>
	<div class="ong">
        <img src="/wp-content/uploads/2025/01/ban-dona.webp" alt="" />
        <div class="txts">
          <img src="/wp-content/uploads/2025/01/logo-aca1.webp" alt="" />
          <p>Dona, Recicla y Ayuda</p>
          <p>Al donar con nosotros, reduces residuos y extiendes la vida útil de los equipos, contribuyendo a cuidar el medio ambiente.</p>
          <p>Al mismo tiempo, tus donaciones apoyan a comunidades vulnerables, brindando ayuda real a quienes más lo necesitan.</p>
          <p>
            Las impresoras 3D que recaudamos serán entregadas a la ONG <span>A
            Caminar</span>, para brindar a niños y niñas en situación de pobreza la
            oportunidad de explorar y conocer el mundo 3D o por medio de su
            reciclaje se puede disminuir la contaminación de nuestro ecosistema
            y apoyar proyectos sociales.
          </p>
        </div>
      </div>
  </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function selectFirstValidOption(selectId) {
        const select = document.getElementById(selectId);
        for (let option of select.options) {
            if (option.value.trim() !== "") {
                select.value = option.value;
                select.dispatchEvent(new Event("change"));
                break;
            }
        }
    }

    function handleSelectChange(selectId, imgId, labelId, specsId) {
        const select = document.getElementById(selectId);
        const img = document.getElementById(imgId);
        const label = document.getElementById(labelId);
        const specs = document.getElementById(specsId);

        function formatKey(key) {
            const keyMap = {
                'volumen_de_impresion': 'Volumen de impresión',
                'resolucion_de_capa': 'Resolución de capa',
                'velocidad_maxima': 'Velocidad máxima',
                'resolucion_xy': 'Resolución XY'
            };
            return keyMap[key.trim()] || key;
        }

        select.addEventListener("change", function() {
            const selectedOption = select.options[select.selectedIndex];
            const imgSrc = selectedOption.getAttribute("data-img");
            const productPrice = selectedOption.getAttribute("data-price");
            const productSpecs = selectedOption.getAttribute("data-specs");

            img.src = imgSrc || '';
            label.textContent = productPrice ? `S/ ${Math.round(productPrice)}` : '';
            specs.innerHTML = '';

            if (productSpecs) {
                const specsArray = productSpecs.split('<br>');
                specsArray.forEach(function(spec) {
                    const [key, value] = spec.split(':');
                    if (key && value) {
                        const specDiv = document.createElement('div');
                        specDiv.classList.add('spec');
                        const keyP = document.createElement('p');
                        keyP.classList.add('spec-key');
                        keyP.textContent = formatKey(key.trim());
                        const valueP = document.createElement('p');
                        valueP.classList.add('spec-value');
                        valueP.textContent = value.trim();
                        specDiv.appendChild(keyP);
                        specDiv.appendChild(valueP);
                        specs.appendChild(specDiv);
                    }
                });
            }
        });
    }

    handleSelectChange("fdm-select", "fdm-img", "fdm-label", "fdm-specs");
    handleSelectChange("lcd-select", "lcd-img", "lcd-label", "lcd-specs");
    selectFirstValidOption("fdm-select");
    selectFirstValidOption("lcd-select");
});

</script>
