<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Admin Settings > Manage Users > Edit Customers</div></div><div> <div id="content1">

<div class="header">
<p class="h">Edit Contact: <strong><?php
    $keyword = $_GET['u'];
    $result=SearchCustomer($keyword);
    while($row = mysql_fetch_array($result))
            { echo $row['cust_fname']." ".$row['cust_lname']; }
?> </strong></p>
</div>



<?php
		$keyword = $_GET['u'];
		$result=SearchCustomer($keyword);
		while($row = mysql_fetch_array($result))
				{
		$pass = decode2t($row['cus_pass']);
	echo "<form method=\"post\" action=\"edit_customer_process.php\" class=\"base-form\">
		<table class=\"info\">
		  <tr>
			<td colspan=\"2\" class=\"label1\"><strong>Customer Information</strong></td>
			<td colspan=\"2\" class=\"label1\">&nbsp;</td>
	      </tr>
		  <tr>
			<td width=\"38%\" height=\"35\" class=\"label\">First Name :</td>
			<td width=\"23%\" class=\"field\"><input class=\"half basic-text-field\" name=\"c_fname\"   type=\"text\" value=".$row['cust_fname']." /></td>
			<td class=\"formNav\" >Address :</td>
		    <td  rowspan=\"3\" class=\"field2\"><span class=\"field\">
		      <textarea class=\"long basic-textarea\" cols=\"25\" id=\"address\" name=\"c_address\" rows=\"3	\">".$row['cust_address']."</textarea>
		    </span></td>
		  </tr>
		  <tr>
		    <td class=\"label\">Last Name:</td>
		    <td class=\"field\"><input class=\"half basic-text-field\" name=\"c_lname\"   type=\"text\" value=".$row['cust_lname']." /></td>
		    <td rowspan=\"2\" class=\"formNav\" >&nbsp;</td>
	      </tr>
		  <tr>
			<td class=\"label\">Username :</td>
			<td class=\"field\"><input class=\"half basic-text-field\" name=\"c_user\"   type=\"text\" value=".$row['cus_user']." /></td>
	      </tr>
		  <tr>
			<td class=\"label\">Password :</td>
			<td class=\"field\"><input class=\"half basic-text-field\" name=\"c_pass\"   type=\"password\" value=".$pass." /></td>
			<td class=\"formNav\">City/Town :</td>
			<td class=\"field2\"><span class=\"field\">
              <input class=\"half basic-text-field\" name=\"c_city\"   type=\"text\" value=".$row['cust_city']." />
            </span></td>
		  </tr>
		  <tr>
			<td class=\"label\">Contact # :</td>
			<td class=\"field\"><input class=\"half basic-text-field\" name=\"c_contact\"   type=\"text\" value=".$row['cust_contact']." /></td>
			<td width=\"21%\" class=\"formNav\">E-mail : </td>
		    <td width=\"18%\" class=\"field2\"><input class=\"half basic-text-field\" name=\"email\"  value=".$row['cust_email']." type=\"text\"> </td>
		  </tr>
		  <tr>
			<td class=\"label\">Other Contact # :</td>
			<td class=\"field\"><input class=\"half basic-text-field\" name=\"c_altcontact\"   type=\"text\" value=".$row['cust_acontact']." ></td>
			<td width=\"21%\" class=\"formNav\"></td>
		    <td width=\"18%\" class=\"field2\"></td>
		  </tr>
		  <tr>
			<td colspan=\"4\" class=\"label\">&nbsp;</td>
		  </tr>
		</table>
        <h5> Note</h5> 
<div class=\"description\">Add a note to record information about this person you want to access again later, for example, their birthday or spouse's name.</div> 
<textarea class=\"basic-textarea\" cols=\"80\" id=\"individual_note\" name=\"c_note\" rows=\"3\">".$row['note']."</textarea>
<div class=\"btn\"><input type=\"submit\" name=\"btnCancel\" value=\"Cancel\" /> <input type=\"submit\" name=\"btnSave\" value=\"Save\" />  </div>
</form>";}

?>
<?php require("includes/footer.php");?>