<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="account.php">Account</a> > <a href="edit_account.php"> Edit Account</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("change_add_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>CHECKOUT ADDRESS</h1></div>
        <div class="middle">
        
        <form method="post" enctype="multipart/form-data" id="create">          
                <b style="margin-bottom: 3px; display:block;"> Edit Address</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>First Name:</td>
                                    <td><input type="text" name="firstname" <?php echo "value =$fname"; ?> >
                                    <?php if(isset($fname)){if($fname==1){echo "<span class=\"error\">First Name is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Last Name:</td>
                                    <td><input type="text" name="lastname" <?php echo "value = $lname"; ?>>
                                    <?php if(isset($lname)){if($lname==1){echo "<span class=\"error\">Last Name is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Address:</td>
                                    <td><textarea cols="35" rows="3" name="add1"><?php echo $add; ?></textarea>
                                    <?php if(isset($add1)){if($add1==1){echo "<span class=\"error\">Address is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td width="150"><span class="required">*</span>City:</td>
                                    <td><input type="text" name="city" <?php echo "value =$c"; ?>>
                                    <?php if(isset($city)){if($city==1){echo "<span class=\"error\">Field is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                
                        	</tbody>
                        </table>
                        </div>
                        
                   
                       
                       <div class="buttons">
                       		<table>
                            	<tbody>
                                	<tr>
                                    <td align="left"><input type="submit" value="Back" name="btnCancel"> </td>
                                    <td align="right"><input type="submit" value="Continue" name="btnSubmit"> </td>
                                    </tr>
                            	</tbody>
                            </table>
                       </div>
            </form>
        
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>