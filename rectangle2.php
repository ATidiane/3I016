<?php
error_reporting(E_ALL);

function rectangle($table, $hauteur=75, $largeur=50) {

  $totaly = 0;
  $totalheight = 0;
  $tab = array();
  $i = 0;
  foreach ($table as $k => $tr) {
    $j = 0;
    foreach ($tr as $k2 => $td) {

      foreach ($td as $att => $val) {
        $contenu = $table[$k][$k2]['contenu'];
        $colspan = $table[$k][$k2]['colspan'];
        $style = $table[$k][$k2]['style'];
      }

      if ($j == 0) {
        $tab[$i][$j] = array();
        $tab[$i][$j]['height'] = $contenu;
        $tab[$i][$j]['width'] = $colspan*$largeur;
        $tab[$i][$j]['x'] = 0;

        if ($i == 0) $tab[$i][$j]['y'] = $hauteur;
        else
          $tab[$i][$j]['y'] = $totaly + ($totalheight - $tab[$i][$j]['height']); 

        $tab[$i][$j]['fill'] = ($res = preg_match('@: ([^;]+);@', $style, $r)) ?  $r[1] : exit;
        
      } else {
        $tab[$i][$j] = array();
        $tab[$i][$j]['height'] = $contenu;
        $tab[$i][$j]['width'] = $colspan*$largeur;
        $tab[$i][$j]['x'] = $tab[$i][$j-1]['width'] + $tab[$i][$j-1]['x'];
        $tab[$i][$j]['y'] = $tab[$i][$j-1]['y'] + ($tab[$i][$j-1]['height'] - $tab[$i][$j]['height']);
        $tab[$i][$j]['fill'] = ($res = preg_match('@: ([^;]+);@', $style, $r)) ?  $r[1] : exit;
      
      }
      $totaly = $totaly + $tab[$i][$j]['y'];
      $totalheight = $totalheight + $tab[$i][$j]['height'];
      $j = $j+1;
    }
    $i = $i+1;
  }
  return $tab;
}

$t = include 'phraser_table_6.php';
#var_dump(rectangle($t));
#include 'testSimpleTable2.php';
#var_dump(rectangle($ex));


?>
