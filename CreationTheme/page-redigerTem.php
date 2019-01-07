<?php 

$action=$_POST["envoiTemoignage"];

	/////////////////////////////////////BOUTON ENVOYER////////////////////////////////
if($action=="envoiTemoignage"){

	$id_utilisateur=wp_insert_post(
		array(
			'post_title'=>wp_strip_all_tags($_POST["nom"]),
			'post_content'=>$_POST["tdescription"],
			'post_type'=>'temoignage',
			'post_status' => 'publish'
		)
	);
	update_post_meta($id_utilisateur, 'wpcf-nom',$_POST["nom"], '' );
	update_post_meta($id_utilisateur, 'wpcf-lieu',$_POST["lieu"], '' );
	update_post_meta($id_utilisateur, 'wpcf-objectif',$_POST["objectif"], '' );
	update_post_meta($id_utilisateur, 'wpcf-tdu',$_POST["tdu"], '' );
	update_post_meta($id_utilisateur, 'wpcf-tau',$_POST["tau"], '' );

	set_post_thumbnail( $id_utilisateur, $_POST["timage"] );
	wp_redirect(home_url());
}

$args=array(
	'post_type'=>'temoignage'
);

$temoignage=new WP_query($args);
get_header(); 

?>
<!---------------------AFFICHAGE LISTE DES TEMOIGNAGES--------------------->
	 	 		<!-- <?php while ($temoignage->have_posts()) {
	 			$temoignage->the_post();
	 			?>
	 			<table>
		 			<tr>
		 				<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-lieu', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-tdu', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-tau', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-objectif', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-tdescription', true ); ?></td>
		 				<td><?php echo liste_images_attachees(get_the_id(),array(200,200))?></td>
		 			</tr>
	 			</table>
	 			<?php 
	 		}
	 		?> -->
<?php if(!is_user_logged_in()){ ?>
	<p>Vous devez être connecté pour pouvoir écrire un témoignage</p>
<?php } else { ?>
<div class="h-redigerTem">
	<h2>Votre témoignage :</h2><br>
	<div class="row">
		<div class="col-md-9">
			<form class="formRedigerTemoignage" action="" method="post" enctype="multipart/form-data">
				<table class="table table-hover">
					<tr>
						<td>Votre nom:</td>
						<td><input required class="form-control" type="text" name="nom" placeholder="Nom prénom"></td>
					</tr>
					<tr>
						<td>Lieu de la mission:</td>
						<td><input required class="form-control" type="text"  placeholder="Lieu de la mission"  name="lieu"></td>
					</tr>
					<tr>
						<td>Période: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Du:</td>
						<td><input required class="form-control" type="date"  placeholder="Début de la mission"  name="tdu"></td>
						<td>Au:</td>
						<td><input class="form-control" type="date"  placeholder="Fin de la mission"  name="tau"></td>
					</tr>
					<tr>
						<td>Objectif de la mission:</td>
						<td><input class="form-control" type="text"  placeholder="École, construire, santé, ..."  name="objectif"></td>
					</tr>
				</table>
				<div class="form-group">
					<p>Description:</p>
					<textarea class="form-control rounded-0" name="tdescription" id="tdescription" rows="10" placeholder="Veuillez renseigner les informations de la mission"></textarea>
				</div><br>
				<input id="image" type="file" name="timage" multiple="multiple" >
				<br><br>
				<button class="btn btn-primary" id="submit" type="submit" name="envoiTemoignage" value="envoiTemoignage">Envoyer</button>				
			</form>
		</div>
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>