<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="checkout.php">Checkout</a> > <a href="checkout_confirmation.php">Confirm</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("confirmation_process.php");?>


    
    <div id="content">
    	<div class="top"><h1>CHECKOUT CONFIRMATION</h1></div>
        <div class="middle">
        <form method="post" enctype="multipart/form-data">
        <?php if(isset($error)){ if($error==1){echo "<div class=\"warning\">Error: You must agree to the Terms and Conditions! </div>";} } ?>
			<b style="margin-bottom:3px; display:block;">Shipping Address</b>
            <div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px; display:inline-block; width:96%;">
            	<?php echo "$lname, $fname<br>"; ?>
                <?php echo "$add<br>"; ?>
                <?php echo "$c<br>"; ?>
                <?php echo "$con (Phone)<br>"; ?>
                <div  style="text-align:right;">
                	<a href="change_add.php"> </a>
               </div>
            </div>
            
            <div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px; display:inline-block; width:96%;">
            	<table width="100%">
                    <tbody>
                    	<tr>
                        	<th align="left">Product</th>
                            <th align="right">Quantity</th>
                            <th align="right">Price</th>
                            <th align="right">Total</th>
                        </tr>
                        <?php
					$cid = $_SESSION['cust_id'];
					$result = CustDisplayCart($cid);
					$a = 0;
					while($row = mysql_fetch_array($result)){
					$subtotal = $row['prod_price'] * $row['ct_qty'];
					echo "
					<tr>
                        <td align=\"left\" valign=\"top\"><a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']."</a></td>
                        <td align=\"right\" valign=\"top\">".$row['ct_qty']."</td>
                        <td align=\"right\" valign=\"top\">Php ".number_format($row['prod_price'], 2)."</td>
                        <td align=\"right\" valign=\"top\">Php ". number_format($subtotal, 2)."
						<input type=\"hidden\" name=\"total\" value=\"$subtotal\">
						</td>
					</tr>";
						$total = $a + $subtotal;
						$a = $total;
						}
					?>
                    <tr></tr>
                    <tr>
	                    <br>
                    	<td colspan="7" align="right" ><b>Total: Php <?php echo number_format($total,2); ?></b></td>
                        <br>
                    </tr>
                    </tbody>
                </table>
            </div>
            
            <b style="margin-bottom:3px; display:block;">Add Comments To Your Order</b>
            <div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px; display:inline-block; width:96%;">
            	
            	<textarea name="memo" rows="8" style="width: 99%;"></textarea>
            </div>
            
            <div class="buttons">
            	<table>
                	<tbody>
                    	<tr>
                        	<td align="left"><input type="submit" value="Back" name="btnBack"></td>
                            <td align="right">I have read and agree to the <a href="#">Terms & Conditions</a>
                            <input type="checkbox" name="agree" value="1">
                            <input type="submit" value="Continue" name="btnContinue"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>
