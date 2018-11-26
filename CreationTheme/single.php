	<?php get_header(); ?>
	<div id="content"> 
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?> 
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
					<div class="post_content"> 
						<?php the_content(); ?> 
						<div class="comments-template"> 
							<?php comments_template(); ?> 
						</div>
					</div> 
				</div> 
			<?php endwhile; ?> 
			<?php previous_post_link() ?> <?php next_post_link() ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
	</body> 
</html>