<?php
$target = $_GET[ 'redirect' ] ?? '';

if( is_string( $target ) && str_starts_with( $target, '/' ) && !str_starts_with( $target, '//' ) && !str_contains( $target, "\\" ) ) {
	header( 'Location: ' . $target );
	exit;
}

http_response_code( 400 );
?>
<p>Invalid or missing redirect target.</p>
<?php
exit;
?>
