<?php
error_reporting(E_ALL);

define('RE_FICHIER', '@\w+((-|_)\w+)?\.xml@');
function verifier_fichier($nom) {
  if (preg_match(RE_FICHIER, $nom)) {
 #   echo 'ahmed vrai';
    if (fopen($nom, 'r')) return true;
  }
  return false;
}

#verifier_fichier('BackToTheFuture.xml');
?>
