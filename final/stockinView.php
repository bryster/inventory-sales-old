<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Items > View Inventory</div></div><div> <div id="content1">

<!--content here-->
										
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
				<th axis="number">ID</th>
				<th axis="string">Name</th>
                <th class="desc">Stock on Hand</th>
				<th axis="number">Stock In</th>
                <th axis="number">Stock Out</th>
			</thead>
			<?php
				echo "<tbody>";
			        $result = ViewInventory();
						while($row = mysql_fetch_array($result))
						{
						$p =  $row['prod_id'];
							echo "<tr id=".$row['prod_id'].">";
							echo"<td class=\"rightLeft\">".$row['prod_id']."</td>";
							echo"<td>".$row['prod_name']."</td>";
							echo"<td class=\"rightLeft\">". $row['quantity_on_hand'] . "</td>";
							$r = ViewInOut($p);
								while($row1 = mysql_fetch_array($r))
								{
								$type = $row1['rec_type'];
									if ($type==1){echo "<td>" . $row1['SUM(quantity)'] . "</td>";}
									if ($type==2){echo "<td>" . $row1['SUM(quantity)'] . "</td>";}
									
								}
							echo "</tr>";
						}	
						echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			function redirectPage(id)
			    {
			    window.location = "item_information.php?prod_id=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
		</div>
                       

<?php require("includes/footer.php");?>