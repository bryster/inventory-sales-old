<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Admin Settings > Account Logs</div></div> <div id="content">
<div class="header"><p class="h">Account Logs</p></div>

		<div id="container">
		       <div id="example">
			       <div class="tableFilter">
				       <form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Filter: 
					       <select id="column">
						       <option value="1">Username</option>
						       <option value="2">First Name</option>
						       <option value="3">Last Name</option>
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
				       <th axis="string">Log Type</th>
				       <th axis="date">Log Date</th>
				       <th axis="string">User Level</th>
			       </thead>
			       <?php
				       echo "<tbody>";
				        $result=ShowLogs();
				       while($row = mysql_fetch_array($result))
				       {
				       echo "<tr id=".$row['userid'].">";
				       echo"<td>".$row['username']."</td>";
				       echo"<td>".$row['firstname']." ".$row['lastname']."</td>";
				       if ($row['log_type']==1){echo"<td>Logged In</td>";}
				       elseif($row['log_type']==2){echo"<td>Logged Out</td>";}
				       echo"<td>".$row['log_date']."</td>";
				       if($row['userlevel']==1){echo "<td>Admin</td>";}
				       elseif($row['userlevel']==2){echo "<td>Staff</td>";}
				       echo "</tr>";
				       }	
			       echo "</tbody>";
			       ?>
			 </table>
		       <script type="text/javascript">
			       var myTable = {};
			       window.addEvent('domready', function(){
				       myTable = new sortableTable('myTable', {overCls: 'over', /**onClick: function(){alert(this.id)}**/});
			       });
		       </script>
		       </div>
	       </div>
<?php require("includes/footer.php");?>

