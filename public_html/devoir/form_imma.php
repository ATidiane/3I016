<?php
error_reporting(E_ALL);
function form_imma($chaine) {
  echo "<form action='form_imma.php' method='get'>\n".
       "<fieldset>".
       "<label for='plaque'>Plaque d'immatriculation</label>\n".
       "<input id='plaque' name='plaque' type='text' value='$chaine'/>\n".
       "</fieldset>\n</form>\n";

}
#echo form_imma("Rien");

?>
