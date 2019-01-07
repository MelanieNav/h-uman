<?php 
$args=array(
	 'post_type'=>'mission'
);

$missions=new WP_query($args);
$taxonomie=get_select_terms_taxo_post($missions,'rubrique','form-control');
$action=$_POST["rechercher"];
if ($action=="rechercher") {
	//custom_search_filter($query);
}


get_header(); 
?>	
<div class="slogan">
	<p>Au cœur de l'engagement</p>
</div>
<div class="dropdown">	
	<?php 
		echo $taxonomie
	?>
	<select class="btn btn-default dropdown-toggle btn-lg" id="listeDestination" name="destination">
		<option selected="selected">
			Destination
		</option>
		<?php 
		liste_type($tab, $nbLignes);
		?>
	</select>
	<button id="rechercher" type="submit" name="rechercher" value="rechercher" class="btn btn-info btn-lg submit">
		Rechercher
	</button>	
</div>	
<?php echo do_shortcode( '[searchandfilter fields="rubrique" submit_label="Rechercher" hide_empty=1 all_items_labels="Type de mission"]' ); ?>
<div id="boutonAccueil">
</div>
<div id="content"> 
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?> 
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1> <br>
				<div class="post_content"> 
					<?php the_content(); ?> 
				</div> 
			</div> 
			<br>
		<?php endwhile; ?> 
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>