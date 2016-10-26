<?php
error_reporting(E_ALL);

function tableau_mail($nomail, $entetes, $corps) {
    $tabent = '';
    foreach ($entetes as $ent => $val) {
        if (!is_array($ent))
            $tabent .= "<tr><td>htmlspecialchars($ent)</td><td>htmlspecialchars($val)</td></tr>\n";
        else {
            $tabent .= "<tr><td>$ent</td><td><ul>";
            foreach ($val as $v) {
                $tabent .= "<li>$v</li>";
            }
            $tabent .= "</ul></td></tr>";
        }
    }
}

?>