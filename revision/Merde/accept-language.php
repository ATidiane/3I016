<?php
#phpinfo()    ;
$l = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
if (preg_match('/^(.*?)[_-]/', $l, $m)) $l = $m[1];
echo "<html><head><title>Examen</title></head><body>";
switch ($l) {
case 'fr': echo 'Bonjour'; break;
case 'it': echo 'Ciao'; break;
case 'en': echo 'Hello'; break;
}
echo "</body></html>";
?>
