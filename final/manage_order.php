
<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Invoice > Manage Invoice</div></div><div> <div id="content1">

<!--content here-->
<div class="header">
<p class="h">Invoices</p>
</div>
            	<div id="container">
		<div id="example">
			<div class="tableFilter">
		  		<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Search by: 
				    <select id="column">
					    <option value="0">ID</option>
					    <option value="1">Name</option>
				    </select>
					<input type="text" id="keyword"/>
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
			</div>
		    <table id="myTable" cellpadding="0">
		  	<thead>
				<th axis="number">ID</th>
				<th axis="string">Ordered by</th>
				<th axis="string">Date</th>
				<th axis="string">Status</th>
				<th axis="number">Total(Php)</th>
			</thead>
			<?php
				echo "<tbody>";
			        $result = DisplayOrders();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['o_id'].">";
				echo"<td class=\"rightAlign\">".$row['o_id']."</td>";
				echo"<td>".$row['cust_lname'].", ".$row['cust_fname']."</td>";
				echo"<td>".$row['o_lastupdate']."</td>";
				if($row['o_status']==1){
				echo"<td>Approved</td>";
				} elseif($row['o_status']==2) {
				    echo"<td>Pending</td>";
				} elseif($row['o_status']==3) {
				    echo"<td>Canceled</td>";
				} elseif($row['o_status']==4) {
				    echo"<td>Completed</td>";
				} elseif($row['o_status']==5) {
				    echo"<td>Returned</td>";
				}
				echo"<td class=\"int\">".number_format($row['o_total'],2)."</td>";
				
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			var myTable = {};
			function redirectPage(id)
			    {
			    window.location = "invoice_details.php?oid=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
		</div>
	</div>
	
	
	
	
	
	
	

<?php require("includes/footer.php");?>

