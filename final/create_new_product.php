<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php
    $errors = array();
    $r=0;
    //Form Validation
    if(!isset($_POST['btnCancel'])){
    $required_fields = array('prodName','prodPrice');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    
    if(!empty($errors)){
        $msg =  "Some fields are empty or incorrect.";
        redirect_to("add_item.php");
    }
	
	if(isset($_POST['checkbox1'])){
		$q = $_POST['addQty'];
		if($q==""){redirect_to("add_item.php");}
	}
	}
?>

<?php
		if(isset($_POST['checkbox1'])){
			$q = $_POST['addQty'];
			$m = $_POST['memo'];
			$prodName = $_POST['prodName'];
			$prodDesc = trim($_POST['prodDesc']);
			$prodPrice = $_POST['prodPrice'];
			$userid = $_SESSION['id'];
			
				
			$query = "INSERT INTO tbl_product(  prod_name, prod_desc, quantity_on_hand,  prod_price, date_added, userid)
						VALUES ('{$prodName}', '{$prodDesc}', {$q}, {$prodPrice}, NOW(), {$userid})";
			
			$result = mysql_query($query, $connection);
			
			$id = mysql_insert_id();
	
			$query1 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type, remarks)
			VALUES ({$userid}, {$id}, NOW(), {$q}, 1, '{$m}' )";
			
			$query2 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type, remarks)
			VALUES ({$userid}, {$id}, NOW(), 0, 2, '{$m}' )";
	
			$result1 = mysql_query($query1, $connection);

			if ($result) {
				redirect_to("add_image.php?p=$id");
			} else{
			echo "Adding product failed";
			echo " <p>" . mysql_error() . "</p> ";
			}
		}else{
			$prodName = $_POST['prodName'];
			$prodDesc = trim($_POST['prodDesc']);
			$prodPrice = $_POST['prodPrice'];
			$userid = $_SESSION['id'];
			
				
			$query = "INSERT INTO tbl_product(  prod_name, prod_desc,   prod_price, date_added, userid)
						VALUES ('{$prodName}', '{$prodDesc}', {$prodPrice}, NOW(), {$userid})";
			
			$result = mysql_query($query, $connection);
			if ($result) {
				redirect_to("manage_products.php");
			} else{
			echo "Adding product failed";
			echo " <p>" . mysql_error() . "</p> ";
			}
		}
		
		if(isset($_POST['btnCancel'])){
		redirect_to("manage_products.php");
		}
?>
<?php mysql_close($connection); ?>