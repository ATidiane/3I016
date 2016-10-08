<?php
error_reporting(E_ALL);
function array_to_table($tab, $legend) {
  if (!$tab) return '';
  $line='';
  
  foreach ($tab as $key => $val) {
    $line.="<tr><td>$key</td><td>$val</td></tr>\n";
  }
  
  $th="<tr><th>Key</th><th>Value</th></tr>\n";
  $res="<table>\n".
       "<caption>$legend</caption>\n".
       $th.$line.$th.
       "</table>";
  
  return $res;
}

/*echo array_to_table($_GET, 'Contenu de la variable globale $_SERVER');*/
?>
