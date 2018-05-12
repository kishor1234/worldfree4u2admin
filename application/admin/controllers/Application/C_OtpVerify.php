<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_OtpVerify
 *
 * @author asksoft
 */
require_once controller;

class C_OtpVerify extends CAaskController {

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
        try {
            if (isset($_POST)) {
                if (strcmp($_SESSION["otp"], $this->filterPost("otp")) == 0 && strcmp($_SESSION["tempEmail"], $this->filterPost("email")) == 0) {
                    $_SESSION["login"] = $this->filterPost("email");
                    redirect(HOSTURL . "?r=" . $this->encript->encdata("C_OpenLink") . "&v=" . $this->encript->encdata("Dashboard"));
                } else {
                    $_SESSION["msg"] = "Invalid OTP..";
                    redirect(HOSTURL . "?r=" . $this->encript->encdata("C_OpenLink") . "&v=" . $this->encript->encdata("otpinput"));
                }
            } else {
                $_SESSION["msg"] = "Invalid OTP....";
                redirect(HOSTURL . "?r=" . $this->encript->encdata("C_OpenLink") . "&v=" . $this->encript->encdata("otpinput"));
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
