<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UploadBulkImage
 *
 * @author asksoft
 */
require_once controller;
class C_UploadBulkImage extends CAaskController {

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
            if (!empty($_FILES)) {
                //$root = getcwd();
                $uploadDir =  "assets/upload";
                $tmpFile = $_FILES['file']['tmp_name'];
                $filename = $uploadDir . '/' . time() . '-' . $_FILES['file']['name'];
                $path = getcwd() . "/" . $filename;
                //$actual_link .="/fileupload/" . $uploadDir . '/' . time() . '-' . $_FILES['file']['name'];
                move_uploaded_file($tmpFile, $path);
                $sql=$this->insert("photo_gallery", $_SESSION["db_1"], array("file_url"=>HOSTURL.$filename,"file_path"=>$path,"ip"=>$_SERVER["REMOTE_ADDR"]));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
            }
        } catch (Exception $ex) {

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