<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UpdatePostData
 *
 * @author asksoft
 */

require_once controller;
class C_UpdatePostData extends CAaskController {

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
        try
        {
            if(isset($_POST))
            {
                $data=array();
                if (!empty($_FILES["file"]["name"])) {
                    $uploadDir = "assets/upload";
                    $tmpFile = $_FILES['file']['tmp_name'];
                    $filename = $uploadDir . '/' . time() . '-' . $_FILES['file']['name'];
                    $path = getcwd() . "/" . $filename;
                    move_uploaded_file($tmpFile, $path);
                    unlink($this->filterPost("path"));
                    $data=array("img"=>HOSTURL.$filename,"path"=>$path,"title"=>$this->filterPost("title"),"description"=>$this->filterPost("txtEditor"),"category"=>$this->filterPost("category"),"byw"=>$_SESSION["login"],"ip"=>$_SERVER["REMOTE_ADDR"]);
                }
                else{
                    $data=array("title"=>$this->filterPost("title"),"description"=>$this->filterPost("txtEditor"),"category"=>$this->filterPost("category"),"byw"=>$_SESSION["login"],"ip"=>$_SERVER["REMOTE_ADDR"]);
             
                }
                $sql=$this->update($data, "post").$this->whereSingle(array("id"=>$this->filterPost("post_id")));
                //echo $sql;die;
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $_SESSION["msg"]=$this->printMessage("Success...!", "success"); 
            }else{
               $_SESSION["msg"]=$this->printMessage("Faild...!", "danger"); 
            }
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