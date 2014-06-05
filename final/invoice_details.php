
<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Invoice > Manage Invoice > Invoice Details</div></div><div> <div id="content">

<!--content here-->


<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_order.php">Invoices</a></p></div>
<?php 
$oid = $_GET['oid'];
$result = GetStatus($oid);
while($row = mysql_fetch_array($result))
	{
		$a = $row['o_status'];
	}
	
		if($a=='4'){//complete
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1001\">Cancel</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1004\">Return</a></p></div>";
		}
		elseif($a=='1'){//approve
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1005\">Change</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1001\">Cancel</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1003\">Complete</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1004\">Return</a></p></div>";
		}
		elseif($a=='2'){//pending
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1002\">Approve</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1005\">Change</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1001\">Cancel</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1003\">Complete</a></p></div>";
		}
		elseif($a=='3'){//cancel
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1005\">Change</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1003\">Complete</a></p></div>";
		}
		elseif($a=='5'){//return
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1005\">Change</a></p></div>";
			echo"<div class=\"box-body\"><p class=\"t\"><a href=\"process_status.php?oid=$oid&action=1003\">Complete</a></p></div>";	
		}
 ?>
 
</div>
</div>

<div class="header">
<p class="h">Status: <?php

	$oid = $_GET['oid'];
	$result = GetStatus($oid);
	while($row1 = mysql_fetch_array($result)){
		if($row1['o_status']==1){
			echo"Approved";
			} elseif($row1['o_status']==2) {
				echo"Pending";
			} elseif($row1['o_status']==3) {
				echo"Canceled";
			} elseif($row1['o_status']==4) {
				echo"Completed";
			} elseif($row1['o_status']==5) {
				echo"Returned";
			}
	}
 ?></p>
</div>

<div id="invoice-body">
<table class="invoice-table-header">
  <tbody>
    <tr>
      <td  id="td-top" width="76%"><div id="company-address-invoice-info">
        <div id="company-address">
          <div><b>Jorona Aquatic Resource and International Trading Inc.</b></div>
          <div class="company-address"> 
            ND Shipping Bldg., A. Santos St., Nova Tierra Village            </div>
          <div class="company-address">Lanang, Davao City</div>
          <div class="company-address">Tel. Nos. (082) 234-0188/300-1709 Loc. 103</div>
          <div>E-mail Add: joronadavao@yahoo.com</div>
        </div>
      </div></td>
      <td width="24%" id="td-top" align="right" >
        <h12>INVOICE</h12>
        <div id="invoice-info">
          <table class="invoice-table-right">
            <tbody>
              <tr>
                <td width="63%" class="td-no-border" align="right">Invoice #:</td>
                <td width="37%" class="td-no-border"><?php $oid = $_GET['oid']; echo $oid; ?></td>
              </tr>
              <tr>
                <td class="td-no-border" align="right">Date:</td>
                <td class="td-no-border"><?php $my_t=getdate(date("U"));
                print("$my_t[mon]/$my_t[mday]/$my_t[year]"); ?></td>
              </tr>
              <tr>
                <td class="td-no-border" >&nbsp;</td>
                <td class="td-no-border">&nbsp;</td>
              </tr>
            </tbody>
          </table>
        
        <div></div>
      </div></td>
    </tr>
  </tbody>
</table>

<?php
		    if(isset($_GET['oid'])){
	    $oid = $_GET['oid'];
		$r1 = DisplayCustomerOrder($oid);
       
		echo " <div id=\"billing-address\"><strong>Bill To:</strong>";
			while($row = mysql_fetch_array($r1)){
			echo "
				  <div>
					<div> ".$row['cust_lname'].", ".$row['cust_fname']."</div>
					<div>".$row['cust_address']."</div>
					<div>
					  <div>".$row['cust_city']."</div>
					</div>
					<div>".$row['cust_contact']." (Phone)</div>
				  </div></div><br />";
				  }
				  }
				  
?>

                
<?php  $r = DisplayPerOrder($oid);
			$total=0;
			$a=0;
			echo "
				  <table id=\"invoice-items\">
					<thead>
					  <tr>
						<th width=\"53%\" class=\"th-invoice1\">Item</th>
						<th width=\"11%\" class=\"th-invoice\">Price (Php)</th>
						<th width=\"13%\" class=\"th-invoice\">Unit</th>
						<th width=\"9%\" class=\"th-invoice\">Qty</th>
						<th width=\"14%\" class=\"th-invoice2\">Total (Php)</th>
					  </tr>
					</thead>
					<tbody>";
					while($row = mysql_fetch_array($r))
						{
						$b = $row['od_qty'] * $row['prod_price'];
						 echo"
						  <tr>
							<td class=\"td-invoice1\"><a href=\"/items/3761\">". $row['prod_name'] . "</a>
								<br><small>". $row['prod_desc'] . "</small></td>
							<td class=\"td-invoice\">". number_format($row['prod_price'],2) . "</td>";
							if($row['unit'] ==0){echo "<td class=\"td-invoice\">pieces</td>";}
							elseif($row['unit'] ==1){echo "<td class=\"td-invoice\">pack</td>";}
							
							echo"
							<td class=\"td-invoice\">". $row['od_qty'] . "</td>
							<td class=\"td-invoice2\">".number_format($b,2)."</td>";
							$c = $a+$b;
			    			if($c!=0){$a = $c;}
							else{$a = 0;}
						}
							echo "
						  </tr>
						  <tr>
							<td colspan=\"3\" class=\"td-total1\"></td>
							<td class=\"td-total1\" ><strong>Total:</strong></td>
							<td class=\"td-total\"><strong>".number_format($c,2)."</strong></td>";
							echo"
					  </tr>
					</tbody>
				  </table>
				
				<div>
				<br>
				Prepared by: ________________________<br>
				Printed by:  _________________________<br>
				Delivered by: _______________________<br>
				</div>
				
				</div>
				";

?>
<?php require("includes/footer.php");?>

