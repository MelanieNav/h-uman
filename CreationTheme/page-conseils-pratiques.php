<?php 
get_header(); 
the_post();
?>
<div class="h-conseils">
	<h2><?php the_title(); ?></h2>
	<br>
	<div class="row">
		<?php the_content(); ?>
	</div>
	<?php get_footer(); ?>
