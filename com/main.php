<div class="info-preloader" id="infopreloader" style="display:block">
	<div class="process-logo">
		<div class="progress">
			<div class="indeterminate"></div>
		</div>
		<div class="progress" style="position:absolute; bottom:0;">
			<div class="indeterminate"></div>
		</div>
	</div>
</div>
<div id="wrapper">
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<div class="sidebar-nav" id="collapse-toggler-div">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#side-nav" id="nav-toggler">
					<!-- <i class="fa fa-list-ul fa-fw"></i> -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<a class="navbar-brand" href="" style="padding:2px;"><img src="img/f_logo.png" class="" style="height:45px; padding:3px;" /></a>
			<!--<a class="" href="" ><img src="img/hotel-logo.png" class="" style="height:50px; padding:10px;" /></a>-->
		</div>
		<!-- /.navbar-header -->
		<ul class="nav navbar-top-links navbar-right">
			<!-- /.dropdown -->
			<!--  <li>
	            	<a type="button" class="btn-default" id="side_menu_toggler" data-toggle="collapse" data-target="#side-nav">View Menu <i class="fa fa-list-ul fa-fw"></i></a>
	            	<a type="button" class="btn-default" id="side_menu_toggler">Hide Menu <i class="fa fa-list-ul fa-fw"></i></a>
	            </li> -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?php
					if (isset($_SESSION[WEBSITE_ALIAS]["corporate"])) {
						echo "WELCOME " . $_SESSION[WEBSITE_ALIAS]["corporate"]['firstname'];
					} else {
						echo "WELCOME " . $_SESSION[WEBSITE_ALIAS]["user"]['user_fullname'];
					}
					?>
					<i class="fa fa-user fa-fw"></i>
					<i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<?php
					if (isset($_SESSION[WEBSITE_ALIAS]["corporate"])) {
					?>
						<li>
							<a href="<?php echo INDEX_PAGE ?>corporate-account-manager-m&mode=edit&id=<?php echo $_SESSION[WEBSITE_ALIAS]["corporate"]["corporate_id"]; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
					<?php
					} else {
					?>
					<?php
					}
					?>
					<!--
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
						-->
					<li class="divider"></li>
					<li>
						<a href="<?php echo INDEX_PAGE ?>logoff">
							<i class="fa fa-sign-out fa-fw"></i> Logout
						</a>
						<!--<a href="<?php echo INDEX_PAGE ?>logoff" class="log-off" title="LOGOFF">LOGOFF</a>-->
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->
	
	</nav>
	<?php
	$main_checker = 0;
	$chain_link = ICON_HOME . '<a href="' . INDEX_PAGE . 'home">DESKTOP</a> <p>&raquo;</p>';
	switch ($page_option) {
			// DEFAULTS
		case 'home':
			$chain_link  = ICON_HOME . '<a href="' . INDEX_PAGE . 'home">DESKTOP</a>';
			//require(PATH_TEMPLATES.'chain-link.php');
			require('home.php');
			$main_checker++;
			break;
		case 'system-settings':
			$page_heading = "SYSTEM SETTINGS";
			$page_name = "system-settings";
			$chain_link .= '<a href="#" class="active">' . $page_heading . '</a>';
			//require(PATH_TEMPLATES.'chain-link.php');
			require(PATH_COMPONENTS . 'system-settings.php');
			$main_checker++;
			break;
		case 'logoff':
			require(PATH_COMPONENTS . 'login/logout.php');
			$main_checker++;
			break;
			// MAIN PAGES
	}
	// SYSTEM MODULE INCLUSIONS
	// directory path can be either absolute or relative
	$parent_path = './com/';
	// open the specified directory and check if it's opened successfully
	if ($parent = opendir($parent_path)) {
		// keep reading the directory entries 'til the end
		while (false !== ($file = readdir($parent))) {
			
			// just skip the reference to current and parent directory
			if ($file != "." && $file != "..") {
				if (is_dir("$parent_path/$file")) {
					if (file_exists("$parent_path/$file/main.php")) {
						include("$parent_path/$file/main.php");
					}
				}
			}
		}
		// ALWAYS remember to close what you opened
		closedir($parent);
	}
	?>
</div>
<style type="text/css">
	@media (min-width:481px) {
		.page-wrapper-adjust {
			margin-left: 0px !important;
		}
	}

	@media (min-width: 768px) {
		.navbar-default.sidebar {
			background-color: unset !important;
		}
	}
</style>