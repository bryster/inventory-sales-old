<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<script type="text/javascript" src="javascripts/jquery.js" ></script>




</style>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Inventory Management > Edit Product</div></div><div> <div id="content1">

<!--content here-->
<div class="header"><p class="h">Add Item</p></div>

<?php
	$p = $_GET['p'];
    // check if a file was submitted
    if(!isset($_FILES['userfile'])) {
        echo '<p>Please select a file</p>';
    }
    else
        {
        try {
            upload($p);
            // give praise and thanks to the php gods
            echo '<p>Succesfully uploaded.</p>';
        }
        catch(Exception $e) {
            echo $e->getMessage();
            echo 'Sorry, could not upload file';
        }
    }
?>
			<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                 <table class="fixed-table">
                   <tbody>
                       <tr class="ei">
                       <td width="100%" class="ei"><label class="space-btm" for="item_name">Add Product Image:</label>
                       <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <input name="userfile[]" type="file" />
                       </td>
                     </tr>
                     <tr class="ei">
                     <td><input type="submit" value="Submit" /></td>
                     </tr>
                   </tbody>
                   </table>
				</form>

         <?php require("includes/footer.php");?>
