
<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php include("report_process.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>

<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript" src="javascripts/calendar.js"></script>

  <script type="text/javascript">
   window.addEvent('domready', function() { myCal1 = new Calendar({ date1: 'Y-m-d' });  myCal2 = new Calendar({ date2: 'Y-m-d' }); });
  </script>




<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Reports</div></div><div> <div id="content1">

<script>
function ShowMenu(num, selected)
        {
                for(i = 0; i <= 12; i++){
						if(i==num){
						var selected2 = selected + i;
                        document.getElementById(selected2).style.display = 'block';
						}
						else {
						var selected2 = selected + i;
						document.getElementById(selected2).style.display = 'none';
						}
                }
        }
</script>


<div class="header">
<p class="h">Reports: </p>
</div>

<form method="post">
  <select id='selects' name="query"
onChange="javascript: ShowMenu(document.getElementById('selects').value,'selected', 6);">
    <OPTGROUP LABEL="Inventory">
      <OPTION value="0">List of Stocks(Summary)</OPTION>
      <OPTION value="1">List of Stocks with Description</OPTION>
      <OPTION value="2">Stocks on Hand</OPTION>
      <OPTION value="3">Stocks on Hand(Per Stock)</OPTION>
      <OPTION value="4">List of Stocks(Saleable)</OPTION>
      <OPTION value="5">Returned Products</OPTION>
    </OPTGROUP>
    <OPTGROUP LABEL="Sales">
      <OPTION value="6">Sales</OPTION>
      <OPTION value="7">List of Saleable Products</OPTION>
      <OPTION value="8">List of Unsaleable Products</OPTION>
    </OPTGROUP>
  </SELECT>
  <input type="submit" value="Submit" name="btnSubmit" />
  
  <div id="selected0" style="display:none">  </div>
  
  <div id="selected1" style="display:none"></div>
  
  <div id="selected2" style="display:none"></div>
  
  <div id="selected3" style="display:none">
	<?php $result = SelectProduct();?>
    <p><label>Select Product:</label>
    <select name="select" id="select">
    
    <?php while($row = mysql_fetch_array($result)){
        echo "<option name=\"prod\" value=\"".$row['prod_id']."\">".$row['prod_name']."\n  ";
        }?> 
        </select>
    </p>
                                    
  </div>
  
  <div id="selected4" style="display:none"></div>
  
  <div id="selected5" style="display:none"></div>
  
  <div id="selected6" style="display:none">
  <br>
  <table width="100%" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td>Date Start:<br />
            <input id="date1" name="date1" type="text" />  </td>
        <td>Date End:<br />
            <input id="date2" name="date2" type="text" />  </td>
        <td>Group By:<br />
            <select name="group">
              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="Year">Years</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="Month">Months</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="Week" >Weeks</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="Day" selected="selected">Days</option>
              &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            </select></td>
        <td>Status:<br />
            <select name="status">
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="0">All Statuses</option>
              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="1">Cancelled</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="2">Complete</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
              <option value="3">Pending</option>
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            </select></td>
      </tr>
    </tbody>
  </table>
  </div>    
  
    <div id="selected7" style="display:none"></div>

</form>

<p>
  <?php 
	if(isset($_POST['btnSubmit'])){
		$q = $_POST['query'];
		if($q=='0') {Disp_ListofStocksS();} // List of Stocks Summary
		elseif($q=='1') {Disp_ListofStocksD();} //List of Stocks with Description		
		elseif($q=='2') {Disp_StockonHand();} // Stocks on Hand
		elseif($q=='3') { $p = $_POST['select']; Disp_StockonHandPS($p);} // Stocks on Hand - Per Stock
		elseif($q=='4') { Disp_SaleableProducts();}// List of Stocks - Saleable
		elseif($q=='5') {Disp_ReturnedProducts();} // List of Returned Items
		elseif($q=='6') {$date1 = $_POST['date1']; $date2 = $_POST['date2']; $group = $_POST['group']; Disp_SalesPerDay($date1, $date2, $group);}
	}
?>

  <script type="text/javascript">

//populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
window.onload=function(){
populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
}
</script>
  
  <?php require("includes/footer.php");?>

