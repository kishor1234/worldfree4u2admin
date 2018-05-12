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
class C_DeleteCompletePost extends CAaskController {

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
            $sql=$this->select("post", $_SESSION["db_1"]).$this->whereSingle(array("id"=>$id));
            $result=$this->adminDB[$_SESSION["db_1"]]->query($sql);
            $row=$result->fetch_assoc();
            if(!empty($row["path"]))
            {
                unlink($row["path"]);
            }
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("post").$this->whereSingle(array("id"=>$id)));
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("url").$this->whereSingle(array("post_id"=>$id)));
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("postcvc").$this->whereSingle(array("post_id"=>$id)));
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("comment").$this->whereSingle(array("post_id"=>$id)));
            $this->adminDB[$_SESSION["db_1"]]->query($this->delete("report").$this->whereSingle(array("post_id"=>$id)));
            $_SESSION["msg"]=$this->printMessage("Success", "success");
            $this->isLoadView($this->encript->decdata($_REQUEST["v"]), false, array());
            
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