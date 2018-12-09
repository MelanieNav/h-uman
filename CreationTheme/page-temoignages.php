<?php 
get_header(); 
the_post();
?>
<div class="h-temoignages">
	<h3><?php the_title(); ?></h3>
	<br>
	<div class="row">
		<a class="lienTem" href="<?php bloginfo('url'); ?>/redigerTem">Écrire un témoignage...</a>
	</div>
	<div class="row">
		<?php 
		$i=0;
		while (have_posts()) {
			the_post();
		?>
			<div class="tem col-md-3 col-md-offset-1">
				<div class="h-titre">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>			
				<div class="h-resume">
					<?php echo get_the_excerpt_max_charlength(100,get_the_excerpt()) ?>
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
<?php get_footer(); ?>