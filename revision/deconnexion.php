<?php
error_reporting(E_ALL);

function deconnexion($sock) {
    $res = commande($sock, 'QUIT');
    if ($res) {
        echo $res;
    }
    @fclose($sock);
}

?>