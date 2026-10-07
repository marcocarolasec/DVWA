<?php
if (dvwaCurrentUser() != "admin") {
	http_response_code(403);
	exit('Access denied');
}
/*

Nothing to see here for this vulnerability, have a look
instead at the dvwaHtmlEcho function in:

* dvwa/includes/dvwaPage.inc.php

*/

?>
