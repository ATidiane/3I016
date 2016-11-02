<?php

function array_to_html($forum,$users){
	 
$res="";

foreach ($forum as $k => $v) { // chk message pricipal

$res.="<div class='billet' onclick=voir_message() >\n";
n
$res.="<span>".$v['user']."</span>\n";
$res.="<span>".$v['category']."</span>\n";
$res.="<span>".$v['date']."</span>\n";

$res.="<div class='comments' >\n";
foreach($v['response'] as $key => $val) {
$res.="<div>\n"
$res.="<span>".$val['user']."<span>\n";
$res.="<span>".$val['texte']."<span>\n";
$res.="<span>".$val['date']."<span>\n";
$res.="</div>\n";
}
$res.="</div>\n";

$res.="<form action='' method='get' >\n<fieldset>\n";
$res.="<input type='hidden' name='id_post' />\n";
$res.="<label for=$v['user'] >Texte</label>\n";
$res.="<input id=$v['user'] name='texte'/>\n";
$res.="<input type='submit' value='Send' />\n";

$res.="</div>\n";
}

return $res;
}

?>