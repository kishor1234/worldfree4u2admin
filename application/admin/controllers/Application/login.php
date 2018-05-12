<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author asksoft
 */
//die(APPLICATION);
//require_once getcwd() . '/' . APPLICATION . "/controllers/Crout.php";
require_once controller;
class login extends CAaskController {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function create() {
        parent::create();
        if(isset($_SESSION["login"])){ redirect(HOSTURL . "?r=" . $this->encript->encdata("C_OpenLink") . "&v=" . $this->encript->encdata("Dashboard"));}
        return;
    }

    public function initialize() {
        parent::initialize();
        $this->isLoadView("login", false, array());
        return;
    }

    public function execute() {
        //parent::execute();
        return;
    }

    public function finalize() {
        //parent::finalize();
        return;
    }

    public function reader() {
        //parent::reader();
        return;
    }

    public function distory() {
        //parent::distory();
        return;
    }

   
}
