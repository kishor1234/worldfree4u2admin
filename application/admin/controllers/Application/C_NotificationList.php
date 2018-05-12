<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_NotificationList
 *
 * @author asksoft
 */
require_once controller;

class C_NotificationList extends CAaskController {

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
        $sql = $this->selectCount("notification", "id") . $this->whereSingle(array("rd" => "0"));
        $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
        $r= $this->adminDB[$_SESSION["db_1"]]->query($sql);
        $ro=$r->fetch_assoc();
        ?>

       
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger"><?php if($ro["count(id)"]==0){}else{echo $ro["count(id)"];}?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header"><?php if($ro["count(id)"]==0){}else{echo "You Have ".$ro["count(id)"]." Message";}?> </li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <?php
                        if($ro["count(id)"]==0){}else{?>
                    <ul class="menu">
                        <?php
                        $sql = $this->select("notification", $_SESSION["db_1"]) . $this->whereSingle(array("rd" => "0")).$this->orderBy("DESC", "id");
        $result = $this->adminDB[$_SESSION["db_1"]]->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li><!-- start message -->
                                <a href="/?r=<?php echo $this->encript->encdata("C_UpdateNotificationRD") . "&v=" . $this->encript->encdata("VViewSingelComment")."&id=".$row["tid"]; ?>">
                                    <div class="pull-left">
                                        <img src="<?php echo $row["image"];?>" class="img-circle" style="height:30px; width: 30px;" alt="User Image">
                                    </div>
                                    <h4>
                                        <?php echo $row["name"];?>
                                        <small><i class="fa fa-clock-o"></i>  <?php echo $row["isDate"];?></small>
                                    </h4>
                                    <p><?php echo $row["descr"];?></p>
                                </a>
                            </li>
                            <?php
                        }
                        
                        ?>
                        <!-- end message -->

                    </ul>
                        <?php
                        
                        }?>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
       

        <?php
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
