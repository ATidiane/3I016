<?php
error_reporting(E_ALL);

function deconnexion($sock) {
    commande($sock, "QUIT");
    @fclose($sock);
}

?>