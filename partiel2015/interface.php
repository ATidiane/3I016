<?php
error_reporting(E_ALL);
include_once 'lancer_phraseur.php';
include_once 'formulaire.html.php';
include_once 'regexp.re.php';
if (isset($_POST['requete'])) {
  $nomfichier = $_POST['s1'];
  $echelle = $_POST['s2'];

  if ((preg_match('@^\d+(\.\d+)?$@', $echelle)) and (preg_match(RE_FICHIER, $nomfichier)) and lancer_phraseur($nomfichier)) {

  } else {
    
  
  
}

?>
