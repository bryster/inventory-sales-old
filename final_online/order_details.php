<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="account.php">Account</a> > <a href="order_history.php">Order History</a> > <a href="order_details.php">Invoice</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("display_order.php");?>
    
    <div id="content">
    	<div class="top"><h1>ORDER INVOICE</h1></div>
    
        <div class="middle">
	<div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
	    <table width="100%">
		<tbody>
		    <tr>
			<td width="50%" valign="top">
			    <b> Order ID</b><br>
			    #<?php echo $oid; ?> <br><br>
			    <b>E-Mail</b><br>
			    <?php echo $mail; ?><br><br>
			    <b>Contact</b><br>
			    <?php echo $con; ?>
			    <br><br>
			</td>
			<td width="50%" valign="top">
			    <b>Delivery Address</b><br>
			    <?php echo $fname." ".$lname; ?><br>
			    <?php echo $add; ?><br>
			    <?php echo $c; ?>
			</td>
		    </tr>
		</tbody>
	    </table>
	</div>
        
	<div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
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
					$a = 0;
					while($row = mysql_fetch_array($result)){
					$subtotal = $row['prod_price'] * $row['od_qty'];
					echo "
					<tr>
                        <td align=\"left\" valign=\"top\"><a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']."</a></td>
                        <td align=\"right\" valign=\"top\">".$row['od_qty']."</td>
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
                    	<td colspan="7" align="right" ><b>Total: Php <?php echo number_format($total,2); ?></b></td>
                    </tr>
                    </tbody>
                </table>
        </div>
	
	<b style="margin-bottom: 3px; display:block;">Order History</b>
	<div style="background:#F7f7f7; border:1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
	    <table>
		<tbody>
		    <tr>
			<th align="left">Date Added</th>
			<th align="left">Status</th>
			<th align="left">Comments</th>
		    </tr>
		    <tr>
			<td valign="top"></td>
			<td valign="top"></td>
			<td valign="top"></td>
		    </tr>
		</tbody>
	    </table>
	</div>
	
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>