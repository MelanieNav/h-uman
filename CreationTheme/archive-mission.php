<?php 	
	get_header();

	$affichage=$_GET["affichage"];

	if(!$affichage){
		$affichage="mosaique";
	}

?>
<div class="row h-archive-mission">
	<div class="col-md-9">
		<h4>
			Liste des missions :
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?affichage=mosaique" title="Mosaique"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?affichage=liste" title="Liste"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a>
		</h4>
		<?php if($affichage=="liste"){ ?>
			<table class="table table-bordered table-hover table-responsive	">
				<tr>
					<td></td>
					<td>Pays</td>
					<td>Période</td>
					<td>Description</td>					
				</tr>
					<?php 
						while (have_posts()) {
							the_post();
					?>
						<tr>
							<td><a rel="lightbox" href="<?php echo get_src_image_une(get_the_id(),'medium') ?>"><?php the_post_thumbnail(array(100,100)); ?></a></td>
							<td><a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_id(), 'wpcf-pays', true ); ?></a></td>
							<td>Du <?php echo get_post_meta(get_the_id(), 'wpcf-du', true ); ?> au <?php echo get_post_meta(get_the_id(), 'wpcf-au', true ); ?></td>
							<td><?php the_excerpt(); ?></td>					
						</tr>
					<?php	
						}
					 ?>
			</table>
		<?php } ?>
	</div>
</div>
<?php get_footer(); ?>