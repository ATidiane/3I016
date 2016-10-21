<?php 
error_reporting(E_ALL);

function ouvrante($parser, $name, $attrs){
    echo "<div style='color:green'>Ouverture de:<tt style='color:black'>";
    echo " $name " ;
    foreach ($attrs as $cle=>$valeur){
        echo "$cle='" . $valeur . "' ";
    }
    echo "</tt></div>\n";
}

function fermante($parser, $name){
    echo "<div style='color:red'>Fermeture de : </div>";
    echo "$name<br/>\n";
}

function texte($parser, $data){
    if (trim($data) == ""){
        echo "<div style='color:orange'>Saut de ligne</div>";
    } else {
        echo "<div style='color:blue'>R&eacute;ception du texte : </div>";
        echo $data . "<br/>\n";
    }
}

include("entete.php");
echo entete("Analyse d'un fichier XML d'annuaire");
echo "<body>";
$fichier = $_GET['fichier'];
include('phraser_table.php');
$resultat = phraser($fichier, 'ouvrante', 'fermante', 'texte');   
if ($resultat) {
    echo $resultat;
}
echo "</body>\n</html>\n";
?>
