<?php

include ('entete.php');
include ('functions.php');

function ouverture($parser,$name,$attrs) {

  global $forum;
  global $contenu;
  global $id;

if('forum'==$name){
	$forum=array();
} // i think its not needed , u can straightly put for the posts!

if('post'==$name){
$id=$attrs['id'];
  $forum[$id]=array();
  $forum[$id]['response']=array();
  $forum[$id]['user']=$attrs['user'];
  $forum[$id]['category']=$attrs['category'];
  $forum[$id]['date']=$attrs['date'];
}


if('response'==$name){
//  $forum[$id]['response']=array();
  $nb=count($forum[$id]['response']);
$forum[$id]['response'][$nb]['user']=$attrs['user'];
$forum[$id]['response'][$nb]['date']=$attrs['date'];
$forum[$id]['response'][$nb]['contenu']=$contenu;
}

}


function texte($parser,$data) {
	 
  global $contenu;
  if (trim($data) != '') $contenu=$data; 

}


function fermeture($parser,$name) {
  global $id;
  global $contenu;
  if('subject'==$name){
$forum[$id]['subject']=$contenu;
}
  if('text'==$name){
   // echo "je suis la";
  //  echo $id;
//    echo $contenu;
$forum[$id]['text']=$contenu;
    echo $forum[$id]['text'] ;
    echo ",,,,,,,,,,,,,";
  }

}


echo entete("ForumTest1");
$res=lancer_phraseur('forum.xml');
if(!$res){
	echo $res;
}else{
	var_dump($forum);
}

?>
