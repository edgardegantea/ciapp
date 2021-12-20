<div class="container">
	<h2><?= esc($title); ?></h2>


<?= service('validation')->listErrors() ?>

<form action="/news/create" method="post">
	<?= csrf_field() ?>


	<div class="form-group">
		<label for="">Título:</label>
		<input class="form-control" type="text" name="title" id="">		
	</div>

	<div class="form-group mt-3">
		<label for="">Contenido de la noticia:</label>
		<textarea class="form-control" name="body" id="" cols="30" rows="5"></textarea>	
	</div>

	<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
		<input class="btn btn-primary" type="submit" value="Guardar">	
	</div>
	

</form>
</div>

