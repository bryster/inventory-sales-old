<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent"> Admin Settings > Manage Users > Edit Customers</div></div><div> <div id="content1">

<div class="header">
<p class="h">Add Costumer: </p>
</div>



<form method="post" action="create_new_customer.php" class="base-form">
		<table class="info">
		  <tr>
			<td colspan="2" class="label1"><strong>Customer Information</strong></td>
			<td colspan="2" class="label1">&nbsp;</td>
	      </tr>
		  <tr>
			<td width="38%" height="35" class="label">First Name :</td>
			<td width="23%" class="field"><input class="half basic-text-field" name="c_fname"   type="text"  /></td>
			<td class="formNav" >Street Address :</td>
		    <td  rowspan="3" class="field2"><span class="field">
	        <textarea class="long basic-textarea" cols="25" id="address" name="c_address" rows="3	"></textarea>
		    </span></td>
		  </tr>
		  <tr>
		    <td class="label">Last Name:</td>
		    <td class="field"><input class="half basic-text-field" name="c_lname"   type="text"  /></td>
		    <td rowspan="2" class="formNav" >&nbsp;</td>
	      </tr>
		  <tr>
			<td class="label">Username :</td>
			<td class="field"><input class="half basic-text-field" name="c_user"   type="text"  /></td>
	      </tr>
		  <tr>
			<td class="label">Password :</td>
			<td class="field"><input class="half basic-text-field" name="c_pass"   type="password"  /></td>
			<td class="formNav">City/Town :</td>
			<td class="field2"><span class="field">
            <input class="half basic-text-field" name="c_city"   type="text" />
            </span></td>
		  </tr>
		  <tr>
		    <td class="label">Retype Password :</td>
		    <td class="field"><input class="half basic-text-field" name="rc_pass"   type="password"  /></td>
		    <td class="formNav">Question : </td>
		    <td class="field2"><span class="field">
		      <select  id="c_question" name="c_question">
                <option value="0" selected="selected"> </option>
                <option value="2">Who was your first kiss?</option>
                <option value="4">Who was your third grade teacher?</option>
                <option value="6">What is your mother&#039;s maiden name?</option>
                <option value="8">What was the name of your first pet?</option>
                <option value="10">What street did you grow up on?</option>
                <option value="12">What is your father&#039;s middle name?</option>
                <option value="14">When is your mother&#039;s birthday?</option>
              </select>
		    </span></td>
	      </tr>
		  <tr>
			<td class="label">Contact # :</td>
			<td class="field"><input class="half basic-text-field" name="c_contact"   type="text"  /></td>
			<td width="21%" class="formNav">Answer : </td>
		    <td width="18%" class="field2"><span class="field">
		      <input class="half basic-text-field" name="c_answer"   type="text">
		    </span></td>
		  </tr>
		  <tr>
			<td class="label">Other Contact # :</td>
			<td class="field"><input class="half basic-text-field" name="c_altcontact"   type="text"> </td>
			<td width="21%" class="formNav">&nbsp;</td>
		    <td width="18%" class="field2">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="4" class="label">&nbsp;</td>
		  </tr>
  </table>
        <h5> Note</h5> 
<div class="description">Add a note to record information about this person you want to access again later, for example, their birthday or spouse's name.</div> 
<textarea class="basic-textarea" cols="80" id="individual_note" name="c_note" rows="3"></textarea>
<div class="btn"><input type="submit" name="btnCancel" value="Cancel" /> <input type="submit" name="btnSave" value="Save" />  </div>
</form>
<?php require("includes/footer.php");?>