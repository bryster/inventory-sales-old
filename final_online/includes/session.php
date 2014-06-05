<?php
    session_start();
    
    function confirmed_logged_in(){
        if (!isset($_SESSION['cust_id'])) {
            redirect_to("login.php");
        }
    }
?>