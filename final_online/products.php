<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/header.php");?>
<?php 
	$cid = $_SESSION['cust_id'];
	$prod_id = $_GET['p'];
	$result = DisplayProd_id($prod_id);
	while($row = mysql_fetch_array($result)){
		$prod_name = $row['prod_name'];
		$prod_desc = $row['prod_desc'];
		$prod_price = $row['prod_price'];
		$qoh = $row['quantity_on_hand'];
	}
?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="products.php?p=<?php echo $prod_id ?>"> <?php echo $prod_name; ?> </a>
    </div>
<?php include("includes/sidepanel.php");?>
    
    <div id="content">
    	<div class="top"><h1><?php echo $prod_name ?></h1></div>
        <div class="middle">
        	<div style="width:100%; margin-bottom:30px;">
             	<table style="100%; border-collapse:collapse;">
                	<tbody>
                    	<tr>
                        	<td style="text-align:center; width:250px; vertical-align:top;">
                            	<img src="image/no_image.gif" height="250" width="250" title="<?php echo $prod_name; ?>" style="margin-bottom:3px;">
                            </td>
                        	<td style="padding-left:15px; width:296px; vertical-align:top;">
                            	<table width="100%">
                                	<tbody>
                                    	<tr>
                                        <td><b>Name:</b></td><td><?php echo $prod_name; ?></td>
                                        </tr>
                                    	<tr>
                                        <td><b>Price:</b></td><td>Php <?php echo number_format($prod_price,2); ?></td>
                                        </tr>
                                        <tr>
                                        <td><b>Availability:</b></td><td><?php if($qoh>0){echo "In Stock";}else echo "Out of Stock"; ?></td>
                                        </tr>
                                        <tr>
                                        <td style="vertical-align:top;"><b>Description:</b></td><td align="justify"><?php echo $prod_desc; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
				<?php if ($qoh>0){
					echo "
					<form action=\"add_cart.php\" method=\"post\" enctype=\"multipart/form-data\">
					<div style=\"background:#f7f7f7; border:1px solid #DDDDDD; padding:10px;\">
					Quantity: <input type=\"text\" name=\"qty\" size=\"3\">
					<input type=\"hidden\" name=\"pid\" value=".$prod_id." > 
					<input type=\"hidden\" name=\"cid\" value=".$cid.">     
					<input type=\"submit\" name=\"btnAdd\" value=\"Add to Cart\"> 
					</div>
					</form>";
				}
				?>
				</td>
                        </tr>
                    </tbody>
                </table>
        	</div>
            </div>
            
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>