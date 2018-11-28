<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url');  ?>/images/H.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name');?></title>
	<!--STYLE PERSO-->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/styles/style.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
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
	<div class="container">		
		<div id="header">
		<?php if(is_front_page()){?>
			<div class="bckgrd"></div>
		<?php } else {?>
			<div id="triangle"></div>
		<?php
		}
		?>							
			<a href="<?php bloginfo('url');?>/index.php"><img width="150px" src="<?php bloginfo('template_url');?>/images/logo.png" alt="logo"></a>			
			<ul class="navbar">
				<li><a class="sep_droite" href="">PROPOSER UNE MISSION</a></li>
				<li><a class="sep_droite" href="">TÉMOIGNAGES</a></li>
				<li><a class="sep_droite" href="">RECHERCHER</a></li>
				<li><a class="sep_droite" href="">CONSEILS PRATIQUES</a></li>
				<li><a href="">AGIR</a></li>
				<li><a class="sep_droite" href="">S'inscrire</a></li>
				<li><a href="">Se connecter</a></li>
			</ul>			
		</div>