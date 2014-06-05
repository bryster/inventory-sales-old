<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="cart.php">Cart</a> > <a href="checkout.php">Checkout</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("checkout_process.php");?>


    
    <div id="content">
    	<div class="top"><h1>DELIVERY INFORMATION</h1></div>
        <div class="middle">
        <form method="post" enctype="multipart/form-data">
			<b style="margin-bottom:3px; display:block;">Shipping Address</b>
            <div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px; display:inline-block; width:96%;">
            	<?php echo "$lname, $fname<br>"; ?>
                <?php echo "$add<br>"; ?>
                <?php echo "$c<br>"; ?>
                <?php echo "$con (Phone)<br>"; ?>
                <div  style="text-align:right;">
                	<a href="change_add.php">Change Shipping Address</a>
               </div>
            </div>
            <div class="buttons">
            	<table>
                	<tbody>
                    	<tr>
                        	<td align="left"><input type="submit" value="Back" name="btnBack"></td>
                            <td align="right"><input type="submit" value="Continue" name="btnContinue"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>