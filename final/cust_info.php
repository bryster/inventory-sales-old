<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php include("javascripts/doSlide.js");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>

<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
function Test(rad){
 var rads=document.getElementsByName(rad.name);
 document.getElementById('courier').style.display=(rads[1].checked||rads[1].checked)?'none':'block';
 document.getElementById('depot').style.display=(rads[1].checked||rads[1].checked)?'block':'none';
}
/*]]>*/
</script>

<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Transactions > Customer Information</div></div><div> <div id="content">

<!--content here-->
            <b>Billing Address</b>
                <br>
                    <input name="selection" type="radio" value="Silver Service" checked="checked" onclick="Test(this);"/>New Customer</input>
                     <input name="selection" type="radio" value="Gold Service"  onclick="Test(this);"/>Registered Customer</input>
                        <div id="courier">
                            <form name="form1" method="post" action="try.php">
                            <fieldset>                          
                            <table width="100%" class="info">
                              <tr>
                                <td colspan="2" class="label1"><strong>Customer Information</strong></td>
                              </tr>
                              <tr>
                                <td width="11%" height="35" class="label2">First Name :</td>
                                <td width="89%" class="field"><input class="half basic-text-field" name="cus_fname"   type="text"  /></td>
                              </tr>
                              <tr>
                                <td class="label2">Last Name:</td>
                                <td class="field"><input class="half basic-text-field" name="cus_lname"   type="text"  /></td>
                              </tr>
                              <tr>
                                <td class="label2"><span class="formNav">Address :</span></td>
                                <td rowspan="2" class="field"><textarea class="long basic-textarea" cols="25" id="c_address" name="cus_st" rows="3	"></textarea></td>
                              </tr>
                              <tr>
                                <td class="label2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="label2"><span class="formNav">City/Town :</span></td>
                                <td class="field"><input class="half basic-text-field" name="cus_city"   type="text" /></td>
                              </tr>
                              <tr>
                                <td class="label2">Contact # :</td>
                                <td class="field"><input class="half basic-text-field" name="cus_con"   type="text"  /></td>
                              </tr>
                              <tr>
                                <td class="label2">Other Contact # :</td>
                                <td class="field"><input class="half basic-text-field" name="cus_con2"   type="text" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4" class="label1"><h5>Note</h5>
                                    <div class="description">Add a note to record information about this person you want to access again later, for example, their birthday or spouse's name.</div>
                                  <textarea class="basic-textarea" cols="60" id="individual_note" name="c_note" rows="3"></textarea>
                                    <div class="btn">
                                      <input type="submit" name="btnSubmit" value="Submit" />
                                  </div></td>
                              </tr>
                              <tr>
                                <td colspan="4" class="label">&nbsp;</td>
                              </tr>
                            </table>
                            <p class="submit">
                            </fieldset>
                            
                            
                            
                            
                        </div><br>
                            </form>
        
                  
                        <div id="depot">
                            <fieldset>
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
		    <table id="myTable" cellpadding="0" cellpadding="0">
		  	<thead>
				<th axis="number">ID</th>
				<th axis="string">Userame</th>
				<th axis="string">Name</th>
				<th axis="string">Address</th>
			</thead>
			<?php
				echo "<tbody>";
			        $result = DisplayCustomer();
                                while($row = mysql_fetch_array($result))
                                {
				echo "<tr id=".$row['cust_id'].">";
				echo"<td class=\"rightAlign\">".$row['cust_id']."</td>";
				echo"<td>".$row['cus_user']."</td>";
				echo"<td>".$row['cust_fname']." ".$row['cust_lname']."</td>";
				echo"<td>".$row['cust_address'].", ".$row['cust_city']."</td>";
				echo "</tr>";
				}	
			echo "</tbody>";
			?>
		  </table>
		<script type="text/javascript">
			function redirectPage(id)
			    {
			    window.location = "try.php?u=" + id;
			    }
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){redirectPage(this.id)}});
			});
		</script>
		</div>
                </div>
                       
                            </fieldset>
                        

<?php require("includes/footer.php");?>

