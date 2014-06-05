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
    <div id="login">Welcome, <?php echo $_SESSION['username'];?> | <a href="logout.php">Logout</a></div>
	<div id="header"></div>
  <div id="mainMenu">
            <ul id="sddm">
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="#" 
                    onmouseover="mopen('m1')" 
                    onmouseout="mclosetime()">Admin Settings</a>
                    <div id="m1" 
                        onmouseover="mcancelclosetime()" 
                        onmouseout="mclosetime()">
                    <a href="manage_users.php">Manage Accounts</a>
                    <a href="logs.php">Accounts Logs</a>
                    </div>
                </li>
                <li><a href="#" 
                    onmouseover="mopen('m2')" 
                    onmouseout="mclosetime()">Items</a>
                    <div id="m2" 
                        onmouseover="mcancelclosetime()" 
                        onmouseout="mclosetime()">
                    <a href="manage_products.php">Manage Items</a>
                    <a href="add_item.php">Add New Item</a>
                    <a href="stockinView.php">View Inventory</a>
                    </div></li>
                <li><a href="#"
                    onmouseover="mopen('m3')" 
                    onmouseout="mclosetime()">Invoice</a>
                    <div id="m3"
                        onmouseover="mcancelclosetime()" 
                        onmouseout="mclosetime()">
                    <a href="manage_order.php">Manage Invoice</a>
                    <a href="new_order.php">New Invoice</a>
                    </div></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="#">Help</a></li>
			</ul>
			<div style="clear:both"></div>