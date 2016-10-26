<?php
error_reporting(E_ALL);

require_once('requete_ressource.php');
require_once('entete.php');
if (!is_array($res = requete_ressource('HEAD', 'localhost'))) {
    echo $res;
} else {
    $page = '';
    $tab = $res[2];
    foreach ($tab as $key => $val) {
        $page .= "<tr><td>$key</td><td>$val</td></tr>\n";
    }
    $entetes = entete('Entetes SMTP');
    $head = "<tr><th>Cle</th><th>Valeur</th></tr>\n";
    return "$entetes\n<body>\n<table>$head$page$head</table>\n</body></html>";
}

?>