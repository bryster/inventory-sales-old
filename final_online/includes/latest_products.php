<table class="list">
	<tbody>
    <tr>
<?php
	$count=0;
	$result = DisplayLatestItems();
		while($row = mysql_fetch_array($result)){
			if($count<4){
			echo"
				<td style=\"width:25%;\">
					<a href=\"products.php?p=".$row['prod_id']."\"> <img src=\"image/no_image.gif\" width=\"120\" height=\"120\" /> </a>
					<br />
					<a href=\"products.php?p=".$row['prod_id']."\">".$row['prod_name']." </a>
					<br />
					<span style=\"color:#900; font-weight:bold;\">Php ".number_format($row['prod_price'],2)." </span>
					<br />
				</td>";
			}$count++;
		}
?>
     </tr>
     </tbody>
</table>