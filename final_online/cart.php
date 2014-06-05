<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="cart.php">Shopping Cart</a>
    </div>
    
<?php include("includes/sidepanel.php");?>

    
    <div id="content">
    	<div class="top"><h1>SHOPPING CART</h1></div>
        <div class="middle">
        <form action="cart_process.php" method="post" enctype="multipart/form-data" id="cart">
        	<table class="cart">
            	<tbody>
                	<tr>
                    	<th align="center">Remove</th>
                        <th align="center">Image</th>
                        <th align="left">Name</th>
                        <th align="center">Quantity</th>
                        <th align="center">Unit Price</th>
                        <th align="center">Total</th>
                    </tr>
                    
                    <?php
						$cid = $_SESSION['cust_id'];
					$result = CustDisplayCart($cid);
					$a = 0;
					while($row = mysql_fetch_array($result)){
					$subtotal = $row['prod_price'] * $row['ct_qty'];
					echo "
					<tr>
                    	<td align=\"center\"><input type=\"checkbox\" name=\"remove[]\" value=\"".$row['prod_id']."\">
						<input type=\"hidden\" name=\"pid[]\" value=\"".$row['prod_id']."\">
						</td>
                        <td align=\"center\"><a href=\"#\"><img src=\"image/no_image.gif\" height=\"75\" width=\"75\"> </a></td>
                        <td align=\"left\" valign=\"top\"><a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']."</a></td>
                        <td align=\"center\" valign=\"top\"><input type=\"text\" size=\"3\" name=\"qty[]\" value=\"".$row['ct_qty']."\"></td>
                        <td align=\"right\" valign=\"top\">Php ".number_format($row['prod_price'], 2)."</td>
                        <td align=\"right\" valign=\"top\">Php ". number_format($subtotal, 2)."</td>
					</tr>";
						$total = $a + $subtotal;
						$a = $total;
						}
					?>
                    
                    <tr>
                    	<td colspan="7" align="right" ><b>Total: Php <?php echo number_format($total,2); ?></b></td>
                        <br>
                    </tr>
                </tbody>
            </table>
            <div class="buttons">
            	<table>
                	<tbody>
                    	<tr>
                        	<td align="left"><input type="submit" value="Update" name="btnUpdate"></td>
                            <td align="center"><input type="submit" value="Continue Shopping" name="btnContinue"></td>
                            <td align="right"><input type="submit" value="Checkout" name="btnCheckout"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>