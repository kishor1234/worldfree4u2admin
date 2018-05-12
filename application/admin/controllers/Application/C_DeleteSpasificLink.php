<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_DeleteSpasificLink
 *
 * @author asksoft
 */

require_once controller;
class C_DeleteSpasificLink extends CAaskController {

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
                $sql=$this->delete("url").$this->whereSingle(array("id"=>$this->filterPost("id")));
               
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $_SESSION["msg"]=$this->printMessage("Success...!", "success");
                $this->isLoadView("V_UrlTable", false, array("post_id"=>$this->filterPost("post_id")));
            }else{
                $_SESSION["msg"]=$this->printMessage("Faild...!", "danger");
            }
        } catch (Exception $ex) {
            $_SESSION["msg"]=$this->printMessage($ex->getMessage(), "danger");
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