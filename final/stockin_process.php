<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php
if (isset($_POST['btnAdd']))
    {
		$prodId = $_POST['id'];
		$prodQOH = $_POST['qoh'];
		$prodAdd = $_POST['add_qty'];
		$totalQOH = $prodAdd + $prodQOH;
		$userid = $_SESSION['id'];
		$memo = $_POST['memo'];


		$query="UPDATE tbl_product SET
				quantity_on_hand = {$totalQOH}
				WHERE prod_id={$prodId} ";
		
		$result = mysql_query($query, $connection);
		
		$id = mysql_insert_id();
		$query1 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type, remarks)
						VALUES ({$userid}, {$prodId}, NOW(), {$prodAdd}, 1, '{$memo}' )";
			
		$result1 = mysql_query($query1, $connection);

		if ($result) {
			redirect_to("item_information.php?prod_id=$prodId");
			exit;
				} 
		else{
			echo "Update product failed";
			echo " <p>" . mysql_error() . "</p> ";
			}
    }
	
    else if(isset($_POST['btnCancel'])){
        $prodId = $_POST['id'];
        redirect_to("item_information.php?prod_id=$prodId");
    }

?>