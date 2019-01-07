<?php 
global $wpdb;

$missions=$wpdb->get_results("SELECT ID,post_title,post_content FROM wp_posts WHERE post_type='mission' AND post_status='publish' AND financable IS NOT NULL");

get_header(); 
the_post();
?>
<div class="h-agir">
	<h3><?php the_title(); ?></h3>
	<br>
	<div class="row">
		<?php the_content(); ?>
	</div>
	<div class="row">
		<h3>Liste des missions finançables:</h3>
		<?php
		foreach ($missions as  $mission) {
			echo $mission->post_title." - ". $mission->post_content."<br>";
		}
		?>
		
	</div>

	<?php get_footer(); ?>