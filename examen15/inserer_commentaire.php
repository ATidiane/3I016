<?php

function inserer_reponse($forum,$file,$id_post,$from,$texte,$date) {

$forum_tmp=$forum;
$nb=count($forum_tmp['$idpost']['responses'])+1;
$forum_tmp['$idpost']['responses'][$nb]=array("user"=>$from,"date"=>$date,"texte"=>$texte);
$r=fopen($file,'w');
if (!$r) {
return False;
} else {
fputs($r,$forum_tmp)
}

return True;
}

?>