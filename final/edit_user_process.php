<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('lname','fname','user','pass','userlevel','contact','address','city');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    
    if(!empty($errors)){
        $msg =  "Some fields are empty or incorrect.";
        redirect_to("edit_user2.php");
    }
        
?>

<?php
if (isset($_POST['btnSave']))
    {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $contact = $_POST['contact'];
    $altcontact = $_POST['altcontact'];
    $userlevel = $_POST['userlevel'];
    $city = $_POST['city'];
    $address = $_POST['address'];

$query="UPDATE tbl_users SET
        firstname = '{$fname}',
        lastname = '{$lname}',
        username = '{$user}',
        password = '{$pass}',
        address = '{$address}',
        contact = '{$contact}',
        city = '{$city}',
	userlevel = '{$userlevel}',
        alt_contact = '{$altcontact}'
        WHERE username='{$user}'";
        
$result = mysql_query($query, $connection);
if ($result) { 
    redirect_to("manage_users.php?u=$user");
    exit;
} else{
echo "Adding user failed";
echo " <p>" . mysql_error() . "</p> ";
}
    }
    else if(isset($_POST['btnDelete'])){
        $username = $_POST['username'];
        $query = "Delete from tbl_users
                  Where username='{$username}'";
    $result = mysql_query($query, $connection);
    if ($result) {
    header ("Location: manage_users.php?u=$user");
    exit;
    } else{
        echo "Deleting user failed";
        echo " <p>" . mysql_error() . "</p> ";
}
    } else if (isset($_POST['btnCancel'])){
	$u = $_POST['user'];
	header ("Location: manage_users.php?u=$u");
    }
		
	

?>