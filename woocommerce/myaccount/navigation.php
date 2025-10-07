<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
	<div class="data-left">
		<?php
			$user_id = get_current_user_id();
			if ( is_wc_endpoint_url( 'orders' ) || is_wc_endpoint_url( 'view-order' ) ) :
				$customer_orders = wc_get_orders([
					'customer_id' => $user_id,
					'limit'       => -1,
				]);
				?>
				<div class="options-orders">
					<img src="/wp-content/uploads/2025/07/car.webp" class="pad">
					<p class="title">Pedidos</p>
					<div class="list">
						<?php 
						if ( $customer_orders ) {
							$current_order_id = get_query_var( 'view-order' );
							foreach ( $customer_orders as $order ) : 
								$order_number = $order->get_order_number(); 
								$order_url = $order->get_view_order_url();
								$active_class = ( $order->get_id() == $current_order_id ) ? ' class="active"' : '';
								?>
								<a href="<?php echo esc_url( $order_url ); ?>"<?php echo $active_class; ?>>
									Pedido <span>#<?php echo esc_html( $order_number ); ?></span>
								</a>
								<?php 
							endforeach;
						} else {
							echo '<p style="text-align:center; opacity:0.6;">No tienes pedidos aún.</p>';
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		<div class="icon-user">
		<?php
		$image_url = get_user_meta( $user_id, 'custom_profile_picture', true );

		if ( $image_url ) {
			echo '<img src="' . esc_url( $image_url ) . '" alt="Perfil">';
		} else {
			echo '<img src="/wp-content/uploads/2025/07/cuenta.png" alt="Icono de usuario" class="icono-cuenta">';
		}
		?>
		</div>
		<?php
		$user = wp_get_current_user();
		$first_name = $user->first_name ? explode(' ', $user->first_name)[0] : '';
		$last_name  = $user->last_name  ? explode(' ', $user->last_name)[0]  : '';
		$nombre_completo = $first_name . ' ' . $last_name;
		?>

		<p class="name"><?php echo esc_html($nombre_completo); ?></p>
		<p class="user"><span>Usuario: </span><?php echo esc_html( $user->display_name ); ?></p>
		<div class="options-profile">
			<button class="btn info active">
				<img src="/wp-content/uploads/2025/07/Recurso-2pro-1.png">
				<p>Información Personal</p>
			</button>
			<button class="btn pass">
				<img src="/wp-content/uploads/2025/07/Recurso-3pro-1.png">
				<p>Contraseña</p>
			</button>
		</div>
		<div class="options-programas">
			<button class="btn beneficios active">
				<img src="/wp-content/uploads/2025/01/new-logo-beneficios-25-scaled.webp">
			</button>
			<span></span>
			<button class="btn prime">
				<img src="/wp-content/uploads/2025/07/prime-logo-black.png">
			</button>
			<span></span>
			<button class="btn afiliados">
				<img src="/wp-content/uploads/2025/07/Recurso-1pro.webp">
			</button>
			<span></span>
			<button class="btn trueke">
				<img src="/wp-content/uploads/2025/05/trueke-black.webp">
			</button>
		</div>
	</div>
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>

		<li class="custom-menu-item programas" data-section="programas">
		  <a href="<?php echo esc_url( home_url( '/mi-cuenta/?section=programas' ) ); ?>" class="nav-link">Programas</a>
		</li>
	</ul>
</nav>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const btnInfo = document.querySelector("#dashboardUser .dash nav .data-left .options-profile .btn.info");
  const btnPass = document.querySelector("#dashboardUser .dash nav .data-left .options-profile .btn.pass");
  const form = document.querySelector("#dashboardUser .dash .woocommerce-MyAccount-content form.woocommerce-EditAccountForm");

  if (btnInfo && btnPass && form) {
    btnInfo.addEventListener("click", function () {
      btnInfo.classList.add("active");
      btnPass.classList.remove("active");
      form.classList.remove("page-pass");
    });

    btnPass.addEventListener("click", function () {
      btnPass.classList.add("active");
      btnInfo.classList.remove("active");
      form.classList.add("page-pass");
    });
  }

  const secciones = {
    beneficios: document.querySelector("#section-beneficios"),
    prime: document.querySelector("#section-prime"),
    afiliados: document.querySelector("#section-afiliados"),
    trueke: document.querySelector("#section-trueke") // si luego lo agregas
  };

  const parrafosDefault = document.querySelectorAll("#dashboardUser .woocommerce-MyAccount-content > p");

  function updateActiveNavItem(section) {
    const customItems = document.querySelectorAll("nav .custom-menu-item");
    customItems.forEach(item => {
      if (item.dataset.section === section) {
        item.classList.add("is-active");
      } else {
        item.classList.remove("is-active");
      }
    });
  }

  function manejarVisibilidadProgramas(section) {
    const dashboardUser = document.querySelector("#dashboardUser");
    if (!dashboardUser) return;

    if (section === "programas") {
      dashboardUser.classList.add("programas-activa");
    } else {
      dashboardUser.classList.remove("programas-activa");
    }
  }

  function showSection(section) {
    Object.values(secciones).forEach(s => s && (s.style.display = "none"));
    parrafosDefault.forEach(p => p.style.display = "none");

    if (section === "programas") {
      cambiarProgramaActivo("beneficios");
    } else {
      if (secciones[section]) {
        secciones[section].style.display = "flex";
      } else {
        parrafosDefault.forEach(p => p.style.display = "");
      }
    }

    updateActiveNavItem(section);
    manejarVisibilidadProgramas(section);

    const mainMenuItem = document.querySelector("#dashboardUser .dash nav ul li.woocommerce-MyAccount-navigation-link--dashboard.is-active a");
    if (section === "programas") {
      if (mainMenuItem) mainMenuItem.style.backgroundColor = 'white';
    } else {
      if (mainMenuItem) mainMenuItem.style.backgroundColor = '';
    }
  }

  // Nueva lógica para botones de programas
  const botonesProgramas = document.querySelectorAll(".options-programas .btn");
  const seccionProgramas = {
    beneficios: document.querySelector("#section-beneficios"),
    prime: document.querySelector("#section-prime"),
    afiliados: document.querySelector("#section-afiliados"),
    trueke: document.querySelector("#section-trueke")
  };

  function cambiarProgramaActivo(nombre) {
    botonesProgramas.forEach(btn => btn.classList.remove("active"));
    const botonActual = document.querySelector(".options-programas .btn." + nombre);
    if (botonActual) botonActual.classList.add("active");

    Object.values(seccionProgramas).forEach(s => s && (s.style.display = "none"));

    if (seccionProgramas[nombre]) {
      seccionProgramas[nombre].style.display = "flex";
    }
  }

  botonesProgramas.forEach(btn => {
    btn.addEventListener("click", () => {
      const clases = Array.from(btn.classList);
      const nombre = clases.find(c => ["beneficios", "prime", "afiliados", "trueke"].includes(c));
      if (nombre) cambiarProgramaActivo(nombre);
    });
  });

  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }

  const seccionInicial = getQueryParam("section") || "";
  showSection(seccionInicial);
});
</script>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
