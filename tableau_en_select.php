<?php
error_reporting(E_ALL);
include ('entete.php');
include ('desc_diplomes.php');
echo entete('tableau_en_select');
function tableau_en_select($tab, $chaine) {
    $form="<form action='choisir_enseignement.php' method='post'>\n<fieldset>\n".
        "<input type='hidden' name='chaine' value='$chaine'/>\n".
        "<select name='annee'>\n";
    foreach ($tab as $key => $value) {
        $form.="<optgroup label='$key'>\n";
        foreach ($value as $k1 => $v1) {
            $form.="<option>$k1</option>\n";
        }
        $form.="</optgroup>\n";
    }
    $form.="</select>\n".
        "<input type='submit'/>\n".
        "</fieldset>\n</form>\n";

    return "<body>\n$form</body>\n</html>\n";
}

echo tableau_en_select($desc_diplomes, 'ahmed');
?>