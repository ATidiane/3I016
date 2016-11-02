 <?php

function partition2svg($partition, $hauteur, $largeur, $largeurtotale)
{
    $position = array('DO'=>0, 'RE'=>1, 'MI'=>2, 'FA'=>3, 'SOL'=>4, 'LA'=>5, 'SI'=>6, 'SILENCE'=>4);

    $resultat = "";
    $resultat .= "<line x1='0' x2='$largeurtotale' y1='0' y2='0' style='fill:none;stroke:black;stroke-width:2px;'/>";

    $i=1;
    foreach($partition['listenotes'] as $portee)
    {
        $x = 0;
        foreach ($portee as $note)
        {
            $y = $i * ($hauteur*8);
            $posY = $y - ($position[$note['valeur']] * $hauteur);
            $posX = $x;
            $w = $note['duree'] * $largeur;
            $h = $hauteur;
            $color = 'SILENCE' == $note['valeur'] ? 'red' : 'green';

            $resultat .= "<rect x='$posX' y='$posY' width='$w' height='$h' fill='$color' />\n";

            $x+= $w + 1;
        }
        $ymin = $i * ($hauteur*9);
        $resultat .= "<line x1='0' x2='$largeurtotale' y1='$ymin' y2='$ymin' style='fill:none;stroke:black;stroke-width:2px;'/>";
        $i+=1;
    }
    return $resultat;
}
#$t = include 'extraction.sax.php';
#echo partition2svg($t, 5, 10, 0); 
 
?> 
