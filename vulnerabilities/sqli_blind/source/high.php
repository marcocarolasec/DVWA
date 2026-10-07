<?php
if( isset( $_COOKIE[ 'id' ] ) ) {
	// Get input
	$id = filter_var( $_COOKIE[ 'id' ], FILTER_VALIDATE_INT );
	if( $id === false || $id < 1 ) {
		$id = 0;
	}
	$exists = false;

	switch ($_DVWA['SQLI_DB']) {
		case MYSQL:
			$stmt = $db->prepare( 'SELECT COUNT(*) FROM users WHERE user_id = (:id);' );
			$stmt->bindValue( ':id', $id, PDO::PARAM_INT );
			$stmt->execute();
			$exists = ((int) $stmt->fetchColumn() === 1);
			break;
		case SQLITE:
			global $sqlite_db_connection;

			$stmt = $sqlite_db_connection->prepare(
				'SELECT COUNT(*) AS count FROM users WHERE user_id = :id;'
			);
			$stmt->bindValue( ':id', $id, SQLITE3_INTEGER );
			$result = $stmt->execute();
			$row = $result->fetchArray( SQLITE3_ASSOC );
			$exists = ((int) $row['count'] === 1);
			$result->finalize();
			break;
	}

	if ($exists) {
		// Feedback for end user
		$html .= '<pre>User ID exists in the database.</pre>';
	}
	else {
		// User wasn't found, so the page wasn't!
		header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' );

		// Feedback for end user
		$html .= '<pre>User ID is MISSING from the database.</pre>';
	}
}

?>
