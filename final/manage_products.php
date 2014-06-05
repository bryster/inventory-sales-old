<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Items > Manage Item</div></div><div> <div id="content">


<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="add_item.php">Add New Item</a></p>
</div>
</div>
</div>

<div class="header"><p class="h">Items</p></div>

	<div id="container">
		<div id="example">
			<div class="tableFilter">
		  		<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Search by: 
				    <select id="column">
					    <option value="0">Name</option>
				    </select>
					<input type="text" id="keyword"/>
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
			</div>
		    <table id="myTable" cellpadding="0" >
		  	<thead>
				<th axis="string">Name</th>
                <th class="desc">Description</th>
				<th axis="string">Price(Php)</th>
                <th axis="string">Quantity</th>
			</thead>
			<?php
				echo "<tbody>";
			        $result = DisplayProd();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['prod_id'].">";
				echo"<td>".$row['prod_name']."</td>";
				echo"<td><small>".$row['prod_desc']."</small></td>";
				echo"<td class=\"int\">".number_format($row['prod_price'],2)."</td>";
				echo"<td class=\"int\">".$row['quantity_on_hand']."</td>";
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

        <p>
          <?php require("includes/footer.php");?>

