<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php

if (isset($_POST['btnSave']))
    {
    $errors = array();
    $r=0;
    //Form Validation
    
    $required_fields = array('lname','fname','user','pass','rpass','address','city','contact');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    if(isset($_POST['pass']) && ($_POST['rpass'])){
            if($_POST['pass'] == $_POST['rpass']){ $r=1;}
    }
    
    if(!empty($errors)){
        $msg =  "Some fields are empty or incorrect.";
        redirect_to("add_new_user.php");
    }
    
    else if($r!=1){
        $msg = "Retyped password did not match the original password!";
        redirect_to("add_new_user.php");
}
}
?>

<?php

if (isset($_POST['btnSave']))
    {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $contact = $_POST['contact'];
    $altcontact = $_POST['altcontact'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $userlevel = $_POST['userlvl'];
    
    $query = "INSERT INTO tbl_users( firstname, lastname,  username, password,  contact, city, userlevel, address, alt_contact)
                VALUES ('{$fname}', '{$lname}', '{$username}', '{$password}', '{$contact}','{$city}', '{$userlevel}', '{$address}','{$altcontact}')";

$result = mysql_query($query, $connection);
if ($result) {
    redirect_to("manage_users.php");
    exit;
	} else{
	echo "Adding user failed";
	echo " <p>" . mysql_error() . "</p> ";
	}
}
elseif (isset($_POST['btnCancel']))
    {	
	redirect_to("manage_users.php");
	}
?>
