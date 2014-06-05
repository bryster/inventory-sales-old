<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>

<?PHP
        $uid = $_SESSION['id'];
        
	if(isset($_POST['btnSubmit'])){
				
	    $op = $_POST['option'];
		if (count($op) > 0) {
		    for ($i=0;$i<count($op);$i++) { 
				$res = CheckCart($uid);
				 while($row = mysql_fetch_array($res)){
					if($op[$i]==$row['prod_id']){
					$a=1;
					//$q = $row['ct_qty'];
					//	AddDuplicates($op[$i],$uid,$q);
					//	UpdateQty($op[$i]);
					}
				}
                    if($a==0){
                        AddToCart($uid,$op[$i]);
                        UpdateQty($op[$i],$qty);
                    }
					$a=0;
			}
        }
        redirect_to("new_order.php");
	}
	
	
	if(isset($_POST['btnSelectOrder'])){
        $uid = $_SESSION['id'];
        $oid = $_POST['oid'];
        $res = CheckOrder($oid);

	    $op = $_POST['option'];
		if (count($op) > 0) {
		    for ($i=0;$i<count($op);$i++) { 
				$res = CheckOrder($oid);
				 while($row = mysql_fetch_array($res)){
					if($op[$i]==$row['prod_id']){
					$a=1;
					//$q = $row['ct_qty'];
					//	AddDuplicates($op[$i],$uid,$q);
					//	UpdateQty($op[$i]);
					}
				}
                    if($a==0){
                        AddToOrder($oid,$op[$i]);
                        UpdateQty($op[$i],$qty);
                    }
					$a=0;
			}
        }
        redirect_to("change_order.php?oid=$oid");
	}
?>