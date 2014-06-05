<?php include("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php

// order_status
// 1 = confirmed
// 2 = nadeliver
// 3 = canceled
// 4 pending for approval
/**
  	o_id  	
	o_status 
	o_memo 	
	o_lastupdate
	o_total 
	userid
**/

$userid = $_GET['oid'];
$u = $_GET['u'];
$c = $_GET['c'];
$total = $_GET['total'];

if ($c==2)
    {
    $r = DisplayCart($userid);
    
    $query = "INSERT INTO tbl_order(o_status, o_total, userid, cust_id)
                VALUES ('1', '{$total}', '{$userid}', '{$u}' )";
    $result = mysql_query($query, $connection);
    
    $id = mysql_insert_id();
    while($row = mysql_fetch_array($r))
	{
            $query1 = "INSERT INTO tbl_order_item(o_id, prod_id, od_qty)
                VALUES ('$id','{$row['prod_id']}', '{$row['ct_qty']}')";
                $result1 = mysql_query($query1, $connection);
			
			$query3 = "Insert INTO tbl_record ( userid, prod_id, last_update, quantity, rec_type) 
			VALUES ({$userid}, '{$row['prod_id']}', NOW(), '{$row['ct_qty']}', 2 )";
			$result3 = mysql_query($query3, $connection);
    }
	
	
    
    $query2 = "DELETE FROM tbl_cart 
                WHERE userid = $userid";
                
    $result2 = mysql_query($query2, $connection);
    
        
if ($result1 && $result && $result2) {
    redirect_to("invoice_details.php?oid=$id");
} else{
echo "Inserting records failed";
echo " <p>" . mysql_error() . "</p> ";
}
    }
    

?>