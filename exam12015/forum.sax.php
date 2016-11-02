<?php
error_reporting(E_ALL);
include 'functions.php';


function ouverture ($parser, $name, $attrs) {
  global $forum, $id, $user, $date;
  $contenu = "";
  $id;
  $user;
  $date;
  
  if ('forum' == $name) $forum = array();
  if ('post' == $name) {
    $id = $attrs['id'];
    if (isset($i)) {
      $forum[$id] = array();
    }
    foreach($attrs as $key => $val) {
      if ((is_string($val)) and (trim($key) != 'id')) {
        $forum[$id][$key] = $val;
      }  
    }
    $forum[$id]['responses'] = array();
  }
  if ('response' == $name) {
    $user = $attrs['user'];
    $date = $attrs['date'];

  }
}

function fermeture ($parser, $name) {
  global $contenu, $forum, $id, $user, $date;
  if ('response' == $name) {
    $forum[$id]['responses'][count($forum[$id]['responses'])] =
      array("user" => $user,
            "date" => $date,
            "text" => $contenu);
  }
  elseif ('subject' == $name) $forum[$id]['subject'] = $contenu;
  elseif ('text' == $name) $forum[$id]['text'] = $contenu;
  $contenu = "";
}

function texte ($parser, $data) {
  global $contenu;
  if(trim($data) != '') $contenu .= htmlspecialchars($data);
}

$fichier = 'forum.xml';
lancer_phraseur($fichier);
var_dump($forum);

?>
