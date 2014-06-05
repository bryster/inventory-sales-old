<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="account.php">Account</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("login_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>Account</h1></div>
        <div class="middle">
        <p><b>Welcome, <?php echo $_SESSION['cust_fname']." ".$_SESSION['cust_lname'] ?></b></p>
        <p><b>My Account</b></p>
            <ul>
                <li><a href="edit_account.php">Edit your account information</a></li>
                <li><a href="password.php">Change password</a></li>
            </ul>
            
        <p><b>My Orders</b></p>
            <ul>
                <li><a href="order_history.php">View your order history</a></li>
            </ul>
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>