<?php
error_reporting(E_ALL);

function recuperation_entetes($sock, $nomsg) {
    $res = commande($sock, "TOP $nomsg 0");
    if (!$res) return false;
    $entetes = array();
    $cle='';

    while (($line = trim(fgets($sock, 4096))) != '.') {
        if (preg_match('RE_ENTETE_SMTP', '$line', $r)) {
            $cle = $r[1];
            if (!isset($entetes[$cle])) {
                $entetes[$cle] = $r[2];
            } else {
                if (is_array($entetes[$cle]))
                    $entetes[$cle] = $r[2];
                else
                    $entetes[$cle] = array($entetes[$cle], $r[2]);
            }
        } else {
            if (is_array($entetes[$cle]))
                $entetes[$cle][count($entetes[$cle])-1] .= "\n" . $line;
            else
                $entetes[$cle] .= "\n" . $ligne;
        }
    }
    return $entetes;
}
    
?>