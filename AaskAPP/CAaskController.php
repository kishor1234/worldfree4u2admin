<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CAaskController
 *
 * @author asksoft
 */
require_once getcwd() . "/AaskAPP/CAaskFunction.php";
require_once getcwd() . "/AaskAPP/CStringEncDec.php";
//require_once getcwd() . "/AaskAPP/CMongoDB.php";
define("MSG_Error", "error");

class CAaskController extends CI_Controller {

    public $controllerConfig;
    public $fileStack;
    public $viewConfig;
    public $controllerAppConfig;
    public $modelConfig;
    public $requestArray;
    public $moduleObj;
    public $actionObj;
    public $encript;
    public $adminDB;
    public $slink="http://linkshrink.net/zvpG=http://ouo.io/s/vR3Mllgk?s=";
    //public $mongoObject;
    

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->encript = new CStringEncDec();
        $this->controllerAppConfig = array();
        $this->controllerConfig = array();
        $this->fileStack = array();
        $this->viewConfig = array();
        $this->requestArray = array();
        $this->adminDB = array();
        $this->adminDB = $this->createDBO();
        //$this->mongoObject= new CMongoDB();
        return;
        //$this->create();
    }

    function removeArray() {
        foreach ($this->controllerConfig as $a) {
            array_pop($this->controllerConfig);
        }
        foreach ($this->fileStack as $a) {
            array_pop($this->fileStack);
        }
    }

    /* aasksoft life cycle */

    public function create() {
        $this->encript = new CStringEncDec();
        if(!isset($_SESSION["viewConfig"]) && !isset($_SESSION["controllerAppConfig"]))
        {
        $_SESSION["viewConfig"] = $this->listFolderFiles(getcwd() . "/" . APPLICATION . "/views");//array fo view files
        $_SESSION["controllerAppConfig"] = $this->listFolderFiles(getcwd() . "/" . APPLICATION . "/controllers/");//array of controllers
        $this->viewConfig=$_SESSION["viewConfig"];
        $this->controllerAppConfig=$_SESSION["controllerAppConfig"];        
        }
        else
        {
            
            $this->viewConfig=$_SESSION["viewConfig"];
            $this->controllerAppConfig=$_SESSION["controllerAppConfig"];
        }
        return;
    }

    public function initialize() {
        return;
    }

    public function execute() {
        
        return;
    }

    public function finalize() {
        
        return;
    }

    public function reader() {
        return;
    }

    public function distory() {
        $this->removeArray();
        //unset($this->mongoObject);
        unset($this->adminDB);
        unset($this->encript);
        return;
    }

    /* end aasksoft life cycle */

    function viewHome($viewName) {
        $this->load->view($this->viewConfig[$viewName]);
        return true;
    }

    function viewSpacific($viewName, $flag, $header, $footer,$data) {
        $data["obj"] = $this->encript;
        $data["main"]=$this;
        if ($flag == true) {
            $this->load->view($this->viewConfig[$header], $data);
            $this->load->view($this->viewConfig[$viewName], $data);
            $this->load->view($this->viewConfig[$footer], $data);
        } else {
            $this->load->view($this->viewConfig[$viewName], $data);
        }
    }

    function loadView($viewName, $flag) {
        $data["obj"] = $this->encript;
        $data["k"] = "work";
        if ($flag == true) {
            $this->load->view($this->viewConfig["header"], $data);
            $this->load->view($this->viewConfig[$viewName], $data);
            $this->load->view($this->viewConfig["footer"], $data);
        } else {
            
            $this->load->view($this->viewConfig[$viewName], $data);
        }
    }
    public function test()
    {
        return "work";
    }
    public function isLoadView($viewName, $flag, $data) {
        $data["obj"] = $this->encript;
        $data["main"]=$this;
        if ($flag == true) {
            $this->load->view($this->viewConfig["header"], $data);
            $this->load->view($this->viewConfig[$viewName], $data);
            $this->load->view($this->viewConfig["footer"], $data);
        } else {
            
            $this->load->view($this->viewConfig[$viewName], $data);
        }
    }

    /*function loadClasses() {

        foreach ($this->requestArray as $key => $val) {
            switch ($key) {
                case "module":
                    require_once getcwd() . "/" . APPLICATION . "/controllers/" . $this->controllerAppConfig[$val];
                    break;
                case "action":
                    require_once getcwd() . "/" . aaskModel . $this->modelConfig[$val];
                    //$this->actionObj=new $val;
                    break;
                    //die(getcwd()."/".APPLICATION."/controllers/".$this->controllerAppConfig["login"]);
                    require_once getcwd() . "/" . APPLICATION . "/controllers/" . $this->controllerAppConfig["login"];
                default:break;
            }
        }
    }*/

    function getClassName() {

        if (isset($_REQUEST)) {

            foreach ($_REQUEST as $key => $value) {
                $this->requestArray[$key] = $value;
            }
            if (count($this->requestArray) == 0) {
                $this->requestArray["module"] = "login";
            }
        }
        return;
    }

    function listFolderFiles($dir) {
        $ffs = scandir($dir);
        foreach ($ffs as $ff) {//$tempDir = $ff;
            if ($ff != '.' && $ff != '..') {
                if (is_dir($dir . '/' . $ff)) {
                    array_push($this->fileStack, $ff);
                    $this->listFolderFiles($dir . '/' . $ff);
                } else { $ext = explode(".", $ff);
                    if (isset($ext[1])) {
                        if (strcmp($ext[1], "php") == 0) {
                            $filePath = "";
                            foreach ($this->fileStack as $stackDir) {
                                $filePath.=$stackDir . "/";
                            }
                            $this->controllerConfig[$ext[0]] = $filePath . $ff;
                        }
                    }
                }
            }
        }array_pop($this->fileStack);
        return $this->controllerConfig;
    }

    public function setMessage($msg) {
        define("MSG_Error", $msg);
    }

    public function checkLogin() {
        if (isset($_SESSION['userEmail'])) {

            return true;
        } else {
            return false;
        }
    }

    /*public function createDBO() {

        $tempObjArray = array();
        $tempObject = new mysqli("localhost", "worldfre_user", "root@123", "worldfre_hub");
        $resultQuerty = $tempObject->query("SELECT * FROM `master_db`");
        $i=1;
        while ($row = $resultQuerty->fetch_assoc()) {
            $_SESSION["db_".$i]=$row["user"];$i++;
            $tempObjArray[$row["user"]] = new mysqli($row["host"], $row["username"], $row["password"], $row["db"]);
        }
        return $tempObjArray;
    }*/
     public function createDBO() {
        $tempObjArray = array();
        //$tempObjArray["movies4k_db"]  = new mysqli("localhost", "root", "root", "movies4k_db");
        //$_SESSION["db_1"]="movies4k_db";
         $tempObjArray["epiz_22066016_db"]  = new mysqli("sql113.epizy.com", "epiz_22066016", "Kishor123", "epiz_22066016_db");
         $_SESSION["db_1"]="epiz_22066016_db";
        return $tempObjArray;
    }
    
    /*public function createMongoDB() {
        $config = array(
            'username' => 'kishor',
            'password' => 'kishor',
            'dbname' => 'photo',
            'connection_string' => sprintf('mongodb://%s:%d/%s', '127.0.0.1', '27017', 'admin')
        );
        try {
            if (!class_exists('Mongo')) {
                echo ("The MongoDB PECL extension has not been installed or enabled");
                return false;
            }

            $connection = new \MongoClient($config['connection_string'], array('username' => $config['username'], 'password' => $config['password']));
            return $this->mongoObject = $connection->selectDB($config['dbname']);
        } catch (Exception $e) {
            return false;
        }
    }*/

    public function updateQuery($sql, $db) {

        $this->adminDB = $this->createDBO();
        if ($this->adminDB[$db]->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function orderBy($order,$id)
    {
        return " ORDER BY ".$id." ".$order ." ";
    }
    public function getLastCount($table,$db,$id)
    {
        return "SELECT max(".$id.") FROM ".$db.".".$table." ";
    }
    public function insert($table, $db, $data) {
        
        $sql = "INSERT INTO " . $table;
        $t = "( ";
        $t2 = "( ";
        $i = 1;
        foreach ($data as $key => $val) {
            if ($i != count($data)) {
                $t = $t . $key . ",";
                $t2 = $t2 . "'" . $val . "'" . ",";
            } else {
                $t = $t . $key . " )";
                $t2 = $t2 . "'" . $val . "'" . " )";
            }
            $i++;
        }
        return $sql = $sql . " " . $t . " values " . $t2;
        //return $this->adminDB[$db]->query($sql);
    }
    public function select($table,$db)
    {
        return "SELECT * FROM ".$db.".".$table." ";
        //return $this->adminDB[$db]->query($sql);
    }
    public function selectDistinct($table,$id)
    {
        return "SELECT DISTINCT ".$id." FROM ".$table." ";
    }

    public function where($data,$and)
    {
        $sql=" WHERE ";
        $i=1;
        foreach($data as $key=>$val)
        {
            if($i!=count($data))
            {
               $sql.=$key."=". "'" . $val . "'" ." ".$and." "; 
            }else{
                 $sql.=$key."=". "'" . $val . "'" ." "; 
            }
            $i++;
        }
        return $sql;
    }
    public function whereSingle($data)
    {
        $sql=" WHERE ";
        $i=1;
        foreach($data as $key=>$val)
        {
            if($i==count($data))
            {
               $sql.=$key."=". "'" . $val . "'"; 
            }
        }
        return $sql;
    }
    public function whereSingleLike($data)
    {
        $sql=" WHERE ";
        $i=1;
        foreach($data as $key=>$val)
        {
            if($i==count($data))
            {
               $sql.=$key." LIKE ". "'%" . $val . "%'"; 
            }
        }
        return $sql;
    }
    public function selectCount($table,$col)
    {
        return "SELECT count(".$col.") FROM ".$table." "; 
    }
     public function selectSum($table,$col)
    {
        return "SELECT sum(".$col.") FROM ".$table." "; 
    }
    public function limitWithOffset($offset,$limit)
    {
        return " LIMIT ".$offset." , ".$limit." ";
    }
    public function limitWithOutOffset($limit)
    {
        return " LIMIT ".$limit." ";
    }
    public function delete($table)
    {
        return "DELETE FROM ".$table." ";
    }
    public function updateINC($data, $table) {
        $sql = " UPDATE  " . $table . " SET ";
        $i = 1;
        foreach ($data as $key => $val) {
            if ($i != count($data)) {
                $sql.=$key . "=" . "" . $val . "" . ", ";
            } else {
                $sql.=$key . "=" . "" . $val . "" . " ";
            }
            $i++;
        }
        return $sql;
    }

    public function update($data,$table)
    {
        $sql=" UPDATE  ".$table." SET ";
        $i=1;
        foreach($data as $key=>$val)
        {
            if($i!=count($data))
            {
               $sql.=$key."=". "'" . $val . "'" .", "; 
            }else{
                 $sql.=$key."=". "'" . $val . "'" ." "; 
            }
            $i++;
        }
        return $sql;
    }
    public function checkURL($url) 
    {
        $ch = curl_init(urldecode($url));
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
       // return true;
    }

    public function filterPost($variable_name) {
        return filter_input(INPUT_POST, $variable_name);
    }

    public function filterGet($variable_name) {
        return filter_input(INPUT_GET, $variable_name);
    }

    public function filterRequest($variable_name) {
        return filter_input(INPUT_REQUEST, $variable_name);
    }

    public function selectQuery($sql, $db) {

        $this->adminDB = $this->createDBO();
        return $this->adminDB[$db]->query($sql);
    }

    public function getRandomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*";

        $count = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $count);

            $pass[$i] = $alphabet[$n];
        }

        return implode($pass);
    }

    public function sendMail($reciverEmail, $subject, $message) {

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <no-replay@worldfree4u2.com>' . "no-replay@secsomeshwar.ac.in\r\n";
        mail($reciverEmail, $subject, $message, $headers);
        return true;
    }
    public function sendMailBoth($form,$reciverEmail, $subject, $message) {

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.$form.'>' . $form. "\r\n";
        mail($reciverEmail, $subject, $message, $headers);
        return true;
    }

    public function sendSMS() {
        return true;
    }

    public function newUrl($var) {

        $arrayHostUrl = explode('.', HOSTURL);

        for ($i = 0; $i < count($arrayHostUrl); $i++) {
            if ($i == 0) {
                
            } else {
                $var.="." . $arrayHostUrl[$i];
            }
        }
        return $var;
    }

    function isValidEmail($email) {
        $result=$this->selectQuery("select * from users where email='$email'", "euser");
        if($row=$result->fetch_assoc())
        {
            return true;
        }
 else {
     return false;
 }
    }

    function isValidMobile($mobile) {
        if (!empty($mobile)) { // phone number is not empty
            if (preg_match('/^\d{10}$/', $mobile)) { // phone number is valid
               return true;
                // your other code here
            } else { // phone number is not valid
               return false;
            }
        } else { // phone number is empty
            return false;
        }
    }
    function isPasswordValid($password)
    {
        $passwordErr="";
        if(!empty($password)) {
           
        if (strlen($password) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } 
        return $passwordErr;
    }
    }
    function sendMailtoUser($email)
    {
        $message="<a href='".ASETS."/?r=".$this->encript->encdata('C_UserEmailVerify')."&q=".$this->encript->encdata($this->getID($email))."&d=".$this->encript->encdata(date("d-m-Y"))."'>Verify</a>";
        $this->sendMail($this->filterPost("inputEmail"), "PB verification mail", $message);
        return $message;
    }
    public function dayCount($from, $to) {
        $first_date = strtotime($from);
        $second_date = strtotime($to);
        $offset = $second_date - $first_date;
        return floor($offset / 60 / 60 / 24);
    }

    /*function getID($email)
    {
         $data = array(
            "email" => $email
        );
        $cursor = $this->mongoObject->selectData("en_user", $data);
        if ($cursor != false) {
            $data=$cursor->getNext();
            return $data["_id"];
        }
        return 0;
    }*/
    public function session_set($data)
    {
        foreach($data as $key=>$value)
        {
            $_SESSION[$key]=$value;
        }
    }
    public function session_get($key)
    {
        return $_SESSION[$key];
    }
    public function session_destrory()
    {
        session_destroy();
    }
    public function printMessage($msg, $type) {

        $mssg = '<div class="alert alert-dismissible alert-'.$type.'">';
        $mssg.='<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $mssg.=$msg;
        $mssg.='</div>';
        return $mssg;
    }

    public function getIndianCurrency($number)
    {
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
function displayNew($date)
{
    $currentDate=date("Y-m-d H:m:s");
    $date1=date_create($currentDate);
    $date2=date_create($date);
    $diff=date_diff($date1,$date2);
    return $diff->format("%a");

}
}
