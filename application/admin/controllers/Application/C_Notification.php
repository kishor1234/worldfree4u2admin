<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Notification
 *
 * @author asksoft
 */
require_once controller;
class C_Notification extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        if(!isset($_SESSION["login"])){redirect(ASETS."/?r=".$this->encript->encdata("login"));}
        return;
    }

    public function initialize() {
        parent::initialize();
        $sql=$this->select("notification", $_SESSION["db_1"]).  $this->whereSingle(array("notify"=>"0"));
        $result=$this->adminDB[$_SESSION["db_1"]]->query($sql);
        $r=array();
        while ($row=$result->fetch_assoc()){
            $r[]=$row;
        }
        $json=  json_encode($r);
        echo $json;
        $sql=$this->update(array("notify"=>"1"), "notification").$this->whereSingle(array("notify"=>"0"));
        $this->adminDB[$_SESSION["db_1"]]->query($sql);
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
