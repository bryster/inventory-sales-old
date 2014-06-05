<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php
if(isset($_POST['btnSave'])){
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('c_lname','c_fname','c_user','c_pass','email','c_contact','c_address','c_city');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    
	if(isset($_POST['c_user'])){
	$user = $_POST['c_user'];
	$check  = SearchDuplicateUsername($user);
		if($_POST['c_user']==$user){$ok++;}
		if (mysql_num_rows($check) != 0) {$ok++;$r=1;} 
	}
	
	if(isset($_POST['email'])){
	$email = $_POST['email'];
	$check  = checkEmail($email);
		if($_POST['email']==""){$mail=1;}
		if ($check==2) {$val=1;$r=1;}
	}

	
	if(!empty($errors) && $r!=0){
		$u = $_POST['c_user'];
        $msg =  "Some fields are empty or incorrect.";
		
        redirect_to("customer_detail.php?u=$u");
    }
  }     
?>

<?php

if (isset($_POST['btnSave']))
    {
    $fname = $_POST['c_fname'];
    $lname = $_POST['c_lname'];
    $user = $_POST['c_user'];
    $pass = $_POST['c_pass'];
	$encrypt_pass = encode2t($pass);
    $contact = $_POST['c_contact'];
    $altcontact = $_POST['c_altcontact'];
    $city = $_POST['c_city'];
	$email = $_POST['email'];
    $address = $_POST['c_address'];
	$note = $_POST['c_note'];

$query="UPDATE tbl_customer SET
        cust_fname = '{$fname}',
        cust_lname = '{$lname}',
        cus_user = '{$user}',
        cus_pass = '{$encrypt_pass}',
        cust_address = '{$address}',
        cust_contact = '{$contact}',
        cust_city = '{$city}',
        cust_acontact = '{$altcontact}',
		cust_email = '{$email}',
		note = '{$note}'
        WHERE cus_user='{$user}'";
        
$result = mysql_query($query, $connection);
if ($result) { 
    redirect_to("manage_customer.php?u=$user");
    exit;
} else{
echo "failed";
echo " <p>" . mysql_error() . "</p> ";
}
    }
    else if(isset($_POST['btnDelete'])){
        $username = $_POST['c_user'];
        $query = "Delete from tbl_customer
                  Where cus_user='{$c_user}'";
    $result = mysql_query($query, $connection);
    if ($result) {
    header ("Location: manage_customer.php?u=$user");
    exit;
    } else{
        echo "Deleting user failed";
        echo " <p>" . mysql_error() . "</p> ";
}
    } 
	
else if (isset($_POST['btnCancel'])){
$u = $_POST['c_user'];
header ("Location: manage_customer.php?u=$u");
    }
		
	

?>