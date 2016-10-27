<?php
error_reporting(E_ALL);
include 'requete_ressource.php';

function alimenter_cacher($url) {
  $res = requete_ressource('GET', "$url");
  if (is_string($res)) {
    header('HTTP/1.1 404');
    echo $res;
  }
  else {
    list($status, $entetes, $page) = $res;
    header($status);
    foreach ($entetes as $k => $v) header ("$k: $v");
    echo $page;
  }
  return $res;
}

?>
