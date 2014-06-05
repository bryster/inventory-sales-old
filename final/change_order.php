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

window.location = "process_order.php?p="+ a +"&oid="+ b +"&q=3&input=" +n;

}
</script>
<?php include("includes/header.php");?>
<br>
<div id="mainMenuContent"> Invoice > Change Order</div>
</div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_order.php">Invoices</a></p><p class="d"></p></div>
<div class="box-body"><p class="t"><a href="<?php $oid = $_GET['oid']; echo "invoice_details.php?oid=$oid" ?>">Confirm Changes</a></p><p class="d"></p></div>
</div>
</div>

<div class="header">
<p class="h">Change Order: </p>
</div>
<!--content here-->
<b>Cart Content</b>
	    <?php
        	$oid = $_GET['oid'];
            $r = DisplayPerOrder($oid);
                echo "<table>
                    <th class=\"desc\">Product Name</th>
		    <th class=\"desc\">Qty</th>
			<th class=\"desc\"></th><th class=\"desc\"></th><th class=\"desc\"></th><th class=\"desc\">Total</th>";
		    
                    $total=0;
                    $a=0;
                    while($row = mysql_fetch_array($r))
                    {
                        $b = $row['od_qty'] * $row['prod_price'];
                        echo "<tr>";
                        echo "<td>". $row['prod_name'] . "</td>";
			echo "<td>" . $row['od_qty'] . "</td>";
			echo "<td><a href=\"process_order.php?p=".$row['prod_id']."&q=0&oid=$oid\">[+]</a></td>";
			echo "<td><a href=\"process_order.php?p=".$row['prod_id']."&q=1&oid=$oid\">[-] </td>";
			echo "<td><a href=\"javascript:void(0)\" onclick=\"add_more(".$row['prod_id'].",$oid)\"\">[*] </td>";
                        echo "<td><font color='red'>Php $b.00 </font></td>";
			echo "<td><a href=\"process_order.php?p=".$row['prod_id']."&q=2&oid=$oid\"><img src=\"images/cart_delete.png\"></td>";
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
			$oid = $_GET['oid'];
				echo "<tbody><form method=\"post\" action=\"checkbox.php\">";
			        $result = DisplayProd();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['prod_id']."> ";
				echo"<td><input type=\"checkbox\" name=\"option[]\" value=".$row['prod_id']."> <input type=\"hidden\" name=\"oid\" value=\"$oid\"></td>";
				echo"<td>".$row['prod_name']."</td>";
				echo"<td class=\"rightAlgin\">".$row['prod_price'].".00</td>";
				if($row['unit']==0){echo"<td>pieces</td>";}
				elseif($row['unit']==1){echo"<td>pack</td>";}
				echo"<td class=\"rightAlgin\">".$row['quantity_on_hand']."</td>";
				echo "<td> <a href=\"process_order.php?p=".$row['prod_id']."&oid=$oid\"><img src=\"images/cart2.png\"></a></td>";
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
          <input type="submit" name="btnSelectOrder" value="Add Selected Items" />
            </form>
		<script type="text/javascript">

			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over'});
			});
		</script>
		</div></div>		

<?php require("includes/footer.php");?>

