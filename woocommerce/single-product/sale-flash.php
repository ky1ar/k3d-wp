<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;

$currentPrincipal = get_field('principal');
$productBadge = $currentPrincipal['etiqueta'] ? $currentPrincipal['texto'] : ($currentPrincipal['stock'] ? 'En Stock' : 'Preventa');
?>

<div class="badge <?= ($currentPrincipal['etiqueta'] ? 'custom' : '') . ($productBadge == 'Preventa' && !$currentPrincipal['etiqueta'] ? ' pre' : ''); ?>" data-badge="<?= htmlspecialchars($productBadge); ?>">
    <?= htmlspecialchars($productBadge); ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const badgeElement = document.querySelector('.badge');

    const checkAvailability = () => {
        const availabilityElement = document.querySelector('.woocommerce-variation.single_variation .woocommerce-variation-availability p');
        if (availabilityElement) {
            const availabilityText = availabilityElement.innerHTML.trim();

            if (availabilityText === 'Disponible para reserva' || availabilityText === 'Sin existencias') {
                if (!badgeElement.classList.contains('custom')) {
                    badgeElement.textContent = 'Preventa';
                    badgeElement.classList.add('pre');
                    badgeElement.setAttribute('data-badge', 'Preventa');
                }
            } else {
                if (badgeElement.classList.contains('custom')) {
                    badgeElement.textContent = '<?= htmlspecialchars($customLabel); ?>';
                } else {
                    badgeElement.textContent = 'En Stock';
                }
                badgeElement.classList.remove('pre');
                badgeElement.setAttribute('data-badge', 'En Stock');
            }
        }
    };

    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.type === 'childList' || mutation.type === 'subtree') {
                checkAvailability();
            }
        });
    });

    const targetNode = document.querySelector('.woocommerce-variation.single_variation');
    if (targetNode) observer.observe(targetNode, { childList: true, subtree: true });

    checkAvailability();
});
</script>
