<?php include("includes/functions.php");?>
<?php require_once("includes/session.php");?>
<?php
        $uid = $_SESSION['id'];
        $pid = $_GET['p'];
        $q = $_GET['q'];
        $oid = $_GET['oid'];
        $act = $_GET['cancel'];
        $res = CheckOrder($oid);
        if($q==1){//minus qty from cart
            while($row = mysql_fetch_array($res)){
            if($row['prod_id'] == $pid){
                $a=1;
                $qty = $row['od_qty'] - 1;
                $query = "UPDATE tbl_order_item, tbl_order
                    SET tbl_order_item.od_qty = $qty, tbl_order.userid = $uid
                    WHERE tbl_order_item.prod_id = $pid AND tbl_order.userid=$uid";
                $result = mysql_query($query);
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
                    $qty2 = $row['quantity_on_hand'] + 1;
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
                }
            }
            if ($a==0){
                AddToOrder($oid,$pid);
                redirect_to("change_order.php?oid=$oid");
            }
            else redirect_to("change_order.php?oid=$oid");
        }
        
        elseif($q==2){//delete item from order
            while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
                    $qty = $row['od_qty'];
                    $query = "DELETE from tbl_order_item WHERE prod_id = $pid";
                    $result = mysql_query($query);
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
                    $qty2 = $row['quantity_on_hand'] + $qty;
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
                }
            }
            if ($a==0){
                AddToOrder($oid,$pid);
                redirect_to("change_order.php?oid=$oid");
            }
            else redirect_to("change_order.php?oid=$oid");
        }
		
		elseif($q==3){//input from js
		$input = $_GET['input'];
			while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
					$q =  $row['od_qty'];
					$q1 = $row['quantity_on_hand']+$q;
                    $qty = $input;
					if($qty<=$q1){
                    $query = "UPDATE tbl_order_item, tbl_order
                    SET tbl_order_item.od_qty = $qty, tbl_order.userid = $uid
                    WHERE tbl_order_item.prod_id = $pid AND tbl_order.userid=$uid";
                    $result = mysql_query($query);
					}
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
					$q1 =  $row['quantity_on_hand'] + $q;
                    $qty2 = $q1 - $input;
					if($input<=$q1){
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
					}
                }
            }
            if ($a==0){
                AddToOrder($oid,$pid);
                redirect_to("change_order.php?oid=$oid");
            }
            else redirect_to("change_order.php?oid=$oid");
		}
        
        else{
            while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
                    $qty = $row['od_qty'] + 1;
					$qw = $row['quantity_on_hand']-1;
					if($qw>0){
                    $query = "UPDATE tbl_order_item, tbl_order
                    SET tbl_order_item.od_qty = $qty, tbl_order.userid = $uid
                    WHERE tbl_order_item.prod_id = $pid AND tbl_order.userid=$uid";
                    $result = mysql_query($query);
					}
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
                    $qty2 = $row['quantity_on_hand'] - 1;
					if($qty2>0){
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
					}
                }
            }
            if ($a==0){
                AddToOrder($oid,$pid);
                redirect_to("change_order.php?oid=$oid");
            }
            else redirect_to("change_order.php?oid=$oid");
        }
        
?>