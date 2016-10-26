<?php
error_reporting(E_ALL);
include_once 'connnexion.pĥp';
function recuperation_message($sock, $nomsg) {
    $msg = commande($sock, 'RETR $nomsg');
    if (!$msg) return false;

    $corpsmessage = '';
    while (($line = trim(fgets($sock))) != '') {
        //On passe les entetes.
        //Mais comment ? A revoir
    }

    //Lecture du corps du message

    while (($line = trim(fgets($sock))) != '.') {
        $corpsmessage .= $line;
    }
    return $corpsmessage;
}
?>