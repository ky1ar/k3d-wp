<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>

<div id="dashboardUser">
    <div class="ttl-user">
        <h1>Mi Perfil</h1>
    </div>
    <div class="wrapper">
		<div class="dash">
        <?php do_action( 'woocommerce_account_navigation' ); ?>
      <div class="woocommerce-MyAccount-content">
			
		  <div id="section-beneficios" class="section-content" style="display:none;">
			  <div class="logo">
				<img
				  src="/wp-content/uploads/2025/01/new-logo-beneficios-25-scaled.webp"
				  alt="imag"
				/>
			  </div>
			  <p class="intro">
				Tus compras se convierten en puntos para acceder a distintos niveles de
				experiencia y así obtener más descuentos iniciarás siendo un Novato y te
				esperarán muchos retos para subir de nivel. <br />
				¡Qué esperas para ser un Máster!
			  </p>
			  <div class="levels">
				<div class="title">
				  <p>Niveles de Experiencia</p>
				</div>
				<div class="fases">
				  <div class="imas">
					<div class="fase active">
					  <img
						src="/wp-content/uploads/2023/10/s0.svg"
						alt=""
					  />
					  <p>Novato</p>
					</div>
					<div class="fase">
					  <img
						src="/wp-content/uploads/2023/10/s2.svg"
						alt=""
					  />
					  <p>Maker</p>
					</div>
					<div class="fase">
					  <img
						src="/wp-content/uploads/2023/10/s3.svg"
						alt=""
					  />
					  <p>Pro</p>
					</div>
					<div class="fase">
					  <img
						src="/wp-content/uploads/2023/10/s4.svg"
						alt=""
					  />
					  <p>Master</p>
					</div>
				  </div>
				  <div class="bar">
					<span class="backline"></span>
					<div class="circle active">
					  <span class=""></span>
					</div>
					<span class="line"></span>
					<div class="circle">
					  <span></span>
					</div>
					<span class="line"></span>
					<div class="circle">
					  <span></span>
					</div>
					<span class="line"></span>
					<div class="circle">
					  <span></span>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="puntos">
				<div class="title">
				  <p>PUNTOS EXTRA</p>
				</div>
				<div class="redes">
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/facebook-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en Facebook</span>
					<span class="p">100 puntos</span>
					<p class="ref">Krear 3D</p>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/instagram-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en Instagram</span>
					<span class="p">100 puntos</span>
					<p class="ref">@krear3d_peru</p>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/tiktok-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en Tik Tok</span>
					<span class="p">100 puntos</span>
					<p class="ref">@krear3d_peru</p>
				  </div>

				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/threads-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en Threads</span>
					<span class="p">100 puntos</span>
					<p class="ref">@krear3d_peru</p>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/x-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en X</span>
					<span class="p">100 puntos</span>
					<p class="ref">@krear3d_peru</p>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/facegroup-logo-b.webp"
					  alt=""
					/>
					<span class="s">Síguenos en nuestro grupo de Facebook</span>
					<span class="p">100 puntos</span>
					<p class="ref">Impresoras 3D Perú</p>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/whatsapp-logo-b3.webp"
					  alt=""
					/>
					<span class="s">Únete a nuestro canal de Whatsapp</span>
					<span class="p">100 puntos</span>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/opinion-logo-b.webp"
					  alt=""
					/>
					<span class="s">Deja una reseña en nuestra Web</span>
					<span class="p">100 puntos</span>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/googleop-logo-b.webp"
					  alt=""
					/>
					<span class="s">Deja una reseña en Google</span>
					<span class="p">200 puntos</span>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/cumple-logo-b4.webp"
					  alt=""
					/>
					<span class="s">Cumpleaños</span>
					<span class="p">200 puntos</span>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/estudiante-logo-b.webp"
					  alt=""
					/>
					<span class="s">Bono para estudiantes</span>
					<span class="p">200 puntos</span>
				  </div>
				  <div class="red">
					<img
					  class="icon"
					  src="/wp-content/uploads/2024/10/afiliados-logo-b.webp"
					  alt=""
					/>
					<span class="s">Refiere a un amigo +1</span>
					<span class="p">300 puntos</span>
				  </div>
				</div>
			  </div>
			  <div class="link">
				<p>REGÍSTRATE</p>
				<a href="/beneficios/">AQUÍ</a>
			  </div>
			</div>

			<div id="section-prime" class="section-content"  style="display:none;">
				 <div class="pasos">
					<div class="ps1">
					  <p>
						¿CÓMO SOY <br /><img
						  src="/wp-content/uploads/2024/11/prime-logo-white.webp"
						  alt=""
						/>?
					  </p>
					  <p>
						Aquí encontrarás el paso a paso de como suscribirte<br />
						y aprovechar todos los beneficios.
					  </p>
					</div>
					<div class="ps2">
					  <div class="line"></div>
					  <div class="n">
						<p>1</p>
						<div>
						  <p>Paso 1</p>
						  <p>
							Selecciona el plan de tu preferencia teniendo en cuenta los
							beneficios, marcas, precios y dale clic en ¡Hazte Prime!
						  </p>
						</div>
					  </div>
					  <div class="n">
						<p>2</p>
						<div>
						  <p>Paso 2</p>
						  <p>
							Serás redirigido a una interfaz donde deberás completar tus
							datos e introducir la información de tu tarjeta de crédito o
							débito para suscribirte.
						  </p>
						</div>
					  </div>
					  <div class="n">
						<p>3</p>
						<div>
						  <p>Paso 3</p>
						  <p>
							Recibirás un correo de bienvenida con el que podrás ponerte en
							contacto con un asesor comercial para aplicar tus beneficios.
						  </p>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="benef">
					<div class="content-b">
					  <div>
						<img
						  src="/wp-content/uploads/2024/11/prime-bono1.webp"
						  alt=""
						/>
						<p>Kit de Bienvenida</p>
						<p>al programa prime</p>
					  </div>
					  <div>
						<img
						  src="/wp-content/uploads/2024/11/prime-bono2.webp"
						  alt=""
						/>
						<p>Descuentos especiales</p>
						<p>en insumos</p>
					  </div>
					  <div>
						<img
						  src="/wp-content/uploads/2024/11/prime-cumple.webp"
						  alt=""
						/>
						<p>Bono</p>
						<p>de cumpleaños</p>
					  </div>
					  <div>
						<img
						  src="/wp-content/uploads/2024/11/prime-pas6z1.webp"
						  alt=""
						/>
						<p>Entregas</p>
						<p>prioritarias</p>
					  </div>
					  <div>
						<img
						  src="/wp-content/uploads/2024/11/prime-bono4.webp"
						  alt=""
						/>
						<p>Mantenimiento</p>
						<p>gratuito</p>
					  </div>
					</div>
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
						<img
						  src="/wp-content/uploads/2024/08/k3dlogo.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/krear3dlogo.webp"
						  alt=""
						/>
					  </div>
					  <div>
						<img
						  src="/wp-content/uploads/2024/08/anycubiclogo.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/esunlogo.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/10/logo-panchroma.svg"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/polymakerlogo.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/07/sunlu.png"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/phrozenlogo.webp"
						  alt=""
						/>
					  </div>

					  <div>
						<img
						  src="/wp-content/uploads/2024/08/bambu.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/elegoologo.webp"
						  alt=""
						/>
						<img
						  src="/wp-content/uploads/2024/08/crealityLogo.webp"
						  alt=""
						/>
					  </div>
					</div>
				  </div>
				  <div class="redir">
					<a href="/prime/">¡Hazte Prime!</a>
				  </div>
			</div>
			<div id="section-afiliados" class="section-content"  style="display:none;">
				<section class="data1-afi">
				<div class="info">
				  <h1>SÚMATE A ESTA REVOLUCIÓN</h1>
				  <p>
					Si eres youtuber, influencer, profesor o incluso aficionado comienza
					a ganar comisiones vendiendo de forma digital los productos de
					nuestra web entre tus amigos, seguidores o suscriptores con cero
					inversión y sin salir de tu casa. En Krear 3D estamos buscando
					afiliados que compartan nuestra pasión por las impresoras 3D y el
					mundo de la tecnología 3D para ofrecerles los siguientes beneficios:
				  </p>
				</div>

				<div class="cards">
				  <div class="card">
					<img
					  src="/wp-content/uploads/2024/06/respaldo.png"
					  alt=""
					/>
					<h1>COMISIONES Y RESPALDO</h1>
					<p>
					  Vende y gana 5% sobre los pedidos, nosotros nos encargamos del
					  resto (entrega, soporte, garantía, facturación, etc.)
					</p>
				  </div>

				  <div class="card">
					<img
					  src="/wp-content/uploads/2024/06/tec_confiable.png"
					  alt=""
					/>
					<h1>TECNOLOGÍA CONFIABLE</h1>
					<p>
					  Accede al portal exclusivo con reportes y seguimiento de tus
					  clientes por hasta 30 días para que efectúen su compra.
					</p>
				  </div>

				  <div class="card">
					<img
					  src="/wp-content/uploads/2024/06/valor_agregadox1.png"
					  alt=""
					/>
					<h1>VALOR AGREGADO</h1>
					<p>
					  Promociona los productos de Krear 3D para mejorar tu canal, página
					  o red social con tecnologías innovadoras y marcas reconocidas.
					</p>
				  </div>
				</div>
			  </section>
			  <section class="video-ins">
				<iframe
				  id="youtube-video"
				  src="https://www.youtube.com/embed/dREtPFx0a2M?si=no4pT7twNKitC-DR&amp;autoplay=1&amp;mute=1"
				  title="Afiliados Krear3D"
				  frameborder="0"
				  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				  referrerpolicy="strict-origin-when-cross-origin"
				  allowfullscreen=""
				></iframe>
			  </section>
			  <section class="unete">
				<div>
				  <p>¡Únete a nuestro programa!</p>
				  <h1>AHORA</h1>
				</div>

				<div>
				  <a href="/afiliados/"><button>AFÍLIATE AQUÍ</button></a>
				</div>
			  </section>
		  	</div>
		  <div id="section-trueke" class="section-content"  style="display:none;">
		     <div class="procedimiento">
				<h1>¿CÓMO <span>FUNCIONA?</span></h1>
				<div class="cards">
				  <div>
					<div class="im">
					  <img
						src="/wp-content/uploads/2025/01/trueke-1.webp"
						alt=""
					  />
					</div>
					<p><span>Visítanos en</span><br />nuestra tienda en Miraflores</p>
				  </div>
				  <div>
					<div class="im">
					  <img
						src="/wp-content/uploads/2025/01/trueke-2.webp"
						alt=""
					  />
					</div>
					<p>
					  <span>Entrega tu Impresora 3D</span><br />antigua para una
					  evaluación
					</p>
				  </div>
				  <div>
					<div class="im">
					  <img
						src="/wp-content/uploads/2025/01/trueke-pago-2.webp"
						alt=""
					  />
					</div>
					<p><span>Te daremos el valor</span><br />como parte de pago</p>
				  </div>
				  <div>
					<div class="im">
					  <img
						src="/wp-content/uploads/2025/01/trueke-4.webp"
						alt=""
					  />
					</div>
					<p>
					  <span>Elige tu nueva Impresora 3D</span><br />disponible dentro
					  del plan
					</p>
				  </div>
				  <div>
					<div class="im">
					  <img
						src="/wp-content/uploads/2025/01/trueke-5.webp"
						alt=""
					  />
					</div>
					<p><span>¡Y Trueke listo!</span><br />Renueva tu Impresora 3D</p>
				  </div>
				</div>
			  </div>
			  <div class="ong">
				<img
				  src="/wp-content/uploads/2025/01/ban-dona.webp"
				  alt=""
				/>
				<div class="txts">
				  <img
					src="/wp-content/uploads/2025/01/logo-aca1.webp"
					alt=""
				  />
				  <p>Dona, Recicla y Ayuda</p>
				  <p>
					Al donar con nosotros, reduces residuos y extiendes la vida útil de
					los equipos, contribuyendo a cuidar el medio ambiente.
				  </p>
				  <p>
					Al mismo tiempo, tus donaciones apoyan a comunidades vulnerables,
					brindando ayuda real a quienes más lo necesitan.
				  </p>
				  <p>
					Las impresoras 3D que recaudamos serán entregadas a la ONG
					<span>A Caminar</span>, para brindar a niños y niñas en situación de
					pobreza la oportunidad de explorar y conocer el mundo 3D o por medio
					de su reciclaje se puede disminuir la contaminación de nuestro
					ecosistema y apoyar proyectos sociales.
				  </p>
				</div>
			  </div>
			  <div class="niveles">
				<h1>NIVELES DE <span>TRUEKE</span></h1>
				<p>
				  Conoce el rango de descuento que obtendrás por tu impresora 3D antigua
				  y después de la evaluación te daremos el valor final que te servirá
				  como parte de pago.
				</p>
				<div class="nivs">
				  <div class="niv">
					<p>NIVEL 1</p>
					<p>
					  Impresoras 3D en buenas condiciones, capaces de generar
					  impresiones 3D y con detalles de uso menores.
					</p>
					<p><span>DESCUENTO</span>S/300 - S/500</p>
				  </div>
				  <div class="niv">
					<p>NIVEL 2</p>
					<p>
					  Impresoras 3D funcionales, pero no producen impresiones de buena
					  calidad y requieren mantenimiento correctivo.
					</p>
					<p><span>DESCUENTO</span>S/100 - S/300</p>
				  </div>
				  <div class="niv">
					<p>NIVEL 3</p>
					<p>
					  Impresoras 3D con daños graves que impiden su funcionamiento y
					  cuya reparación supera el valor del equipo.
					</p>
					<p><span>DESCUENTO</span>S/10 - S/100</p>
				  </div>
				  <div class="niv">
					<p>NIVEL 4</p>
					<p>
					  Impresoras 3D en cualquier grado que quieras donar para proyectos
					  sociales a través de una ONG.
					</p>
					<p>DONACIÓN</p>
				  </div>
				</div>
			  </div>
			  <div class="redir">
				<a href="/trueke/">¡Únete a Trueke!</a>
			  </div>
		  </div>
			<?php do_action( 'woocommerce_account_content' ); ?>
		</div>
    	</div>
	</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const container = document.querySelector("#dashboardUser .dash .woocommerce-MyAccount-content #section-beneficios .levels .fases");

  if (!container) return;

  const fasItems = container.querySelectorAll(".imas .fase");
  const circles = container.querySelectorAll(".bar .circle");
  const lines = container.querySelectorAll(".bar .line");

  function activarNivel(index) {
    fasItems.forEach(fas => fas.classList.remove("active"));
    circles.forEach(circle => circle.classList.remove("active"));
    lines.forEach(line => line.classList.remove("active"));

    fasItems[index]?.classList.add("active");
    circles[index]?.classList.add("active");

    for (let i = 0; i < index; i++) {
      lines[i]?.classList.add("active");
    }
  }

  fasItems.forEach((fas, index) => {
    fas.addEventListener("click", () => {
      activarNivel(index);
    });
  });

  circles.forEach((circle, index) => {
    circle.addEventListener("click", () => {
      activarNivel(index);
    });
  });
});

</script>
