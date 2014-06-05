<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Transactions > New Sales Order</div></div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_products.php">Invoices</a></p><p class="d"></p></div>
<div class="box-body"><p class="t"><a href="cust_info.php">Proceed To Checkout</a></p><p class="d"></p></div>
</div>
</div>

<!--content here-->
<b>Cart Content</b>
	    <?php $r = DisplayCart($_SESSION['id']);
                echo "<table>
                    <th class=\"desc\">Product Name</th>
		    <th class=\"desc\">Qty</th>
			<th class=\"desc\"></th><th class=\"desc\"></th><th class=\"desc\">Total</th>";
		    
                    $total=0;
                    $a=0;
                    while($row = mysql_fetch_array($r))
                    {
                        $b = $row['ct_qty'] * $row['prod_price'];
                        echo "<tr>";
                        echo "<td>". $row['prod_name'] . "</td>";
			echo "<td>" . $row['ct_qty'] . "</td>";
			echo "<td><a href=\"process_cart.php?p=".$row['prod_id']."&q=0\">[+]</a></td>";
			echo "<td><a href=\"process_cart.php?p=".$row['prod_id']."&q=1\">[-] </td>";
                        echo "<td><font color='red'>Php $b.00 </font></td>";
			echo "<td><a href=\"process_cart.php?p=".$row['prod_id']."&q=2\">Delete</td>";
                        $c = $a+$b;
                        $a = $c;
                        echo "</tr>";
                    }
                        echo"<tr><td><b>Total</td><td></td><td></td><td></td><td><font color='red'><b>Php $c.00</font></td>";
                    echo "</tr></table>";
                    
	    ?>
	    <div class="clear"></div>
            <div id="container" >
            <?php $result = DisplayProd();
                echo "<table id=\"myTable\">
                <table  id=\"myTable\">
                    <tr id=\"disp\">
                    <th class=\"desc\">Product Name</th>
                    <th class=\"desc\">Description</th>
                    <th class=\"desc\">Price</th>
		    <th class=\"desc\">Qty</th>
                    </td>
                    </tr>";
                    while($row = mysql_fetch_array($result))
                    {
                       
                        echo "<form method=\"get\">";
                        echo "<tr id=\"disp\">";
                        echo "<td>" . $row['prod_name'] . "</td>";
                        echo "<td>" . $row['prod_desc'] . "</td>";
                        echo "<td>Php " . $row['prod_price'] . ".00</td>";
			echo "<td>" . $row['quantity_on_hand']."</td>";
                        echo "<td> <a href=\"process_cart.php?p=".$row['prod_id']."\"><font color='blue'>Add To Cart</font></a></td>";
                    }
                    echo "</table></form>";
	    ?>
	    </td></table><br>
	    </div>
		

<?php require("includes/footer.php");?>

