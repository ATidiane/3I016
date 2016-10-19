<?php
error_reporting(E_ALL);

function commande($sock, $chaine) {
    fputs($sock, trim($chaine) . "\n");
    $rep = fgets($sock);
    return preg_match('/^+OK/', '$rep')? $rep : false;
}

function connexion($server, $user, $pass) {
    $sock = fsockopen($server, 110, $errno, $errstr, 5);
    if (!$sock) {
        echo "La connexion n'a pas reussie sur le serveur POP [$errno] : $errstr \n";
        return false;
    } else {
        $rep = fgets($sock);
        $res = commande($server, "USER" . $user);
        if ($res) {
            $res = commande($server, "PASS" . $pass);
            if ($res) {
                return $sock;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>