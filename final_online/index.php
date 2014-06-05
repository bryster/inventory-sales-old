<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/header.php");?>
    <div id="breadcrumb">
    	<a href="index.php">Home</a>
    </div>
    
<?php include("includes/sidepanel.php");?>
    
    <div id="content">
    	<div class="top"><h1>Welcome to Jorona</h1></div>
        <div class="middle">
        	<div>
              <p align="justify">Jorona Aquatic Resources and International Trading, Inc. is a company for marketing aquatic resources internationally and in selected domestic places here in the Philippines which has a main branch in Manila. They are capable of exporting fish products globally and have recently opened their services locally. They also market marinated and flavored aquatic- products. </p>
                  <p align="justify">The company also entertains and delivers their goods to individual customers and homes.
                Jorona Aquatic Resources & International Trading, Inc. is a pioneer investor at the Samal Island Marine Culture Park. It was established by the Bureau of Fisheries & Aquatic Resources in partnership with the Local Government Unit (LGU) of the Island Garden City of Samal, in a 224-hectare storm free coastal water at the atrium of Davao Gulf. </p>
        	</div>
            
            <div class="heading">Latest Products</div>
            <?php include("includes/latest_products.php");?>
            </div>
        <div class="bottom"></div>
  </div>
    

<?php include("includes/footer.php");?>