<?php

	$oid = $_GET['oid'];
	$result=DisplayPerOrder($oid);
        
        $cust_id = $_SESSION['cust_id'];
	$result1 = SearchAccount($cust_id);
	while($row = mysql_fetch_array($result1))
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

?>