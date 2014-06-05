<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript" src="javascripts/jquery.js" ></script>




</style>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Inventory Management > Edit Product</div></div><div> <div id="content1">

<!--content here-->
<div class="header"><p class="h">Add Item</p></div>


			<form method="post" action="create_new_product.php" class="form-edit-item" enctype="multipart/form-data">
			<div class="required">
			  <p><span class="reqfield">*</span> Required</p>
			</div>
                 <table class="fixed-table">
                   <tbody>
                       <tr class="ei">
                       <td colspan="4" class="ei"><label class="space-btm" for="item_name">Item Name<span class="reqfield"> *</span></label>
                           <input class="basic-textfield" maxlength="80" name="prodName"  size="70" type="text" />                      </td>
                     </tr>
                     <tr class="ei">
                       <td colspan="4" class="ei"><label class="space-btm" for="item_notes">Item Description&nbsp;(Info about this item to include on invoices)</label>
                           <div>
						   	<textarea class="long basic-textarea" cols="75" id="item_notesitem_notes" name="prodDesc" rows="2"> </textarea>
                           </div></td>
                     </tr>
                     <tr class="ei">
                       <td width="26%" class="align-top mright"><label class="space-btm" for="item_price">Price Per Unit<span class="reqfield"> *</span> </label>
                           <div class="no-breaking"><span class="currency">Php</span>
                               <input  class="basic-textfield"  name="prodPrice" size="13" type="text" autocomplete="off" />
                           </div></td>
                       <td width="41%" class="align-top"><label class="space-btm" for="item_unit_name">Unit Description &nbsp; </label>
                         <select class="half basic-select-field" name="unit">
								<option value="0" selected = "selected">Pieces</option>
								<option value="1">Pack</option>
							  </select>
                              
                         <small class="unit-text">E.g. hour, each, case...</small></td>
                       <td width="27%" class="ei">&nbsp;</td>
                       <td width="6%" class="ei">&nbsp;</td>
                     </tr>
                   </tbody>
                 </table>
                 
              <fieldset>
<input name="checkbox1" type="checkbox" value="1" onclick="$(this).is(':checked') && $('#checked').slideDown('slow') || $('#checked').slideUp('slow');" />
<img src="images/add_icon.png">
<p id="checked" style="display: none; margin: 10px; height: 100px;padding: 10px" >
				<table class="fixed-table">
                   <tbody> 
				   <tr class="ei">
                       <td colspan="4" class="ei"><label class="space-btm" for="item_name">Quantity to Add<span class="reqfield"> *</span></label>
                           <input class="basic-textfield" name="addQty"  size="13" type="text" />
                          </td>
                     </tr>
					 <tr class="ei">
                       <td colspan="4" class="ei"><label class="space-btm" for="item_name">Memo</label>
                       <input class="basic-textfield" name="memo" fade  size="80" type="text"  /></td>
                     </tr>
				</table>
 </p> 

                 </fieldset>
                
                 <div class="form-controls" >
				 <span><input type="submit" name="btnCancel" value="Cancel" /></span>
				 <span><input type="submit" name="btnDelete" value="Delete" /></span> 
                 <span><input type="submit" name="btnSave" value="Save Changes" /></span></div>    
                 <div class="clear"></div>  
                 

                 
                 </form>
         <?php require("includes/footer.php");?>
