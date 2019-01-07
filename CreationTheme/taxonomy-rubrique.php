<?php 

get_header();
	//vardump($_GET);

	//vardump($posts);

$affichage=$_GET["affichage"];

if(!$affichage){
	$affichage="mosaique";
}

?>
<div class="row h-taxonomy-rubrique">
	<div class="col-md-10">
		<h4>
			Liste des missions :
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?affichage=mosaique" title="Mosaique"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?affichage=liste" title="Liste"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a>
		</h4>
		<?php if($affichage=="liste"){ ?>
			<table class="table table-bordered table-hover table-responsive	">
				<tr>
					<td>Pays</td>
					<td>Description</td>
					<td>Images</td>
				</tr>
				<?php 
				while (have_posts()) {
					the_post();
					?>
					<tr>
						<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
						<td><?php the_excerpt(); ?></td>
						<td><?php echo liste_images_attachees(get_the_id(),array(200,200))?></td>
					</tr>
					<?php

				}
				?>
			</table>
		<?php } ?>
		<!-- AFFICHAGE MOSAIQUE -->
		<?php if($affichage=="mosaique"){ ?>
			<div class="row">
				<?php 
				$i=0;
				while (have_posts()) {
					the_post();
					?>
					<div class="col-md-4 h-ligne">
						<div class="h-titre">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="h-image">
										<?php the_post_thumbnail(get_the_ID(),array('class'=>'img-responsive','alt'=>get_the_title())); ?>
									</div>
									<div class="h-resume">
										<?php echo get_the_excerpt_max_charlength(200,get_the_excerpt()) ?>
									</div>	
								</div>				
								<?php 

								$i=$i+1;
								$reste=fmod($i,3);
								if($reste==0){
									echo'</div><div class="row" ><br>';
								}

							} 
							?>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php get_footer(); ?>