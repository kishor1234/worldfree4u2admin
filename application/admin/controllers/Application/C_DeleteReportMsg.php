<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_DeleteCompletePost
 *
 * @author asksoft
 */

require_once controller;
class C_DeleteReportMsg extends CAaskController {

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
        try{
            $id=$this->filterPost("id");
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("report").$this->whereSingle(array("id"=>$id)));
            $_SESSION["msg"]=$this->printMessage("Success", "success");
            $this->isLoadView("V_AllRepotsTable", false, array());
            
        } catch (Exception $ex) {
             $_SESSION["msg"]=$this->printMessage($ex->getMessage(), "danger");
        }
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