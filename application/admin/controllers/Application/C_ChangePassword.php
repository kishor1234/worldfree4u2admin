<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_ChangePassword
 *
 * @author asksoft
 */

require_once controller;
class C_ChangePassword extends CAaskController {

    //put your code here
    public $visState = false;
    private $old;
    private $pwd;
    private $apwd;
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
               $this->old=$this->filterPost("old");
               $this->pwd=$this->filterPost("pwd");
               $this->apwd=$this->filterPost("apwd");
           }
           else
           {
               $_SESSION["msg"]="System Error please contact admin...";
               die;
           }
        } catch (Exception $ex) {

        }
        return;
    }

    public function execute() {
        parent::execute();
         $sql=$this->select("collegeinfo", $_SESSION["db_1"]).$this->whereSingle(array("id"=>1));
         $result=$this->adminDB[$_SESSION["db_1"]]->query($sql);
         $row=$result->fetch_assoc();
         if(strcmp(md5($this->old), $row["password"])==0)
         {
             if(strcmp($this->pwd,$this->apwd)==0){
                 $sql=$this->update(array("password"=>md5($this->pwd)), "collegeinfo").$this->whereSingle(array("id"=>1));
                 $this->adminDB[$_SESSION["db_1"]]->query($sql);
                 $_SESSION["msg"]="Password Changed Successfully...!";
               
             }else{
                  $_SESSION["msg"]="Password not match...!";
               die;
             }
         }
         else{
              $_SESSION["msg"]="Invalid Password...!";
               die;
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
