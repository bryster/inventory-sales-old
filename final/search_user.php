<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br><div id="mainMenuContent">Dashboard > Admin Settings > Search Accounts</div></div><div> <div id="content">
                    <form method="post">
                            <fieldset>
                            <p><label>Search:<label><input type="text" name="keyword"/><label></p><br>
                            <p class="submit"><input type="submit" value="Submit" name="submit"/></p>
                            </form>
                        
                        <div>
                            <?php
                                if (isset($_POST['submit']))
                                { $keyword= $_POST['keyword'];
                                $result=SearchUser($keyword);
                                        echo "<table border=1>
                                        <tr>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Address</th>
                                        <th>Account Type</th>
                                        <th>Contact No.</th>
                                        </tr>";
                                        while($row = mysql_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['firstname'] . "</td>";
                                            echo "<td>" . $row['lastname'] . "</td>";
                                            echo "<td>" . $row['street'] . " ". $row['village'].", ". $row['city']."</td>";
                                            if($row['userlevel']==1){echo "<td>Admin</td>";}
                                            elseif($row['userlevel']==2){echo "<td>Staff</td>";}
                                            elseif($row['userlevel']==3){echo "<td>Customer</td>";}
                                            else echo "<td> </td>";
                                            echo "<td>" . $row['contact'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                }elseif(!isset($_POST['submit'])){
                                    $result = DisplayUser();
                                        echo "<table border=1>
                                        <tr>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Address</th>
                                        <th>Account Type</th>
                                        <th>Contact No.</th>
                                        </tr>";
    
                                        while($row = mysql_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['firstname'] . "</td>";
                                            echo "<td>" . $row['lastname'] . "</td>";
                                            echo "<td>" . $row['street'] . " ". $row['village'].", ". $row['city']."</td>";
                                             if($row['userlevel']==1){echo "<td>Admin</td>";}
                                            elseif($row['userlevel']==2){echo "<td>Staff</td>";}
                                            elseif($row['userlevel']==3){echo "<td>Customer</td>";}
                                            else echo "<td> </td>";
                                            echo "<td>" . $row['contact'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                }
                            ?>
                        </div>
  
<?php require("includes/footer.php");?>