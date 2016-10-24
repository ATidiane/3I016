<?php
error_reporting(E_ALL);

function ouvrante($parser, $name, $attrs) {
  global $dtd;
  if (!preg_match("@<!ELEMENT\s+$name\s+@", $dtd))
    die("L'element $name ne figure pas dans la DTD");
  foreach($attrs as $key => $value) {
    if (!preg_match("@<!ATTLIST\s+$name\s+$key\s+@", $dtd))
      die("L'attribut $key de l'element $name ne figure pas dans la DTD");
  }
}

function fermante($parser, $name) {
  global $dtd;
  if (!preg_match("@<!ELEMENT\s+$name\s+@", $dtd))
    die("L'element $name ne figure pas dans la DTD");
}

include_once 'phraser_table.php';
header('Content-Type: text/plain; charset=utf-8');
$dtd = $_GET['dtd'];
$dtd = file_get_contents($dtd);
$fichier = $_GET['fichier'];
$res = phraser($fichier, 'ouvrante', 'fermante', '');
if ($res)
  echo $res;
else
  echo "Noms corrects";
?>

  
