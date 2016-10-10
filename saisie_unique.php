<?php
error_reporting(E_ALL);
include 'entete.php';

if (!intval($_GET['id'])) {
  $titre=(isset($_GET['id']) ? 'Erreur : ' : '') . 'Identifcation';
  $body= "<body>\n".
         "<form action='saisie_unique.php' method='get'>\n<fieldset>\n".
         "<label for='id'>Identifiant</label>\n".
         "<input name='id' id='id' type='text'>\n".
         "</fieldset>\n</form>\n</body>\n</html>\n";
  echo entete($titre) . $body;
} else {  
  include 'desc_diplomes.php';
#  include 'tableau_en_select.php';
# echo array_to_table($desc_diplomes, $_GET['id']);
}
?>
