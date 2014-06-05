
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
<br><div id="mainMenuContent">Admin Settings > Manage Users</div></div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_customer.php">Customers Account</a></p><p class="d">
</p></div>
<div class="box-body"><p class="t"><a href="add_new_user.php">New User</a></p>
</div>
</div>
</div>


<div class="header"><p class="h">Manage User/Staff Accounts</p></div>
<!--content here-->

	 <div id="container">
       <?php
	      if(isset($_GET['u'])){
		     $u = $_GET['u'];
		     $result=SearchUser($u);
		     while($row = mysql_fetch_array($result))
				{
			    $id = $row['userid'];
		     echo "<div class=\"details\">
		     <div><strong>".$row['firstname']." ".$row['lastname']."</strong></div>
		     <div>".$row['address']."</div>
		     <div>".$row['city']."</div>";
		     if($row['userlevel']==1){echo "<div>Admin</div>";}
		     elseif($row['userlevel']==2){echo "<div>Staff</div><p></p>";}
		     echo "<div>".$row['contact']."</div>"; 
		     if($row['alt_contact']!=0){ echo "<div>".$row['alt_contact']."</div>";}
		     echo "<p></p><div><a href=\"edit_user2.php?u=$id\">Edit User</a></div>";
		     echo "</div><br>";
		     }
	      }
       ?>
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
		    <table id="myTable" cellpadding="0">
		  	<thead>
				<th axis="string">Userame</th>
				<th axis="string">Name</th>
				<th axis="string">Contact</th>
				
			</thead>
			<?php
				echo "<tbody>";
			        $result = DisplayUser();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['userid']." class=\"sort\">";
				echo"<td>".$row['username']."</td>";
				echo"<td>".$row['firstname']." ".$row['lastname']."</td>";
				echo"<td class=\"int\">".$row['contact']."</td>";
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			var myTable = {};
			function redirectPage(id)
			    {
			    window.location = "manage_users.php?u=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
	</div>
  


<?php require("includes/footer.php");?>

