
<?php require_once("includes/connection.php");?>

<?php

	function Disp_ReturnedProducts(){
	$result = ReportReturnedProducts();
			echo"<table width=\"100%\" border=\"1\">
				  <tr>
					<td colspan=\"3\"><div align=\"center\"><b>Header<br>List of Returned Products</b></div></td>
				  </tr>
				  <tr>
					<td colspan=\"3\">Date:"; $my_t=getdate(date("U"));
					print("$my_t[mon]/$my_t[mday]/$my_t[year]");
					echo "</td>
				  </tr>
				  <tr>
					<td><div align=\"center\">Item Code</div></td>
					<td><div align=\"center\">Name</div></td>
					<td><div align=\"center\">Returned Items</div></td>
				  </tr>";
			while($row = mysql_fetch_array($result)){
			echo "
				  <tr>
					<td class=\"int\">".$row['prod_id']."</td>
					<td>".$row['prod_name']."</td>
					<td class=\"int\">".$row['SUM(od_qty)']."</td>
				  </tr>";
				}
			echo "</table>";
			return $result;
	}

	function Disp_SaleableProducts(){
	$result = ReportSaleable();
echo"<table width=\"100%\" border=\"1\">
	  <tr>
		<td colspan=\"5\"><div align=\"center\"><b>Header<br>List of Stocks (Saleable)</b></div></td>
	  </tr>
	  <tr>
		<td colspan=\"5\">Date:"; $my_t=getdate(date("U"));
		print("$my_t[mon]/$my_t[mday]/$my_t[year]");
		echo "</td>
	  </tr>
	  <tr>
		<td><div align=\"center\">Item Code</div></td>
		<td><div align=\"center\">Name</div></td>
		<td><div align=\"center\">Price</div></td>
		<td><div align=\"center\">Items Sold</div></td>
		<td><div align=\"center\">Total Sold</div></td>
	  </tr>";
while($row = mysql_fetch_array($result)){
echo "
	  <tr>
		<td class=\"int\">".$row['prod_id']."</td>
		<td>".$row['prod_name']."</td>
		<td class=\"int\">Php ".$row['prod_price'].".00</td>
		<td class=\"int\">".$row['SUM(od_qty)']."</td>
		<td class=\"int\">Php ".$row['Multiply'].".00</td>
	  </tr>";
	}
echo "</table>";
}

	function Disp_StockonHandPS($p){
	$date = date("F j, Y");
	$result = SearchProduct2($p);
        while($row = mysql_fetch_array($result)){
            $pid = $row['prod_id'];
            $n = $row['prod_name'];
            $q = $row['quantity_on_hand'];
        }
		echo"<table width=\"100%\" border=\"1\">
			  <tr>
				<td colspan=\"3\"><div align=\"center\"><b>Stock on Hand $n as of $date</b></div></td>
			  </tr>
			  <tr>
				<td><div align=\"center\">Item Code</div></td>
				<td><div align=\"center\">Name</div></td>
				<td><div align=\"center\">On Hand</div></td>
			  </tr>";
		
		echo "
			  <tr>
				<td class=\"int\">$pid</td>
				<td class=\"int\">$n</td>
				<td class=\"int\">$q</td>
			  </tr>";
		echo "</table>";}
		
	function Disp_StockonHand(){
	$result = DisplayProd();
        $date = date("F j, Y");
        $my_t=getdate(date("U"));
                 echo" <div style=\"text-align:right;\">
                    	<a href=\"StockOnHand_pdf.php\">Download</a>
                    </div><br>";
		echo"<table width=\"100%\" border=\"1\">
			  <tr>
				<td colspan=\"3\"><div align=\"center\"><b>Stock on Hand as of $date</b></div></td>
			  </tr>
			  <tr>
				<td><div align=\"center\">Item Code</div></td>
				<td><div align=\"center\">Name</div></td>
				<td><div align=\"center\">On Hand</div></td>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "
			  <tr>
				<td class=\"int\">".$row['prod_id']."</td>
				<td >".$row['prod_name']."</td>
				<td class=\"int\">".$row['quantity_on_hand']."</td>
			  </tr>";
			}
		echo "</table>";
	}
	
	function Disp_ListofStocksD(){
	$result = DisplayProd();
		 $my_t=getdate(date("U"));
                 echo" <div style=\"text-align:right;\">
                    	<a href=\"listOfStockDesc_pdf.php\">Download</a>
                    </div><br>";
		echo"<table width=\"100%\" border=\"1\">
			  <tr>
				<td colspan=\"3\"><div align=\"center\"><b>List of Stocks with Description</b></div></td>
			  </tr>
			  <tr>
				<td colspan=\"5\">Date:"; $my_t=getdate(date("U"));
                print("$my_t[mon]/$my_t[mday]/$my_t[year]");
				echo "</td>
			  </tr>
			  <tr>
				<td><div align=\"center\">Item Code</div></td>
				<td><div align=\"center\">Name</div></td>
				<td><div align=\"center\">Description</div></td>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "
			  <tr>
				<td class=\"int\">".$row['prod_id']."</td>
				<td>".$row['prod_name']."</td>
				<td>".$row['prod_desc']."</td>
			  </tr>";
			}
		echo "</table>";}
		

	function Disp_ListofStocksS(){
	$result = DisplayProd();
        $date = date("F j, Y");
        echo" <div style=\"text-align:right;\">
                    	<a href=\"listOfStock_pdf.php\">Download</a>
                    </div>";
		echo"<br><table width=\"100%\" border=\"1\">
			  <tr>
				<td colspan=\"5\"><div align=\"center\"><b>List of Stocks(Summary) as of $date </b></div></td>
			  </tr>
			  <tr>
				<td><div align=\"center\">Item Code</div></td>
				<td><div align=\"center\">Name</div></td>
				<td><div align=\"center\">Description</div></td>
				<td><div align=\"center\">Price(Php)</div></td>
				<td><div align=\"center\">On Hand</div></td>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "
			  <tr>
				<td class=\"int\">".$row['prod_id']."</td>
				<td>".$row['prod_name']."</td>
				<td>".$row['prod_desc']."</td>
				<td class=\"int\">".number_format($row['prod_price'],2)."</td>
				<td class=\"int\">".$row['quantity_on_hand']."</td>
			  </tr>";
			}
		echo "</table>";
		}
		
	function Disp_SalesPerDay($date1, $date2, $group){
	$result = SalesPerDay($date1, $date2, $group);
	echo"<table width=\"100%\" border=\"1\">
			  <tr>";
				echo "<td colspan=\"5\"><div align=\"center\"><b>Header<br>Sales Per ".$group." from ".$date1." - ".$date2."</b></div></td>";
	echo "</tr>
			  <tr>
				<td colspan=\"5\">Date:"; $my_t=getdate(date("U"));
                print("$my_t[mon]/$my_t[mday]/$my_t[year]");
				echo "</td>
			  </tr>
			  <tr>";
				if($group=='Month'){ echo "<td><div align=\"center\">Month</div></td>";}
				elseif($group=='Day'){
				echo "
				<td><div align=\"center\">Date Start</div></td>
				<td><div align=\"center\">Date End</div></td>";}
				echo "<td><div align=\"center\">No. of Orders</div></td>
				<td><div align=\"center\">Total</div></td>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "
			  <tr>";
			  if($group=='Month'){ echo "<td class=\"int\">".$row['d']."</td>";}
				elseif($group=='Day'){ echo "<td class=\"int\">".$row['d']."</td><td class=\"int\">".$row['d']."</td>";}
				echo"<td class=\"int\">".$row['COUNT(*)']."</td>
				<td class=\"int\">Php ".$row['SUM(o_total)'].".00</td>
			  </tr>";
			}
		echo "</table>";
	}
	
	function Disp_SalesPerMonth($m1, $y1, $m2, $y2){
	$result = DisplaySalesPerMonth($m1, $y1, $m2, $y2);
	echo"<table width=\"100%\" border=\"1\">
			  <tr>
				<td colspan=\"5\"><div align=\"center\"><b>Header<br>Sales Per Month as of ".$m." of ".$y."</b></div></td>
			  </tr>
			  <tr>
				<td colspan=\"5\">Date:"; $my_t=getdate(date("U"));
                print("$my_t[mon]/$my_t[mday]/$my_t[year]");
				echo "</td>
			  </tr>
			  <tr>
				<td><div align=\"center\">Item Code</div></td>
				<td><div align=\"center\">Name</div></td>
				<td><div align=\"center\">Price</div></td>
				<td><div align=\"center\">Qty Sold</div></td>
				<td><div align=\"center\">Total Sold</div></td>
			  </tr>";
		while($row = mysql_fetch_array($result)){
		echo "
			  <tr>
				<td>".$row['prod_id']."</td>
				<td>".$row['prod_name']."</td>
				<td>Php ".number_format($row['prod_price'],2)."</td>
				<td>".$row['SUM(od_qty)']."</td>
				<td>Php ".$row['Multiply'].".00</td>
			  </tr>";
			}
		echo "</table>";
	}

?>