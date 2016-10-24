<?php
error_reporting(E_ALL);

function ouvrante($parser, $name, $attrs) {
  global $tab, $l, $c, $last;

  if ($l == '') $l = 0;
  if ($c == '') $c = 0;
  if ('table' == $name) $tab = array();
  
  if ('tr' == $name) {
    $tab[$l][] = array();
  }
  
  if ('td' == $name) {
    $tab[$l][$c][] = array();

    foreach ($attrs as $k => $v) {
      $tab[$l][$c][$k] = $v;
    }
    
    if (!isset($tab[$l][$c]['style']))
      $tab[$l][$c]['style'] = 'background-color:white';
    if (!isset($tab[$l][$c]['colspan']))
      $tab[$l][$c]['colspan'] = 1;
  }
  $last = $name;
}

function fermante($parser, $name) {
  global $tab, $l , $c;

  if ('tr' == $name) $l = $l+1;
  if ('td' == $name) $c = $c+1;
}

function texte($parser, $data) {
  global $tab, $c, $l, $last;
  if (!trim($data) == '') {
    if (('td' == $last) and (!isset($tab[$l][$c]['contenu'])))
      $tab[$l][$c]['contenu'] = $data;
  }
}

include_once 'entete.php';
include_once 'phraser_table.php';

global $tab, $l, $c;

$fichier = 'testSimpleTable.html';
#$fichier = $_GET['fichier'];
phraser($fichier, 'ouvrante', 'fermante', 'texte');
#var_dump($tab);
#echo ("<br/><br/>Ce tableau contient $l ligne(s) et $c colonne(s)");
return $tab;
?>
