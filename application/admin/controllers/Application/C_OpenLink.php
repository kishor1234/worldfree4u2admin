<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_OpenLink
 *
 * @author asksoft
 */
require_once controller;
class C_OpenLink extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
       parent::__construct();
        if(!isset($_SESSION["login"])){redirect(HOSTURL."?r=".$this->encript->encdata("login"));}
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
       
        return;
    }

    public function initialize() {
        parent::initialize();
        //die(getcwd());
        $flag=true;
    if(strcmp($this->filterPost("id"), "1")==0){$flag=false;}else{$flag=true;}
        $choise=$this->encript->decdata($_REQUEST["v"]);
        //die("Flat= ".$this->filterPost("id"));
        switch($choise)
        {
        case "login":
            $this->isLoadView($choise, $flag, array());
            break;
        case "otpinput":
            $this->isLoadView($choise, $flag, array());
            break;
        case "V_StaffMemberListByDepartment":
            $this->isLoadView($choise, $flag, array("dept"=>$this->filterPost("master")));
            break;
        case "VLogout":
            session_destroy();
            redirect(HOSTURL."?r=".$this->encript->encdata("login"));
            break;
        default :
            $this->isLoadView($choise, $flag, array());
            break;
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