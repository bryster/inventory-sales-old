<?php

	if(isset($_POST['total'])){
	$total = $_POST['total'];}
	if(isset($_POST['total'])){
	$memo = $_POST['memo'];}
	$cust_id = $_SESSION['cust_id'];
	$result=SearchAccount($cust_id);
	while($row = mysql_fetch_array($result))
			{
				$fname = $row['cust_fname'];
				$lname = $row['cust_lname'];
				$user = $row['cus_user'];
				$mail = $row['cust_email'];
				$add = $row['cust_address'];
				$c = $row['cust_city'];
				$con = $row['cust_contact'];
				if($row['cust_acontact']!=0){$acon = $row['cust_acontact'];}
					else{$acon = "";}
			}
			
	if(isset($_POST['btnContinue']))
	{
	$memo = $_POST['memo'];
		if(!isset($_POST['agree'])){
			$error=1;
			$r=1;
		}
		
		else{
		$result = CustDisplayCart($cust_id);
		$result2 = SelectProduct();
		
		//minus quantity on hand from tbl_products
		while ($row1 = mysql_fetch_array($result)){
			$p1 = $row1['prod_id'];
			$quant = $row1['ct_qty'];
			while($row2= mysql_fetch_array($result2)){
				$p2 = $row2['prod_id'];
				$quant2 =  $row2['quantity_on_hand'] - $quant;
				if($p1==$p2){
					$query4 = "UPDATE tbl_product SET quantity_on_hand = $quant2 WHERE prod_id = $p1 ";
					$res = mysql_query($query4);
				}
			}
		}
			
		// Inserting into tbl_order the order details
		$query = "INSERT INTO tbl_order(o_status, o_total, userid, cust_id, o_memo)
                VALUES ('2', '{$total}', '0', '{$cust_id}', '{$memo}' )";
		$result = mysql_query($query, $connection);
			
	
		
		//insert product from tbl_cart to tbl_order_item
		$id = mysql_insert_id();
		$newres = CustDisplayCart($cust_id);
		while($row5 = mysql_fetch_array($newres))
			{
			$query1 = "INSERT INTO tbl_order_item(o_id, prod_id, od_qty)
			VALUES ('$id','{$row5['prod_id']}', '{$row5['ct_qty']}')";
			$result1 = mysql_query($query1, $connection);
			
			//insert stockout records to tbl_record
			$query3 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type) 
			VALUES (0 , '{$row['prod_id']}', NOW(), '{$row['ct_qty']}', 2 )";
			$result3 = mysql_query($query3, $connection);
			}
			
			//delete cart items
			$query10 = "DELETE FROM tbl_cart WHERE cust_id = $cust_id";
			$result10= mysql_query($query10, $connection);
			
		redirect_to("checkout_success.php?oid=$id");
		}
		
	}
	
?>