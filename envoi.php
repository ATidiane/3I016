<?php
error_reporting(E_ALL);

function rectangles($table, $col=5, $rang=2, $hauteur=75, $largeur=50, $transX=10, $transY=10, $scaleX=1, $scaleY=1) {
$rect = '';
  foreach ($table as $key => $tr) {
    foreach ($tr as $key => $td) {
      $rect .= "<rect ";
      foreach ($td as $att => $val) {
        $rect .= "$att='$val' ";
      }
      $rect .= "/>\n";         
    }
  }

  header('Content-Type: image/svg+xml');
  
  $entete = "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>\n".
            "<svg xmlns='http://www.w3.org/2000/svg' width='160' height='160'>\n".
            "<g transform='translate(10,10),scale(1,1)'>\n";

  $page = "$entete$rect</g></svg>";

  return $page;
  
}

include 'rectangle.php';
include_once 'testSimpleTable2.php';
#include_once 'tablerect.php';
echo rectangles(rectangle($ex));

?>
