
<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/tabber.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript" src="javascripts/tabber.js"></script>
<script type="text/javascript" src="javascripts/tabber-minimized.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Admin Settings > Manage Customers</div></div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_users.php">Users Account</a></p>

</div>
<div class="box-body"><p class="t"><a href="add_new_customer.php">New User</a></p>
</div>
</div>
</div>

<div class="header"><p class="h">Manage Customer Accounts</p></div>
<!--content here-->

       	 <div id="container">
		
			<div class="tableFilter">
		  		<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Filter: 
					<select id="column">
		  				<option value="1">Username</option>
						<option value="2">Name</option>
					</select>
					<input type="text" id="keyword"/>
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
			</div>
		    <table id="myTable" cellpadding="0" cellpadding="0">
		  	<thead>
				<th axis="number">ID</th>
				<th axis="string">Userame</th>
				<th axis="string">Name</th>
				<th axis="string">Contact</th>
			</thead>
			<?php
				echo "<tbody>";
			        $result = DisplayCustomer();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['cust_id']." class=\"sort\">";
				echo"<td class=\"center\">".$row['cust_id']."</td>";
				echo"<td>".$row['cus_user']."</td>";
				echo"<td>".$row['cust_fname']." ".$row['cust_lname']."</td>";
				echo"<td class=\"int\">".$row['cust_contact']."</td>";
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			var myTable = {};
			function redirectPage(id)
			    {
			    window.location = "customer_information.php?u=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
	      
	</div>
<?php require("includes/footer.php");?>

