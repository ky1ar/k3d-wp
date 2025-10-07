<?php
/* Template Name: Header */
$settings = get_options_page_id( 'settings' );
$linksField = get_field( 'links', $settings );
?>

<div id="superiorBar" class="bar">
    <div class="wrapper">
        <div class="list">
            <a href="https://tiendakrear3d.com/">Tienda</a>
            <a href="https://krear3d.com/">Industria</a>
            <a href="https://krear3dental.com/">Dental</a>
            <a href="https://soporte.krear3d.com/">Soporte</a>
			<a href="https://www.fadipesa.com/">Distribuidores</a>
        </div>
        
        <div class="list location">
        <?php foreach ( $linksField as $link ): ?>
            <a href="<?= $link['url']; ?>" target="_blank" rel="nofollow">
                <svg width="14" height="14">
                    <use xlink:href="#<?= $link['icon']; ?>"></use>
                </svg>
                <?= $link['text']; ?>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
$headerField = get_field( 'header', $settings );
$is_logged_in = is_user_logged_in();
$url = $is_logged_in ? get_permalink( get_option('woocommerce_myaccount_page_id') ) : home_url() . '/mi-cuenta';
$text = $is_logged_in ? 'Mi cuenta' : 'Acceder';

$cart_count = WC()->cart->get_cart_contents_count();

?>
<header>
    <div class="wrapper">
        <div class="top">
            <div class="t1">
				<a class="logo" href="/">
                <img width="150" height="42" src="<?= $headerField[ 'logo' ]; ?>" alt="Krear 3D">
            	</a>
				<p class="btn-c">
				<img src="/wp-content/uploads/2025/05/menubar.webp">
				<span>Categorías</span>
				</p>
			</div>

            <form class="searchBar" name="keywordsearch" method="get" action="<?= get_permalink(wc_get_page_id('shop')) ?>">
                <input name="s" id="keywordsearch-q" placeholder="<?= $headerField[ 'text' ]; ?>" type="text" value="" autocomplete="off">
                <input name="post_type" id="post_type" type="hidden" value="product">
                <button type="submit" value="">
                    <svg width="14" height="14">
                        <use xlink:href="#<?= $headerField[ 'icon' ]; ?>"></use>
                    </svg>
                </button>
                <div id="search-results" class="search-results"></div>
            </form>

            <div class="links">
               <a class="rast" href="/rastrear-pedidos/">
					<img src="/wp-content/uploads/2025/05/ubi-icon.webp">
					<span>Rastrear Pedidos</span>
				</a>
                <a class="account" href="<?= $url; ?>">
                    <svg width="14" height="14">
                        <use xlink:href="#icon-account"></use>
                    </svg>
					<span><?= $text; ?></span>
                </a>
                
                <a class="cart" href="<?= wc_get_cart_url(); ?>">
                    <svg width="14" height="14">
                        <use xlink:href="#icon-cart"></use>
                    </svg>
                    <span  id="cart-count"><?= $cart_count; ?></span>
                </a>
       
            </div>
        </div>

        <div class="bottom">
            <?php wp_nav_menu( array( 'menu_id' => 'menu-principal' ) ); ?>
        </div>
    </div>
</header>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector("header .top .t1 .btn-c");
  const bottomMenu = document.querySelector("header .bottom");

  if (toggleBtn && bottomMenu) {
    toggleBtn.addEventListener("click", function () {
      bottomMenu.classList.toggle("fade-visible");
    });
  }
});
</script>
<div id="bottomBar">
    <a href="/" target="">
        <svg width="20" height="20">
            <use xlink:href="#icon-home"></use>
        </svg>
        <span>Inicio</span>
    </a>

    <a href="<?= $url; ?>">
        <svg width="20" height="20">
            <use xlink:href="#icon-account"></use>
        </svg>
        <span><?= $text; ?></span>
    </a>

    <a href="<?= wc_get_cart_url(); ?>">
        <div class="cart">
            <svg width="20" height="20">
                <use xlink:href="#icon-cart"></use>
            </svg>
            <span id="cart-count-mobile"><?= $cart_count; ?></span>
        </div>
        <span>Carrito</span>
    </a>

    <div id="openMenu">
        <svg width="20" height="20">
            <use xlink:href="#icon-menu"></use>
        </svg>
        <span>Más</span>
    </div>
</div>

<div id="mobileMenu">
    <div class="logo">
        <img width="160" height="34" src="https://www.tiendakrear3d.com/wp-content/uploads/2024/10/newlogo-test1.webp" alt="Krear 3D">
    </div>

    <?php wp_nav_menu( array( 'menu_id' => 'menu-principal' ) ); ?>

    <div class="links">
        <?php foreach ( $linksField as $link ): ?>
            <a href="<?= $link['url']; ?>" target="_blank" rel="nofollow">
                <svg width="14" height="14">
                    <use xlink:href="#<?= $link['icon']; ?>"></use>
                </svg>
                <?= $link['text']; ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    const searchInput = document.getElementById('keywordsearch-q');
    const resultsContainer = document.getElementById('search-results');
    const form = document.querySelector('.searchBar');
    let debounceTimer;

    if (!resultsContainer) {
        console.error('El contenedor de resultados no se encuentra en el DOM.');
        return;
    }

    function toggleResultsContainer(shouldShow) {
        resultsContainer.style.display = shouldShow ? 'block' : 'none';
    }

    function debounce(func, delay) {
        return function(...args) {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(this, args), delay);
        };
    }

    function fetchResults(query) {
        if (query.length >= 2) {
            fetch(`${wp_vars.ajax_url}?action=search_suggestions&keyword=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length) {
                        const ul = document.createElement('ul');
                        data.forEach(product => {
                            const li = document.createElement('li');
                            
                            const img = document.createElement('img');
                            img.src = product.thumbnail;
                            img.alt = product.title;
                            img.classList.add('product-thumbnail');
                            
                            const title = document.createElement('span');
                            title.textContent = product.title;

                            li.appendChild(img);
                            li.appendChild(title);

                            li.addEventListener('click', () => {
                                window.location.href = product.url;
                            });

                            ul.appendChild(li);
                        });
                        resultsContainer.appendChild(ul);
                        toggleResultsContainer(true);
                    } else {
                        toggleResultsContainer(false);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toggleResultsContainer(false);
                });
        } else {
            toggleResultsContainer(false);
        }
    }

    const debouncedFetchResults = debounce(fetchResults, 300);

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.trim();
        if (query.length >= 2) {
            debouncedFetchResults(query);
        } else {
            toggleResultsContainer(false);
        }
    });

    searchInput.addEventListener('focus', function() {
        const query = searchInput.value.trim();
        if (query.length >= 2) {
            toggleResultsContainer(true);
        }
    });

    form.addEventListener('submit', function() {
        const query = searchInput.value.trim();
        if (query.length < 2) {
            toggleResultsContainer(false);
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.searchBar')) {
            toggleResultsContainer(false);
        }
    });

    searchInput.addEventListener('click', function(event) {
        event.stopPropagation();
        const query = searchInput.value.trim();
        if (query.length >= 2) {
            toggleResultsContainer(true);
        }
    });
});

</script>
