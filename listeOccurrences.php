<?php
error_reporting(E_ALL);
include 'entete.php';
include 'array_to_table.php';
echo entete('Test des expressions regulieres');

define ('RE_SECU', '/\b[12]\d{13}\b/');
define ('RE_HEURE', "/([01][1-9]|2[0-3]):([0-5][0-9])/");
define ('RE_MAIL', "/[a-z\'-]+@etu\.upmc\.fr/i");
define ('RE_NOTE', "/\b([0-9]|1[0-9]|20)(\/20)?\b/");

function listeOccurrences($re, $chaine) {
  if (!(preg_match_all($re, $chaine, $res))) {
    return "<div>Erreur: $chaine ne correspond pas au $re</div>";
  }
  $legend="$re $chaine";
  return array_to_table($res[0], $legend);
  /*Remarque: si on utilise preg_match alors
  on retournera array_to_table($res, $legend)
  parce que $res est dans ce cas un tableau simple
  et non un tableau de tableaux de resultats*/
}


define('TEST_SECUSOC', "12345678901234 02345678901234 123456789012345");
define('TEST_HORAIRES', "12:34, 05:18 et 23:14 et ensuite une heure erronée 77:17");
define('TEST_MAILETU', "l’elu@etu.upmc.fr saint-eloi@etu.upmc.fr faux@etu_umpc_fr");
define('TEST_NOTE', "20, 18/20 et 7/20 7.5");

echo listeOccurrences(RE_SECU, TEST_SECUSOC);
echo listeOccurrences(RE_HEURE, TEST_HORAIRES);
echo listeOccurrences(RE_MAIL, TEST_MAILETU);
echo listeOccurrences(RE_NOTE, TEST_NOTE);
    
?>
