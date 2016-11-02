<?php

function get_histogram($forum,$users) {

$posX=0;

$svg="<svg height='500' weight='500' >";

foreach ($users as $u => $v){

$nb_part=0;

foreach ($forum $id_post => $post){

if($post['user']==$v) { $nb_part=$nb_part+1; }

foreach($post['response'] as $k =>$val ){
if($val['user']==$v) { $nb_part=$nb_part+1; }
}

}

$w=30;
$h=$nb_part*10;
$posX=$posX+100;

$svg.="<rect width=".$w." height=".$h." x=".$posX." y="

}


?>