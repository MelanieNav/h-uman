<?php 

	get_header(); 

	global $current_user;

	//////////////////////////A CHAQUE CLICK SUR UN BOUTON SUBMIT///////////////////////////
	$action=$_POST["action"];	

	////////////////////////////////FONCTIONNALITE POSTULER/////////////////////////////////

	if ($action=="postuler") {

	}

?>
<div class="row h-single-mission">
	<div class="col-md-10">
		<?php the_post(); ?>
		<table class="table table-bordered table-hover table-responsive">
			<tr>
				<td><?php echo liste_images_attachees(get_the_id(),array(200,200))?></td>
				<td>
					<tr>
						<td>Proposée par:</td>
						<td><?php echo get_post_meta( get_the_ID(), 'wpcf-porteur-projet', true ); ?></td>
					</tr>
					<tr>
						<td>Type de mission:</td>
						<td><?php echo get_post_meta( get_the_ID(), 'wpcf-type-mission', true ); ?></td>
					</tr>	
					<tr>
						<td>Lieu:</td>
						<td><?php echo get_post_meta( get_the_ID(), 'wpcf-pays', true ); ?> - <?php echo get_post_meta( get_the_ID(), 'wpcf-ville', true ); ?></td>
					</tr>
					<tr>
						<td>Période:</td>
						<td><?php echo get_post_meta( get_the_ID(), 'wpcf-du', true ); ?> - <?php echo get_post_meta( get_the_ID(), 'wpcf-au', true ); ?></td>
					</tr>		
					<tr>
						<td>Description</td>
						<td><?php the_content(); ?></td>
					</tr>
				</td>			
			</tr>
		</table>
		<button class="btn btn-primary" type="submit" name="action" value="postuler" >Je postule!</button>
	</div>
</div>
<?php get_footer(); ?>