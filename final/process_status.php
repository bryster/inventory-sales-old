<?php include("includes/functions.php");?>
<?php require_once("includes/session.php");?>
<?php
    /** Status $_GET['act']
        1001 | Cancel
        1002 | Approve
        1003 | Complete
        1004 | Return
		1005 | Change
        
        tbl_order - status
        1 | Approved
        2 | Pending
        3 | Canceled
        4 | Completed
        5 | Returned
    **/
    
    $oid = $_GET['oid'];
    $act = $_GET['action'];
    $uid = $_SESSION['id'];
    $res = DisplayTblOrder($oid);
    
    if($act==1001){// Canceling Order 
        while($row = mysql_fetch_array($res)){
            $query = "UPDATE tbl_order SET o_status = 3, userid= $uid WHERE o_id = $oid";
            $result = mysql_query($query);
        }
        
        $res2 = DisplayOrderItemAndProduct($oid);
        while($row1 = mysql_fetch_array($res2)){
            $pid = $row1['prod_id'];
            $tot = $row1['quantity_on_hand'] + $row1['od_qty'];
            $query1 ="UPDATE tbl_product SET quantity_on_hand = $tot WHERE prod_id= $pid ";
            $result2 = mysql_query($query1);
        }
        redirect_to("invoice_details.php?oid=$oid");
    }
    
    elseif($act==1002){// Approving Orders 
        while($row = mysql_fetch_array($res)){
            $query = "UPDATE tbl_order SET o_status = 1, userid= $uid WHERE o_id = $oid";
            $result = mysql_query($query);
        }
        $res2 = DisplayOrderItemAndProduct($oid);
        while($row1 = mysql_fetch_array($res2)){
            $pid = $row1['prod_id'];
            $tot = $row1['quantity_on_hand'] - $row1['od_qty'];
            $query1 ="UPDATE tbl_product SET quantity_on_hand = $tot WHERE prod_id= $pid ";
            $result2 = mysql_query($query1);   
        }
		$res3 = DisplayOrderAndProductIDbyOID($oid);
		while($row2 = mysql_fetch_array($res3)){
			$pid = $row2['prod_id'];
			$order_id = $row2['o_id'];
			$qty = $row2['od_qty'];
			$query2 ="INSERT into tbl_record ( userid, prod_id, last_update, quantity, rec_type, o_id)
						VALUES ({$uid}, {$pid}, NOW(), {$qty}, 3, {$order_id} )";
            $result3 = mysql_query($query2);   
		}
        redirect_to("invoice_details.php?oid=$oid");
    }
    
    elseif($act==1003){// Complete Order 
        while($row = mysql_fetch_array($res)){
            $query = "UPDATE tbl_order SET o_status = 4, o_lastupdate = NOW(), userid= $uid WHERE o_id = $oid";
            $result = mysql_query($query);
        }
        redirect_to("invoice_details.php?oid=$oid");
    }
    
    elseif($act==1004){// Returned Order 
        while($row = mysql_fetch_array($res)){
            $query = "UPDATE tbl_order SET o_status = 5, userid= $uid WHERE o_id = $oid";
            $result = mysql_query($query);
        }
        $res2 = DisplayOrderItemAndProduct($oid);
        while($row1 = mysql_fetch_array($res2)){
            $pid = $row1['prod_id'];
            $tot = $row1['quantity_on_hand'] - $row1['od_qty'];
            $query1 ="UPDATE tbl_product SET quantity_on_hand = $tot WHERE prod_id= $pid ";
            $result2 = mysql_query($query1);   
        }
		
        redirect_to("invoice_details.php?oid=$oid");
    }
	
	    elseif($act==1005){// Change order
			while($row = mysql_fetch_array($res)){
            $query = "UPDATE tbl_order SET o_status = 2, userid= $uid WHERE o_id = $oid";
            $result = mysql_query($query);
        }
        $res2 = DisplayOrderItemAndProduct($oid);
        while($row1 = mysql_fetch_array($res2)){
            $pid = $row1['prod_id'];
            $tot = $row1['quantity_on_hand'] - $row1['od_qty'];
            $query1 ="UPDATE tbl_product SET quantity_on_hand = $tot WHERE prod_id= $pid ";
            $result2 = mysql_query($query1);   
        }
        redirect_to("change_order.php?oid=$oid");
    }
    
?>