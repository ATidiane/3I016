<?php
error_reporting(E_ALL);                                                                                                                                     
function entete($title)
{
    $entete="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'";
    $entete.="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n";
    $entete.="<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\">\n";
    $entete.="<head>\n";
    $entete.="<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />\n";
    $entete.="<title>$title</title>\n";
    $entete.="</head>\n";
    return $entete;
}                                                                                                                                                           
/*echo entete("Titre");*/
?>
