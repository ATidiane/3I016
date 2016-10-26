<?php
error_reporting(E_ALL);
include_once 'connexion.php';

function deconnexion($sock) {
    //Pourquoi pas echo commande($sock, "QUIT")
    //(etant donnée qu'il est dit afficher les messages d'erreurs)
    commande($sock, "QUIT");
    @fclose($sock);
}

?>