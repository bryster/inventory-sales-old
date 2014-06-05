
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
<br><div id="mainMenuContent">Dashboard > Item > Item Information</div></div><div> <div id="content">

<div id="Nav">
<div class="box"><div class="box-header"><b>Navigation</b></div>
<div class="box-body"><p class="t"><a href="manage_products.php">Items</a></p><p class="d"></p></div>
<div class="box-body"><p class="t"><a href="edit_product2.php?prod_id=<?php $id = $_GET['prod_id']; echo $id; ?>">Edit Item</a></p><p class="d"></p></div>
<div class="box-body">  <p class="t"><a href="item_information.php?prod_id=<?php $id = $_GET['prod_id']; echo $id; echo"&item_action=1"; ?>">Add Stocks</a></p></div>
<div class="box-body"><p class="t"><a href="item_information.php?prod_id=<?php $id = $_GET['prod_id']; echo $id; echo"&item_action=2"; ?>">Reduce Stocks</a></p></div>
</div>
</div>
<div class="header"><p class="h">Item Information</p></div>
<?php 
	if(isset($_GET['item_action'])){
		$state = $_GET['item_action'];
		if($state==1){
			$id = $_GET['prod_id'];
			$result=SearchProduct($id);
			while($row = mysql_fetch_array($result))
			{
			echo"
				<form method=\"post\" action=\"stockin_process.php\" class=\"form-edit-item\">
				<img src=\"images/add_icon.png\"></img>
				<table class=\"fixed-table\">
                   <tbody>
					<input type=\"hidden\" id=\"prod_id\" name=\"id\" value=".$row['prod_id']." />
					<input type=\"hidden\" id=\"prod_qoh\" name=\"qoh\" value=".$row['quantity_on_hand']." />
 
				   <tr class=\"ei\">
                       <td  class=\"ei\"><label class=\"space-btm\" for=\"item_name\">Quantity to Add : </label></td>
                       <td  class=\"ei\"><input class=\"basic-textfield\" maxlength=\"80\" name=\"add_qty\" fade  size=\"10\" type=\"text\"   /> </td>
                     </tr>
					 <tr class=\"ei\">
                       <td colspan=\"4\" class=\"ei\"><label class=\"space-btm\" for=\"item_name\">Memo</label>
                       <input class=\"basic-textfield\" name=\"memo\" fade  size=\"80\" type=\"text\"  /></td>
                     </tr>
				</table>
				<input type=\"submit\" name=\"btnAdd\" value=\"Add\"  /><input type=\"submit\" name=\"btnCancel\" value=\"Cancel\"  />
				</form>
			";}
		}
		elseif($state==2){
			$id = $_GET['prod_id'];
			$result=SearchProduct($id);
			while($row = mysql_fetch_array($result))
			{
			echo"
				<form method=\"post\" action=\"stockout_process.php\" class=\"form-edit-item\">
				<img src=\"images/remove_icon.png\"></img>
				<table class=\"fixed-table\">
                   <tbody>
				  	<input type=\"hidden\" id=\"prod_id\" name=\"id\" value=".$row['prod_id']." />
					<input type=\"hidden\" id=\"prod_qoh\" name=\"qoh\" value=".$row['quantity_on_hand']." />
				   <tr class=\"ei\">
                       <td  class=\"ei\" width=\"25%\"><label class=\"space-btm\" for=\"item_name\" >Quantity to Reduce : </label></td>
                       <td  class=\"ei\"><input class=\"basic-textfield\" maxlength=\"80\" name=\"outItem\" fade  size=\"10\" type=\"text\"   /> </td>
                     </tr>
					 <tr class=\"ei\">
                       <td colspan=\"4\" class=\"ei\"><label class=\"space-btm\" for=\"item_name\">Memo</label>
                       <input class=\"basic-textfield\" maxlength=\"10\" name=\"memo\" fade  size=\"80\" type=\"text\"  /></td>
                     </tr>
				</table>			
				<input type=\"submit\" name=\"btnRed\" value=\"Save\"  /><input type=\"submit\" name=\"btnCancel\" value=\"Cancel\"  />	
				</form>
			";}
		}
	}
?>

	<?php
		
	      if(isset($_GET['prod_id'])){
		     $id = $_GET['prod_id'];
			  	$result=SearchProduct($id);
		     	while($row = mysql_fetch_array($result))
				{
				echo "
				
				<!--content here-->
				<div id=\"padding1\"></div>
				<div id=\"show-item\">
				<h4>Name</h4>
				<p class=\"shorter\">".$row['prod_name']."</p>
				<h4>Description</h4>
				<p class=\"shorter\">".$row['prod_desc']."</p>
				<h4>Price</h4>
				<p class=\"shorter\">Php ".$row['prod_price'].".00/";
				if($row['unit']==0){ echo "pieces</p>";}
				elseif($row['unit']==1){ echo "pack</p>";}
				echo "
				<div class=\"clear\"> </div>
				<div id=\"inventory-info\">
				<b>Inventory: </b>".$row['quantity_on_hand']." available as of ". date("m/d/Y")."
				</div>
				</div>";
				}}
	?>
<div id="item-activity">
<div class="big-padding"> <h2 class="floated">Item Activity</h2></div>

			<table id="myTable" cellpadding="0">
		  	<thead>
				<th class="desc">Date</th>
				<th class="desc">Description</th>
				<th class="desc">Quantity</th>
				
			</thead>
			<?php
				$pid = $_GET['prod_id'];
				echo "<tbody>";
			        $result = ItemActivity($pid);
						while($row = mysql_fetch_array($result))
						{
							echo "<tr id=".$row['record_id']." class=\"sort\">";
							echo"<td class=\"center\">".$row['last_update']."</td>";
							if($row['rec_type']==1)echo"<td>Inventory Adjustment - Added</td>";
							elseif($row['rec_type']==2){
							if($row['o_id']!=NULL){echo"<td><a href=\"invoice_details.php?oid=".$row['o_id']."\">Invoice ".$row['o_id']." </a></td>";}
							else echo"<td>Inventory Adjustment - Reduced</td>";}
							echo"<td class=\"int\">".$row['quantity']."</td>";
							echo "</tr>";
						}	
						echo "</tbody>";
			?>
		  </table>
</div>
<?php require("includes/footer.php");?>

