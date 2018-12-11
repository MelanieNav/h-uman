<?php 
global $current_user;

	// var_dump($_POST);

	$action=$_POST["envoiMission"];

	/////////////////////////////////////BOUTON SOUMETTRE////////////////////////////////
	if($action=="envoiMission"){

		$id_utilisateur=wp_insert_post(
			array(
				'post_title'=>wp_strip_all_tags($_POST["pays"]),
				'post_content'=>$_POST["description"]
			)
		);

		update_post_meta($id_utilisateur, 'wpcf-ville',$_POST["ville"], '' );
		update_post_meta($id_utilisateur, 'wpcf-type-mission',$_POST["type-mission"], '' );
		update_post_meta($id_utilisateur, 'wpcf-du',$_POST["du"], '' );
		update_post_meta($id_utilisateur, 'wpcf-au',$_POST["au"], '' );

		set_post_thumbnail( $id_utilisateur, $_POST["file"] );

	 } //else{

		//Initialisation des variables
	// 	$pays="";
	// 	$ville="";
	// 	$type-mission="";
	// 	$description="";
	// 	$du="";
	// 	$au="";
	// 	$file="";

	// }
	get_header(); 

?>
<div class="h-proposermission">
	<h3><?php the_title(); ?></h3>
	<div class="row">
		<div class="col-md-9">
			<form class="formProposerMission" action="" method="post" enctype="multipart/form-data">
				<?php wp_nonce_field('proposermission', 'proposer-verif'); ?>
				<table class="table table-hover">
					<tr>
						<td>Pays:</td>
						<td><input required class="form-control" type="text" name="pays" placeholder="Pays de la mission"></td>
						&nbsp;&nbsp;&nbsp;
						<td>Ville:</td>
						<td><input class="form-control" type="text" name="ville" placeholder="Ville de la mission"></td>
					</tr>
					<tr>
						<td>Domaine:</td>
						<td><input required class="form-control" type="text"  placeholder="Domaine (ex: éducation, santé, environnement, ...)"  name="type-mission"></td>
					</tr>
					<tr>
						<td>Période: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Du:</td>
						<td><input required class="form-control" type="date"  placeholder="Période de la mission"  name="du"></td>
						<td>Au:</td>
						<td><input class="form-control" type="date"  placeholder="Période de la mission"  name="au"></td>
					</tr>
				</table>
				<div class="form-group">
					<p>Description:</p>
					<textarea class="form-control rounded-0" name="description" id="description" rows="10" placeholder="Veuillez renseigner les informations de la mission"></textarea>
				</div><br>
				<input type="file" name="file" />
				<br><br>
				<button class="btn btn-primary" id="submit" type="submit" name="envoiMission" value="soumettre">Soumettre</button>				
			</form>
		</div>
	</div>
</div>
<?php get_footer(); ?>