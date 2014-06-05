<?php

	if(isset($_POST['btnBack'])){
	redirect_to("checkout.php");
	}
	$cust_id = $_SESSION['cust_id'];
	$result=SearchAccount($cust_id);
	while($row = mysql_fetch_array($result))
			{
				$fname = $row['cust_fname'];
				$lname = $row['cust_lname'];
				$add = $row['cust_address'];
				$c = $row['cust_city'];
			}
			
	if(isset($_POST['btnSubmit'])){
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('firstname','lastname','add1','city');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
	
	if(isset($_POST['firstname'])){
		if($_POST['firstname']==""){$fname=1;}
	}
	
	if(isset($_POST['lastname'])){
		if($_POST['lastname']==""){$lname=1;}
	}
	
	if(isset($_POST['add1'])){
		if($_POST['add1']==""){$add1=1;}
	}
	
	if(isset($_POST['city'])){
		if($_POST['city']==""){$city=1;}
	}
	
	
	if(empty($errors)){
		$cfname = $_POST['firstname'];
		$clname = $_POST['lastname'];
		$cadd1 = $_POST['add1'];
		$ccity = $_POST['city'];
		
		$query="UPDATE tbl_customer SET
        cust_fname = '{$cfname}',
        cust_lname = '{$clname}',
        cust_address = '{$cadd1}',
        cust_city = '{$ccity}'
        WHERE cust_id='{$cust_id}'";
	
	
		$result = mysql_query($query, $connection);
		if ($result) {
		redirect_to("checkout.php");
		exit;
		} else{
		echo "Updating user failed";
		echo " <p>" . mysql_error() . "</p> ";
		}
	}
}

?>