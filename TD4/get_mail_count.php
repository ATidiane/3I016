<?php
error_reporting(E_ALL);

include_once 'connexion.php';

function get_mail_count($sock) {
    $rep = commande($sock, "STAT");
    if ($rep)
        $tab = preg_split('/\s+/', "$rep");
    return $tab;}
?>