<?php 

$id_p = $product->get_id();

$tmp = get_field('plantilla');

$fields_mapping = [
	'impfdm' => 'impresora_3d_fdm',
	'impresin' => 'impresora_3d_resina',
	'filament' => 'filamentos',
	'resin' => 'resinas',
	'repuesto' => 'repuestos',
	'film' => 'film',
	'cortadora' => 'cortadoras_laser',
	'polyterra' => 'plantilla_polyterra',
	'polylitesedoso' => 'plantilla_polylite_sedoso',
	'boquilla' => 'plantilla_boquilla',
    'accesorio_especifico' => 'accesorio_especifico',
    'realidad_virtual' => 'realidad_virtual',
    'drones' => 'drones',
    'escaneres3d' => 'escaneres3d',
	'cnc' => 'cnc',
	'plotters' => 'plotters',
	'scooters' => 'scooters',
	'custom' => 'personalizado',
];

$field_name = $fields_mapping[$tmp];
$def = ($tmp != 'custom');

$tbl = get_field($field_name);
if ($def) {
	$tbn = get_field_object($field_name)['sub_fields'];
}

$ttl = true;
$key = 0;

include 'blocks/banners-show.php';
$markup = '<div class="ky1-spc">';
if (is_array($tbl)) {
	foreach ($tbl as $data) {
		if (!empty($data)) {
			if ($ttl) {
				$markup .= '<div class="spc-ttl"><h3>Especificaciones Técnicas</h2></div>';
				$ttl = false;
			}
			$label = $def ? $tbn[ $key ]['label'] : $data['etiqueta'];
			$value = $def ? $data : $data['texto'];
			
			$markup .= "<span><ul><li>$label</li><li>$value</li></ul></span>";
		}
		$key++;
	}
}

$markup .= '</div>';
echo $markup;

$galeria_de_video = get_field('galeria_de_video');
$vid = get_field( 'galeria_de_videos' );

$markup = '<div class="ky1-gly ' .( $vid['presentacion'] || $vid['resena'] || $vid['unboxing'] ? '' : 'ky1-hdn' ). '">

	<ul>';
	$key = 0;

	foreach ( $vid as $data ) {
		if ( !empty( $data ) ) { 
			switch ( $key ) {
				case 1: $lbl = 'Unboxing'; break;
				case 2: $lbl = 'Reseña'; break;
				default: $lbl = 'Presentación';
			}
			$markup .= '<li>
                <div class="gly-ovr">
					<a data-fancybox="" href="https://www.youtube.com/watch?v=' .esc_attr( $data ). '"><img src="http://tiendakrear3d.com/wp-content/uploads/kyro11/svg/ply.svg"></a>
				</div>
				<img class="gly-img" src="https://img.youtube.com/vi/' .esc_attr( $data ). '/maxresdefault.jpg" alt="">
				<span>' . esc_html( $lbl ) . '</span>
			</li>';
		}
		$key++;
	}
$markup .= '</ul>
</div>';

echo $markup;
