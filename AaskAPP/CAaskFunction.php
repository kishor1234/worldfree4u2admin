<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CAaskFunction
 *
 * @author asksoft
 */
define('DB_HOST', 'localhost');
define('DB_PORT', '3036');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'pool_hub');



function hubConnection()
{
    return $mysqlihub_object = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
}

