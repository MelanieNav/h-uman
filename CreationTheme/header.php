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
	<style>
		@import url('https://fonts.googleapis.com/css?family=Muli');
	</style>			
	<?php wp_head(); 
	///////////////////AJOUT PERSONNALISATION LOGIN ET REGISTER FORM//////////////////////
	get_template_part("/modules/login_modal/template");
	global $lienLoginOut;
	global $lienLoginOutInscription;
	$args=array(
		'post_type'=>'mission'
	);

	$missions=new WP_query($args);
	$taxonomie=get_select_terms_taxo_post($missions,'rubrique','form-control');
	?>
	
</head>
<body>
<div id="header">
		<ul class="navbar">
			<a id="nav-toggle"><span></span></a>
			<a href="<?php bloginfo('url');?>/index.php"><img class="logo" width="120px" src="<?php bloginfo('template_url');?>/images/logo.png" alt="logo"></a>
			<div id="toggle">
				<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/proposermission">PROPOSER UNE MISSION</a></li>
				<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/temoignages">TÉMOIGNAGES</a></li>
				<li>
					<a class="sep_droite" href="">RECHERCHER</a>
					<ul>
						<li class="type">Par type de mission:
							<?php 
								echo $taxonomie
							?>
						</li>
						<hr>
						<li>
							 <?php gmwd_map( 1, 1); ?>
						</li>
						<li>
							<button id="rechercher" class="btn btn-default btn-lg">
								Rechercher
							</button>
						</li>
					</ul>
				</li>
				<li><a class="sep_droite" href="<?php bloginfo('url'); ?>/conseils-pratiques">CONSEILS PRATIQUES</a></li>
				<li><a href="<?php bloginfo('url'); ?>/agir">AGIR</a></li>
				<?php if(!is_user_logged_in()){ ?>
					<li class="sep_droite sep"><?php echo $lienLoginOutInscription ?></li>
				<?php } ?>
				<?php if(is_user_logged_in()){ ?>
					<?php if($current_user->user_level!=10){ ?>
						<li>
							&nbsp;<a class="sep_droite" href="<?php bloginfo('url'); ?>/account">Mon profil</a>
						</li>
					<?php }else{ ?>
						<li><a class=""  target="_BLANK" href="<?php bloginfo('url'); ?>/wp-admin">BackOffice</a></li>
					<?php } ?>
				<?php } ?>
				<li class=""><?php echo $lienLoginOut ?></li>
			</div>

		</ul>			
</div>
	<?php if(is_front_page()){?>
		<div class="bckgrd"></div>	
		<div class="container">
	<?php } else {?>
		<div class="container">
		<div id="triangle"></div>
	<?php
	}
	?>	
		

	<script type="text/javascript">

		$(document).ready(function(){

			//alert(window.location.href);
			lien=window.location.href;
			chemin=lien.substring(0,lien.length-1);

			//alert(chemin);
			$('.navbar li a[href="'+chemin+'"]').addClass("activevert");

		});
		

		document.querySelector( "#nav-toggle" )
  		.addEventListener( "click", function() {
    		this.classList.toggle( "active" );
 		});

  		$('#nav-toggle').on('click', function(event) {
			event.preventDefault();

			$("#toggle").toggle(function() {
				/* Stuff to do every *odd* time the element is clicked */
			}, function() {
				$("#toggle").css({
				"background-color":"#1DBF69",
				"opacity":'0.7',
				"height":"200px",
				"margin-top":"0",
				"color":"white",
				"z-index":"1300",
				});
			});
			
		});

	</script>