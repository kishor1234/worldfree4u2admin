<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_DeleteCategory
 *
 * @author asksoft
 */

require_once controller;
class C_DeleteCategory extends CAaskController {

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

        return;
    }

    public function execute() {
        parent::execute();
        try{
            if(isset($_POST)){
                $id=$this->filterPost("id");
                $this->adminDB[$_SESSION["db_1"]]->query($this->delete("category").$this->whereSingle(array("id"=>$id)));
                $_SESSION["msg"]=$this->printMessage("Success...!", "success");
                $this->isLoadView("V_CategoryTable", false, array());
            }else{
                $_SESSION["msg"]=$this->printMessage("Faild..! Retry..", "danger");
            }
        } catch (Exception $ex) {

        }
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
