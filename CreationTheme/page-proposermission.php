<?php 
get_header(); 
the_post();
?>
<div class="h-proposermission">
	<h3><?php the_title(); ?></h3>
	<div class="row">
		<div class="col-md-9">
			<form class="exercice" action="" method="post" enctype="multipart/form-data">
				<table class="table table-hover">
					<tr>
						<td>Pays:</td>
						<td><input required class="form-control" type="text" name="pays" placeholder="Pays de la mission"></td>
						&nbsp;&nbsp;&nbsp;
						<td>Ville:</td>
						<td><input class="form-control" type="text" name="ville" placeholder="Ville de la mission"></td>
					</tr>
					<tr>
						<td>Domaine:</td>
						<td><input required class="form-control" type="text"  placeholder="Domaine (ex: éducation, santé, environnement, ...)"  name="domaine"></td>
					</tr>
					<tr>
						<td>Période: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Du:</td>
						<td><input required class="form-control" type="date"  placeholder="Période de la mission"  name="du"></td>
						<td>Au:</td>
						<td><input class="form-control" type="date"  placeholder="Période de la mission"  name="au"></td>
					</tr>
				</table>
				<div class="form-group">
					<p>Description:</p>
					<textarea class="form-control rounded-0" id="description" rows="10" placeholder="Veuillez renseigner les informations de la mission"></textarea>
				</div><br>
				<input type="file" name="file" />
				<br><br>
				<button class="btn btn-primary" type="submit" name="action" value="majeur">Soumettre</button>				
			</form>
		</div>
	</div>
</div>
<?php get_footer(); ?>