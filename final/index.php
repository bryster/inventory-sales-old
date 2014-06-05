<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php
    if (isset($_POST['btnLogin'])) {
        if (($_POST['user']!="") && ($_POST['pass']!="")){
            ProcessLogin();
        }else {
            $message = "Username and password is invalid!";
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="stylesheets/web.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/menu.css" />
<SCRIPT language="JavaScript" SRC="javascripts/menu.js"></SCRIPT> 
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
</head>

<body topmargin="20px">
<div id="container1">
  <div id="login"></div>
	<div id="header"></div>
  <div id="mainMenu">
            <ul id="sddm">
                <li><a href="#">Home</a></li>
			</ul>
			<div style="clear:both"></div>
  </div>
    
    <div>
      <div id="content">
        <form method="post">
                <fieldset>
                <legend>Login</legend>
                    <p><label for="user">Username</label> <input type="text" name="user" /></p>
                    <p><label for="pass">Password</label> <input type="password" name="pass" /><br /></p>
                    <p class="submit"><input type="submit" value="Submit" name="btnLogin" /></p>
                </fieldset>
            </form> 
                                <?php
                                    if (isset($_POST['btnLogin'])) {
                                    if($message!=""){
                                        echo $message;
                                    }
                                    }
                                ?>

<?php require("includes/footer.php");?>
