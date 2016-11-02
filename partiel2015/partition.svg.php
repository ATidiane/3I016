<?php
error_reporting(E_ALL);
$t = include 'extraction.sax.php';
#var_dump($t);
function partition2svg($partition, $hauteur='', $largeur='', $w='') {
  $form = "";
  $tab =
    array(
    'DO' => 0,
    'RE' => 1,
    'MI' => 2,
    'FA' => 3,
    'SOL' => 4,
    'LA' => 5,
    'SI' => 6
    );
  global $i, $nblnote;
  $nblnote = 0;
  $i = 0;
  foreach ($partition as $k => $v) {
    if (is_array($v)) {
      foreach ($v as $k2 => $v2) {
        $nblnote++;
        foreach ($v2 as $k3 => $v3) {
          $notelargeur = $v3['duree'] * $largeur;
          $notehauteur = $hauteur;
          if ($i == 0) {
            $posx = 0;
          }
          else {          
            $posx += $notelargeur + 1;
          }
          if ($v3['valeur'] == 'SILENCE') {
            $posy = 4 * $hauteur;
            $couleur = 'rouge';
          } else {
            $note = $v3['valeur'];
            $posy = ($tab[$note] - $tab['DO']) * $hauteur;
            $couleur = 'vert';
          }
          
          $form .= "<rect height=$notehauteur width=$notelargeur x=$posx y=$posy fill=$couleur/>\n";
          $i++;
        }
      }      
    }
  }
  return $form;
}
echo partition2svg($t, 5, 10);
  
?>
