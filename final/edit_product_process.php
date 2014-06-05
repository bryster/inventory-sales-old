<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?php
if(isset($_POST['btnSave'])){
    $errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('prodName','prodPrice');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
    
    if(!empty($errors)){
	$prod_id = $_POST['prod_id'];
        $msg =  "Some fields are empty or incorrect.";
        redirect_to("edit_product2.php?prod_id=$prod_id");
    }
  }     
?>


<?php
if (isset($_POST['btnSave']))
    {
    $prodId = $_POST['prod_id'];
    $prodName = $_POST['prodName'];
    $prodDesc = $_POST['prodDesc'];
    $prodPrice = $_POST['prodPrice'];
    $userid = $_SESSION['id'];

$query="UPDATE tbl_product SET
        prod_name = '{$prodName}',
        prod_desc = '{$prodDesc}',
        prod_price = '{$prodPrice}',
        userid = '{$userid}'
        WHERE prod_id='{$prodId}' ";

$result = mysql_query($query, $connection);


if ($result) {
    redirect_to("item_information.php?prod_id=$prodId");
    exit;
} else{
echo "Update product failed";
echo " <p>" . mysql_error() . "</p> ";
}
    }
    
    else if(isset($_POST['btnDelete'])){
	
        $p = $_POST['prod_id'];
		
		        $query = "Delete from tbl_product
                  Where prod_id='{$p}'";
    $result = mysql_query($query, $connection);
    if ($result) {
    header ("Location: manage_products.php");
    exit;
    } else{
        echo "Deleting product failed";
        echo " <p>" . mysql_error() . "</p> ";
}

    }
    
    else if(isset($_POST['btnCancel'])){
        $prod_id = $_POST['prodId'];
        redirect_to("item_information.php?prod_id=$prodId");
    }

?>