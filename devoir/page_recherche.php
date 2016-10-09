<?php
error_reporting(E_ALL);
include 'entete.php';
include 're_imma.php';
include 'form_imma.php';

if (!isset($_GET['plaque'])) {
  $titre='Plaque d\'immatriculation';
} else {
  if (!preg_match('RE_IMMA', $_GET['plaque'])) {
    $titre='Erreur Plaque d\'immatriculation';
  } else {
    echo entete("Plaque d\immatriculation");
    echo "<body>\n<div>'En cours de recherche veillez patientez</div>\n</body>\n</html>";
  }
}
echo entete($titre);
echo "<body>\n".
     form_imma('Riendsjflk').
     "</body>\n";
?>
