<?php 
global $current_user;

$action=$_POST["envoiMission"];

if($action=="envoiMission"){
	$id_mission=wp_insert_post(
		array(
			'post_title'=>wp_strip_all_tags($_POST["pays"]),
			'post_content'=>$_POST["description"],
			'post_type'=>'mission',
			'post_status' => 'publish'
		)
	);

	update_post_meta($id_mission, 'wpcf-ville',$_POST["ville"], '' );
	update_post_meta($id_mission, 'wpcf-financable',$_POST["financable"], '' );
	update_post_meta($id_mission, 'wpcf-porteur-projet',$_POST["porteur-projet"], '' );
	wp_set_post_terms($id_mission,  $_POST["rubrique"], 'rubrique' );
	update_post_meta($id_mission, 'wpcf-du',$_POST["du"], '' );
	update_post_meta($id_mission, 'wpcf-au',$_POST["au"], '' );
	//set_post_thumbnail($id_mission, $_POST["file"] );
	update_post_meta($id_mission, '_thumbnail_id', $_POST["file"]);
	wp_redirect(home_url());
} 
$type=$_POST["rubrique"];
	 	$args=array(
	 		'post_type'=>'mission'
	 	);

	 	$missions=new WP_query($args);
	 	$taxonomie=get_select_terms_taxo_post($missions,'rubrique','form-control');
	 	get_header(); 

?>
<!---------------------AFFICHAGE LISTE DES MISSIONS--------------------->
	 	 		<?php while ($missions->have_posts()) {
	 			$missions->the_post();
	 			?>
	 			<table>
		 			<tr>
		 				<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-ville', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-porteur-projet', true ); ?></td>
		 				<td><?php echo $type ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-du', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-au', true ); ?></td>
		 				<td><?php echo liste_images_attachees(get_the_id(),array(200,200))?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-financable', true ); ?></td>
		 				<td><?php echo get_post_meta(get_the_id(), 'wpcf-file', true ); ?></td>
		 			</tr>
	 			</table>
	 			<?php 
	 		}
	 		
	 		if($current_user->user_level>1 or !is_user_logged_in()){
	 			echo "<br><br>Vous devez être un porteur de projet pour pouvoir proposer une mission";
	 		} else {
	 		?>
	 	<div class="h-proposermission">
	 		<h3>Proposer une mission</h3>
		 		<div class="row">
		 			<div class="col-md-9">
		 				<form class="formProposerMission" action="" method="post" enctype="multipart/form-data">
		 					<table class="table table-hover">
		 						<tr>
		 							<td>Porteur de projet / association:</td>
		 							<td><input required class="form-control" type="text"  placeholder="Nom"  name="porteur-projet"></td>
		 						</tr>
		 						<tr>
		 							<td>Pays:</td>
		 							<td><input required class="form-control" type="text" name="pays" placeholder="Pays de la mission"></td>
		 							&nbsp;&nbsp;&nbsp;
		 							<td>Ville:</td>
		 							<td><input class="form-control" type="text" name="ville" placeholder="Ville de la mission"></td>
		 						</tr>
		 						<tr>
		 							<td>Domaine:</td>
		 							<td><?php echo $taxonomie ?></td>
		 						</tr>
		 						<tr>
		 							<td>Période: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Du:</td>
		 							<td><input required class="form-control" type="date"  placeholder="Période de la mission"  name="du"></td>
		 							<td>Au:</td>
		 							<td><input class="form-control" type="date"  placeholder="Période de la mission"  name="au"></td>
		 						</tr>
		 						<tr>
		 							<td>Mission finançable:</td>
		 							<td><input class="form-control" type="text" name="financable" placeholder="Adresse du crowdfunding"></td>
		 						</tr>
		 					</table>
		 					<div class="form-group">
		 						<p>Description:</p>
		 						<textarea class="form-control rounded-0" name="description" id="description" rows="10" placeholder="Veuillez renseigner les informations de la mission"></textarea>
		 					</div><br>
		 					<input type="file" name="file" value="file" />
		 					<br><br>
		 					<button class="btn btn-primary" id="submit" type="submit" name="envoiMission" value="envoiMission">Envoi mission</button>				
		 				</form>
		 			</div>
	 			</div>
	 	</div>
	 <?php } ?>
	 	<?php get_footer(); ?>