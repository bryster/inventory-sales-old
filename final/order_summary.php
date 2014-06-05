<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Transactions > Order Summary</div></div><div> <div id="content">

<!--content here-->
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
                <td width="63%" class="td-no-border" align="right"></td>
                <td width="37%" class="td-no-border"></td>
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
		    $id =  $_GET['id'];
		    $r = SearchCustomerById($id);
		    $row = mysql_fetch_array($r);
			echo "
			  <div id=\"billing-address\"><strong>Bill To:</strong>
				  <div>
					<div> ".$row['cust_lname'].", ".$row['cust_fname']."</div>
					<div>".$row['cust_address']."</div>
					<div>
					  <div>".$row['cust_city']."</div>
					</div>
					<div>".$row['cust_contact']." (Phone)</div>
				  </div></div><br />";
?>

                
<?php $r = DisplayCart($_SESSION['id']);
			$total=0;
			$a=0;
			echo "
				  <table id=\"invoice-items\">
					<thead>
					  <tr>
						<th width=\"53%\" class=\"th-invoice1\">Item</th>
						<th width=\"11%\" class=\"th-invoice\">Price</th>
						<th width=\"13%\" class=\"th-invoice\">Unit</th>
						<th width=\"9%\" class=\"th-invoice\">Qty</th>
						<th width=\"14%\" class=\"th-invoice2\">Total</th>
					  </tr>
					</thead>
					<tbody>";
					while($row = mysql_fetch_array($r))
						{
						$b = $row['ct_qty'] * $row['prod_price'];
						 echo"
						  <tr>
							<td class=\"td-invoice1\"><a href=\"/items/3761\">". $row['prod_name'] . "</a>
								<br><small>". $row['prod_desc'] . "</small></td>
							<td class=\"td-invoice\">". $row['prod_price'] . "</td>";
							if($row['unit'] ==0){echo "<td class=\"td-invoice\">pieces</td>";}
							elseif($row['unit'] ==1){echo "<td class=\"td-invoice\">pack</td>";}
							
							echo"
							<td class=\"td-invoice\">". $row['ct_qty'] . "</td>
							<td class=\"td-invoice2\">".$b."</td>";
							$c = $a+$b;
			    			$a = $c;
							}
							echo "
						  </tr>
						  <tr>
							<td colspan=\"3\" class=\"td-total1\"></td>
							<td class=\"td-total1\" ><strong>Total:</strong></td>
							<td class=\"td-total\"><strong>$c</strong></td>";
							echo"
					  </tr>
					</tbody>
				  </table>
				</div>";
		
		echo"		
		<div>
		<a href=\"confirm_order.php?oid=".$_SESSION['id']."&u=".$id."&c=1\">Cancel</a>
        <a href=\"confirm_order.php?oid=".$_SESSION['id']."&u=".$id."&c=2&total=".$c."\">Confirm</a><br>
		</div>";



?>
		

  <?php require("includes/footer.php");?>

