<?php
error_reporting(E_ALL);

function rectangle($table, $hauteur=75, $largeur=50) {
    $tab = array();
    $i = 0;
    foreach ($table as $tr => $td) {
        $j = 0;
        $tab[$i][$j] = array();

        if ($i == 0) $a = $hauteur;
        else $a = ($i+1)*$hauteur;
        foreach ($td as $att => $val) {
            if ($j == 0) {
                $tab[$i][$j]['height'] = $table[$tr][$att]['contenu'];
                $tab[$i][$j]['width'] = $table[$tr][$att]['colspan']*$largeur;
                $tab[$i][$j]['x'] = 0;
                $tab[$i][$j]['y'] = $a;
                $tab[$i][$j]['fill'] = ($res = preg_match('@: (.+)@', $table[$tr][$att]['style'], $r)) ?  $r[1] : exit;

            }  else {
                $tab[$i][$j]['height'] = $table[$tr][$att]['contenu'];
                $tab[$i][$j]['width'] = $table[$tr][$att]['colspan']*$largeur;
                $tab[$i][$j]['x'] = $tab[$i][$j-1]['width']+$tab[$i][$j-1]['x'];
                $tab[$i][$j]['y'] = $a;
                $tab[$i][$j]['fill'] = ($res = preg_match('@: (.+)@', $table[$tr][$att]['style'], $r)) ?  $r[1] : exit;

            }
            $j = $j+1;
        }
        $i = $i+1;
    }

    return $tab;
}

$t = include 'phraser_table_6.php';
#include 'testSimpleTable2.php';
# rectangle($t);
#var_dump($t);

?>
