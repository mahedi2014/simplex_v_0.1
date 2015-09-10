<?php
/**
 * Created by PhpStorm.
 * User: Mahedi Azad
 * Date: 9/10/15
 * Time: 12:10 PM
 */

class Config {
    public $db = array(
        'oracle' =>  array(
            'host' => '',
            'port' => '',
            'service' => '',
            'userName' => '',
            'password' => ''
        ),
        'mysql' => array(
            'host' => '',
            'port' => '',
            'database' => '',
            'userName' => '',
            'password' => ''
        )
    );

    function __construct() {
        $this->host = '';  //IP ADDRESS
        $this->service = 'orcl';  //SERVICE NAME 'orcl'
        $this->port = '1521';  //ORCL PORT
        $this->userName = '';
        $this->password = '';

        $this->orcConnect();
    }

} 