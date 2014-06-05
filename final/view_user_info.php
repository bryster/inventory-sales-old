<?php require_once("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require_once("includes/connection.php");?>
<?php confirmed_logged_in(); ?>
<link rel="stylesheet" href="_common/css/main.css" type="text/css" media="all">
<link href="stylesheets/sortableTable.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="_common/js/mootools.js"></script>
<script type="text/javascript" src="javascripts/sortableTable.js"></script>
<?php include("includes/header.php");?>
<br>
<div id="mainMenuContent">Dashboard > Admin Settings > Manage Users > User Details</div>
</div><div> <div id="content1">

<div class="header">
<p class="h"><?php
    $keyword = $_GET['u'];
    $result=SearchUser($keyword);
    while($row = mysql_fetch_array($result))
            { echo $row['firstname']." ".$row['lastname']; }
?> </p>
</div>




<table id="contact-middle-section">
  <tbody>
    <tr>
      <td id="contact-card">
      <div class="details">
      <?php
		$keyword = $_GET['u'];
		$result=SearchUser($keyword);
		while($row = mysql_fetch_array($result))
				{
	echo "
      <div><strong>".$row['firstname']." ".$row['lastname']."</strong></div>
      <div>".$row['address']."</div>
      <div>".$row['city']."</div>";
	  if($row['userlevel']==1){echo "<div>Admin</div>";}
	  elseif($row['userlevel']==2){echo "<div>Staff</div><p><p>";}
	  
	  echo "<div>".$row['contact']."</div>"; 
	  if($row['alt_contact']!=0){ echo $row['alt_contact'];}
	  echo "</div>";
      } ?>
      

      <p>&nbsp;</p></td>
     </table>
<p>&nbsp;</p>
<?php require("includes/footer.php");?>