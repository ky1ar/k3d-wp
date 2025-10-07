<?php
function beneficios() {
    ob_start();
    ?>
    <diV id="beneficiosPage">
        <div class="sectionOne">
            <div class="wrapper">
                <img width="240" src="/wp-content/uploads/2025/01/new-logo-beneficios-25-scaled.webp"/>
                <div>
                    <p>Tus compras se convierten en puntos para acceder a distintos niveles de experiencia y así obtener más descuentos. Iniciarás siendo un Novato y te esperarán muchos retos para subir de nivel.</p>
                    <p>¡Qué esperas para a ser un Máster!</p>
                </div>
            </div>
        </div>
        
        <div class="sectionTwo">
            <div class="title">
                <h2>Niveles de Experiencia</h2>
            </div>

            <div class="wrapper">
                <div class="thermometer">
                    <div class="toogleDot active" data-width="100" data-content="novato">
                        <div class="orange"></div>

                        <div class="showActive">
                            <div class="white"></div>
                        </div>

                        <div class="contentBox">
                            <img src="/wp-content/uploads/2023/10/s0.svg" alt="SVG"/>
                            <span>Novato</span>
                        </div>

                        <div class="arrow"></div>
                    </div>

                    <div class="toogleDot" data-width="66.66" data-content="maker">
                        <div class="orange"></div>

                        <div class="showActive">
                            <div class="white"></div>
                        </div>

                        <div class="contentBox">
                            <img src="/wp-content/uploads/2023/10/s2.svg" alt="SVG"/>
                            <span>Maker</span>
                        </div>

                        <div class="arrow"></div>
                    </div>

                    <div class="toogleDot" data-width="33.33" data-content="pro">
                        <div class="orange"></div>

                        <div class="showActive">
                            <div class="white"></div>
                        </div>

                        <div class="contentBox">
                            <img src="/wp-content/uploads/2023/10/s3.svg" alt="SVG"/>
                            <span>Pro</span>
                        </div>

                        <div class="arrow"></div>
                    </div>

                    <div class="toogleDot" data-width="0" data-content="master">
                        <div class="orange"></div>

                        <div class="showActive">
                            <div class="white"></div>
                        </div>

                        <div class="contentBox">
                            <img src="/wp-content/uploads/2023/10/s4.svg" alt="SVG"/>
                            <span>Máster</span>
                        </div>

                        <div class="arrow"></div>
                    </div>

                    <div class="background">
                        <span></span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sectionThree">
            <div class="wrapper">
                <div id="novato" class="content active">
                    <div class="left">
                        <span>1 - 2000 puntos</span>
                        <b>Novato</b>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 5.00</b> en Filamentos o Resinas.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="maker" class="content">
                    <div class="left">
                        <span>2001 - 5000 puntos</span>
                        <b>Maker</b>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 5.00</b> en Filamentos o Resinas.</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 20.00</b> en equipos.<br> (Impresoras 3D, Laser, CNC y Escaner 3D)</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="pro" class="content">
                    <div class="left">
                        <span>5001 - 10000 puntos</span>
                        <b>Pro</b>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 10.00</b> en Filamentos o Resinas.</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 30.00</b> en equipos. <br>(Impresoras 3D, Laser, CNC y Escaner 3D)</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/serv.svg" alt="SVG"/>
                                <p><b>01</b> Servicio de armado gratuito en equipos.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="master" class="content">
                    <div class="left">
                        <span>Más de 10 000 puntos</span>
                        <b>Máster</b>
                    </div>
                    <div class="right">
                        <ul>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 10.00</b> en Filamentos o Resinas.</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 10.00</b> en Upgrades y Repuestos.</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/coup.svg" alt="SVG"/>
                                <p>Cupón de descuento de <b>S/ 50.00</b> en equipos. <br>(Impresoras 3D, Laser, CNC y Escaner 3D)</p>
                            </li>
                            <li>
                                <img src="/wp-content/uploads/2023/10/serv.svg" alt="SVG"/>
                                <p><b>01</b> Servicio de armado gratuito en equipos.<br><b>01</b> Servicio de mantenimiento preventivo gratuito.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sectionFour">
            <div class="wrapper">
                <div class="left">
                    <p>Desbloquea más beneficios siendo parte de</p>
                    <h3>KREAR 3D <img src="/wp-content/uploads/2024/11/prime-logo-white.webp"></h3>
                </div>
                <div class="right">
                    <a href="/prime">Únete Aquí</a>
                </div>
            </div>
        </div>
        
        <div class="bnf-fiv">
            <div class="wrapper">
                <div class="fiv-flx">
                    <div class="fiv-cnt">
                        <span><i>1</i></span>
                        <div>
                            <h3>Regístrate</h3>
                            <p>en nuestra página y forma parte del programa.</p>
                        </div>
                    </div>
                    <div class="fiv-cnt">
                        <span><i>2</i></span>
                        <div>
                            <h3>Acumula</h3>
                            <p>puntos con todas tus compras a Krear 3D.</p>
                        </div>
                    </div>
                    <div class="fiv-cnt">
                        <span><i>3</i></span>
                        <div>
                            <h3>Consigue</h3>
                            <p>increíbles descuentos y beneficios exclusivos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="ky1-nrf">
            <div class="rff-frm">
                <div class="wrapper">
                    <div class="frm-lft">
                        <div>
                            <p>Regístrate</p>
                            <span>AQUÍ</span>
                        </div>
                    </div>
                    <div class="frm-rgt"><?php echo do_shortcode('[contact-form-7 id="17992" title="Beneficios"]'); ?></div>
                </div>
            </div>

            <div class="rff-img">
                <div class="rff-tt2"><h2>PUNTOS EXTRA</h2></div>
                <ul class="wrapper">
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/facebook-logo-b.webp" width="32" height="32" alt="Arrow">                          
                        <p>Síguenos en Facebook<br><b>100 puntos</b></p>
                        <span>Krear 3D</span>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/instagram-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Síguenos en Instagram<br><b>100 puntos</b></p>
                        <span>@krear3d_peru</span>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/tiktok-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Síguenos en Tik Tok<br><b>100 puntos</b></p>
                        <span>@krear3d_peru</span>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/threads-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Síguenos en Threads<br><b>100 puntos</b></p>
                        <span>@krear3d_peru</span>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/x-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Síguenos en X<br><b>100 puntos</b></p>
                        <span>@krear3d_peru</span>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/facegroup-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Síguenos en nuestro grupo de Facebook<br><b>100 puntos</b></p>
                        <span>Impresoras 3D Perú</span>
                    </li>
                </ul>
                <ul class="wrapper">
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/whatsapp-logo-b3.webp" width="32" height="32" alt="Arrow">
                        <p>Únete a nuestro canal de Whatsapp<br><b>100 puntos</b></p>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/opinion-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Deja una reseña en nuestra Web<br><b>100 puntos</b></p>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/googleop-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Deja una reseña en Google<br><b>200 puntos</b></p>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/cumple-logo-b4.webp" width="32" height="32" alt="Arrow">
                        <p>Cumpleaños<br><b>200 puntos</b></p>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/estudiante-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Bono para estudiantes<br><b>200 puntos</b></p>
                    </li>
                    <li>
                        <img class="qst-arr" src="/wp-content/uploads/2024/10/afiliados-logo-b.webp" width="32" height="32" alt="Arrow">
                        <p>Refiere a un amigo +1<br><b>300 puntos</b></p>
                    </li>
                </ul>
            </div>
            <div class="bnf-qst">
                <div class="wrapper">
                    <div class="qst-cnt">
                        <h3>Preguntas Frecuentes</h3>
                        <ul>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cómo funcionan los puntos?</h4>
                                    <p>Tus compras se convierten en puntos para acceder a distintos niveles y así obtener más descuentos. ¡Conforme vayas ganando más experiencia hasta el nivel Master, podrás acceder a más beneficios y descuentos!</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cuántos puntos me dan las compras?</h4>
                                    <p>El monto de tus compras se convertirá en puntos, cada Sol de compra es igual a un punto (1 Sol = 1punto).</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cuáles son los beneficios?</h4>
                                    <p>Existen diferentes beneficios en cada nivel de experiencia que vas alcanzando. Puedes tener desde descuentos de 50 soles hasta servicios de mantenimiento y armado gratis.</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Los puntos tienen fecha de vencimiento?</h4>
                                    <p>Sí tienen una fecha límite y puedes revisar todos los detalles en los Términos y Condiciones del Programa de Beneficios Krear 3D.</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cómo referir a un amigo? </h4>
                                    <p>¡Lo bueno se comparte! Para referir a un amigo, deberás ser un cliente previo de Krear3D y parte del Programa de Beneficios. Asegúrate de brindarle a tu amigo tu nombre completo y tu DNI. Con ello, podrá acercarse a nuestra tienda, hacer su compra y brindar tus datos. Así, te asignaremos los puntos correspondientes como recompensa por recomendarnos.</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cómo obtener el bono de estudiante?</h4>
                                    <p>Si eres estudiante, puedes acceder automáticamente a 200 puntos dentro del Programa de Beneficios. Para ello, nos deberás enviar una constancia de estudios como un carné de educación superior, un reporte de notas, una constancia de matrícula, etc.</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                            <li>
                                <div class="qst-itm">
                                    <h4>¿Cómo obtener puntos por mi cumpleaños?</h4>
                                    <p>¡Krear3D te regala 200 puntos durante el mes de tu cumpleaños! Para poder acceder a ellos, solo deberás hacer una compra y envíar una foto de tu DNI a alguno de nuestros representantes comerciales. Recuerda que los puntos tienen fecha de caducidad.</p>
                                    <img class="qst-arr" src="/wp-content/uploads/2023/10/arw1.svg" width="16" height="16" alt="Arrow">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".toogleDot").forEach(function(dot) {
                        dot.addEventListener("click", function() {
                            document.querySelectorAll('.toogleDot').forEach(function(dot) {
                                dot.classList.remove('active');
                            });

                            document.querySelectorAll('.content').forEach(function(cnt) {
                                cnt.classList.remove('active');
                            });

                            dot.classList.add('active');
                            const width = dot.getAttribute("data-width");
                            const content = dot.getAttribute("data-content");

                            document.getElementById(content).classList.add('active');
                            document.querySelector('.line').style.right = `${width}%`;
                        });
                    });

                    document.querySelectorAll(".qst-itm").forEach(function(item) {
                        item.addEventListener("click", function() {
                            var p = item.querySelector("p");
                            if (p.style.display === "none" || p.style.display === "") {
                                p.style.display = "block";
                            } else {
                                p.style.display = "none";
                            }
                        });
                    });

                    document.querySelector('.wpcf7').addEventListener('submit', function() {
                        if (document.querySelector(".ajax-loader").classList.contains("is-active")) {
                            var submitButton = document.querySelector('input[type="submit"]');
                            submitButton.setAttribute('disabled', 'disabled');
                            setTimeout(function() {
                                submitButton.removeAttribute('disabled');
                            }, 5000);
                        }
                    });
                });
            </script>
        </div>
    </div>
    <?php return ob_get_clean();
}


function PRIME() {
	ob_start();
	?>
	<div id="prime-pagek3d">
      <div class="pasos">
        <div class="ps1">
          <p>
            ¿CÓMO SOY <br><img src="/wp-content/uploads/2024/11/prime-logo-white.webp" alt="">?
          </p>
          <p>
            Aquí encontrarás el paso a paso de como suscribirte<br> y aprovechar todos los beneficios.
          </p>
        </div>
        <div class="ps2">
          <div class="line"></div>
          <div class="n">
            <p>1</p>
            <div>
			<p>Paso 1</p>
            <p>Selecciona el plan de tu preferencia teniendo en cuenta los beneficios, marcas, precios y dale clic en ¡Hazte Prime!</p>
			</div>
          </div>
          <div class="n">
            <p>2</p>
			  <div>
            <p>Paso 2</p>
            <p>Serás redirigido a una interfaz donde deberás completar tus datos e introducir la información de tu tarjeta de crédito o débito para suscribirte.</p>
			  </div>
          </div>
          <div class="n">
            <p>3</p>
			  <div>
				<p>Paso 3</p>
            	<p>Recibirás un correo de bienvenida con el que podrás ponerte en contacto con un asesor comercial para aplicar tus beneficios.</p>
			  </div>
          </div>
        </div>
      </div>
      <div class="benef">
        <div class="content-b">
          <div>
            <img src="/wp-content/uploads/2024/11/prime-bono1.webp" alt="" />
            <p>Kit de Bienvenida</p>
            <p>al programa prime</p>
          </div>
          <div>
            <img src="/wp-content/uploads/2024/11/prime-bono2.webp" alt="" />
            <p>Descuentos especiales</p>
            <p>en insumos</p>
          </div>
		  <div>
            <img src="/wp-content/uploads/2024/11/prime-cumple.webp" alt="" />
            <p>Bono</p>
            <p>de cumpleaños</p>
          </div>
          <div>
            <img src="/wp-content/uploads/2024/11/prime-pas6z1.webp" alt="" />
            <p>Entregas</p>
            <p>prioritarias</p>
          </div>
          <div>
            <img src="/wp-content/uploads/2024/11/prime-bono4.webp" alt="" />
            <p>Mantenimiento</p>
            <p>gratuito</p>
          </div>
        </div>
      </div>
      <div class="planes">
        <p class="title">PLANES PRIME</p>
        <p class="sub">
          Elige el <span>mejor plan</span> y sé parte de nuestra comunidad
          <span>¡KREAR 3D PRIME!</span>
        </p>
        <div class="change">
          <button id="btn-monthly" class="select">Pago mensual</button>
          <button id="btn-annual">Pago anual</button>
        </div>
        <div class="op">
          <div class="card" id="plan-monthly-1">
            <p>Plan Lite</p>
            <p>por mes</p>
            <p>S/10.00</p>
            <a href="https://subscriptions.culqi.com/onboarding?id=88ec7570-c8cb-46b7-9b45-d5178bd78458" target="_blank">¡Hazte Prime!</a>
            <p>y disfruta de los beneficios.</p>
          </div>
          <div class="card" id="plan-monthly-2">
            <p>Plan Full</p>
            <p>por mes</p>
            <p>S/20.00</p>
            <a href="https://subscriptions.culqi.com/onboarding?id=1672484e-ccee-4a28-b87e-4043c51caf0b" target="_blank">¡Hazte Prime!</a>
            <p>y disfruta de los beneficios.</p>
          </div>
          <div class="card" id="plan-annual-1">
            <p>Plan Lite</p>
            <p>por año</p>
            <p>S/100.00</p>
            <a href="https://subscriptions.culqi.com/onboarding?id=275a08d9-a846-451b-b485-449d9aa525fe" target="_blank">¡Hazte Prime!</a>
            <p>(incluye 2 meses gratis)</p>
          </div>
          <div class="card" id="plan-annual-2">
            <p>Plan Full</p>
            <p>por año</p>
            <p>S/200.00</p>
            <a href="https://subscriptions.culqi.com/onboarding?id=79574840-afe9-45c1-a87d-f88a0af63360" target="_blank">¡Hazte Prime!</a>
            <p>(incluye 2 meses gratis)</p>
          </div>
        </div>
      </div>
	<div class="compare">
		<p>Compara <br>nuestros planes</p>
        <table>
          <tr>
            <th></th>
            <th>Plan Lite</th>
            <th>Plan Full</th>
          </tr>
          <tr>
            <td>Kit de Bienvenida</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Bono de Cumpleaños</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Descuento del 10% en Filamentos</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Descuento del 10% en Resinas</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Descuento del 5% en Repuestos</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Descuento del 5% en Upgrades</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Entregas prioritarias</td>
            <td>-</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
          <tr>
            <td>Mantenimiento Gratuito Anual</td>
            <td>-</td>
            <td>
              <img src="/wp-content/uploads/2024/11/check-prime.webp" alt="" />
            </td>
          </tr>
        </table>
    </div>	
    <div class="desc-planes">
        <div class="text">
          <p>MARCAS</p>
          <p>
            Con las que podrás<br />
            disfrutar los descuentos,<br />
            precios especiales y muchos<br />
            más...
          </p>
        </div>
        <div class="marcas">
          <p class="tfull">Plan Full</p>

          <div class="plan-lite">
            <p class="tlite">Plan Lite</p>
            <img src="/wp-content/uploads/2024/08/k3dlogo.webp" alt="" />
            <img src="/wp-content/uploads/2024/08/krear3dlogo.webp" alt="" />
          </div>
          <div>
            <img src="/wp-content/uploads/2024/08/anycubiclogo.webp" alt="" />
            <img src="/wp-content/uploads/2024/08/esunlogo.webp" alt="" />
            <img src="/wp-content/uploads/2024/10/logo-panchroma.svg" alt="" />
            <img src="/wp-content/uploads/2024/08/polymakerlogo.webp" alt="" />
            <img src="/wp-content/uploads/2024/07/sunlu.png" alt="" />
            <img src="/wp-content/uploads/2024/08/phrozenlogo.webp" alt="" />
          </div>

          <div>
            <img src="/wp-content/uploads/2024/08/bambu.webp" alt="" />
            <img src="/wp-content/uploads/2024/08/elegoologo.webp" alt="" />
            <img src="/wp-content/uploads/2024/08/crealityLogo.webp" alt="" />
          </div>
        </div>
      </div>
      <div class="preguntas">
        <h1>PREGUNTAS FRECUENTES</h1>
		<div class="pregcon">
        <div class="sec">
			<div class="cont">
          <div class="quest">
            <p>¿Qué es Krear 3D Prime?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            Krear 3D Prime es nuestro programa de beneficios exclusivos que ofrece descuentos especiales, entregas prioritarias, mantenimiento gratuito y más.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>¿Cómo me suscribo a los planes de Krear 3D Prime?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            Ingresa a <a href="https://www.tiendakrear3d.com/">www.tiendakrear3d.com</a>, selecciona en el menú la opción <strong>PRIME</strong>, y sigue los pasos de suscripción a través de Culqi.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>¿Cuánto cuesta la membresía de Krear 3D Prime?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            El costo de la membresía se detalla en nuestra web. Puedes optar por
            suscripciones mensuales o anuales según prefieras.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>
              ¿Puedo cancelar mi suscripción de Krear 3D Prime en cualquier
              momento?
            </p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            Sí, puedes cancelar tu suscripción en cualquier momento siguiendo estos pasos:
			  <ul style="margin-top: 1rem;">
				  <li>1. Accede al correo de bienvenida o a cualquier correo relacionado con el cobro de tu plan.</li>
				  <li>2. Localiza la sección titulada "Dar de baja tu plan".</li>
				  <li>3. Haz clic en el enlace correspondiente, el cual te llevará a una página donde deberás presionar el botón "Cancelar mi suscripción".</li>
				  <li>4. Finalmente, recibirás un correo electrónico que confirmará la cancelación de tu plan.</li>
			  </ul>
          </div>
        </div>
			<div class="cont">
          	<div class="quest">
            <p>
              ¿Cómo utilizar los beneficios o descuentos de tu suscripción Prime?
            </p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          	</div>
          	<div class="resp">
            Comunícate con un asesor comercial para que te ayude a aplicar tus descuentos con cupones para compras por la web, cotizaciones con link de pago o resolver cualquier consulta que tengas en tienda.
          	</div>
        	</div>
		</div>
        <div class="sec">
			<div class="cont">
          <div class="quest">
            <p>¿La suscripción se renueva automáticamente?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            Sí, la suscripción se renueva de formar automática según tu plan mensual o anual.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>¿Puedo compartir mi membresía Prime con alguien más?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            La membresía Krear 3D Prime es personal y no es transferible a otras
            cuentas.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>¿Qué métodos de pago aceptan para el plan Prime?</p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">
            Aceptamos solo tarjetas de crédito y débito a través de nuestro partner Culqi.
          </div>
        </div>
        <div class="cont">
          <div class="quest">
            <p>
              ¿Recibo alguna notificación de los pagos de mi suscripción?
            </p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          </div>
          <div class="resp">Sí, recibirás un correo con el concepto y monto del plan cobrado a la tarjeta registrada.</div>
        </div>
			
			<div class="cont">
          	<div class="quest">
            <p>
              ¿Es seguro suscribirme con los datos de mi tarjeta?
            </p>
            <img
              src="/wp-content/uploads/2024/11/down-act.webp"
              alt=""
            />
          	</div>
          	<div class="resp">
            Sí, la interfaz con la que hemos integrado Krear 3D Prime es Culqi, que cuenta con el respaldo de Credicorp. No se te cobrará ningún otro concepto ni monto adicional al de tu plan y podrás darte de baja en el momento que desees.
          	</div>
        	</div>
		</div>
		</div> 
      </div>
    </div>
<?php return ob_get_clean();
}

function sorteos() {
    ob_start();
    $header = get_field( 'sorteo_header' );
    $sorteos = get_field( 'sorteo' );
    ?>
    <div id="ky1-nrf">
        <div class="rff-hdr">
            <div class="wrapper">
                <div class="swiffy-slider slider-item-show2  slider-nav-chevron slider-nav-dark slider-nav-outside slider-nav-visible" id="swiffy-animation">
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
                                        <h2 style="padding-right: 40px;"><?= $principal['titulo'] ?></h2>
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
                            <h1 style="white-space: nowrap;"><?= $principal['titulo'] ?></h1>
                             <p><?= $principal['texto'] ?></p>
							  <ul>
								<?php foreach ( $premios as $premio ): ?>
									<?php
									$es_manual = !empty($premio['mostrar_como_manual']);
									if ( $es_manual ) {
										$image = [ $premio['imagen_manual'] ]; // Asumimos que es URL
										$brand_src = [ $premio['marca_manual'] ]; // Asumimos que es URL
										$link = '#'; // Sin enlace en modo manual
									} else {
										$prz_prd = $premio['producto'];
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $prz_prd->ID ), [300, 300], true );
										$link = get_permalink( $prz_prd->ID );

										$brands = wp_get_post_terms( $prz_prd->ID, 'pwb-brand' );
										$brand = $brands[0] ?? null;
										$brand_src = [''];
										if ( $brand ) {
											$brand_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
											$brand_src = wp_get_attachment_image_src( $brand_id, 'wc_pwb_admin_tab_brand_logo_size', true );
										}

										// Excepciones sin enlace (ya sin "pre.")
										$excepciones = [
											'https://tiendakrear3d.com/?post_type=product&p=21600',
											'https://tiendakrear3d.com/?post_type=product&p=21604',
										];
										if ( in_array($link, $excepciones) ) {
											$link = '#';
										}
									}
									?>
									<li>
										<?php if ( !$es_manual ): ?>
											<a href="<?= esc_url($link) ?>" class="prz-lnk">
												<div class="prz-box">
													<?php if ( !empty($brand_src[0]) ) : ?>
														<img height="32" class="prz-brd" src="<?= esc_url($brand_src[0]) ?>" />
													<?php endif; ?>
													<?php if ( !empty($image[0]) ) : ?>
														<img width="192" height="192" class="prz-img" src="<?= esc_url($image[0]) ?>" />
													<?php endif; ?>
												</div>
											</a>
										<?php else: ?>
											<div class="prz-lnk">
												<div class="prz-box">
													<?php if ( !empty($brand_src[0]) ) : ?>
														<img height="32" class="prz-brd" src="<?= esc_url($brand_src[0]) ?>" />
													<?php endif; ?>
													<?php if ( !empty($image[0]) ) : ?>
														<img width="192" height="192" class="prz-img" src="<?= esc_url($image[0]) ?>" />
													<?php endif; ?>
												</div>
											</div>
										<?php endif; ?>

										<h2>
											<?php if ( !$es_manual ): ?>
												<a href="<?= esc_url($link) ?>"><?= esc_html($premio['titulo']) ?></a>
											<?php else: ?>
												<?= esc_html($premio['titulo']) ?>
											<?php endif; ?>
										</h2>
										<p><?= esc_html($premio['texto']) ?></p>
									</li>
								<?php endforeach; ?>
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
                    <?php
                    if ( $frm != '' ):
                    ?>
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
                    <?php 
                    endif;
                    ?>
                </div>
                <?php
                $init = false;
            endif;
        endforeach;
        ?>
    
        <div class="rff-bar">
            <div class="rff-bar-txt"><span>¡Atentos a los próximos sorteos!</span></div>
        </div>
        
    </div>
        <script>
            jQuery(function($) {
                $( '.wpcf7' ).on( 'submit.wpcf', function(){
                if ( $( ".ajax-loader" ).hasClass( "is-active" )) {
                    $( 'input[type="submit"]' ).attr( 'disabled', 'disabled' );
                    setTimeout( function() {
                    $( 'input[type="submit"]' ).removeAttr( 'disabled' );
                    },5000);
                }
                });
            
        
                $( ".rff-exp" ).click(function() {
                    $( this ).prev().toggleClass( "exp-act" );
        
                    if ($( this ).children().children().first().text() == "Ver menos")
                        $( this ).children().children().first().text("Ver más");
                    else
                        $( this ).children().children().first().text("Ver menos");
                });
                
                $( ".rff-box" ).click(function() {
                    $( '.rff-box' ).removeClass('rff-act');
                    $( this ).addClass('rff-act');
                    
                    $( '.rff-unq' ).hide();
                    var unq = $( this ).data('slug');
                    $( '#'+unq ).show();
                    $('html, body').animate({
                        scrollTop: $('#'+unq).offset().top
                    }, 200);
                });
            });
        </script>
    </div>
    <?php return ob_get_clean();
}


function affiliate_dashboard() {
    echo do_shortcode('[yith_wcaf_affiliate_dashboard]');
}

function brands() {
    $taxonomies = get_terms( array(
        'taxonomy' => 'pwb-brand',
        'hide_empty' => true
    ) );

    if (empty($taxonomies)) {
        return;
    }

    $dat = '';
    $nav = '';
    $let = '';
    $str = 0;

    foreach( $taxonomies as $category ) {
        if ($category->slug == 'xyzprinting' || $category->slug == 'hp') {
            continue;
        }

        $cur_brd = $category->name;
        $cur_let = strtoupper(substr($cur_brd, 0, 1));

        if ( $let != $cur_let ) {
            $let = $cur_let;
            if ( ctype_digit ( $let ) ) {
                $nav .= '<a href="/marcas/#0">#</a> ';
            } else {
                $nav .= '<a href="/marcas/#' .$let. '"> ' .$let. '</a> ';
            }

            if ($str != 0) {
                $dat .= '</div></div>';
            }

            if ( ctype_digit ( $let ) ) {
                $dat .= '<div class="letterBlock" id="0">
                <span>#</span>
                <div class="content">';
            } else {
                $dat .= '<div class="letterBlock" id="' .$let. '">
                    <span>' .$let. '</span>
                    <div class="content">';
            }
        }

        $brandID = $category->term_id;
        $brandLogos = get_field('logos', 'pwb-brand_' . $brandID);
        $logo = $brandLogos['logo'];
        $size = $brandLogos['size'];

        $dat .= '<a href="/marca/'.$category->slug. '">
                    <img height="32" style="width: '.$size.'%;" src="'.$logo.'" alt="">
                </a>';
        $str++;
    }
    $dat .= '</div></div>';

    $brandSelectorHtml = '
        <section id="brandSelector">
            <div class="wrapper">
                <div class="header">
                    <h3>Amplia variedad de <span>Marcas</span></h3>
                    <p>Estos son los principales fabricantes en la tecnología de impresión 3D</p>
                </div>
                <div class="content">' . $nav . '</div>
            </div>
        </section>';

    $brandContentHtml = '
        <section id="allBrands">
            <div class="wrapper">' . $dat . '</div>
        </section>';

    echo $brandSelectorHtml;
    echo $brandContentHtml;
}

function contact() {
    ob_start(); ?>
    <div id="contactPage">
        <div class="wrapper">
            <div class="form">
                <h1>Contáctanos</h1>
                <p>Pronto nuestros asesores se pondrán en contacto contigo.</p>
                <?= do_shortcode('[wpforms id="26518" title="false"]'); ?>
            </div>
            <div id="googleMaps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.8810502352685!2d-77.0217899249377!3d-12.120290388122283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c99f39afdb27%3A0xde1846cd8078d6d2!2sTienda%20Krear%203D%20-%20Impresoras%203D!5e0!3m2!1ses-419!2spe!4v1724121751314!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title=""></iframe>
            </div>
        </div>
    </div>

    <?php return ob_get_clean();
}

function postulaciones() {
    ob_start(); ?>
    <div id="postulaciones">
        <div class="cont">
           <h1>Trabaja con Nosotros</h1>
			<p>En Krear 3D, valoramos la dedicación y el compromiso de quienes desean contribuir al desarrollo de nuestra empresa. Por ello, buscamos personas que compartan nuestra visión y aspiren a crecer profesionalmente mientras fortalecemos juntos nuestro éxito. Si consideras que cuentas con lo necesario para formar parte de nuestro equipo, te invitamos a completar el formulario para considerar tu postulación. ¡Estamos emocionados de conocerte!</p>
				 <div class="post">
                <?= do_shortcode('[wpforms id="28299" title="false"]'); ?>
				  <div class="vacantes">
				  <p>Vacantes Disponibles:</p>
				  <p>Además de los puestos que se muestran a continuación, si tienes interés en otro puesto no listado, puedes indicarlo en el campo <strong>"Puesto al que desea postular"</strong>. Contamos con diversas áreas y nos interesa saber a cuál te gustaría postular.</p>
				  <ul>
					 <li>Soporte 
						<span>1 Vacante</span>
						<p>Resuelve problemas y ofrece asistencia técnica a clientes, asegurando una experiencia positiva y el buen funcionamiento de los servicios.</p>
					</li>
					<li>Logística 
						<span>1 Vacante</span>
						<p>Coordina las entregas y prepara los pedidos para atender a nuestros clientes en el menor tiempo posible..</p>
					</li>
					<li>Ventas 
						<span>1 Vacante</span>
						<p>Conecta con clientes, identifica sus necesidades y ofrece soluciones, construyendo relaciones sólidas para impulsar el negocio.</p>
					</li>
				 </ul>
				 </div>
				</div>
        </div>
    </div>
    <?php return ob_get_clean();
}
function comparar_productos() {
    ob_start(); 
    include 'compare-view.php';
    return ob_get_clean();
}
function rastrear_pedidos() {
    ob_start(); 
    include 'rastrear_pedidos.php';
    return ob_get_clean();
}
function garantia_extendida() {
    ob_start(); 
    include 'garantia_extendida.php';
    return ob_get_clean();
}
function trueke() {
    ob_start(); 
    include 'trueke.php';
    return ob_get_clean();
}
function catalogo() {
    ob_start(); ?>
    <div id="catalogo-k3d">
		<div class="sup">
			<h1>Catálogo <span>Krear 3D</span></h1>
			<p>Líderes en fabricación digital, contamos con el 80% de las marcas más vendidas a nivel mundial.<br> 
Podrás encontrar Impresoras 3D, Filamentos, Resinas, Repuestos, Upgrades, Cortadoras Láser, CNC, Escáneres 3D, Drones y Realidad Virtual.</p>
		</div>
        <div class="libro">
			<?php echo do_shortcode('[3d-flip-book id="28867"]'); ?>
		</div>
		<a class="btn-redr" href="/"><img src="/wp-content/uploads/2024/12/carrito-de-compras-catalogo.webp" alt="">Comprar</a>
    </div>
    <?php return ob_get_clean();
}

$selector = $block['selector'];
$output = '';

switch ($selector) {
    case 'brands':
        $output = brands();
        break;
    case 'sorteos':
        $output = sorteos();
        break;
	case 'catalogo':
        $output = catalogo();
        break;
    case 'beneficios':
        $output = beneficios();
        break;
	case 'PRIME':
        $output = PRIME();
        break;
	case 'postulaciones':
        $output = postulaciones();
        break;
    case 'contact':
        $output = contact();
        break;
	case 'comparar_productos':
        $output = comparar_productos();
        break;
    case 'affiliate_dashboard':
        $output = affiliate_dashboard();
        break;
	case 'rastrear_pedidos':
        $output = rastrear_pedidos();
        break;
	case 'trueke':
        $output = trueke();
        break;
	case 'garantia_extendida':
        $output = garantia_extendida();
        break;
    default:
        break;
}

echo $output;