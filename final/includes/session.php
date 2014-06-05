<?php
    session_start();
    
    function confirmed_logged_in(){
        if (!isset($_SESSION['id'])) {
            redirect_to("index.php");
        }
    }
?>