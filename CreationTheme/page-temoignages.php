<?php 

$args=array(
	'post_type'=>'temoignage'
);

$temoignage=new WP_query($args);
get_header(); 

?>
<div class="h-temoignages">
	<h3><?php the_title(); ?></h3>
	<br>
	<div class="row">
		<a class="lienTem" href="<?php bloginfo('url'); ?>/redigerTem">Écrire un témoignage...</a><br><br>
	</div>
	<div class="row">
		<?php 
		$i=0;
		while ($temoignage->have_posts()) {
	 			$temoignage->the_post();
	 	?>
			<div class="tem col-md-3 col-md-offset-1">
				<div class="h-titre">
					<a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_id(), 'wpcf-lieu', true ); ?></a>
				</div>			
				<div class="h-resume">
					<?php echo liste_images_attachees(get_the_id(),array(200,200))?>
					<?php echo get_the_excerpt_max_charlength(200,get_the_excerpt()) ?>
				</div>	
			</div>
			<?php
				$i=$i+1;
				$reste=fmod($i,3);
				if($reste==0){
					echo'</div><div class="row" ><br>';
				}
			} 
			?>				
	</div>
</div>
<?php get_footer(); ?>