<?php

include '../cherche_index_n.php';

function naviguer($tab, $num, $mult=1, $corps='') {
    $descriptif = cherche_index_n($tab, $num);
    if (($num <= 0) OR ($num > count($tab))) $num = 1;
    $desc = "<input type='submit' name='page' value=$descriptif /> " . ($tab[$descriptif]*$mult) . " $";
    $input = "";
    if ($num > 1) {
        $input .= "<input type='submit' name='page' value='" . ($num-1) . "' />\n";
    }
    if ($num < count($tab)) {
        $input .= "<input type='submit' name='page' value='" . ($num+1) . "' />\n";
    }
    $corps .= "<fieldset>$desc</fieldset>\n".
        "<fieldset>$input</fieldset>\n";
    return "<form method='post' action='' style= 'widht:15%'>\n". $corps ."</form>\n";
}

/* $bd = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300); */

/* require_once('../entete.php'); */
/* $n = isset($_POST['page']) ? $_POST['page'] : 1; */

/* $titre = "Page $n"; */
/* echo entete($titre), "<body>\n<h1>", $titre, "</h1>\n"; */

/* if (!is_numeric($n)) { */
/*     echo "<div>Bon voyage pour " . $bd[$n] .  "€ </div>"; */
/* } else { */
/*     echo naviguer($bd, $n, '');    */
/* } */

/* echo "</body></html>\n"; */

?>