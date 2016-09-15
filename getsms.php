<?php

include_once(__DIR__ . '/conf.php');

if(stripos($post_data_str, CELL_NR) !== false) {

	#### richiesta ###
	if(stripos($post_data_str, 'RichiestaStato') !== false) $flag = 'richiesta';
	else if(stripos($post_data_str, 'Spegnimento') !== false) $flag = 'spegnimento';
	else if(stripos($post_data_str, 'Accensione') !== false) $flag = 'accensione';
	else $flag = 'nonriconosciuto';

	#### output ####
	if(stripos($post_data_str, 'Centrale disinserita') !== false) flaggaDb($flag, 'disinserito', $post_data_str);
	else if(stripos($post_data_str, 'Centrale totalmente inserita') !== false) flaggaDb($flag, 'inserito', $post_data_str);
	else flaggaDb($flag, 'nonriconosciuto', $post_data_str);

}

function flaggaDb($richiesta, $output, $post_data_str) {

	queryMySqli(" insert into log (richiesta, outputstr, data_reg, text_str) values ('".$richiesta."', '".$output."', NOW(), '".$post_data_str."') ");

	return false;

}
