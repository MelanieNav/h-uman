<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url');  ?>/images/H.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
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
		<?php if(is_front_page()){?>
			<div class="bckgrd"></div>	
			<div class="container">
			<div id="header">
		<?php } else {?>
			<div class="container">		
			<div id="header">
			<div id="triangle"></div>
		<?php
		}
		?>							
			<a href="<?php bloginfo('url');?>/index.php"><img width="150px" src="<?php bloginfo('template_url');?>/images/logo.png" alt="logo"></a>			
			<ul class="navbar" id="test">
				<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/proposermission">PROPOSER UNE MISSION</a></li>
				<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/temoignages">TÉMOIGNAGES</a></li>
				<li>
					<a class="sep_droite" href="">RECHERCHER</a>
					<ul>
						<li>Par type de mission:
							<select class="btn btn-default dropdown-toggle btn-lg" id="listeTypeMission" name="typeMission">
								<option disabled="disabled" selected="selected">
									Type de mission
								</option>
								<?php 
								liste_type($tab, $nbLignes);
								?>
							</select>
						</li>
						<hr>
						<li>Par localisation:
							<img width="70%" src="<?php bloginfo('template_url');?>/images/carte-monde.png" alt="carte">
						</li>
					</ul>
				</li>
				<li><a class="sep_droite" href="">CONSEILS PRATIQUES</a></li>
				<li><a href="">AGIR</a></li>
				<?php if(!is_user_logged_in()){ ?>
					<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/wp-login.php?action=register">S'inscrire</a></li>
				<?php } ?>
				<?php if(is_user_logged_in()){ ?>
					<?php if($current_user->user_level!=10){ ?>
						<li>
							<a target="_BLANK" href="<?php bloginfo('url'); ?>/wp-admin">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<?php echo $current_user->user_login ?>	
							</a>
						</li>
					<?php }else{ ?>
						<li><a target="_BLANK" href="<?php bloginfo('url'); ?>/wp-admin">BackOffice</a></li>
					<?php } ?>
				<?php } ?>
				<li><?php wp_loginout(); ?></li>
			</ul>			
		</div>

<script type="text/javascript">
	$(document).ready(function(){

		//alert(window.location.href);
		lien=window.location.href;
		chemin=lien.substring(0,lien.length-1);

		//alert(chemin);
		$('li a[href="'+chemin+'"]').addClass("active");

	});
</script>