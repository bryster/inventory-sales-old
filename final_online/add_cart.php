<?php include("includes/functions.php");?>
<?php

	if(isset($_POST['btnAdd'])){
		$prod_id = $_POST['pid'];
		$qty = $_POST['qty'];
		$cid = $_POST['cid'];
		$check = 0;
		if($qty>0){
			$result = CustCheckCart($cid);
			if(mysql_num_rows($result)>0){
				while($row = mysql_fetch_array($result)){
					if($row['prod_id'] == $prod_id){
						$q = $row['ct_qty'] + $qty;
						$query = "UPDATE tbl_cart SET ct_qty = $q WHERE prod_id = $prod_id AND cust_id =$cid";
						$check++;
					}
				}
			}
			
			
			if($check==0){
				CustAddToCart($cid,$prod_id,$qty);
				redirect_to("products.php?p=$prod_id");
			}else redirect_to("products.php?p=$prod_id");
			
		}
	
	}

?>

