	<?php get_header(); ?>
	<div id="content"> 
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?> 
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
					<p class="postmetadata">   
						<?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?>   
					</p>
					<div class="post_content"> 
						<?php the_content(); ?> 
					</div> 
				</div> 
			<?php endwhile; ?> 
			<div class="navigation">
				<?php posts_nav_link(' - ','page suivante','page pr&eacute;c&eacute;dente'); ?> 
			</div>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
		</div>
	</body> 
</html>