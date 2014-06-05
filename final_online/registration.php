<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a> > <a href="login.php">Account</a> > <a href="registration.php">Register</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("registration_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>Create Account</h1></div>
        
        <div class="middle">
        <?php if(isset($error)){ if($error==1){echo "<div class=\"warning\">Error: You must agree to the Policy! </div>";} } ?>
        	<form method="post" enctype="multipart/form-data" id="create">
            	<p> If you already have an account with us, please login at the <a href="login.php">login page</a>.</p>
                
                <b style="margin-bottom: 3px; display:block;"> Your Personal Details</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>First Name:</td>
                                    <td><input type="text" name="firstname" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['firstname']." ";} ?> >
                                    <?php if(isset($fname)){if($fname==1){echo "<span class=\"error\">First Name is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Last Name:</td>
                                    <td><input type="text" name="lastname" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['lastname']." ";} ?>>
                                    <?php if(isset($lname)){if($lname==1){echo "<span class=\"error\">Last Name is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Username:</td>
                                    <td><input type="text" name="username" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['username']." ";} ?>>
                                    <?php if(isset($user)){if($user==1){echo "<span class=\"error\">Username is empty!</span>";}}  ?>
									<?php if(isset($ok)){if($ok==2){echo "<span class=\"error\">Username is already taken!</span>";}} ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>E-mail Address:</td>
                                    <td><input type="text" name="email" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['email']." ";} ?>>
                                    <?php if(isset($mail)){if($mail==1){echo "<span class=\"error\">Email is empty!</span>";}}  ?>
									<?php if(isset($val)){if($val==1){echo "<span class=\"error\">E-mail is invalid!</span>";}} ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Contact Number:</td>
                                    <td><input type="text" name="contact" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['contact']." ";} ?>>
                                    <?php if(isset($con)){if($con==1){echo "<span class=\"error\">Contact number is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150">Other Contact Number:</td>
                                    <td><input type="text" name="acontact" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['acontact']." ";} ?>></td>
                                </tr>
                        	</tbody>
                        </table>
                        </div>
                        
                    <b style="margin-bottom: 3px; display:block;"> Your Address</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Address 1:</td>
                                    <td><textarea cols="35" rows="3" name="add1"><?php if(isset($_POST['btnSubmit'])){echo $_POST['add1'];} ?></textarea>
                                    <?php if(isset($add1)){if($add1==1){echo "<span class=\"error\">Address is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td width="150"><span class="required">*</span>City:</td>
                                    <td><input type="text" name="city" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['city']." ";} ?>>
                                    <?php if(isset($city)){if($city==1){echo "<span class=\"error\">Field is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                        	</tbody>
                        </table>
                    </div> 
                    
                     <b style="margin-bottom: 3px; display:block;"> Your Password</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Password</td>
                                    <td><input type="password" name="pass" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['pass']." ";} ?>>
                                    <?php if(isset($pass)){if($pass==1){echo "<span class=\"error\">Password is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Password Confirm:</td>
                                    <td><input type="password" name="cpass" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['cpass']." ";} ?>>
                                    <?php if(isset($pass)){if($pass==2){echo "<span class=\"error\">Password confirmation did not match password!</span>";}}  ?>
                                    </td>
                                </tr>
                        	</tbody>
                        </table>
                        </div>
                    
                    <b style="margin-bottom: 3px; display:block;"> Security Question</b>
                	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; margin-bottom:10px;">
                    	<table width="100%">
                        	<tbody>
                            	<tr>
                                	<td width="150"><span class="required">*</span>Question</td>
                                    <td><select name="question" id="question"> 
                                        <option value="1" selected="selected"></option> 
                                        <option value="2">Who was your first kiss?</option> 
                                        <option value="4">Who was your third grade teacher?</option> 
                                        <option value="7">What was the first concert you attended?</option> 
                                        <option value="8">What is your mother&#039;s maiden name?</option> 
                                        <option value="9">What was the name of your first pet?</option> 
                                        <option value="10">What street did you grow up on?</option> 
                                        <option value="11">What is your father&#039;s middle name?</option> 
                                        <option value="12">When is your mother&#039;s birthday?</option> 
                                        </select>
                                        <?php if(isset($question)){if($question==1){echo "<span class=\"error\">Please select a question!</span>";}}  ?>
                                        </td>
                                </tr>
                                <tr>
                                	<td width="150"><span class="required">*</span>Answer:</td>
                                    <td><input type="text" name="ans" <?php if(isset($_POST['btnSubmit'])){echo "value =".$_POST['ans']." ";} ?> >
                                    <?php if(isset($ans)){if($ans==1){echo "<span class=\"error\">Answer is empty!</span>";}}  ?>
                                    </td>
                                </tr>
                        	</tbody>
                        </table>
                        </div>
                       
                       <div class="buttons">
                       		<table>
                            	<tbody>
                                	<tr><td align="right" style="padding-right:5px;">I have read and agree to the <a href="privacy_info.php"><b>Privacy Policy</b></a></td>
                                    <td width="5" style="padding-right:10px;"><input type="checkbox" name="agree" value="1"></td>
                                    <td align="right" width="5"><input type="submit" value="Submit" name="btnSubmit"> </td>
                            	</tbody>
                            </table>
                       </div>
            </form>
        </div>
        
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>