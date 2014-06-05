<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php confirmed_logged_in(); ?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="account.php">Account</a> > <a href="password.php">Change password</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("password_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>Account Information</h1></div>
        <div class="middle">
        
        <form method="post" enctype="multipart/form-data" id="create">          
  <b style="margin-bottom: 3px; display:block;"> Your Password</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Old Password:</td>
                                    <td><input type="password" name="opass" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['opass']." ";} ?> >
                                    <?php if(isset($opass)){
										if($opass==1){echo "<span class=\"error\">Old Password is empty!</span>";}
										elseif($opass==2){echo "<span class=\"error\">Wrong Password!</span>";}
										}  
									?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Password:</td>
                                    <td><input type="password" name="pass" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['pass']." ";} ?>>
                                    <?php if(isset($pass)){if($pass==1){echo "<span class=\"error\">Password is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Password Confirm:</td>
                                    <td><input type="password" name="cpass" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['cpass']." ";} ?>>
                                    <?php if(isset($cpass)){if($cpass==1){echo "<span class=\"error\">Password Confirm is empty!</span>";}}  ?>
                                    <?php if(isset($pass)){if($pass==2){echo "<span class=\"error\">Password confirmation did not match password!</span>";}}  ?>
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