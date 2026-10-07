<?php
http_response_code(403);
exit('Legacy vulnerable level disabled');

$target = $_GET[ 'redirect' ] ?? '';
$allowed_targets = array(
	'info.php?id=1',
	'info.php?id=2',
);

if( is_string( $target ) && in_array( $target, $allowed_targets, true ) ) {
	header( 'Location: ' . $target );
	exit;
}

http_response_code( 400 );
?>
<p>Invalid or missing redirect target.</p>
<?php
exit;
?>
