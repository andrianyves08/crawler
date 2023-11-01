<?php

// Global definitions
//
// ini_set('display_errors', 0);
// ini_set("error_reporting",		"off");
session_start();
define("BRAND_NAME"	,	"Crawler");
define("COMPANY_NAME"	,	"Crawler");

define( 'DB_HOST',				'localhost' );		
define( 'DB_USER',				'root' );		
define( 'DB_PASSWORD',			'' );		
define( 'DB_NAME',				'crawl' );


define( 'WEBSITE_ADMIN_URL',	$_SERVER['HTTP_HOST'].'crawl/' );
define( 'WORDPRESS_URL',		$_SERVER['HTTP_HOST']);


define( 'PATH_LIBRARIES',	 	'lib/' );
define( 'PATH_INCLUDES',		'inc/'   );
define( 'PATH_COMPONENTS',		'com/' );
define( 'PATH_TEMPLATES',		'temp/' );
define( 'PATH_STANDARDACTIONS',	'com/actions/' );
define( 'PATH_STANDARDGALLERY',	'com/imagegallery/' );



define( 'WEBSITE_NAME',			'Crawler' );
define( 'WEBSITE_ALIAS',		'Crawler' );
define( 'INDEX_PAGE',			'index.php?option=' );
define( 'DB_TABLE_PREFIX',		'tbl_' );


define( 'IMAGES',	 			'img/' );
define( 'CSS',					'css/' );
define( 'JS',					'js/' );
define( 'PLUGINS',				'plug/' );
define( 'ENCRYPT_KEY',			'fg5gjk' );


// STANDARD PLUGINS
define( 'VALIDATORS',		PLUGINS.'jquery/validate/' );
define( 'FANCYBOX',			PLUGINS.'jquery/fancybox/' );
define( 'DATEPICKER',		PLUGINS.'jquery/datepicker/' );



define( 'ICON_HOME' ,				'<img class="left" style="margin:4px 3px 0px 0px;" src="'.IMAGES.'icon-home.png" alt="Home" title="Home" border="0" />' );
define( 'ICON_VIEW' ,				'<i class="fa fa-search fa-fw" title="view"></i>' );
define( 'ICON_ADD' ,				'<i class="fa fa-plus fa-fw" title="add"></i>' );
define( 'ICON_GALLERY' ,			'<img class="ico-action" src="'.IMAGES.'icon-gallery.png" alt="Gallery" title="Gallery" border="0" />' );
define( 'ICON_EDIT' ,				'<i class="fa fa-pencil fa-fw" title="edit"></i>' );
define( 'ICON_DELETE' ,				'<i class="fa fa-eraser fa-fw" title="delete"></i>' );
define( 'ICON_IMAGE' ,				'<img class="ico-action" src="'.IMAGES.'image.png" alt="Image" title="Image" border="0" />' );
define( 'ICON_ECANCEL' ,			'<img class="ico-action" src="'.IMAGES.'icon-ecancel.png" alt="Early Cancel" title="Early Cancel" border="0" />' );
define( 'ICON_LCANCEL' ,			'<img class="ico-action" src="'.IMAGES.'icon-lcancel.png" alt="Late Cancel" title="Late Cancel" border="0" />' );
define( 'ICON_PLUS' ,				'<img class="ico-action" src="'.IMAGES.'icon-plus.png" alt="Plus" title="Plus" border="0" />' );
define( 'ICON_MINUS' ,				'<img class="ico-action" src="'.IMAGES.'icon-minus.png" alt="Minus" title="Minus" border="0" />' );
define( 'ICON_MOVEUP' ,				'<img class="ico-action" src="'.IMAGES.'moveup.png" alt="Move Up" title="Move Up" border="0" style="width: 30px;"/>' );
define( 'ICON_MOVEDOWN' ,			'<img class="ico-action" src="'.IMAGES.'movedown.png" alt="Move Down" title="Move Down" border="0"  style="width: 30px;" />' );


?>