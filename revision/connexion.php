<?php
error_reporting(E_ALL);


function commande($sock, $req) {
    fputs($sock, trim($req) '\r\n');
    $reponse = fgets($sock);
    return (preg_match('/^+OK/', $reponse)) ? $reponse : false; 
}
function connexion($serv, $id, $pass) {
    $sock = fsockopen($serv, 110, $errno, $strno, 5);
    if (!$sock) {
        echo 'Erreur de connexion au serveur POP[$errno] : [$strno]';
    } else {
        $res = commande($sock, 'USER '. $id);
        if ($res) {
            $res = commande($sock, 'PASS '. $pass);
            if ($res) {
                return $sock;
            }
            return false;
        }
        return false;
    }
}

?>