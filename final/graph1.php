
<?php require_once("includes/connection.php");?>

<script type="text/javascript" src="javascripts/jscharts.js"></script>


<div id="graph">Loading graph...</div>



<?php
echo '<script type="text/javascript">
	var myData = new Array(';
$db = mysql_connect("localhost","root","pass123");
mysql_select_db("sad",$db);
$q = "SELECT * FROM tbl_product";
$r = mysql_query($q);
for ( $a=0; $a<mysql_numrows($r); $a++ ) {
	$row = mysql_fetch_array($r);
	echo "['".$row['prod_name']."',".$row['quantity_on_hand']."]";
	if ( ($a+1) != mysql_numrows($r) ) {
		echo ", ";
	}
}
echo "); var colors = [";

for ( $a=0; $a<mysql_numrows($r); $a++ ) {
	echo "'#FF0000'";
	if ( ($a+1) != mysql_numrows($r) ) {
		echo ", ";
	}
}
	
echo "];
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setTitle('Stocks on Hand');
	myChart.setTitleColor('#8E8E8E');
	myChart.setAxisNameX('List of Items');
	myChart.setAxisNameY('Quantity');
	myChart.setAxisColor('#C4C4C4');
	myChart.setAxisNameFontSize(16);
	myChart.setAxisNameColor('#999');
	myChart.setAxisValuesColor('#7E7E7E');
	myChart.setBarValuesColor('#7E7E7E');
	myChart.setAxisPaddingTop(30);
	myChart.setAxisPaddingRight(150);
	myChart.setAxisPaddingLeft(130);
	myChart.setAxisPaddingBottom(50);
	myChart.setTextPaddingLeft(80);
	myChart.setTitleFontSize(11);
	myChart.setBarBorderWidth(2);
	myChart.setBarBorderColor('#C4C4C4');
	myChart.setBarSpacingRatio(15);
	myChart.setGrid(false);
	myChart.setSize(1000, 321);
	myChart.setBackgroundImage('chart_bg.jpg');
	myChart.draw();
</script>";
?>