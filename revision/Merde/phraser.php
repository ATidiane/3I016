<?php
function phraser($file, $ouvrante='', $fermante='', $texte='') {
    if (!($file AND ($f = fopen($file, "r")))) {
          return("Impossible d'ouvrir le fichier '$file'");
    }
    $sax = xml_parser_create();
    xml_set_element_handler($sax, $ouvrante, $fermante);
    xml_set_character_data_handler($sax, $texte);
    xml_parser_set_option($sax, XML_OPTION_CASE_FOLDING, false);
    while ($data = fread($f, 1024)) {
        if (!xml_parse($sax, $data, feof($f))) {
            $data = sprintf("erreur XML : %s ligne %d",
	        	xml_error_string(xml_get_error_code($sax)),
		        xml_get_current_line_number($sax));
			break;
        }
    }
    xml_parser_free($sax);
    return $data ;
} 
?>
