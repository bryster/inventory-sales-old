<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php
if (isset($_POST['btnSubmit']))
    {
    $clname = $_POST['cus_lname'];
    $cfname = $_POST['cus_fname'];
    $cuser = $_POST['cus_lname'];
    $cpass = $_POST['cus_lname'];
    $cst = $_POST['cus_st'];
    $ccity = $_POST['cus_city'];
    $ccon = $_POST['cus_con'];
	$ccon2 = $_POST['cus_con2'];
	$note = $_POST['c_note'];

    $query = "INSERT INTO tbl_customer( cust_lname, cust_fname,  cus_user, cus_pass,  cust_address, cust_city, cust_contact,cust_acontact, cust_type, note)
                VALUES ('{$clname}', '{$cfname}', '{$cuser}', '{$cpass}', '{$cst}', '{$ccity}', '{$ccon}','{$ccon2}', 1, '{$note}')";

    
    $result = mysql_query($query, $connection);
    $id = mysql_insert_id();
if ($result) {
    redirect_to("order_summary.php?id=$id");
    
    exit;
} else{
echo "Inserting customer failed";
echo " <p>" . mysql_error() . "</p> ";
}
    }
    
else {
    $id = $_GET['u'];
    $query = "SELECT * FROM tbl_customer WHERE cust_id ='$id'";

    $result = mysql_query($query, $connection);
    redirect_to("order_summary.php?id=$id");
}

?>