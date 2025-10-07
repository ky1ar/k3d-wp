document.addEventListener('DOMContentLoaded', function() {
    const toTopButton = document.getElementById('leslie');
	const containers = document.querySelectorAll("#prime-pagek3d .preguntas .pregcon .sec .cont");
	const btnMonthly = document.getElementById("btn-monthly");
  	const btnAnnual = document.getElementById("btn-annual");

  	const planMonthly1 = document.getElementById("plan-monthly-1");
  	const planMonthly2 = document.getElementById("plan-monthly-2");
  	const planAnnual1 = document.getElementById("plan-annual-1");
  	const planAnnual2 = document.getElementById("plan-annual-2");

	function removeSelectClass() {
		btnMonthly.classList.remove("select");
		btnAnnual.classList.remove("select");
	}

	 if (btnMonthly && btnAnnual && planMonthly1 && planMonthly2 && planAnnual1 && planAnnual2) {
        function removeSelectClass() {
            btnMonthly.classList.remove("select");
            btnAnnual.classList.remove("select");
        }

        btnMonthly.addEventListener("click", () => {
            planMonthly1.style.display = "flex";
            planMonthly2.style.display = "flex";
            planAnnual1.style.display = "none";
            planAnnual2.style.display = "none";
            removeSelectClass();
            btnMonthly.classList.add("select");
        });

        btnAnnual.addEventListener("click", () => {
            planAnnual1.style.display = "flex";
            planAnnual2.style.display = "flex";
            planMonthly1.style.display = "none";
            planMonthly2.style.display = "none";
            removeSelectClass();
            btnAnnual.classList.add("select");
        });
    }
	
    containers.forEach(function (container) {
        container.addEventListener("click", function () {
            const isExpanded = container.classList.contains("expanded");
            if (isExpanded) {
                container.classList.remove("expanded");
            } else {
                container.classList.add("expanded");
            }

            containers.forEach(function (otherContainer) {
                if (otherContainer !== container && otherContainer.classList.contains("expanded")) {
                    otherContainer.classList.remove("expanded");
                }
            });
        });
    });

    window.addEventListener('scroll', function() {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        if (toTopButton && scrollTop > 1000) {
            toTopButton.classList.add('show');
        } else if (toTopButton) {
            toTopButton.classList.remove('show');
        }
    });

    toTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    const openMenu = document.getElementById('openMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const bottomBar = document.getElementById('bottomBar');

    openMenu.addEventListener('click', function() {
        openMenu.classList.toggle('open');
        mobileMenu.classList.toggle('open');
        bottomBar.classList.toggle('open');
    });



    jQuery(function($) {
        let cmb_lnk = $('#productBenefits').data('pro');
        if (cmb_lnk) {
            $('.itemBenefit').click(function() {
                $(this).toggleClass('bnf-act');
                const cmb_prd = $(this).data('pro');
                if ($(this).hasClass('bnf-act')) {
                    cmb_lnk += ',' + cmb_prd;
                } else {
                    cmb_lnk = cmb_lnk.replace(',' + cmb_prd, '');
                }
                $('.add-to-cart-btn').attr('data-product-id', cmb_lnk);
            });
        }
		
		$(document).on('click', '#showFiltersButton', function() {
			const showFilters = $('#showFilters');
			showFilters.toggleClass("showMobile");
		});
		
		
    });
	
	function setReferralCookie() {
	    
		const urlParams = new URLSearchParams(window.location.search);
		const referralCode = urlParams.get('codigoref');

		if (referralCode) {
			const cookieName = 'yith_wcaf_referral_token';
			const cookieValue = referralCode;
			const expirationDays = 1;
			const date = new Date();
			date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
			const expires = "; expires=" + date.toUTCString();
			document.cookie = cookieName + "=" + (cookieValue || "") + expires + "; path=/";
			console.log(`Set Cookie ${referralCode}`);
		}
	}
	setReferralCookie();
	
	function toggleBodyScroll() {
		const modal = document.querySelector('.pswp');

		if (modal.classList.contains('pswp--open')) {
			document.body.style.overflow = 'hidden';
		} else {
			document.body.style.overflow = '';
		}
	}

	const observer = new MutationObserver(function(mutationsList) {
		mutationsList.forEach(function(mutation) {
			if (mutation.attributeName === 'class') {
				toggleBodyScroll();
			}
		});
	});

	const modalElement = document.querySelector('.pswp');
	if (modalElement) {
		observer.observe(modalElement, { attributes: true });

		modalElement.addEventListener('click', function(event) {
			const scrollWrap = document.querySelector('.pswp__scroll-wrap');

			// Verificar si el clic fue fuera del .pswp__scroll-wrap
			if (!scrollWrap.contains(event.target)) {
				modalElement.classList.remove('pswp--open');
			}
		});
	}

	
	const notifications = document.querySelectorAll('#shoppingCart .woocommerce-notices-wrapper .woocommerce-message, #shoppingCart .woocommerce-notices-wrapper .woocommerce-error');
	function fadeOut(element) {
		element.style.transition = 'opacity 1.5s ease, visibility 1.5s ease';
		element.style.opacity = '0';
		element.style.visibility = 'hidden';
		setTimeout(() => {
			element.style.display = 'none';
		}, 1500);
	}
	notifications.forEach(notification => {
		setTimeout(() => fadeOut(notification), 1500);
	}); 
	
	const billingDniInput = document.querySelector(
	  ".woocommerce-checkout .woocommerce .checkout #billing_dni"
	);

	if (billingDniInput) {
		billingDniInput.addEventListener("input", function () {
			if (this.value.length > 24) {
				this.value = this.value.slice(0, 24); // corta a 24
			}
		});
	}
});