<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_ReSendOTP
 *
 * @author asksoft
 */
require_once controller;
class C_ReSendOTP extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();

        return;
    }

    public function initialize() {
        parent::initialize();

        return;
    }

    public function execute() {
        parent::execute();
        try
        {
            if(isset($_SESSION["tempEmail"]) && isset($_SESSION["otp"]))
            {
           $this->sendMail($_SESSION["tempEmail"], "Verification", "<p><strong>".$_SESSION["otp"]."</strong> is your One Time Password for Admin Panel Login.</p>");
           $this->printMessage("OTP Send ...", "success"); 
            }
            else{
                session_destroy();
                redirect(ASETS."/?r=".$this->encript->encdata("login"));
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
