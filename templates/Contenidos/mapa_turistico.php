<div class="col-md-12 d-flex align-items-center">	
	<table class="table-borderless" border="0">
		<tr>
			<? for ($i=1; $i < 22; $i++) { $imagen=$i;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=22; $i < 43; $i++) { $imagen=$i;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=43; $i < 64; $i++) { $imagen=$i;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=64; $i < 85; $i++) { $imagen=$i;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=85; $i < 106; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=106; $i < 127; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=127; $i < 148; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=148; $i < 169; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=169; $i < 190; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=190; $i < 211; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=211; $i < 232; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=232; $i < 253; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=253; $i < 274; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=274; $i < 295; $i++) { $imagen=$i+1;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=295; $i < 316; $i++) { $imagen=$i+1; 
			if($i>305){
				$imagen=$i;
			}
			if($i==306){
				$imagen='306-a';
			}
					?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
			</td>
		<?} ?>	
		</tr>
		<tr>
			<? for ($i=316; $i < 337; $i++) { $imagen=$i;	?>
			<td class="contenedor-img-mapa">
				<?= $this->Html->image('protegidas/mapa/fragmentos/'.$imagen.'.jpg', array('class'=>'imagen-mapa')) ?>
				
			</td>
		<?} ?>	
		</tr>
	</table>
</div>
<style type="text/css">
	.contenedor-img-mapa{
		margin: 0;
		padding: 0;
	}
	.imagen-mapa{
		height: 44.30px !important;
		width: 62px !important;
		margin: 0;
		padding: 0;

	}
</style>
