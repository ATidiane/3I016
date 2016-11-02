<?php
error_reporting(E_ALL);

function super_form($chargerfic) {
  $form = "<form method='post' action='formulaire.html.php'><fieldset>\n".
          "<h2>Charger une partition</h2>\n".
          "<label for='s1'>Chargerfic</label>\n".
          "<input name='chargerfic' id='s1' type='text' value=$chargerfic />\n</br>".
          "<label for='s2'>Echelle</label>\n".
          "<input name='echelle' id='s2' type='text' value='1'/>\n</br>".
          "<input name='requete' value='Charger' type='submit'/>\n".
          "</fieldset></form>\n";

  return $form;
}

#echo super_form("ahmed");
?>
