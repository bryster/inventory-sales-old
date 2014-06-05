<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Transactions > Order Details</div></div><div> <div id="content">

<!--content here-->
            <?php $oid = $_GET['oid'];
                $r = DisplayPerOrder($oid);
                 echo "<table id=\"normal\">
			<th>Product Name</th>
			<th>Qty</th>
                        <th>Price</th>";
			$total=0;
			$a=0;
			while($row = mysql_fetch_array($r))
			{
			    $b = $row['od_qty'] * $row['prod_price'];
			    echo "<tr>";
			    echo "<td>". $row['prod_name'] . "</td>";
			    echo "<td>" . $row['od_qty'] . "</td>";
                            echo "<td>" . $row['prod_price'] . "</td>";
			    echo "<td><font color='red'>Php $b.00 </font></td>";
			    $c = $a+$b;
			    $a = $c;
			    echo "</tr>";
			}
			    echo"<tr><td><b>Total</td><td></td><td><font color='red'><b>Php $c.00</font></td>";
		    echo "</tr></table>";
            ?>

<?php require("includes/footer.php");?>

