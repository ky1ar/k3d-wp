<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<div id="tracking-view">
            <div class="container">
				<div class="estados">
					<h1 class="title">ESTADOS DEL PEDIDO</h1>
					<p class="subp">
					  Encuentra tus pedidos enviados en las principales empresas del
					  Perú
					</p>
					<div class="etapas">
					  <div class="icons">
						<img src="/wp-content/uploads/2025/05/icon-track-agencia.webp" alt="" />
						<img src="/wp-content/uploads/2025/05/icon-track-enruta1.webp" alt="" />
						<img src="/wp-content/uploads/2025/05/icon-track-entregado1.webp" alt="" />
					  </div>
					  <div class="bar">
						<span class="bol"></span>
						<span class="line"></span>
						<span class="bol"></span>
						<span class="line"></span>
						<span class="bol"></span>
					  </div>
					  <div class="inf">
						<div class="par">
						  <p class="t">EN AGENCIA</p>
						  <p class="p">Tu pedido está listo para ser despachado.</p>
						</div>
						<div class="par">
						  <p class="t">EN RUTA</p>
						  <p class="p">!Va camino a tu dirección!</p>
						</div>
						<div class="par">
						  <p class="t">ENTREGADO</p>
						  <p class="p">Tu pedido ya fue recibido con éxito.</p>
						</div>
					  </div>
					</div>
				  </div>
				<div class="cover-login">
					<div class="login">
							<img src="/wp-content/uploads/2025/05/form-envio-icon-track.webp" alt="">
							<h1 class="t">CONSULTA RÁPIDA</h1>
							<p class="par">Ingresa tu DNI o RUC para conocer el estado actual de tu pedido en tiempo real:</p>
							<form method="POST" id="ListTrackingUs">
								<input type="text" name="documento" id="documento" placeholder="Ingrese DNI o RUC" maxlength="15" required>
								<button type="submit">Consultar</button>
								<div id="error-message"></div>
							</form>
					</div>
					<div class="inf-ex">
						<span></span>
						<p>Accede al estado de tus pedidos enviados a nivel nacional</p>
					</div>
				</div>
				<div id="listOrdersShipping" class="listOrdersUs wrapper">
                </div>
                <div id="orderInfo" class="modalinf">
					<div class="content">
						<span class="loaders"></span>
						<div class="head">
							<h1 class="title">Enviado con <span></span></h1>
							<p class="estado-actual"></p>
						</div>
						<div class="status">
							<div class="fases">
								<span class="st one"></span>
								<span class="bar one"></span>
								<span class="st two"></span>
								<span class="bar two"></span>
								<span class="st tree"></span>
								<span class="bar tree"></span>
								<span class="st four"></span>
							</div>
							<div class="names">
								<span class="fase-name one">En agencia</span>
								<span class="fase-name two">Programado</span>
								<span class="fase-name tree">En ruta</span>
								<span class="fase-name four">Entregado</span>
							</div>
						</div>
						<div class="info">
							<p class="cod">Tracking: <span></span></p>
							<div class="dat1">
								<p class="ori">Origen: <span></span></p>
								<p class="des">Destino: <span></span></p>
							</div>
							<div class="line">
								<div class="fas noentregado">
									<p class="status"><img src="/wp-content/uploads/2025/05/noentregado-k3d.webp" alt="">No entregado</p>
									<span class="dash"></span>
									<p class="date"></p>
								</div>
								<div class="fas entregado">
									<p class="status"><img src="/wp-content/uploads/2025/05/sh-entregado.webp" alt="">Entregado</p>
									<span class="dash"></span>
									<p class="date"></p>
								</div>
								<div class="fas ruta">
									<p class="status"><img src="/wp-content/uploads/2025/05/sh-envio.webp" alt="">En ruta</p>
									<span class="dash"></span>
									<p class="date"></p>
								</div>
								<div class="fas programado">
									<p class="status"><img src="/wp-content/uploads/2025/05/programado-k3d.webp" alt="">Programado</p>
									<span class="dash"></span>
									<p class="date"></p>
								</div>
								<div class="fas pendiente">
								  <p class="status">
									<img src="/wp-content/uploads/2025/05/sh-agencia.webp" alt="" class="status-img">
									<span class="status-text">En agencia</span>
								  </p>
								  <span class="dash"></span>
								  <p class="date"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="agencias">
                <h1 class="title">AGENCIAS DE ENVÍOS</h1>
                <p class="p">Trabajamos con las principales empresas de transporte del país para llevar tus productos a todo el Perú</p>
                <div class="img-agencias">
                    <div class="cover-img">
                        <img src="/wp-content/uploads/2025/04/logo-shalom-red2.png" alt="">
                    </div>
                    <div class="cover-img">
                        <img src="/wp-content/uploads/2025/04/logo-marvisur.png" alt="">
                    </div>
                    <div class="cover-img">
                        <img src="/wp-content/uploads/2025/04/logo-olva.png" alt="">
                    </div>
                    <div class="cover-img">
                        <img src="/wp-content/uploads/2025/04/logo-krear3d-newp.png" alt="">
                    </div>
                </div>
          </div>
            </div>
    </div>

<script>
$(document).ready(function () {
  let isProcessing = false;

  $("#ListTrackingUs").on("submit", function (e) {
    e.preventDefault();
    if (isProcessing) return;
    isProcessing = true;

    const documento = $("#documento").val().trim();

    if (!documento) {
      $("#error-message").html("<p>Por favor, ingresa un documento válido</p>").fadeIn().delay(1500).fadeOut(() => {
        isProcessing = false;
      });
      return;
    }

    $("#error-message").fadeOut();

    fetch("https://api.krear3d.com/tracking/client", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ document: documento })
    })
    .then(res => res.json())
    .then(data => {
      if (!data.success || !Array.isArray(data.data) || data.data.length === 0) {
        const errorMsg = data.data?.message || "Documento no encontrado";
        $("#error-message").html(`<p>${errorMsg}</p>`).fadeIn().delay(1500).fadeOut(() => {
          isProcessing = false;
        });
        return;
      }

      mostrarPedidos(data);
		window.history.replaceState(null, "", window.location.href);
      isProcessing = false;
    })
    .catch(error => {
      console.error("Error en la solicitud:", error);
      $("#error-message").html("<p>Error en la solicitud</p>").fadeIn().delay(1500).fadeOut(() => {
        isProcessing = false;
      });
    });
  });

  function mostrarPedidos(data) {
    const container = $("#listOrdersShipping");
    container.html('<h1 class="title">Mis Pedidos</h1>');

    data.data.forEach(order => {
      let barClass = `bar-status agency-${order.agency_id}`;
      if (order.last_status_id === 1) {
	  barClass += " bar-ini";
	} else if (order.last_status_id === 2) {
	  barClass += " bar-animated";
	} else if (order.last_status_id === 3) {
	  barClass += " bar-static";
	} else if (order.last_status_id === 4) {
	  barClass += " bar-none";
	}
      const orderHTML = `
        <div class="order">
          <div class="head">
            <p class="orderNum">Orden: <br><span>${order.order_number}</span></p>
            ${order.agency_id !== 4
			  ? `<p class="track">Tracking: <br><span>${order.code1} / ${order.code2}</span></p>`
			  : ''}

            <div class="agencia">
              <img src="${order.agency_image}" alt="logo-agencia">
            </div>
          </div>
          <span class="${barClass}"></span>
          <div class="cont">
            <div class="info">
              <p class="fecha">${order.last_status_date}</p>
              <p class="status">${order.last_status}</p>
              <p class="name"><span>${order.client_name}</span></p>
              <p class="doc"><span>${order.client_document}</span></p>
            </div>
            <div class="actions">
              <button class="btn op" data-order="${order.id}" data-agency="${order.agency_id}">Rastrear</button>
              <a class="btn" href="https://wa.me/51908944969?text=Hola,%20quisiera%20hacer%20una%20consulta%20sobre%20mi%20pedido%20con%20número%20de%20orden%3A%20${order.order_number}" target="_blank">Obtener Ayuda</a>
            </div>
          </div>
        </div>
      `;
      container.append(orderHTML);
    });

    $("#tracking-view .container .cover-login, #tracking-view .container .estados, #tracking-view .container .agencias")
	  .fadeOut(400)
	  .promise()
	  .then(() => {
		const container = $("#listOrdersShipping");
		void container[0].offsetWidth;
		container.addClass("visible");
	  });
  }
});

// Modal de Tracking
$(document).ready(function () {
  $("#listOrdersShipping").on("click", ".actions .btn.op", function () {
    $("#orderInfo").css("display", "flex").hide().fadeIn();
  });

  $("#orderInfo").on("click", function (e) {
    if (!$(e.target).closest(".content").length) {
      $("#orderInfo").fadeOut(function () {
        $(this).css("display", "none");
      });
    }
  });
});

function actualizarFases(statusHistory, agencyId) {
  const $fases = $("#orderInfo .content .status .fases");
  const $names = $("#tracking-view .container .modalinf .content .status .names");

  console.log("Fases recibidas:", statusHistory.length, "Último estado:", statusHistory[statusHistory.length - 1]);

  // Mostrar u ocultar fases visuales (bolas y barras) para agencia 4
  if (agencyId === 4) {
    $fases.find(".bar.tree, .st.four").css("display", "inline-block");
    $names.find(".fase-name.two").css("display", "inline-block"); // Mostrar "Programado"
  } else {
    $fases.find(".bar.tree, .st.four").css("display", "none");
    $names.find(".fase-name.two").css("display", "none"); // Ocultar "Programado"
  }

  // Resetear clases y textos
  $fases.find(".st").removeClass("activo finalizado noen");
  $fases.find(".bar").removeClass("activo noen");

  $names.find(".fase-name.four").text("Entregado"); // Valor por defecto
  $names.find(".fase-name.one").text(agencyId === 4 ? "Registrado" : "En agencia");

  // === AGENCIAS 1, 2, 3 ===
  if (agencyId !== 4) {
    const statusMax = Math.max(...statusHistory.map(e => e.status_id));
    console.log("Status ID máximo detectado:", statusMax);

    if (statusMax >= 1) {
      $fases.find(".st.one").addClass("activo");
    }
    if (statusMax >= 2) {
      $fases.find(".bar.one").addClass("activo");
      $fases.find(".st.two").addClass("activo");
    }
    if (statusMax >= 3) {
      $fases.find(".bar.two").addClass("activo");
      $fases.find(".st.tree").addClass("activo");
    }
  }

  // === AGENCIA 4 ===
  else {
    if (statusHistory.length >= 1) {
      $fases.find(".st.one").addClass("activo");
    }
    if (statusHistory.length >= 2) {
      $fases.find(".bar.one").addClass("activo");
      $fases.find(".st.two").addClass("activo");
    }
    if (statusHistory.length >= 3) {
      $fases.find(".bar.two").addClass("activo");
      $fases.find(".st.tree").addClass("activo");
    }
    if (statusHistory.length >= 4) {
      const ultimoEstado = statusHistory[statusHistory.length - 1];

      $fases.find(".bar.tree").addClass("activo");
      $fases.find(".st.four").addClass("activo");

      if (ultimoEstado.status_id === 4 || ultimoEstado.status_name === "No entregado") {
        // Cambiar a "No entregado"
        $fases.find(".bar.tree, .st.four").addClass("noen");
        $names.find(".fase-name.four").text("No entregado");
      }
    }
  }
}




$(document).on("click", '#listOrdersShipping .order .cont .actions .btn.op', function () {
  const trackingOrder = $(this).data("order");
  const agencyId = $(this).data("agency");
  const $orderInfo = $("#orderInfo");

  $orderInfo.find(".content .loaders").css("display", "flex");

  fetch("https://api.krear3d.com/tracking/order", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      order_id: trackingOrder,
      agency_id: agencyId
    })
  })
    .then((res) => res.json())
    .then((response) => {
      if (response.success && response.data) {
        const data = response.data;
        const agencyId = data.agency_id;
        const history = data.status_history || [];

        $orderInfo.find(".content .head .title span").text(data.agency_name || "—");

        if (agencyId === 4) {
          $orderInfo.find(".info .cod").hide();
        } else {
          $orderInfo.find(".info .cod span").text(`${data.code1} / ${data.code2}`);
          $orderInfo.find(".info .cod").show();
        }

        $orderInfo.find(".info .dat1 .ori span").text(data.origin_agency || "—");
        $orderInfo.find(".info .dat1 .des span").text(data.destination_agency || "—");

        // Mostrar u ocultar elementos especiales de agency_id === 4
        if (agencyId === 4) {
          $orderInfo.find(".line .fas.programado").show();
          $orderInfo.find(".line .fas.noentregado").show();
        } else {
          $orderInfo.find(".line .fas.programado").hide();
          $orderInfo.find(".line .fas.noentregado").hide();
        }

        if (history.length > 0) {
		  const ultimoEstado = history[history.length - 1];
		  const estadoActual = ultimoEstado.status_name || "—";
		  $orderInfo.find(".content .head .estado-actual").text(estadoActual);
		  if (ultimoEstado.status_id === 4) {
			$orderInfo.find(".content .head .estado-actual").addClass('no-entregado');
		  } else {
			$orderInfo.find(".content .head .estado-actual").removeClass('no-entregado');
		  }
		} else {
		  $orderInfo.find(".content .head .estado-actual").text("—");
		}

        function actualizarEstado(selector, texto) {
          const elemento = $orderInfo.find(selector);
          if (texto) {
            elemento.find(".date").text(texto);
            elemento.show();
          } else {
            elemento.hide();
          }
        }
		
        actualizarEstado(".line .fas.pendiente", null);
        actualizarEstado(".line .fas.ruta", null);
        actualizarEstado(".line .fas.entregado", null);
        actualizarEstado(".line .fas.noentregado", null);
        actualizarEstado(".line .fas.programado", null);

        let hayEntregado = false;
        let hayNoEntregado = false;
       history.forEach((estado) => {
          const { status_name, register_at } = estado;

          if (
			  status_name === "Pendiente" ||
			  (agencyId === 4 && status_name === "Registrado")
			) {
			  actualizarEstado(".line .fas.pendiente", register_at);
			  const statusText = (agencyId === 4) ? "Registrado" : "En agencia";
			  $orderInfo.find(".line .fas.pendiente .status .status-text").text(statusText);
			}
			if (status_name === "En agencia" && agencyId !== 4) {
			  actualizarEstado(".line .fas.pendiente", register_at);
			  $orderInfo.find(".line .fas.pendiente .status .status-text").text("En agencia");
			}

          if (status_name === "Programado" && agencyId === 4) {
            actualizarEstado(".line .fas.programado", register_at);
          }

          if (status_name === "En ruta") {
            actualizarEstado(".line .fas.ruta", register_at);
          }

          if (status_name === "Entregado") {
            hayEntregado = true;
            if (agencyId !== 4) {
              actualizarEstado(".line .fas.entregado", register_at);
            }
          }

          if (status_name === "No entregado" && agencyId === 4) {
            hayNoEntregado = true;
            actualizarEstado(".line .fas.noentregado", register_at);
          }
        });

        if (agencyId === 4) {
          if (hayEntregado && hayNoEntregado) {
            $orderInfo.find(".line .fas.entregado").hide();
          } else if (hayEntregado) {
            const entregado = history.find(e => e.status_name === "Entregado");
            actualizarEstado(".line .fas.entregado", entregado.register_at);
          } else {
            $orderInfo.find(".line .fas.entregado").hide();
          }
        }

        actualizarFases(response.data.status_history, response.data.agency_id);
      } else {
        alert("No se pudo obtener la información del envío.");
      }
    })
    .catch(() => {
      alert("Error al consultar la guía. Intenta nuevamente.");
    })
    .finally(() => {
      $orderInfo.find(".loaders").css("display", "none");
    });
});


</script>
