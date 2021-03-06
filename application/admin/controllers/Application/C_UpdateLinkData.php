<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_UpdateLinkData
 *
 * @author asksoft
 */
require_once controller;

class C_UpdateLinkData extends CAaskController {

    //put your code here
    public $visState = false;

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        //$this->load->view("login.php");
        parent::create();
        if (!isset($_SESSION["login"])) {
            redirect(ASETS . "/?r=" . $this->encript->encdata("login"));
        }
        return;
    }

    public function initialize() {
        parent::initialize();
        try {
            if (isset($_POST)) {
                $data = array("url" => $this->filterPost("url"), "title" => $this->filterPost("title"), "slink" => $this->slink . urlencode($this->filterPost("url")), "size" => $this->filterPost("size"));
                $sql = $this->update($data, "url") . $this->whereSingle(array("id" => $this->filterPost("id")));
                $this->adminDB[$_SESSION["db_1"]]->query($sql);
                $_SESSION["msg"] = $this->printMessage("Success....!", "success");
            } else {
                $_SESSION["msg"] = $this->printMessage("Faild....!", "danger");
            }
        } catch (Exception $ex) {
            $_SESSION["msg"] = $this->printMessage($ex->getMessage(), "danger");
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
