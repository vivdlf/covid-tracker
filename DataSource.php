<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
namespace Phppot;

class DataSource
{

    function getConnection()
    {
        $database_username = 'viv';
        $database_password = 'viv';

        $pdo_conn = new \PDO('mysql:host=localhost;dbname=covidTracker', $database_username, $database_password);
        return $pdo_conn;
    }
}
?>