<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php $oid = $_GET['oid'];?>
    <div id="content">
    	<div class="top"><h1>YOUR ORDER HAS BEEN PROCESSED!</h1></div>
        <div class="middle">
   			<p>Your order has been successfully processed!</p>
            <p>You may check the details of your order <a href="order_details.php?oid=<?php echo $oid;?>">here</a>.</p>
        	<p>You can view your order history by going to the <a href="account.php">My Account</a> page and by clicking on <a href="order_history.php">History</a>.</p>
            
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>