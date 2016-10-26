<?php
error_reporting(E_ALL);
require_once('entete_smtp.php');

define ('RE_URL', '@^(\w+)://([^/:]+)(:\d+)?(.*)@');

function requete_ressource($req, $url) {
    if (!preg_match('RE_URL', $url, $r))
         return "URL incorrecte";
    list (, , $serveur, $port, $chemin) = $r;

    $port = $port ? substr($port, 1) : 80;
    $chemin = $chemin ? $chemin : '/';

    echo "$serveur $port $chemin";
    
    $sock = fsockopen($serveur, $port, $errno, $strno, 5);
    if (!$sock) {
        return "Connexion to $r[1] failed";
    }

    fputs($sock, "$req $url HTTP/1.1\nHOST: $serveur\n\n");
    //lecture de la première ligne seulement
    $status = fgets($sock);
    $entetes = array();
    
    //lecture de toutes les lignes jusqu'à la première ligne
    while (strlen($l = fgets($sock)) > 2) {
        if (preg_match('RE_ENTETE_SMTP', $l, $x)) {
            $entetes[$x[1]] = $x[2];
        }
    }
    $page ='';
    //A partir de la première ligne vide, on met le reste dans $page
    while (!feof($sock)) $page .= fgets($sock);
    return array($status, $entetes, $page);
    
}

#echo requete_ressource('GET', 'http://localhost');

?>
