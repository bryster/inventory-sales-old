<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Manage Customer > Customer Information</div></div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<?php
$u = $_GET['u'];
echo"
<div class=\"box-body\"><p class=\"t\"><a href=\"customer_detail.php?u=$u\">Edit Account</a></p><p class=\"d\">";
?>
</p></div>

</div>
</div>

<div class="header">
<p class="h"><strong>
  <?php
    $keyword = $_GET['u'];
    $result=SearchCustomer($keyword);
    while($row = mysql_fetch_array($result))
            { echo $row['cust_fname']." ".$row['cust_lname']; }
?> 
</strong></p>
</div>

	 <div id="container">
       <?php
	      if(isset($_GET['u'])){
		     $u = $_GET['u'];
		     $result=SearchCustomerById($u);
		     while($row = mysql_fetch_array($result))
				{
			    $id = $row['cust_id'];
		     echo "<div class=\"details\">
		     <div><strong>".$row['cust_fname']." ".$row['cust_lname']."</strong></div>
			 <div>".$row['cus_user']."</div>
		     <div>".$row['cust_address']."</div>
		     <div>".$row['cust_city']."</div><p></p>";
		     echo "<div>".$row['cust_contact']."</div>"; 
		     if($row['cust_acontact']!=0){ echo "<div>".$row['cust_acontact']."</div>";}
			 echo "<p></p><div><b>Note:</b><br> ".$row['note']."</div><p></p>";
		     echo "</div><br>";
		     }
	      }
       ?>
       
       	<div class="tableFilter">
		  		<form id="tableFilter" onsubmit="myTable.filter(this.id); return false;">Filter: 
					<select id="column">
		  				<option value="0">Date</option>
						<option value="1">Invoice</option>
                        <option value="3">Status</option>
					</select>
					<input type="text" id="keyword"/>
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />
				</form>
			</div>
		    <table id="myTable" cellpadding="0">
		  	<thead>
				<th axis="date">Date</th>
				<th axis="string">Invoice</th>
				<th axis="number">Total(Php)</th>
				<th axis="string">Status</th>
				
			</thead>
			<?php
			 $cid = $_GET['u'];
				echo "<tbody>";
			        $result = DisplayOrderPerCustomer($cid);
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['o_id']." class=\"sort\">";
				echo"<td class=\"center\">".$row['o_lastupdate']."</td>";
				echo"<td>".$row['o_id']." - ".$row['cust_fname']." ".$row['cust_lname']."</td>";
				echo"<td class=\"int\">".$row['o_total'].".00</td>";
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
				echo "</tr>";
				}	

			echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			var myTable = {};
			function redirectPage(id)
			    {
			    window.location = "invoice_details_view.php?oid=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
	</div>


<?php require("includes/footer.php");?>