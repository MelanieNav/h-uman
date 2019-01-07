<?php 

get_header(); 

global $current_user;
$du=get_post_meta( get_the_ID(), 'wpcf-du', true );
$duannee = substr($du, 0, 4);
$dumois = substr($du, 5, 2);
$dujour = substr($du, 8, 2);
$au=get_post_meta( get_the_ID(), 'wpcf-au', true );
$auannee = substr($au, 0, 4);
$aumois = substr($au, 5, 2);
$aujour = substr($au, 8, 2);

$action=$_POST["postuler"];	

	////////////////////////////////FONCTIONNALITE POSTULER/////////////////////////////////

if ($action=="postuler") {
	if(!is_user_logged_in()){
		echo ('Vous devez être connecté pour pouvoir postuler à une mission');
 	} else { 
 		
 	}
}

?>
<div class="row h-single-mission">
	<div class="col-md-10">
		<?php the_post(); ?>
		<table class="table table-bordered table-hover table-responsive">
			<tr>
				<td>Proposée par :</td>
				<td><?php echo get_post_meta( get_the_ID(), 'wpcf-porteur-projet', true ); ?></td>
			</tr>
			<tr>
				<td>Type de mission :</td>
				<td><?php echo get_post_meta( get_the_ID(), 'wpcf-type-mission', true ); ?></td>
			</tr>	
			<tr>
				<td>Lieu :</td>
				<td><?php the_title(); ?> - <?php echo get_post_meta( get_the_ID(), 'wpcf-ville', true ); ?></td>
			</tr>
			<tr>
				<td>Période :</td>
				<td>Du <?php echo  $dujour ." - ". $dumois ." - ". $duannee; ?> &nbsp; au &nbsp;&nbsp;<?php echo $aujour ." - ". $aumois ." - ". $auannee; ?></td>
			</tr>		
			<tr>
				<td>Description :</td>
				<td><?php the_content(); ?></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo liste_images_attachees(get_the_id(),array(200,200))?>				
				</td>
			</tr>
		</table>
		<button class="btn btn-primary" type="submit" name="postuler" value="postuler" >Je postule!</button><br><br>
		Partager sur : &nbsp;<?php juiz_sps($array) ?>
	</div>
</div>
<?php get_footer(); ?>