<?php
error_reporting(E_ALL);

function ouvrante($parser, $name, $attrs) {
  echo "<div style='color:green'>Ouverture de:<tt style='color:black'>";
  echo " $name";
  foreach ($attrs as $key => $val) {
    echo " $key='" . $val . "'";
  }
  echo "</tt></div>\n";
}

function fermante($parser, $name) {
  echo "<div style='color:red'>Fermeture de:<br/><tt style='color:black'>";
  echo "$name</tt></div>\n";
}

function texte($parser, $data) {
  if (trim($data) == '') {
    echo "<div style='color:chocolate'>Saut de ligne</div>\n";
  } else {
    echo "<div style='color:blue'>Reception de texte: </div>";
    echo $data . "<br/>\n";
    }
}

include 'entete.php';
echo entete('Analyse d\'un carnet d\'adresse');
echo "<body>";
$fichier = $_GET['fichier'];
include 'phraser_table.php';
$resultat = phraser($fichier, 'ouvrante', 'fermante', 'texte');
if ($resultat) {
  var_dump($resultat);
}
echo "</body></html>";
?>


