<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php
if (isset($_POST['btnRed']))
    {
    $prodId = $_POST['id'];
    $prodQOH = $_POST['qoh'];
    $prodOut = $_POST['outItem'];
    $totalQOH =  $prodQOH - $prodOut;
    $userid = $_SESSION['id'];
    $remarks = $_POST['memo'];

		if($prodOut<$prodQOH){
			$query="UPDATE tbl_product SET
					quantity_on_hand = {$totalQOH}
					WHERE prod_id={$prodId} ";
			
			$result = mysql_query($query, $connection);
			
			$id = mysql_insert_id();
			$query1 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type, remarks)
							VALUES ({$userid}, {$prodId}, NOW(), {$prodOut}, 2, '{$remarks}' )";
				
			$result1 = mysql_query($query1, $connection);
					
			
			if ($result) {
				redirect_to("item_information.php?prod_id=$prodId");
			} else{
			echo "Update product failed";
			echo " <p>" . mysql_error() . "</p> ";
			}
				}
				else if(isset($_POST['btnCancel'])){
					$prodId = $_POST['id'];
					redirect_to("item_information.php?prod_id=$prodId");
		}else redirect_to("item_information.php?prod_id=$prodId");
    }

?>