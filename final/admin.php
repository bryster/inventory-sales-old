<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard</div></div><div> <div id="content">
<!--content here-->
<div id="Nav">
<div class="box"><div class="box-header"><b>Add</b></div>
<div class="box-body"><p class="t"><a href="new_order.php">New Invoice</a></p></div>
<div class="box-body"> <p class="t"><a href="add_new_customer.php">New Customer</a></p></div>
<div class="box-body"> <p class="t"><a href="add_new_user.php">New User</a></p></div>
</div>
<br>

<div class="box"><div class="box-header"><b>Latest Products</b></div>
<?php
$a= 0;
$q = DisplayLatestItems();
while($row = mysql_fetch_array($q)){
if($a<3){
echo "<div class=\"box-body\"><p class=\"c\"><a href=\"item_information.php?prod_id=".$row['prod_id']."\">".$row['prod_name']."</a></p></div>";
$a++;
}
}
?>
</div>
</div>



  <!--content here-->
<div class="box">
<div class="box-body"><p class="h">Welcome, <?php echo $_SESSION['fname'] ." ".$_SESSION['lname'] ;?></p>
<p class="c"> <?php $my_t=getdate(date("U"));
                print("$my_t[weekday], $my_t[month] $my_t[mday], $my_t[year]"); ?> </p></div>
</div>
<br>
    
<div class="box"><tr><div class="box-header"><b>Pending Orders</b></div></tr>
<div class="box-body">
<?php
        $p = DisplayPendingOrders();
        $count = mysql_num_rows($p);
 	if($count!=0){
            echo "<table class=\"dispBox\"><tr class=\"displ\">";
            echo "<th class=\"displ\" align=\"left\">Date</th>";
            echo "<th class=\"displ\" align=\"left\">Invoice</th>";
            echo "<th class=\"displ\" align=\"left\">Contact</th></tr>";
            while($row = mysql_fetch_array($p)){
                $var = $row['o_lastupdate'];;
                list($date,$time) = explode(' ',$var);
 		echo "<tr class=\"displ\">";
                echo "<td class=\"displ\">".$date."</td>";
                echo "<td class=\"displ\"><a href=\"invoice_details.php?oid=".$row['o_id']."\">".$row['o_id']." - ".$row['cust_fname']." ".$row['cust_lname']."</a></td>";
                echo "<td class=\"displ\">".$row['cust_contact']."</td>";
            }
            echo "</tr></table>";
 	} else echo "No Pending Orders";
?></div></div>

<br>
    
<div class="box"><div class="box-header"><b>Top Sellers</b></div>
<div class="box-body">
    <p class="c">For the month of
    <?php echo strftime('%B');?></p>
<?php
    $m = date("m");
    $y = date("Y");
    $t = DisplayTopItem($m,$y);
    $c = 1;
    echo "<table class=\"dispBox\"><tr class=\"displ\">";
            echo "<th class=\"displ\" align=\"left\">Rank</th>";
            echo "<th class=\"displ\"  align=\"left\">Item</th>";
            echo "<th class=\"displ\"  align=\"left\">Qty Sold</th></tr>";
            while($row = mysql_fetch_array($t)){
                if($c<4){
                echo "<tr class=\"displ\">";
                echo "<td class=\"displ\" >".$c."</td>";
                echo "<td class=\"displ\" >".$row['prod_name']."</td>";
                echo "<td class=\"displ\" >".$row['SUM(od_qty)']."</td>";
                $c++;
                }
            }
            echo "</tr></table>";
?></div>
</div>

  <?php require("includes/footer.php");?>
  </p>
</p>
