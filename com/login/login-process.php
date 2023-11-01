<?php

	require ( '../../inc/config.php' );


	require ( '../../'.PATH_LIBRARIES.'libraries.php' );

	$type		= $_REQUEST['type'];

	$is_valid 	= 'no';	

	if( isset($_POST['username']) and isset($_POST['password']) ){

		$username = $string->sql_safe($_REQUEST['username']);

		$password = $string->sql_safe($_REQUEST['password']);

		$row = $db->get_row("SELECT * FROM tbl_user WHERE BINARY email_address = '$username' AND activated = '1'") ;	

		// ACCOUNT IS ROOT

		if($row->user_id > 0){

			$passwordcrypt 	= new hash_encryption($row->varkey);

			$dbpassword = $passwordcrypt->decrypt($row->password);

			// echo $dbpassword;

			if($dbpassword==$password){

				$_SESSION[WEBSITE_ALIAS]["user"]['user_id']    		= $row->user_id;

				$_SESSION[WEBSITE_ALIAS]["user"]['user_fullname']  	= $row->firstname.' '.$row->lastname;

				$_SESSION[WEBSITE_ALIAS]["user"]['user_role_id'] 	= $row->user_role_id;

				$_SESSION[WEBSITE_ALIAS]["user"]['email_address'] 	= $row->email_address;

				if( $row->property_level_account > 0 ):

					$_SESSION[WEBSITE_ALIAS]["user"]['property_id'] 	= $row->property_id;

				endif;

				$_SESSION[WEBSITE_ALIAS]["user"]['property_level_account'] = $row->property_level_account;

				$is_valid = 'yes';

			}

		}

	}

echo $is_valid;	

?>