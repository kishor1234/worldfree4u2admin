<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UpdateNotificationRD
 *
 * @author asksoft
 */

require_once controller;

class C_UpdateNotificationRD extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();
        $sql = $this->update(array("rd" => "1"), "notification") . $this->whereSingle(array("tid" => $_REQUEST["id"]));
        $this->adminDB[$_SESSION["db_1"]]->query(($sql));
        $this->isLoadView($this->encript->decdata($_REQUEST["v"]), true, array("id"=>$_REQUEST["id"]));
        return;
    }

    public function execute() {
        parent::execute();
        return;
    }

    public function finalize() {
        parent::finalize();
        return;
    }

    public function reader() {
        parent::reader();
        return;
    }

    public function distory() {
        parent::distory();
        return;
    }

}
