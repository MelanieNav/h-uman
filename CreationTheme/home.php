<?php get_header(); ?>	
<div class="dropdown">
	<select class="btn btn-default dropdown-toggle btn-lg" id="listeTypeMission" name="typeMission">
		<option disabled="disabled" selected="selected">
			Type de mission
		</option>
		<?php 
		liste_type($tab, $nbLignes);
		?>
	</select>
	<select class="btn btn-default dropdown-toggle btn-lg" id="listeDestination" name="destination">
		<option selected="selected">
			Destination
		</option>
		<?php 
		liste_type($tab, $nbLignes);
		?>
	</select>
	<button id="rechercher" class="btn btn-info btn-lg">
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
