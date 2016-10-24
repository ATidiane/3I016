<?php
function ouvrante($parser, $name, $attrs) {
    global $last;
    if (isset($attrs['genre']))
       echo $attrs['genre'], ' ';
    $last = $name;
}

function fermante($parser, $name) {
    global $last;
    if ($last == 'prenom') echo " ";
    if ($last == 'nom') echo "<br/>\n";
    $last = '';
}

function texte($parser, $data) {
    global $last;
    if (($last == 'nom') OR ($last == 'prenom')) echo $data;
}

include 'phraser_table.php';
$fichier = $_GET['fichier'];
$res = phraser($fichier, 'ouvrante', 'fermante', 'texte');
if ($res) echo $res;
?>
