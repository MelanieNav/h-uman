<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url');  ?>/images/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('name');?></title>
		<!--STYLE PERSO-->
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/styles/style.css">
		<!--JQUERY-->		
		<script src="<?php bloginfo('template_url');?>/js/jquery-3.1.1.js"></script>
		<!--JQUERY-UI-->		
		<script src="<?php bloginfo('template_url');?>/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/js/jquery-ui-1.12.1/jquery-ui.min.css">
		<!--BOOTSTRAP-->
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/bootstrap/css/bootstrap.css">
		<script src="<?php bloginfo('template_url');?>/bootstrap/js/bootstrap.js"></script> 						
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="page">
			<div id="container">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php bloginfo('description'); ?>
			</div>
		</div>
