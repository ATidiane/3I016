<?php

require_once('../entete.php');
include('naviguer.php');
define("COOKIE_path", "COOKIE/");

function memorise_cookie()  {

    if (!isset($_COOKIE['ahm'])) {
        $id = COOKIE_path . md5(mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        $v = 1;
    } else {
        $id = $_COOKIE['ahm'];
        $v = array_shift(file($id));
    }
    if ($d = fopen($id, 'w+')) {
        fputs($d, $v+1);
        fclose($d);
    }
    
    setcookie('ahm', $id);
    
    return $v;
}


$s = isset($_POST['page']) ? ($_POST['page']) : 1;
$bd = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);
$v = memorise_cookie();
$title = "Page $s";

$prix = (isset($bd[$s])? $bd[$s] : 1) *(($v > 1) ? ($v-1) : 1);
echo entete($title) . "<body>\n<h1>". $title ."</h1>\n";
if (!is_numeric($s)) {
    echo "<div> Bon voyage pour ". $prix . "</div>\n";
} else {
    $h = '';
    echo naviguer($bd, $s, $v, $h);
}
echo "</body>\n</html>";   

?>