<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_AddMoreLink
 *
 * @author asksoft
 */

require_once controller;
class C_AddMoreLink extends CAaskController {

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
            if(isset($_POST)){
               $post_id=$this->filterPost("post_id");
                
                $turl=(int)$this->filterPost("turl");
                
                for($i=1;$i<=$turl;$i++)
                {
                    $data=array("post_id"=>$post_id,"slink"=>$this->slink.urlencode($this->filterPost("url_".$i)),"url"=>$this->filterPost("url_".$i),"title"=>$this->filterPost("titl_".$i),"size"=>$this->filterPost("size_".$i));
                    $sql=$this->insert("url", $_SESSION["db_1"], $data);
                    $this->adminDB[$_SESSION["db_1"]]->query($sql);
                }
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