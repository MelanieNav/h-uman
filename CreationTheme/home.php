<?php get_header(); ?>	
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="typeMission" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Type de mission
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="#" title="Lien 1">Lien 1</a></li>
			<li><a href="#" title="Lien 2">Lien 2</a></li>
			<li><a href="#" title="Lien 3">Lien 3</a></li>
		</ul>
		<button class="btn btn-default dropdown-toggle" type="button" id="Destination" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Destination
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
			<li><a href="#" title="Lien 1">Lien 1</a></li>
			<li><a href="#" title="Lien 2">Lien 2</a></li>
			<li><a href="#" title="Lien 3">Lien 3</a></li>
		</ul>
		<button class="btn btn-default">
			Rechercher
		</button>	
	</div>	
	<div id="boutonAccueil">
	</div>
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
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
</div>
