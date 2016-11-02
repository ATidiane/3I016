<?php
function lancer_phraseur($fichier)
{
  global $partition;
  $partition = array();
  $xml_phraseur = xml_parser_create();
  
// Les noms de balise et attributs ne doivent pas passer en majuscules
  // automatiquement car XHTML ne le fait pas.
  xml_parser_set_option($xml_phraseur, XML_OPTION_CASE_FOLDING, 0);
  xml_set_element_handler($xml_phraseur, "ouverture", "fermeture");
  xml_set_character_data_handler($xml_phraseur, "texte");
  
  // Ouverture et analyse du fichier
  if (!$fp = fopen($fichier,'r'))
  {
	xml_parser_free($xml_phraseur);
    return array(false, false);
  }
  
  while ($data = fread($fp,256))
  {
  	if(!xml_parse($xml_phraseur, $data, feof($fp)))
  	{
	    xml_parser_free($xml_phraseur);
        return array(xml_get_error_code($xml_phraseur), xml_get_current_line_number($xml_phraseur));
  	}
  }
  xml_parser_free($xml_phraseur);
  return true;
}

function get_xml_error_as_string($errors_array)
{
    return "Erreur XML : " .
      xml_error_string($errors_array[0]) .
      " ligne ".
      $errors_array[1];
}
?>