    <div id="column_left">
    	<div class="box">
        	<div class="top"><img src="image/product.png" />Products</div>
            <div id="product" class="middle">
            <ul>
            <?php 
			$a=0;
			$prod = DisplayProd();
			while($row = mysql_fetch_array($prod)){
				if($a<10){
					echo "<li><a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']."</a></li>";
				}$a++;
			}
            ?>
            </ul>
            <div align="right">
            <br />
            <a href="#"> View all</a>
            </div>
            </div>
            <div class="bottom"> </div>
        </div>
        <div class="box">
        	<div class="top"><img src="image/icon_information.png" />Information</div>
            <div id="information" class="middle">
            	<ul>
                	<li><a href="#"> About Us</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#"> Terms and Conditions</a></li>
                    <li><a href="#"> Contact Us</a></li>
                </ul>
            </div>
            <div class="bottom"> </div>
        </div>
    </div>
    
    <div id="column_right">
    	<div class="box">
        	<div class="top"><img  src="image/icon_basket.png" />Shopping Cart</div>
            <div class="middle">
            	<div style="text-align:center;">
                <?php 
				$ca = 0;
				if(isset($_SESSION['cust_id'])){
				$cid = $_SESSION['cust_id'];
				$result = CustDisplayCart($cid);
				if(mysql_num_rows($result)==0){
				
					echo "0 items";
				}else {
				$a1=0;
				echo "<table cellpadding=\"2\" cellspacing=\"0\" style=\"width:100%;\">
					<tbody>";
					while($row = mysql_fetch_array($result))
                    {
						$b = $row['ct_qty'] * $row['prod_price'];
						echo"<tr><td valign=\"top\" align=\"right\">".$row['ct_qty']." x </td>
						<td align=\"left\" valign=\"top\"><a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']."</a></td></tr>";
						$ca = $a1 + $b;
                        $a1 = $ca;
					}
				echo "</tbody>
					</table>";
				}
				}else echo "0 items";
				?>
                <br>
                <div style="text-align:right;"><?php if(isset($_SESSION['cust_id'])){  if ($ca!=0) {echo "Sub-Total: Php ".number_format ($ca, 2);} else echo "";} ?></div>
                </div>
            </div>
            <div class="bottom"></div>
        </div>
    </div>
    
    
    