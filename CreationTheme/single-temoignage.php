<?php 

get_header(); 

global $current_user;

$action=$_POST["action"];	

$du=get_post_meta( get_the_ID(), 'wpcf-tdu', true );
$duannee = substr($du, 0, 4);
$dumois = substr($du, 5, 2);
$dujour = substr($du, 8, 2);
$au=get_post_meta( get_the_ID(), 'wpcf-tau', true );
$auannee = substr($du, 0, 4);
$aumois = substr($du, 5, 2);
$aujour = substr($du, 8, 2);

?>
<div class="row h-single-temoignage">
	<div class="col-md-10">
		<?php the_post(); ?>
		<table class="table table-bordered table-hover table-responsive">
			<tr>
				<td>Proposé par :</td>
				<td><?php echo get_post_meta( get_the_ID(), 'wpcf-nom', true ); ?></td>
			</tr>
			<tr>
				<td>Lieu :</td>
				<td><?php echo get_post_meta( get_the_ID(), 'wpcf-lieu', true ); ?></td>
			</tr>
			<tr>
				<td>Type de mission :</td>
				<td><?php echo get_post_meta(get_the_id(), 'wpcf-objectif', true ); ?></td>
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
		Partager sur : &nbsp;<?php juiz_sps($array) ?>
		<div class="comments-template"> <?php comments_template(); ?> </div>
	</div>
</div>
<?php get_footer(); ?>