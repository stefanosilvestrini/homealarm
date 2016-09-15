<?php

echo 'messo exit'; exit;

date_default_timezone_set('Europe/Paris');

# error_reporting(E_ALL); ini_set('display_errors', 1);

##################################
############### DB ###############
# DROP TABLE IF EXISTS `log`;
# CREATE TABLE `log` (
# `id` int(11) NOT NULL,
#   `richiesta` varchar(255) NOT NULL,
#   `outputstr` varchar(255) NOT NULL,
#   `text_str` varchar(255) NOT NULL,
#   `data_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
# ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
# ALTER TABLE `log` ADD PRIMARY KEY (`id`);
# ALTER TABLE `log` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
##################################

if(strpos($_SERVER['HTTP_HOST'], '8888') !== false ) {

    #### local configurations ####
    include_once(__DIR__ . '/ignore/conf_local.php');

} else {
    
    include_once(__DIR__ . '/ignore/conf_remote.php');
    
} 

function queryMySqli($query_sql) {

    $mysqli_connect = new mysqli(DEFAULT_DB_HOST, DEFAULT_DB_USER, DEFAULT_DB_PASSWORD, DEFAULT_DB_NAME, DEFAULT_DB_PORT);
    if(mysqli_connect_error()) { die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error()); } 

    $mysqli_connect -> set_charset("utf8");

    $result_mysqli = $mysqli_connect -> query($query_sql, MYSQLI_USE_RESULT); 

    if(!empty($mysqli_connect -> error)) {

        die($mysqli_connect -> error);

    } else {

        if(!empty($mysqli_connect -> insert_id)) $id_inserted = $mysqli_connect -> insert_id;
        else {

            if(!empty($result_mysqli -> type)) {

                $array_result = array(); while($array_result[] = $result_mysqli -> fetch_assoc()); $array_result = @array_filter($array_result); $result_mysqli -> close();

            } 
                
        }   

        if(!empty($id_inserted)) return $id_inserted;
        else {
            
            if(empty($array_result)) return false;
            return $array_result;

        }

    }

}