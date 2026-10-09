<?php
$targets = array(
	'1' => 'info.php?id=1',
	'2' => 'info.php?id=2',
);
$id = $_GET[ 'redirect' ] ?? '';

if( is_string( $id ) && isset( $targets[ $id ] ) ) {
	header( 'Location: ' . $targets[ $id ] );
	exit;
}

http_response_code( 400 );
?>
<p>Invalid or missing redirect target.</p>
<?php
exit;
?>
