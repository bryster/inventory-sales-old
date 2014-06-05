<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript" src="javascripts/switchcontent.js" ></script>
<style type="text/css">

/*Style sheet used for demo. Remove if desired*/
.handcursor{
cursor:hand;
cursor:pointer;
}

</style>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Items > Edit Item</div></div><div> <div id="content1">

<!--content here-->
<div class="header"><p class="h">Edit Item</p></div>

<?php 
	$keyword = $_GET['prod_id'];
	$result=SearchProduct($keyword);
	while($row = mysql_fetch_array($result))
		{
		echo"
			<form method=\"post\" action=\"edit_product_process.php\" class=\"form-edit-item\">
			<div class=\"required\">
			  <p><span class=\"reqfield\">*</span> Required</p>
			</div>
                 <table class=\"fixed-table\">
                   <tbody>
					<input type=\"hidden\" name=\"prod_id\" value=".$row['prod_id']."  />
                     <tr class=\"ei\">
                       <td colspan=\"4\" class=\"ei\"><label class=\"space-btm\" for=\"item_name\">Item Name<span class=\"reqfield\"> *</span></label>
                           <input class=\"basic-textfield\" maxlength=\"80\" name=\"prodName\"  size=\"70\" type=\"text\" value=".$row['prod_name']." />
                        </td>
                     </tr>
                     <tr class=\"ei\">
                       <td colspan=\"4\" class=\"ei\"><label class=\"space-btm\" for=\"item_notes\">Item Description&nbsp;(Info about this item to include on invoices)</label>
                           <div>
						   	<textarea class=\"long basic-textarea\" cols=\"75\" id=\"item_notesitem_notes\" name=\"prodDesc\" rows=\"2	\">".$row['prod_desc']." </textarea>
                            
                           </div></td>
                     </tr>
                     <tr class=\"ei\">
                       <td width=\"26%\" class=\"align-top mright\"><label class=\"space-btm\" for=\"item_price\">Price Per Unit<span class=\"reqfield\"> *</span> </label>
                           <div class=\"no-breaking\"><span class=\"currency\">Php</span>
                               <input  class=\"basic-textfield\"  name=\"prodPrice\" size=\"13\" type=\"text\" value=".$row['prod_price']." autocomplete=\"off\" />
                           </div></td>
                       <td width=\"41%\" class=\"align-top\"><label class=\"space-btm\" for=\"item_unit_name\">Unit Description &nbsp; </label>
                         <select class=\"half basic-select-field\" name=\"unit\">";
								if($row['unit']==0) {echo"(<option value=\"0\" selected = \"selected\">Pieces</option>";}
									else {echo"(<option value=\"0\">Pieces</option>";}
								if($row['unit']==1) {echo"(<option value=\"1\" selected = \"selected\">Pack</option>";}
								else {echo"(<option value=\"1\">Pack</option>";}
							  
							  echo "
							  </select>
                         <small class=\"unit-text\">E.g. hour, each, case...</small></td>
                       <td width=\"27%\" class=\"ei\">&nbsp;</td>
                       <td width=\"6%\" class=\"ei\">&nbsp;</td>
                     </tr>
                   </tbody>
                 </table>";
                 
					echo "
                <div class=\"inventory-adjustment\">
                <b>Inventory: </b>".$row['quantity_on_hand']." available as of ". date("m/d/Y")."";
				}

?>

                
                 <div class="form-controls">
		 <span><input type="submit" name="btnCancel" value="Cancel" /></span>
		 <span><input type="submit" name="btnDelete" value="Delete" /></span> 
                 <span><input type="submit" name="btnSave" value="Save Changes" /></span></div>    
                 <div class="clear"></div>            
                 </div>
		
                 </form>
<script type="text/javascript">
// MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
// Call Instance.init() at the very end. REQUIRED

var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="images/add_icon.png" /> ', '<img src="images/remove_icon.png" /> ')
bobexample.setColor('darkred', 'black')
bobexample.setPersist(true)
bobexample.collapsePrevious(true) //Only one content open at any given time
bobexample.init()
</script>




                   <?php require("includes/footer.php");?>
