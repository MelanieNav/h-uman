<?php 
$args=array(
	'post_type'=>'temoignage'
);

$temoignage=new WP_query($args);
get_header(); 
wp_get_archives
?>
<div class="h-archive-temoignage">
	<div class="row">
		<?php 
		wp_get_archives();
		$i=0;
		while (have_posts()) {
			the_post();
		?>
			<div class="tem col-md-3 col-md-offset-1">
				<div class="h-titre">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>			
				<div class="h-resume">
					<?php echo get_post_meta( get_the_ID(), 'wpcf-lieu', true ); ?>
					<?php echo get_post_meta(get_the_id(), 'wpcf-tdescription', true ); ?>
					<!-- <?php echo get_the_excerpt_max_charlength(100,get_the_excerpt()) ?>-->
				</div>	
			</div>
			<?php
				$i=$i+1;
				$reste=fmod($i,3);
				if($reste==0){
					echo'</div><div class="row" >';
				}
			} 
			?>				
	</div>
</div>