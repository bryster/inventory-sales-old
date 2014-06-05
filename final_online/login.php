<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
<?php include("login_process.php");?>
    
    <div id="content">
    	<div class="top"><h1>Account Login</h1></div>
        <div class="middle">
        	<?php if(isset($u)){ if($u==1){echo "<div class=\"warning\">Error: No match for Username and/or Password. </div>";} } ?>
            <div style="float:left; display: inline-block; width:247px;">
            	<b style="margin-bottom: 3px; display:block;"> I am a new customer.</b>
                <div style="background:#f7f7f7; border:1px solid #DDDDDD; padding:10px; min-height:175px;">
                	New Customer
                    <br><br>
                    By creating an account you will be able to shop faster, be up to date on and order status, and keep track of the orders you have prevously made.
                    <br><br>
                 	<div style="text-align:right;">
                    	<a onclick="location='registration.php'"><span>Continue</span></a>
                    </div>
            	</div>
        	</div>
            
            <div style="float:right; display:inline-block; width:274px;"> <b style="margin-bottom:3px; display:block;">Returning Customer</b>
            	<div style="background:#f7f7f7; border: 1px solid #DDDDDD; padding:10px; min-height:175px;">
                	<form method="post" id="login" enctype="multipart/form-data">
                    	I am a returning customer.<br><br />
                        <b>Username</b>
                        <br />
                        <input type="text" name="user" />
                        <br /><br />
                        <b>Password</b>
                        <br>
                        <input type="password" name="pass" />
                        <br>
                            <a href="forgotten.php">Forgot your password?</a>
                        <br> 
                        <div style="text-align:right;">
                        	<input type="submit" value="Login" name="btnSubmit" />
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>