<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_AddNewCategory
 *
 * @author asksoft
 */

require_once controller;
class C_AddNewCategory extends CAaskController {

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
                $sql=$this->insert("category", $_SESSION["db_1"], $_POST);
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $this->isLoadView("V_CategoryTable", false, array());
                $_SESSION["msg"]=$this->printMessage("Success...!", "success");
            }else{
                $_SESSION["msg"]=$this->printMessage("Error ... Retry!", "danger");
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