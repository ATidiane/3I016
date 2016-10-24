<?php
error_reporting(E_ALL);
function ouvrante($p, $name, $attrs)
{
    global $dtd;
    if (!preg_match("@<!ELEMENT\s+$name\s+@", $dtd))
        die("l'element $name ne figure pas dans la DTD");
    foreach ($attrs as $k => $v) {
        if (!preg_match("@<!ATTLIST\s+$name\s+$k\s+@", $dtd))
            die("l'attribut $k de $name ne figure pas dans la DTD");
    }
}

function fermante($p, $name){
    global $dtd;
    if (!preg_match("@<!ELEMENT\s+$name\s+@", $dtd))
        die("l'element $name ne figure pas dans la DTD");
}

$fichier = $_GET['fichier'];
$dtd = $_GET['dtd'];
$dtd = file_get_contents($dtd);
include('phraser_table.php');
header('Content-Type: text/plain; charset=utf-8');
$resultat = phraser($fichier, 'ouvrante', 'fermante', '');   
if ($resultat) {
    echo $resultat;
} else echo "Noms corrects."
?>
