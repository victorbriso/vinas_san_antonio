<div class="row">
	<div class="col-md-12">
		<h4>Viñas</h4>
	</div>
	<div class="col-md-12">
		<table class="table">
			<? foreach ($data as $key => $value) {?>
				<tr>
					<td>
						<?= $value['nombre'] ?>
					</td>
					<td>
						<?= $this->Html->link('Editar', ['action'=>'editVinas', $value['id']], ['class'=>'btn btn-primary']) ?>
					</td>
				</tr>
			<?} ?>	
		</table>
	</div>
</div>