<?php

	$cust_id = $_SESSION['cust_id'];
	$result = SearchAccount($cust_id);
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
			redirect_to("checkout_confirmation.php");
	}
	
	
?>