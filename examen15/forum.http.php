<?php

include('constante.php');
include('entete.php');
include('inserer_commentaire.php');

if( !isset($id=$_GET['id_post']) OR !isset($t=$_GET['texte']) OR !isset($d=$_GET['date']) ) {

header('400,bad request');

}else {

if(isset($u=$_COOKIE['code_auth']){
$ok=1;
for($users as $k => $v){
if($u==$v) {
$ok=2;
}}}

if($ok!=2){
header('401,unauthorized');
}else{
if(!inserer_reponse($forum,'tab_apre_insertion',$id,$u,$t,$d)){
header('400,bad request');
}else {
header('200 OK');
$rep="<div>";
$rep.="<span>".$u."</span">;
$rep.="<span>".$t."</sapn>";
$rep.="<span>".$d."</span>";
$rep.="</div>";
}


?>

