<?php

global $width, $height, $table, $last;

$table = $last = array();

function ouvrante($phraseur, $name, $attrs)
{
  global $width, $height, $table, $last;

  $last['contenu'] = $name;
  switch ($name) {
  case "table": $width = $attrs['width'];$height = $attrs['height'];break;
  case "tr": $table[] = array(); break;
  case "td": 
    $last['colspan'] = isset($attrs['colspan']) ? $attrs['colspan'] : 1;
    $last['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    break;
  }
}

function fermante($phraseur, $name) {}

function texte($phraseur, $data)
{
  global $last, $table;
  if ($last['contenu'] == 'td') {
      $last['contenu'] = trim($data);
      $table[count($table)-1][] = $last;
  }
}

function rectangles($table, $width, $height)
{
	$svg = rectangle($table);
	if (!is_array($svg))
	  echo $svg;
	else {
	  header("Content-Type: image/svg+xml");
	  echo "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>";
	  echo '<?xml-stylesheet type="text/css" href="table.css" ?>';
	  echo "\n<svg  xmlns='http://www.w3.org/2000/svg' width='$width' height='$height'>";	  
	  echo "<g transform='translate(10,10),scale(1,-1)'>";
	  echo join("\n", $svg);
	  echo "</g></svg>";
	}
}

Define('HAUTEUR', 128);
define('EPAISSEUR', 16);
function rectangle($table)
{
	$res = array();
	$i = 1;
	foreach ($table as $ligne) {
	  $k = 0;
	  foreach($ligne as $v) {
	    $j = 1;
	    $res[]= sprintf("\n<rect x='%d' y='-%d' width='%d' height='%ld'
 class='%s' />",
			 $k,
			 $i * HAUTEUR,
			 $v['colspan'] * EPAISSEUR,
			 $v['contenu'],
			 $v['class']
);
	    $k+=$v['colspan'] * EPAISSEUR;
	    $j++;
	  }
	  $i++;
	}
	return $res;
}
function camembert($table, $width, $height)
{
 	header("Content-Type: image/svg+xml");
	echo "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>";
	echo '<?xml-stylesheet type="text/css" href="table.css" ?>';
	echo "\n<svg  xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='$width' height='$height'>";	  
	echo "<g transform='translate(10,500),scale(1,-1)'>";

	$i = 0;
	$angle = 0;
	foreach ($table as $ligne) {
	  echo sprintf("<g transform='translate(%d,%d)'>\n", HAUTEUR + ($i *2 * HAUTEUR), HAUTEUR);
	  $x = HAUTEUR;
	  $y = 0;
	  $k = 0;
	  $j = 1;
	  foreach($ligne as $v) {
	    $angle += $v['contenu']*(3.14*2/100);
	    $xx = cos($angle) * HAUTEUR;
	    $yy = sin($angle) * ( 0 - HAUTEUR);
	    #if (!preg_match('@class:\s*(\w+)@', $v['class'], $m))
	    #  die('style incorrect: ' . $v['class']);
	    echo printf("<path d='M0,0 %f %f A%d,%d 0 %d 0 %f %f ' class='%s'/>\n",
                 $x,
                 $y,
                 HAUTEUR, // commande lineto implicite lorsque M a + de 2 args
                 HAUTEUR,
                 (($v['contenu'] > 50) ? 1 : 0),
                 $xx,
                 $yy,
                 $v['class']);
	    $x = $xx;
	    $y = $yy;
	    $j++;
	  }
	  $i++;
	  echo "</g>";
	}
	echo "</g></svg>"; 
}
require_once('../../TD/6/phraser.php');
phraser('table-pour-svg.html', 'ouvrante', 'fermante', 'texte');
#var_dump($table);
#rectangles($table, $width, $height);
camembert($table, $width, $height);
?>
