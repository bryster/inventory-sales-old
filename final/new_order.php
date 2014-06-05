<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript">
function add_more(a,b){
var n = prompt("Enter quantity:");
n = parseInt(n);

window.location = "process_cart.php?p="+ a +"&q=3&input=" +n;

}
</script>

<?php include("includes/header.php");?>
<br>
<div id="mainMenuContent"> Invoice > New Invoice</div>
</div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_products.php">Invoices</a></p><p class="d"></p></div>
<div class="box-body"><p class="t"><a href="cust_info.php">Proceed To Checkout</a></p><p class="d"></p></div>
</div>
</div>

<div class="header">
<p class="h">New Invoice: </p>
</div>
<!--content here-->
<b>Cart Content</b>
	    <?php $r = DisplayCart($_SESSION['id']);
                echo "<table>
				
                    <th class=\"desc\">Product Name</th>
		    <th class=\"desc\">Qty</th>
			<th class=\"desc\"></th><th class=\"desc\"></th><th class=\"desc\"></th><th class=\"desc\">Total</th>
			<th class=\"desc\"> </th>";
		    
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
			echo "<td><a href=\"javascript:void(0)\" onclick=\"add_more(".$row['prod_id'].",3)\"\">[*] </td>";
                        echo "<td><font color='red'>Php $b.00 </font></td>";
			echo "<td><a href=\"process_cart.php?p=".$row['prod_id']."&q=2\"><img src=\"images/cart_delete.png\"></td>";
                        $c = $a+$b;
                        $a = $c;
                        echo "</tr>";
                    }
                        echo"<tr><td></td><td></td><td></td><td></td><td><b>Total</td><td><font color='red'><b>Php $c.00</font></td>";
                    echo "</tr></table>";
                    
	    ?>
        <br>
        <b>Items</b>
	    <div class="clear"></div>
	<div id="container">
		<div id="example">
			<div class="tableFilter">
		  	<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Search by: 
				    <select id="column">
					    <option value="1">Name</option>
				    </select>
					<input type="text" id="keyword"/>
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
			</div>
		    <table id="myTable" cellpadding="0" >
		  	<thead>
            	<th class="desc"> </th>
				<th axis="string">Name</th>
				<th axis="number">Price(Php)</th>
                <th axis="string">Unit</th>
                <th axis="number">Quantity</th>
                <th class="desc"> </th>
			</thead>
			<?php
				echo "<tbody><form method=\"post\" action=\"checkbox.php\">";
			        $result = DisplayProd();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['prod_id'].">";
				echo"<td><input type=\"checkbox\" name=\"option[]\" value=".$row['prod_id']."></td>";
				echo"<td>".$row['prod_name']."</td>";
				echo"<td class=\"rightAlign\">".number_format($row['prod_price'],2)."</td>";
				if($row['unit']==0){echo"<td>pieces</td>";}
				elseif($row['unit']==1){echo"<td>pack</td>";}
				echo"<td class=\"rightAlign\">".$row['quantity_on_hand']."</td>";
				echo "<td> <a href=\"process_cart.php?p=".$row['prod_id']."\"><img src=\"images/cart2.png\"></a></td>";
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
          <input type="submit" name="btnSubmit" value="Add Selected Items" />
            </form>
		<script type="text/javascript">

			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over'});
			});
		</script>
		</div></div>

<?php require("includes/footer.php");?>

