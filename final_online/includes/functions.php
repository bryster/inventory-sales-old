<?php require_once("includes/connection.php");?>
<?php
    #Search Function
    function SearchUser($keyword) {
        if ($keyword!="")
        {
            $result = mysql_query("SELECT * FROM tbl_users WHERE userid='$keyword' OR username='$keyword' OR lastname='$keyword' OR firstname='$keyword'");
        }
        else $result = mysql_query("SELECT * FROM tbl_users ORDER BY lastname ASC");
        return $result;
    }
    
    function SearchCustomer($keyword) {
        if ($keyword!="")
        {
            $result = mysql_query("SELECT * FROM tbl_customer WHERE cust_id='$keyword' OR cus_user='$keyword' OR cust_lname='$keyword' OR cust_lname='$keyword'");
        }
        
        else $result = mysql_query("SELECT * FROM tbl_customer ORDER BY cust_lname ASC");
        return $result;
    }
    
    function SearchCustomerById($id){
        $result = mysql_query("SELECT * FROM tbl_customer WHERE cust_id='$id'");
        return $result;
    }
    
    function DisplayCustomer(){
        $result = mysql_query("SELECT * FROM tbl_customer ORDER BY cust_lname ASC");
        return $result;
    }
     
    function DisplayUser(){
        $result = mysql_query("SELECT * FROM tbl_users ORDER BY lastname ASC");
        return $result;
    }
    
 
    
    function SearchProduct($keyword) {
        if ($keyword!="")
        {
        $result = mysql_query("SELECT * FROM tbl_product 
                              WHERE tbl_product.prod_id='$keyword' OR tbl_product.prod_name='$keyword'");
        }
        else  $result = mysql_query("SELECT * FROM (tbl_product LEFT JOIN tbl_users ON tbl_product.userid = tbl_users.userid)
                                    ORDER BY prod_name ASC");
        return $result;
    }
    
    function SearchProduct2($keyword) {//stockin
        if ($keyword!="")
        {
        $result = mysql_query("SELECT * FROM tbl_product 
                              WHERE tbl_product.prod_id='$keyword' OR tbl_product.prod_name='$keyword'");
        }
        else  $result = mysql_query("SELECT * FROM tbl_product ORDER BY prod_name ASC");
        return $result;
    }
    
    function ViewInventory() {
        $result = mysql_query("SELECT * FROM tbl_product "); 
        return $result;
    }
    
	
    function SortTimestamp(){
			$result = mysql_query(" SELECT tbl_record.*, tbl_product.prod_name,tbl_product.prod_id, tbl_product.quantity_on_hand FROM tbl_record INNER JOIN (SELECT 		MAX(record_id) AS id FROM tbl_record GROUP BY prod_id) ids ON tbl_record.record_id = ids.id
	INNER JOIN tbl_product ON tbl_product.prod_id = ids.id");
                              
        return $result;
    }
    
    function SelectProduct() {
        $result = mysql_query("SELECT * FROM tbl_product ORDER BY prod_name ASC");
        return $result;
    }
    
    function SearchCategory($keyword) {
                if ($keyword!="")
                {
                $result = mysql_query("SELECT * FROM tbl_category WHERE lastname='$keyword'");
                }
                else  $result = mysql_query("SELECT * FROM tbl_category");
                
                return $result;
    }
    
    function redirect_to($location = NULL) {
        header ("Location: $location");
    exit;
    }

    function ProcessLogin(){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $query  = "SELECT * FROM tbl_users WHERE username = '{$user}' AND password = '{$pass}'";
        $result = mysql_query($query);
            if(mysql_num_rows($result)==1){
                $foundUser = mysql_fetch_array($result);
                $_SESSION['id'] = $foundUser['userid'];
				$_SESSION['fname'] = $foundUser['firstname'];
				$_SESSION['lname'] = $foundUser['lastname'];
                $_SESSION['username'] = $foundUser['username'];
                LogIn($_SESSION['id']);
                redirect_to("admin.php");
            }
    else {
            $message = "Username and password is invalid!";
        }
    }
         
    function LogIn($id)
    {
        $query="INSERT INTO tbl_logs (log_type, log_date, userid)
                        VALUES (1,NOW(),{$id})";
        $result = mysql_query($query);
    }
    
    function LogOut($id)
    {
        $query="INSERT INTO tbl_logs (log_type, log_date, userid)
                        VALUES (2,NOW(),{$id})";
        $result = mysql_query($query);
    }
    
    function ShowLogs(){
        $query = "SELECT * FROM tbl_users, tbl_logs 
        WHERE tbl_users.userid = tbl_logs.userid ORDER by log_id ASC";
        $result = mysql_query($query);
        return $result;
    }
	
	    function ShowUsersLogs($u){
        $query = "SELECT * FROM tbl_users, tbl_logs 
        WHERE tbl_users.userid = 6 AND tbl_users.userid = tbl_logs.userid
 		ORDER by tbl_logs.log_date DESC";
        $result = mysql_query($query) or die(mysql_error());

        return $result;
    }
    
    function AddToCart($uid,$pid){
        $query = "INSERT into tbl_cart (userid, ct_qty, prod_id) VALUES ({$uid},1,{$pid})";
        $result = mysql_query($query);
    }
    
    function UpdateQty($pid)
    {
        $res = SelectProduct();
        while($row = mysql_fetch_array($res)){
            if($row['prod_id']==$pid){
            $qty = $row['quantity_on_hand'] - 1;
            $query = "UPDATE tbl_product SET quantity_on_hand = $qty WHERE prod_id = $pid";
            $result = mysql_query($query);
            }
        }
    }
    
    function AddDuplicates($pid,$uid,$q)
    {
                $qty = $q + 1;
                $query = "UPDATE tbl_cart SET ct_qty = $qty WHERE prod_id = $pid AND userid=$uid";
                $result = mysql_query($query);
    }
	
	function SelectProductByID($pid,$uid){
		$query = "SELECT * FROM tbl_cart WHERE prod_id = $pid AND userid=$uid";
        $result = mysql_query($query);
        return $result;
	}
    
    function AddToOrder($oid,$pid){
        $query = "INSERT into tbl_order_item (o_id, od_qty, prod_id) VALUES ({$oid},1,{$pid})";
        $result = mysql_query($query);
    }    

    function CheckCart($id){
        $query = "SELECT * FROM tbl_cart, tbl_product WHERE tbl_cart.prod_id = tbl_product.prod_id AND tbl_cart.userid = $id";
        $result = mysql_query($query);
        return $result;
    }
    
    function CheckOrder($id){
        $query = "SELECT * FROM tbl_order_item, tbl_order, tbl_product 
		WHERE tbl_order_item.o_id = $id AND tbl_order.o_id=$id AND tbl_order_item.prod_id = tbl_product.prod_id";
        $result = mysql_query($query);
        return $result;
    }   
    
    function DisplayCart($id){
        $query = "SELECT * FROM tbl_cart, tbl_product 
                WHERE tbl_cart.prod_id = tbl_product.prod_id AND tbl_cart.userid = $id AND tbl_cart.ct_qty!=0";
                
        $result = mysql_query($query);
        return $result;
    }
    
    function DisplayOrders(){
        $query = "SELECT * FROM tbl_order, tbl_users, tbl_customer
                    WHERE tbl_order.userid = tbl_users.userid AND tbl_order.cust_id = tbl_customer.cust_id";
        $result = mysql_query($query);
        return $result;
    }
    
    function DisplayCustomerOrder($oid){
        $query = "SELECT * FROM tbl_order,  tbl_customer
                    WHERE tbl_order.o_id = $oid AND tbl_order.cust_id = tbl_customer.cust_id";
        $result = mysql_query($query);
        return $result;
    }    
	
	function DisplayOrderPerCustomer($cid){
        $query = "SELECT *, DATE_FORMAT(o_lastupdate, '%M %d, %Y') AS PostDate  FROM tbl_order,  tbl_customer
                    WHERE tbl_order.cust_id = $cid AND tbl_order.cust_id = tbl_customer.cust_id";
        $result = mysql_query($query);
        return $result;		
	}
	
    function DisplayPerOrder($id){
        $query = "SELECT * FROM tbl_order_item, tbl_product, tbl_order
                    WHERE tbl_order_item.o_id=$id AND tbl_order_item.prod_id = tbl_product.prod_id AND tbl_order.o_id=$id";
        $result = mysql_query($query);
        return $result;
    }
    
	function DisplayOrderAndProductIDbyOID($oid){
        $query = "SELECT * FROM tbl_order, tbl_order_item WHERE tbl_order.o_id = $oid AND tbl_order.o_id = tbl_order_item.o_id";
        $result = mysql_query($query);
        return $result;		
	}
	
    function DisplayTblOrder($oid){
        $query = "SELECT * FROM tbl_order WHERE o_id = $oid";
        $result = mysql_query($query);
        return $result;
    }
    
    function DisplayOrderItemAndProduct($oid){
        $query = "SELECT * FROM tbl_order_item, tbl_product
                    WHERE tbl_order_item.o_id = $oid AND tbl_order_item.prod_id = tbl_product.prod_id";
        $result = mysql_query($query);
        return $result;
    }
	
    function DisplayPendingOrders(){
        $query = "SELECT * FROM tbl_order, tbl_customer WHERE o_status = 2 AND tbl_order.cust_id = tbl_customer.cust_id";
        $result = mysql_query($query);
        return $result;
    }
        
    function DisplayTopItem($m, $y){
        $query = "SELECT *, SUM(od_qty) FROM tbl_order, tbl_order_item, tbl_product 
            WHERE o_status = 4 AND tbl_order.o_id = tbl_order_item.o_id
            AND tbl_order_item.prod_id = tbl_product.prod_id AND MONTH(o_lastupdate)= $m AND YEAR(o_lastupdate) = $y
            GROUP BY tbl_order_item.prod_id ORDER BY SUM(od_qty) DESC";
        $result = mysql_query($query);
        return $result;
    }
	
	function DisplaySalesPerDay($d, $m, $y){
		$query = "SELECT *, SUM(od_qty), (SUM(od_qty)* prod_price) as Multiply FROM tbl_order, tbl_order_item, tbl_product 
            WHERE o_status = 4 AND tbl_order.o_id = tbl_order_item.o_id 
            AND tbl_order_item.prod_id = tbl_product.prod_id AND MONTH(o_lastupdate)= $m AND YEAR(o_lastupdate) = $y AND DAY(o_lastupdate)= $d
            GROUP BY tbl_order_item.prod_id ORDER BY SUM(od_qty) DESC";
        $result = mysql_query($query);
        return $result;
	}
	
	
	
	function DisplaySalesPerMonth($m, $y){
	$query = "SELECT *, SUM(od_qty), (SUM(od_qty)* prod_price) as Multiply FROM tbl_order, tbl_order_item, tbl_product 
		WHERE o_status = 4 AND tbl_order.o_id = tbl_order_item.o_id 
		AND tbl_order_item.prod_id = tbl_product.prod_id AND MONTH(o_lastupdate)= $m AND YEAR(o_lastupdate) = $y
		GROUP BY tbl_order_item.prod_id ORDER BY SUM(od_qty) DESC";
	$result = mysql_query($query);
	return $result;
	}
    

    
    function findFirstAndLastDay($anyDate)
    {
        //$anyDate            =    '2009-08-25';    // date format should be yyyy-mm-dd
        list($yr,$mn,$dt)    =    split('-',$anyDate);    // separate year, month and date
        $timeStamp            =    mktime(0,0,0,$mn,1,$yr);    //Create time stamp of the first day from the give date.
        $firstDay            =     date('D',$timeStamp);    //get first day of the given month
        list($y,$m,$t)        =     split('-',date('Y-m-t',$timeStamp)); //Find the last date of the month and separating it
        $lastDayTimeStamp    =    mktime(0,0,0,$m,$t,$y);//create time stamp of the last date of the give month
        $lastDay            =    date('D',$lastDayTimeStamp);// Find last day of the month
        $arrDay                =    array("$firstDay","$lastDay"); // return the result in an array format.
        
        return $arrDay;
    }
	
	function ItemActivity($pid){
        $query = "SELECT * FROM tbl_record, tbl_product WHERE tbl_record.prod_id = $pid AND tbl_record.prod_id = tbl_product.prod_id ORDER BY record_id DESC";
        $result = mysql_query($query);
        return $result;
	}
	
	function ReportSaleable(){
        $query = "SELECT *, SUM(od_qty), (SUM(od_qty)* prod_price) as Multiply FROM tbl_order, tbl_order_item, tbl_product 
            WHERE o_status = 4 AND tbl_order.o_id = tbl_order_item.o_id AND tbl_order_item.prod_id = tbl_product.prod_id 
            GROUP BY tbl_order_item.prod_id";
        $result = mysql_query($query);
		return $result;
	}
	
	function ReportReturnedProducts(){
        $query = "SELECT *, SUM(od_qty) FROM tbl_order, tbl_order_item, tbl_product 
            WHERE o_status = 5 AND tbl_order.o_id = tbl_order_item.o_id AND tbl_order_item.prod_id = tbl_product.prod_id 
            GROUP BY tbl_order_item.prod_id";
        $result = mysql_query($query);
		return $result;
	}
	
	function DisplayLatestItems(){
		$query = "SELECT prod_id, prod_name, date_added, prod_price FROM tbl_product ORDER BY prod_id DESC";
		$result = mysql_query($query);
		return $result;
	}
	
	function GetStatus($oid){
	$query = "SELECT o_status FROM tbl_order WHERE o_id = $oid";
        $result = mysql_query($query);
		return $result;
	}
	
	function ViewInOut($p){
		$query = "SELECT *, SUM(quantity) FROM tbl_record, tbl_product 
		WHERE tbl_record.prod_id = $p AND tbl_record.prod_id = tbl_product.prod_id 
		GROUP by tbl_record.rec_type";
		$result = mysql_query($query);
		return $result;
	}

	function SalesPerDay($date1, $date2, $group){
	if($group=='Day')
	{
		$query = "SELECT  *, SUM(o_total), COUNT(*), DATE(o_lastupdate) as d  FROM tbl_order WHERE o_lastupdate BETWEEN '$date1' AND '$date2' GROUP BY d";
	}
	elseif($group=='Week')
	{
		$query = "SELECT  *, SUM(o_total), COUNT(*), DATE(o_lastupdate) as d  FROM tbl_order WHERE o_lastupdate BETWEEN '$date1' AND '$date2' GROUP BY d";
	}
	elseif($group=='Month')
	{
		$query = "SELECT  *, SUM(o_total), COUNT(*), MONTH(o_lastupdate) as d  FROM tbl_order WHERE o_lastupdate BETWEEN '$date1' AND '$date2' GROUP BY d";
	}
		$result = mysql_query($query);
		return $result;
	}
	
	function SearchDuplicateUsername($user){
		$query = "SELECT cus_user FROM tbl_customer WHERE cus_user = '$user'";
		$result = mysql_query($query);
		return $result;
	}

	
	function CustProcessLogin(){
		$user = $_POST['user'];
        $pass = $_POST['pass'];
		$e_pass = encode2t($pass);
        
        $query  = "SELECT * FROM tbl_customer WHERE cus_user = '{$user}' AND cus_pass = '{$e_pass}'";
        $result = mysql_query($query);
            if(mysql_num_rows($result)==1){
                $foundUser = mysql_fetch_array($result);
                $_SESSION['cust_id'] = $foundUser['cust_id'];
				$_SESSION['cust_fname'] = $foundUser['cust_fname'];
				$_SESSION['cust_lname'] = $foundUser['cust_lname'];
                $_SESSION['cust_username'] = $foundUser['cus_user'];
                CustLogIn($_SESSION['cust_id']);
                $a = 1;
				return $a;
            }
    elseif (mysql_num_rows($result)!=1){
            $a = 2;
			return $a;
        }
	}
	
	    function CustLogIn($id)
    {
        $query="INSERT INTO tbl_cust_logs (log_type, log_date, cust_id)
                        VALUES (1,NOW(),{$id})";
        $result = mysql_query($query);
    }
	
	function  checkEmail($email) {
 	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { 
  return 1;
} 
else { 
  return 2;
} 
	
	}
	
	function SearchAccount($key) {
		$query = "SELECT * FROM tbl_customer WHERE cust_id = '$key'";
		$result = mysql_query($query);
		return $result;
    }
	
	function encode2t($str){
	  for($i=0; $i<2;$i++)
	  {
		$str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
	  }
		  return $str;
		}
		
	function decode2t($str)
	{
	  for($i=0; $i<2;$i++)
	  {
		$str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
	  }
	  return $str;
	}
	
	function SelectPass($id){
		$query = "SELECT cus_pass FROM tbl_customer WHERE cust_id = '$id'";
		$result = mysql_query($query);
		return $result;
	}
	
	function DisplayProd_id($p){
        $result = mysql_query("SELECT * FROM tbl_product WHERE prod_id = $p");
        return $result;
    }
	
	function DisplayProd(){
	$result = mysql_query("SELECT * FROM tbl_product ORDER by prod_id ASC");
	return $result;
    }
	
	function CustAddToCart($cid,$pid,$qty){
        $query = "INSERT into tbl_cart (cust_id, ct_qty, prod_id) VALUES ({$cid},{$qty},{$pid})";
        $result = mysql_query($query);
    }
	
	function CustCheckCart($cid){
        $query = "SELECT * FROM tbl_cart, tbl_product WHERE tbl_cart.prod_id = tbl_product.prod_id AND tbl_cart.cust_id = $cid";
        $result = mysql_query($query);
        return $result;
    }
	
	function CustDisplayCart($id){
        $query = "SELECT * FROM tbl_cart, tbl_product 
                WHERE tbl_cart.prod_id = tbl_product.prod_id AND tbl_cart.cust_id = $id AND tbl_cart.ct_qty!=0";
                
        $result = mysql_query($query);
        return $result;
    }
    function CustDisplayOrders(){
        $query = "SELECT * FROM tbl_order, tbl_users, tbl_customer
                    WHERE tbl_order.userid = tbl_users.userid AND tbl_order.cust_id = tbl_customer.cust_id";
        $result = mysql_query($query);
        return $result;
    }
?>