<?php

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

?>