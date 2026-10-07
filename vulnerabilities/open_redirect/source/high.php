<?php

$target = filter_input( INPUT_GET, 'redirect', FILTER_VALIDATE_INT );
$allowed_targets = array(
	1 => 'info.php?id=1',
	2 => 'info.php?id=2',
);

if( $target !== false && isset( $allowed_targets[ $target ] ) ) {
	header( 'Location: ' . $allowed_targets[ $target ] );
	exit;
}

http_response_code( 400 );
?>
<p>Invalid or missing redirect target.</p>
<?php
exit;
?>
