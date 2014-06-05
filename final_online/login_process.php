<?php

if(isset($_POST['btnSubmit'])){
	$errors = array();
    $r=0;

    //Form Validation
    
    $required_fields = array('user','pass');
    foreach($required_fields as $fieldname) {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
            $errors[] = $fieldname;
        }
    }
	
	 if (($_POST['user']!="") && ($_POST['pass']!="")){
            $a = CustProcessLogin();
			if($a==1){ redirect_to("account.php");}
			else{$u = 1;}
        }else {
            $u = 1;
        }
	

}

?>