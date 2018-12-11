<?php 

get_header(); 

global $current_user;

	//////////////////////////A CHAQUE CLICK SUR UN BOUTON SUBMIT///////////////////////////
$action=$_POST["action"];	

?>
<div class="row h-single-temoignage">
	<div class="col-md-10">
		<?php the_post(); ?>
		<table class="table table-bordered table-hover table-responsive">
			<tr>
				<td><?php echo liste_images_attachees(get_the_id(),array(200,200))?></td>
			</tr>		
			<tr>				
				<td>Description</td>
				<td><?php the_content(); ?></td>					
			</tr>
		</table>
	</div>
</div>
<?php get_footer(); ?>