<?php

ob_start();

header ("Expires: Thu, 17 May 2001 10:17:17 GMT");    			// Date in the past

header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified

header ("Cache-Control: no-cache, must-revalidate");  			// HTTP/1.1

header ("Pragma: no-cache");                          			// HTTP/1.0

require_once ( 'inc/config.php' );

require_once ( PATH_LIBRARIES.'libraries.php' );



?>

<!DOCTYPE html>

<html lang="en">

<head>

<link rel="icon" href="<?php echo IMAGES; ?>favicon.ico" type="image/x-icon" />

<link href="<?php echo IMAGES; ?>favicon.ico" rel="shortcut icon" type="image/x-icon" />

<title><?php echo WEBSITE_NAME?></title>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">

<meta name="author" content="">

<meta name="Robots" content="NOINDEX,NOFOLLOW,NOARCHIVE">


<!-- Bootstrap Core CSS -->

<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->

<link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->

<link href="dist/css/styles.css" rel="stylesheet">

<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<link href="dist/css/modstrap.css" rel="stylesheet">

<link href="dist/css/flat-ui.css" rel="stylesheet">

<!-- Custom Fonts -->

<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<?php

$passwordcrypt 	= new hash_encryption('I1M6OJG0yg2W');

$dbpassword = $passwordcrypt->decrypt('kY5lQskJRYFtWt5FZ6uSRLYtNP9Ic5+c');

$page_option = trim($_GET['option'] ?? '');

$page_option = isset($_REQUEST['option']) ? strtolower(trim($_REQUEST['option'])) : "home";



if( !isset($_SESSION[WEBSITE_ALIAS] ) ) {

		include PATH_COMPONENTS."login/login.php";


} else {

	include PATH_COMPONENTS."main.php";


}

?>

</body>

<script type="text/javascript">

	$( document ).ready(function() {



		$(".navbar-default.sidebar").addClass("hidden");	

		$("#page-wrapper").addClass("page-wrapper-adjust");

		//$("#page-wrapper").css("margin-left", "0px");

		$(this).html('View Menu <i class="fa fa-list-ul fa-fw"></i>');


	});

</script>

</html>

<?php

ob_end_flush();

?>