<?php
error_reporting(E_ALL);
require ('entete.php');
require('saisies_en_table.php');

echo "<body>\n<h1>Etudiant</h1>";

if ((isset($_POST['mail'])) AND (isset($_POST['numEt']))) {
  echo entete('Etudiant');
  echo saisies_en_table($_POST, 'Informations');
} else {
  echo entete('Erreur: Etudiant');
  $form="<form method='post' action='etudiant.php'>\n".
        "<fieldset>\n".
        "<label for='mail'>Mail: </label>\n".
        "<input type='text' name='mail' id='mail' value='$_POST['mail']'/><br>".
        "<label for='numEt'>NumEt: </label>\n".
        "<input type='text' name='numEt' id='numEt' value='$_POST['numEt']'/><br>".
        "<input type='submit' value='Envoyer'/>\n".
        "</fieldset>\n";

  echo $form;

?>
