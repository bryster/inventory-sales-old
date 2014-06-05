<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Admin Settings > Manage Users > Edit User</div></div><div> <div id="content1">

<div class="header">
<p class="h">Add New User </p>
</div>



<form method="post" action="create_new_user.php">
  <table class="info">
    <tr>
	  <td colspan="2" class="label1"><strong>User Information</strong></td>
	  <td  width="22%" class="label1">&nbsp;</td>
    </tr>
    <tr>
	  <td width="20%" class="label">Name : </td>
	  <td width="50%" class="field"><input class="half basic-text-field" name="fname" size="20" type="text" />
	  <input class="half basic-text-field" name="lname" size="20" type="text"  /></td>
	  <td width="30%" class="formNav"><center><input name="btnSave" type="submit" value="Save   " /></center></td>
    </tr>
    <tr>
	  <td class="label">Username : </td>
	  <td class="field"><input class="half basic-text-field" name="user" size="20" type="text"  /></td>
	  <td width="22%" class="formNav"><center><input name="btnCancel" type="submit" value="Cancel" /></center></td>
    </tr>
    <tr>
	  <td class="label">Password : </td>
	  <td class="field"><input class="half basic-text-field" name="pass" size="20" type="password"  /></td>
	  <td width="22%" class="formNav"><center></center></td>
    </tr>
    <tr>
	  <td class="label">Retype Password : </td>
	  <td class="field"><input class="half basic-text-field" name="rpass" size="20" type="password"  /></td>
	  <td width="22%" class="formNav"><center></center></td>
    </tr>
    <tr>
	  <td class="label">Userlevel : </td>
	  <td class="field"><select class="half basic-select-field" name="userlevel">
			<option value="2" >Staff</option>
			<option value="1" >Admin</option>
	    </select></td>
	    <td width="22%" class="formNav">&nbsp;</td>
    </tr>
    <tr>
	  <td class="label">Contact # :</td>
	  <td class="field"><input class="half basic-text-field" name="contact" size="20" type="text" /> </td>
	  <td width="22%" class="formNav">&nbsp;</td>
    </tr>
    <tr>
	  <td class="label">Other Contact # :</td>
	  <td class="field"><input class="half basic-text-field" name="altcontact" size="20" type="text" /> </td>
	  <td width="22%" class="formNav">&nbsp;</td>
    </tr>
    <tr>
	  <td class="label">Street Address :</td>
	   <td rowspan="2" class="field"><textarea class="long basic-textarea" cols="35" id="label7" name="address" rows="2"></textarea></td>
	   <td width="30%" rowspan="2" class="formNav">&nbsp;</td>
    </tr>
		  <tr>
		    <td class="label">&nbsp;</td>
    </tr>
    <tr>
	  <td class="label">City/Town : </td>
	  <td class="field"><input class="half basic-text-field" name="city" size="20" type="text"  /></td>
	  <td class="formNav">&nbsp;</td>
    </tr>
    <tr>
	  <td colspan="3" class="label"><?php $msg="";  if (isset($_POST['btnSave'])) {if($msg!=""){echo "<font color=red>ERROR! >". $msg. "</font>";}} ?></td>
    </tr>
  </table>
</form>
<?php require("includes/footer.php");?>