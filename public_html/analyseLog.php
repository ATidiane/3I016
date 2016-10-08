<?php
error_reporting(E_ALL);

function message_erreur($s, $ip, $mois=date('M')) {
  file_get_contents('/var/log/apache2/error_log', $s);
  define ('RE_IPMOIS', "/($mois).*(0[0-9][0-9]|1[0-9][0-9]|2[0-5][0-6]\.){2}(0[0-9][0-9]|1[0-9][0-9]|2[0-5][0-6])/"
}

?>
