require_once('../entete.php');
include('naviguer.php');
define("COOKIE_path", "COOKIE/");

function protege_cookie()  {

    if (!isset($_COOKIE['ahm'])) {
        $a = mt_rand();
        $id = COOKIE_path . md5($a . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        $v = 1;
    } else {
        $id = $_COOKIE['ahm'];
        list($v,$a) = file($id);
        $id1 = COOKIE_path . md5($a . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

        if ($id != $id1) {
            header("HTTP/1.1 403 Forbidden");
            die("Vol de cookie mon pote");
        }
    }
    if ($d = fopen($id, 'w+')) {
        fputs($d, $v+1 . "\n" . $a);
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