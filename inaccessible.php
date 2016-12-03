<?php
$utilisation = '/tmp/' . 'IP' . $_SERVER['REMOTE_ADDR'] . '.trace';
if (!$_GET) {
    if (is_readable($utilisation)) {
        header('Content-Type: text/plain');
        readfile($utilisation);
	    unlink($utilisation);
    } else header('HTTP/1.1 204 No Content');
} else {
    if ($f = fopen($utilisation, 'a')) {
        fwrite($f, join($_GET, " ") . "\n");
        fclose($f);
    }
    header('HTTP/1.1 204 No Content');
}
?>
