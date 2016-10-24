<?php
error_reporting(E_ALL);

function rectangle($table, $hauteur=75, $largeur=50) {
  $tab = array();
  $i = 0;
  foreach ($table as $tr => $td) {
    $j = 0;
    foreach ($td as $att => $val) {
      if ($j == 0) {
        $tab[$i][$j][] = array();
        $tab[$i][$j]['height'] = $table[$tr][$att]['contenu'];
        $tab[$i][$j]['width'] = $table[$tr][$att]['colspan']*$largeur;
        $tab[$i][$j]['x'] = 0;
        $tab[$i][$j]['y'] = $hauteur;
        $tab[$i][$j]['fill'] = ($res = preg_match('@: (.+)@', $table[$tr][$att]['style'], $r)) ?  $r[1] : exit;
      } else {
        $tab[$i][$j][] = array();
        $tab[$i][$j]['height'] = $table[$tr][$att]['contenu'];
        $tab[$i][$j]['width'] = $table[$tr][$att]['colspan']*$largeur;
        $tab[$i][$j]['x'] = $tab[$i][$j-1]['width']+$tab[$i][$j-1]['x'];
        $tab[$i][$j]['y'] = $hauteur;
        $tab[$i][$j]['fill'] = ($res = preg_match('@: (.+)@', $table[$tr][$att]['style'], $r)) ?  $r[1] : exit;
      }
      $j = $j+1;
    }
    $i = $i+1;
  }

  return $tab;
}

#$t = include 'phraser_table_6.php';
#include 'testSimpleTable2.php';
#var_dump(rectangle($ex));
#var_dump($t);

?>
