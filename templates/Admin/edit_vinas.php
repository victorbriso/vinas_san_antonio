<form method="post" action="/Admin/editVinas">
	<input type="hidden" name="_Token[fields]" autocomplete="off" value="<?=$token?>">
	<input type="hidden" name="_csrfToken" autocomplete="off" value="<?=$token?>">
	<input type="hidden" name="id" autocomplete="off" value="<?=$data[0]['id']?>">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td>
					<span>Nombre</span>
					<input type="text" name="nombre" class="form-control" value="<?= $data[0]['nombre']?>">
				</td>
				<td>
					<span>Web</span>
					<input type="text" name="web" class="form-control" value="<?= $data[0]['web']?>">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span>Español</span>
					<textarea name="desc_es" rows="5" class="form-control">
						<?= $data[0]['desc_es']?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span>Ingles</span>
					<textarea name="desc_en" rows="5" class="form-control">
						<?= $data[0]['desc_en']?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span>Portugues</span>
					<textarea name="desc_br" rows="5" class="form-control">
						<?= $data[0]['desc_br']?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Guardar" class="btn btn-success btn-block">
				</td>
			</tr>
		</table>
	</div>
</form>