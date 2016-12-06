<?php

require_once('naviguer.php');
require_once('../entete.php');

$v = isset($_POST['visite']) ? $_POST['visite'] : 1;
$s = isset($_POST['page']) ? ($_POST['page']) : 1;

$bd = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);

$prix = (isset($bd[$s])? $bd[$s] : 1) *(($v > 1) ? ($v-1) : 1);
$title = "Page $s";
echo entete($title) . "<body>\n<h1>". $title ."</h1>\n";
if (!is_numeric($s)) {
    echo "<div> Bon voyage pour ". $prix . "</div>\n";
} else {
    $h = "<div><input type='hidden' name='visite' value='". ($v+1) ."' /></div>\n";
    echo $v;
    echo naviguer($bd, $s, $v, $h);
}
echo "</body>\n</html>";


?>