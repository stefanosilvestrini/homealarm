<?php

include_once(__DIR__ . '/conf.php');

if($_POST['set_alarm'] == 'inserito') $url = 'https://maker.ifttt.com/trigger/'.MAKER_TRIGGER_ON.'/with/key/'.MAKER_TOKEN;
else if($_POST['set_alarm'] == 'disinserito') $url = 'https://maker.ifttt.com/trigger/'.MAKER_TRIGGER_OFF.'/with/key/'.MAKER_TOKEN;

if(!empty($url)) file_get_contents($url);