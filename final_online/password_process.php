<?php

	$cust_id = $_SESSION['cust_id'];
	$result=SelectPass($cust_id);
	$r=0;
	if(isset($_POST['opass'])){
		$op = $_POST['opass'];
	}
	while($row = mysql_fetch_array($result))
			{
				$p = $row['cus_pass'];
			}
	$dec_pass = decode2t($p);
	
	if(isset($_POST['btnSubmit'])){
	$errors = array();
	
		$required_fields = array('opass','cpass','pass');
			foreach($required_fields as $fieldname) {
				if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
					$errors[] = $fieldname;
				}
			}
		
		if(isset($_POST['opass'])){
			if($_POST['opass']==""){$opass=1;}
			elseif($_POST['opass']!=$dec_pass){$opass=2;$r=1;}
		}
		
		if(isset($_POST['cpass'])){
			if($_POST['cpass']==""){$cpass=1;$r=1;}
		}
		
		if(isset($_POST['pass'])){
			if($_POST['pass']==""){$pass=1;}
			elseif($_POST['pass']!=$_POST['cpass']){$pass=2;$r=1;}
		}
	
	
	if(empty($errors)){
		if(isset($_POST['opass'])){
		if(($_POST['opass']==$dec_pass) && ($r==0)){
			$npass = $_POST['pass'];
			$enc_npass = encode2t($npass);
			$query="UPDATE tbl_customer SET cus_pass = '{$enc_npass}' WHERE cust_id='{$cust_id}'";
			$result = mysql_query($query, $connection);
				if ($result) {
					redirect_to("account.php");
					exit;
				} else{
					echo "Updating password failed";
					echo " <p>" . mysql_error() . "</p> ";
				}
		}
	}
	}
}
	
	if(isset($_POST['btnCancel'])){
		redirect_to("account.php");
	}
	

?>