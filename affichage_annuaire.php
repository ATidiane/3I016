<?php 
error_reporting(E_ALL);
function ouvrante($p, $name, $attrs)
{
    global $last; 
    if (isset($attrs['genre']))
        echo $attrs['genre'], ' ';
    $last = $name;
}

function fermante($p, $name){
    global $last;
    if ($last == 'nom')
        echo "\n";
    if ($last == 'prenom')
        echo " ";
    $last = '';
}

function texte($p, $text){
  global $last;
  if (($last == 'nom') OR ($last == 'prenom'))
      echo $text;
}

$fichier = $_GET['fichier'];;
include('phraser_table.php');
header('Content-Type: text/plain; charset=utf-8');
$resultat = phraser($fichier, 'ouvrante', 'fermante', 'texte');   
if ($resultat) {
    var_dump($resultat);
} 
?>
