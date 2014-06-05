<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jorona</title>
<link href="stylesheet/index.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
    <div id="header">
    	<div class="div1">
        	<div class="div2"><img src="image/site_01.gif" /></div>
        </div>
        <div class="div4">
        	<a href="index.php"><img src="image/site_04.gif" /></a><!-- home  -->
            <a href="#"><img src="image/site_05.gif" /></a><!-- featured products  -->
            <a href="account.php"><img src="image/site_06.gif" /></a> <!-- account  -->
            <?php
			if(isset($_SESSION['cust_id'])){
			echo "<a href=\"logout.php\"><img src=\"image/logout_03.gif\" /></a><!-- logout  -->";}
			else {
			echo "<a href=\"login.php\"><img src=\"image/site_07.gif\" /></a><!-- login  -->";}
            ?>
            <img src="image/site_08.gif" /></a>
            <a href="cart.php"><img src="image/site_09.gif" /></a><!-- cart  -->
            <a href="checkout.php"><img src="image/site_10.gif" /></a><!-- checkout  -->
            <img src="image/site_11.gif" /></a>
        </div>
    </div>
