<?php
error_reporting(E_ALL);

function saisie_fiable($tab, $index, $re='', $val='') {
  if (!isset($tab[$index])) return $val;
  return (!$re or preg_match($re, $tab[$index])) ? true : false;
}

?>
