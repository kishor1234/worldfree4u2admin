<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UploadBulkEventImage
 *
 * @author asksoft
 */
require_once controller;
class C_UploadBulkEventImage extends CAaskController {

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
        $dest = "assets/upload/";
        for ($i = 0; $i < count($_FILES["files"]["tmp_name"]); $i++) {
            $filename = time() . "-" . $_FILES["files"]["name"][$i];
            $url = HOSTURL . $dest . $filename;
            $path = getcwd() . "/" . $dest . $filename;
            $temp = $_FILES["files"]["tmp_name"][$i];
            move_uploaded_file($temp, $path);
            $sql=$this->insert("events", $_SESSION["db_1"], array("title"=>$this->filterPost("title"),"dates"=>$this->filterPost("dates"),"url"=>$url,"path"=>$path));
            $this->adminDB[$_SESSION["db_1"]]->query($sql);
        }
        $_SESSION["msg"]="Success..!";
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
