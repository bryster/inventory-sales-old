<?php

	if(isset($_POST['btnCancel'])){
	redirect_to("account.php");
	}
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
			
	if(isset($_POST['btnSubmit'])){
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('firstname','lastname','username','contact','add1','city','email');
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
	
	if(isset($_POST['username'])){
	$user = $_POST['username'];
	$u  = $_SESSION['cust_username'];
	if($user!=$u){
	$check  = SearchDuplicateUsername($user);
		if($_POST['username']==""){$user=1;}
		if (mysql_num_rows($check) != 0) {$ok=2;} 
		}
	}
	
	if(isset($_POST['email'])){
	$email = $_POST['email'];
	$check  = checkEmail($email);
		if($_POST['email']==""){$mail=1;}
		if ($check==2) {$val=1;} elseif($check==true){$val=2;}
	}
	
	if(isset($_POST['contact'])){
		if($_POST['contact']==""){$con=1;}
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
		$cuser = $_POST['username'];
		$cmail = $_POST['email'];
		$ccon = $_POST['contact'];
		$cacon = $_POST['acontact'];
		$cadd1 = $_POST['add1'];
		$ccity = $_POST['city'];
		
		$query="UPDATE tbl_customer SET
        cust_fname = '{$cfname}',
        cust_lname = '{$clname}',
        cus_user = '{$cuser}',
        cust_address = '{$cadd1}',
        cust_contact = '{$ccon}',
        cust_city = '{$ccity}',
        cust_acontact = '{$cacon}'
        WHERE cust_id='{$cust_id}'";
	
	
		$result = mysql_query($query, $connection);
		if ($result) {
		redirect_to("account.php");
		exit;
		} else{
		echo "Updating user failed";
		echo " <p>" . mysql_error() . "</p> ";
		}
	}
}

?>