<?php
error_reporting(E_ALL);

function ouverture($parser, $name, $attrs) {
  global $partition, $last,  $i, $j;
  if ('partition' == $name) $partition = array();
  if ('listenotes' == $name) {
    if ($i == '') $i = 0;
    $j = 0;
    $partition['listenotes'][$i] = array();
  }

  if ('note' == $name) {
    foreach ($attrs as $k => $v) {
      $partition['listenotes'][$i][$j][$k] = $v;
      if (!isset($partition['listenotes'][$i][$j]['alteration'])) $partition['listenotes'][$i][$j]['alteration'] = 'N';
    }
  }
  $last = $name;
}

function fermeture($parser, $name) {
  global $partition, $last, $i, $j;
  if ('listenotes' == $name) $i++;
  if ('note' == $name) $j++;
}
        
function texte($parser, $data) {
  global $partition, $last;
  if ((trim($data) != '')) {
    if ('titre' == $last) $partition['titre'] = $data;
    if ('auteur' == $last) $partition['auteur'] = $data;
  }
}

include_once '../entete.php';
include_once 'lancer_phraseur.php';
$fichier = 'BackToTheFuture.xml';
$res = lancer_phraseur($fichier);
if ($res) #var_dump($partition);
  return $partition;
?>
