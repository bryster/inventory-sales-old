<?php
if(isset($_POST['btnSubmit'])){
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('firstname','lastname','username','contact','add1','pass','cpass','city','question','ans','agree','email');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
	
	if(!isset($_POST['agree'])){
		$error=1;
		$r=1;
	}
	
	if(isset($_POST['firstname'])){
		if($_POST['firstname']==""){$fname=1;$r=1;}
	}
	
	if(isset($_POST['lastname'])){
		if($_POST['lastname']==""){$lname=1;$r=1;}
	}
	
	if(isset($_POST['username'])){
	$user = $_POST['username'];
	$check  = SearchDuplicateUsername($user);
		if($_POST['username']==""){$user=1;$r=1;}
		if (mysql_num_rows($check) != 0) {$ok=2;$r=1;} 
	}
	
	if(isset($_POST['email'])){
	$email = $_POST['email'];
	$check  = checkEmail($email);
		if($_POST['email']==""){$mail=1;}
		if ($check==2) {$val=1;$r=1;}
	}
	
	if(isset($_POST['contact'])){
		if($_POST['contact']==""){$con=1;$r=1;}
	}
	
	if(isset($_POST['add1'])){
		if($_POST['add1']==""){$add1=1;$r=1;}
	}
	
	if(isset($_POST['city'])){
		if($_POST['city']==""){$city=1;$r=1;}
	}
	
	if(isset($_POST['pass'])){
		if($_POST['pass']==""){$pass=1;$r=1;}
		elseif($_POST['pass']!=$_POST['cpass']){$pass=2;$r=1;}
	}
	
	if(isset($_POST['ans'])){
		if($_POST['ans']==""){$ans=1;$r=1;}
	}
	
	if(isset($_POST['question'])){
		if($_POST['question']==1){$question=1;$r=1;}
	}


	if(empty($errors)){
		if($r==0){
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$user = $_POST['username'];
		$mail = $_POST['email'];
		$con = $_POST['contact'];
		$acon = $_POST['acontact'];
		$add1 = $_POST['add1'];
		$pass = $_POST['pass'];
		$encrypt_pass = encode2t($pass);
		$city = $_POST['city'];
		$q = $_POST['question'];
		$a = $_POST['ans'];
		
		$query = "INSERT INTO tbl_customer( cust_fname, cust_lname,  cus_user, cus_pass,  cust_contact, cust_acontact, cust_city, cust_question, cust_answer, 						cust_address, cust_email) VALUES ('{$fname}', '{$lname}', '{$user}', '{$encrypt_pass}', '{$con}', '{$acon}','{$city}', '{$q}','{$a}', '{$add1}', '{$mail}')";
	
	
		$result = mysql_query($query, $connection);
		if ($result) {
		redirect_to("login.php");
		exit;
		} else{
		echo "Adding customer failed";
		echo " <p>" . mysql_error() . "</p> ";
		}
		}
	}
}
?>