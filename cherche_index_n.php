<?php

function cherche_index_n($tab, $n)
{
    foreach($tab as $k => $v) {
        if (!--$n) return $k;
    }
}

?>