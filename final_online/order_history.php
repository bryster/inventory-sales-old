<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="account.php">Account</a> > <a href="order_history.php"> Order History</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("order_history_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>MY ORDER HISTORY</h1></div>
        <div class="middle">
   
        
        <?php
			while($row = mysql_fetch_array($result))
			{
			$oid = $row['o_id'];
			$stats = $row['o_status'];
			$date = $row['PostDate'];
			$fname = $row['cust_fname'];
			$lname = $row['cust_lname'];
			$total = $row['o_total'];
			echo"
				<div style=\"display:inline-block; margin-bottom:10px; width:100%;\">
            	<div style=\"width:49%; float:left; margin-bottom:3px;\"><b>Order ID:</b> $oid </div>
                <div style=\"width:49%; float:right; margin-bottom:3px; text-align:right;\"><b>Status: </b>";
				if($stats==1){
					echo"Approved";
					} elseif($stats==2) {
						echo"Pending";
					} elseif($stats==3) {
						echo"Canceled";
					} elseif($stats==4) {
						echo"Completed";
					} elseif($stats==5) {
						echo"Returned";
					}	
				echo "
				</div>
                <div style=\"background:#f7f7f7; border:1px solid #DDDDDD; width:100%; clear:both;\">
                	<div style=\"padding:5px;\">
                    	<table width=\"100%\">
                        	<tbody>
                            	<tr><td>Date Added: $date </td></tr>
								<tr><td>Total: Php ".number_format ($total,2)." </td></tr>
								<tr><td style=\"text-align:right\"><a href=\"order_details.php?oid=$oid\">View Details</a></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        ";
		}
		?>
        
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>