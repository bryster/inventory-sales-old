<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php

if (isset($_POST['btnSave']))
    {
    $errors = array();
    $r=0;
    //Form Validation
    
    $required_fields = array('c_lname','c_fname','c_user','c_pass','c_rpass','c_contact','c_address','c_city');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    if(isset($_POST['c_pass']) && ($_POST['rc_pass'])){
            if($_POST['c_pass'] == $_POST['rc_pass']){ $r=1;}
    }
    
    if(!empty($errors)){
        $msg =  "Some fields are empty or incorrect.";
		echo  $msg;
        //redirect_to("add_new_customer.php");
    }
    
    else if($r!=1){
        $msg = "Retyped password did not match the original password!";
		echo $msg;
        //redirect_to("add_new_customer.php");
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
    $contact = $_POST['c_contact'];
    $altcontact = $_POST['c_altcontact'];
    $city = $_POST['c_city'];
	$q = $_POST['c_question'];
	$a = $_POST['c_answer'];
    $address = $_POST['c_address'];
	$note = $_POST['c_note'];
    
    $query = "INSERT INTO tbl_customer( cust_fname, cust_lname,  cus_user, cus_pass,  cust_contact, cust_acontact, cust_city, cust_question, cust_answer, cust_address, note)
                VALUES ('{$fname}', '{$lname}', '{$user}', '{$pass}', '{$contact}', '{$altcontact}','{$city}', '{$q}','{$a}', '{$address}','{$note}')";

$result = mysql_query($query, $connection);
if ($result) {
    redirect_to("manage_customer.php");
    exit;
	} else{
	echo "Adding customer failed";
	echo " <p>" . mysql_error() . "</p> ";
	}
}
elseif (isset($_POST['btnCancel']))
    {	
	redirect_to("manage_customer.php");
	}
?>
