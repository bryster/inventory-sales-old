<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php
	if(isset($_POST['btnUpdate']))
	{
	$cid = $_SESSION['cust_id'];
	$qty = $_POST['qty'];
	$id = $_POST['pid'];
		if(isset($_POST['remove']))
		{
			$remove = $_POST['remove'];
			if (count($remove) > 0) {
				for ($i=0;$i<count($remove);$i++) {
					$query1 = "DELETE FROM tbl_cart WHERE prod_id = $remove[$i] AND cust_id = $cid";
					$res = mysql_query($query1, $connection);
				} 
			} 
		}
	
		
		$result = CustDisplayCart($cid);
		
		$counts = mysql_num_rows($result);
		if ($counts > 0) {
			for ($a=0;$a<$counts;$a++) {
			
				$query = "UPDATE tbl_cart SET ct_qty = '{$qty[$a]}' WHERE prod_id = '{$id[$a]}' AND cust_id = '{$cid}'";
				
				$r = mysql_query($query, $connection);
			} 
		} 
		redirect_to("cart.php");
	}
	
	if(isset($_POST['btnContinue']))
	{ redirect_to("index.php"); }
	
	if(isset($_POST['btnCheckout']))
	{ redirect_to("checkout.php"); }
	
?>