
<?php include("includes/functions.php");?>
<?php require_once("includes/session.php");?>
<?php
        $uid = $_SESSION['id'];
        $pid = $_GET['p'];
        $q = $_GET['q'];
        $res = CheckCart($uid);
        if($q==1){// minus qty from cart
            while($row = mysql_fetch_array($res)){
            if($row['prod_id'] == $pid){
                $a=1;
                $qty = $row['ct_qty'] - 1;
                $query = "UPDATE tbl_cart SET ct_qty = $qty WHERE prod_id = $pid AND userid=$uid";
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
                AddToCart($uid,$pid);
                redirect_to("new_order.php");
            }
            else redirect_to("new_order.php");
        }
        
        elseif($q==2){//delete item from cart
            while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
                    $qty = $row['ct_qty'];
                    $query = "DELETE from tbl_cart WHERE prod_id = $pid AND userid=$uid";
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
 			 redirect_to("new_order.php");
        }
        
		 elseif($q==3){// input from js
		 $input = $_GET['input'];
            while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
					$q = $row['ct_qty'];
					$q1 = $row['quantity_on_hand']+$q;
                    $qty = $input;
					if($qty<=$q1){
                    $query = "UPDATE tbl_cart SET ct_qty = $qty WHERE prod_id = $pid AND userid=$uid";
                    $result = mysql_query($query);
					}
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
		    	$q1 = $row['quantity_on_hand'] + $q;
                    $qty2 = $q1 - $input;
					if($input<=$q1){
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
					}
                }
            }
            if ($a==0){
                AddToCart($uid,$pid);
                redirect_to("new_order.php");
            }
            else redirect_to("new_order.php");
        }
		
		
        else{// add qty to cart
            while($row = mysql_fetch_array($res)){
                if($row['prod_id'] == $pid){
                    $a=1;
                    $qty = $row['ct_qty'] + 1;
					$qw = $row['quantity_on_hand']-1;
					if($qw>=0){
                    $query = "UPDATE tbl_cart SET ct_qty = $qty WHERE prod_id = $pid AND userid=$uid";
                    $result = mysql_query($query);
					}
                }
            }
            $res2 = SelectProduct();
            while($row = mysql_fetch_array($res2)){
                if($row['prod_id'] == $pid){
                    $qty2 = $row['quantity_on_hand'] - 1;
					if($qty2>=0){
                    $query2 = "UPDATE tbl_product SET quantity_on_hand = $qty2 WHERE prod_id = $pid ";
                    $result2 = mysql_query($query2);
					}
                }
            }
            if ($a==0){
                AddToCart($uid,$pid);
                redirect_to("new_order.php");
            }
            else redirect_to("new_order.php");
        }
		

?>