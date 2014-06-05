<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Inventory Management > Stock In</div></div><div> <div id="content">

<!--content here-->
                                    
                            <form method="post">
                                <fieldset>
                                    <?php $result = SelectProduct();?>
                                    <p><label>Search Product:</label>
                                    <select name="select" id="select">
                                    <?php while($row = mysql_fetch_array($result)){
                                        echo "<option name=\"prod\" value=\"".$row['prod_id']."\">".$row['prod_name']."\n  ";
                                        }?> 
                                        </select>
                                    </p>
                                    <p class="submit"><input type="submit" value="Submit" name="submit"></p>
                            </form>
                        <?php
                                if (isset($_POST['submit']))
                                {
                                $keyword= $_POST['select'];
                                $result=SearchProduct2($keyword);
                                while($row = mysql_fetch_array($result))
                                        {
                            echo "<form method=\"post\" action=\"stockin_process.php\">";
                            echo "<p><label>Product ID </label><input  type=\"text\" name=\"prodId\" size=\"5\"  READONLY value=".$row['prod_id']."></p>";
                            echo "<p><label>Product Name </label>".$row['prod_name']."</p>";
                            echo "<p><label>Quantity on Hand </label><input  type=\"text\" name=\"prodQOH\" size=\"5\"  READONLY value=".$row['quantity_on_hand']."></p>";
                            echo "<p><label>Add Inventory Item </label><input  type=\"text\" name=\"addItem\"></p><br>";
                            echo "<p class=\"submit\"><input type=\"submit\" name=\"submit2\" value=\"Update\"></p>";
                            echo "<p class=\"submit\"><input type=\"submit\" name=\"submit3\" value=\"Delete\"></p>";
                            echo "</form>";
                                        }
                                }
                        ?>

<?php require("includes/footer.php");?>