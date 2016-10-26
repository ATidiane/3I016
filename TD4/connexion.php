<?php
error_reporting(E_ALL);

function commande($sock, $req) {
    fputs($sock, trim($req)."\r\n");
    $rep = preg_match('/^+OK/', fgets($sock)) ? fgets($sock) : false;
    return $rep;
}

function connexion($serv, $id, $pass) {

    $sock = fsockopen($serv, 110, $errno, $strno, 5);
    if (!$sock) return false;

    //Pourquoi faut il chercher le message de bienvenue du serveur???
    $reponse = fgets($sock);
    
    if (commande($sock, 'USER $id')) {
        if (commande($sock, 'PASS $pass')) {
            return $sock;
        } else {
            return false;
        } else {
            return false;
        }
    }
}
?>