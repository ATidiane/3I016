<?php
error_reporting(E_ALL);

require_once('requete_ressource.php');
$url = $_GET['url'];
$r = requete_ressource('HEAD', isset($url) ? $url : '');

if (is_array($r)) {
    $err = $r;
}
else {
    $t = array_combine(array_map('htmlspecialchars', array_keys($r[1])), array_map('htmlspecialchars', array_values($r[1])));
}

$title = "visiualiser les entetes";

if ($err) {
    echo $err;
} else {
    array_to_table($t, "Entetes recus sur" . $_GET['url']);
    echo "Status: " preg_match('@\d{3}@', $r[0], $m) ? $r[0] : 500;
    echo " Longueur effective : ", strlen($r[2]);
}
echo "</body></html>\n";
?>
