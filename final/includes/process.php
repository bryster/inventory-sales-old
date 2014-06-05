<?php require_once("includes/connection.php");?>
<?php
class Session
{
    var $username;
    var $password;
    var $userlevel;
    var $time;
    
    function Session(){
        $this->time = time();
        $this->startSession();
    }
    
    function startSession(){
        #global $database;  
        session_start();
        $this->logged_in = $this->checkLogin();
    }

}
?>