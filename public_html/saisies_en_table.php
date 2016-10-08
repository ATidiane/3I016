<?php
error_reporting(E_ALL);

/* include 'entete.php';
 * echo entete("Contenu de la variable superglogale $\_SERVER");*/

require('array_to_table.php');

function saisies_en_table($tab, $legend) {
  $r=array();
  
  foreach ($tab as $key => $val) $r[htmlspecialchars($key)] = htmlspecialchars($val, ENT_QUOTES);

  return array_to_table($r, $legend);
}
/* 
 * echo "<body>\n";
 * $legend='<a href="http://fr2.php.net/">$_GET</a> : '.
 *         htmlspecialchars($_SERVER['QUERY_STRING']);
 * echo saisies_en_table($_SERVER, $legend);
 * echo "</body></html>";*/
?>
