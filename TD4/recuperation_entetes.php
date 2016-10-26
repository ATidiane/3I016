<?php
error_reporting(E_ALL);

include_once 'connexion.php';
include_once 'entete_smtp.php';

function recuperation_entetes($sock, $nomsg) {
    $rep = commande($sock, "TOP $nomsg 0");
    if ($rep) {
        $entetes = array();
        $cle = '';
        while ($line = trim(fgets($sock)) != '.') {
            if(preg_match('RE_ENTETE_SMTP', $line, $r)) {
                $cle = $r[1];
                if (!isset($entetes[$cle])) {
                    $entetes[$cle] = $r[2];
                }
                else {
                    if (is_array($entetes[$cle]))
                        $entetes[$cle][] = $r[2];
                    else
                        $entetes[$cle] = array($entetes[$cle], $r[2]);
                }
            } else {
                if (is_array($entetes[$cle])) 
                    //pourquoi -1 ? Ah daccord, ajout à la dernière clé trouvée
                    $entete[$cle][count($entetes[$cle])-1] = "\n" . $line;
                else
                    $entetes[$cle] .= "\n" . $line; 
            }
        }
    }
    return $entetes;
}
?>