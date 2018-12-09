<?php 
get_header(); 
the_post();
?>
<div class="h-contact">
	<h3><?php the_title(); ?></h3>
	<br>
	<div class="row">
		<?php the_content(); ?>
	</div>
	<?php get_footer(); ?>