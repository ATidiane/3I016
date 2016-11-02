<?php
function ouverture($p, $name, $attrs)
{
    global $partition, $contenu;
    if( "partition" == $name)
    {
        $partition['titre'] = "";
        $partition['auteur'] = "";
        $partition['listenotes'] = array();

    } elseif ("listenotes" == $name)
    {
        $partition['listenotes'][] = array();

    } elseif ("note" == $name)
    {
        $partition['listenotes'][count($partition['listenotes'])-1][] =
            array("valeur" => $attrs['valeur'],
                  "duree" => $attrs['duree'],
                  "alteration" => @$attrs['alteration']?$attrs['alteration']:'N');
    }
    $contenu = "";
}

function fermeture($p, $name)
{
    global $partition, $contenu;
    if( "titre" == $name)
    {
        $partition['titre'] = trim($contenu);

    } elseif ("auteur" == $name)
    {
        $partition['auteur'] = trim($contenu);

    }
    $contenu = "";
}

function texte($p, $data)
{
    global $contenu;
    $contenu .= $data;
}

include 'lancer_phraseur.php';
$fichier = 'BackToTheFuture.xml';
$res = lancer_phraseur($fichier);
if ($res) var_dump($partition);
?>
