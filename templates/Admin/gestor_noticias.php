<div class="col-md-12" style="margin-top: 10px">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 float-left"><h4>Noticias</h4></div>
					<div class="col-md-6 float-right"><?= $this->Html->link('Agregar Noticia', ['action'=>'addNoticia'], ['class'=>'btn btn-warning']) ?></div>		
				</div>			
			</div>			
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12"></div>
				<? foreach ($noticias as $key => $value) {?>
					<div class="col-md-4">
						<div class="card">
		                    <?= $this->Html->image('prensa/'.$value['id'].'.'.$value['img'], array('class'=>'card-img-top', 'style'=>'max-height:200px; width: 150px; margin: 0 auto')) ?>
		                    <div class="card-body">
		                        <h5 class="card-title"><?= substr($value['titulos']['es'], 0, 75) ?>...</h5>
		                        <?= $this->html->link('Editar', ['action'=>'editNoticias', $value['id']], ['class'=>'btn btn-primary']) ?>
		                        <?= ($value['estado']?'Publicada':'No publicada');?>
		                        <? if($value['estado']){ echo $this->html->link('Desactivar', ['action'=>'editNoticias', $value['id']], ['class'=>'btn btn-warning float-right']);}else{echo $this->html->link('Activar', ['action'=>'editNoticias', $value['id']], ['class'=>'btn btn-success float-right']);} ?>
		                    </div>
		                </div>
					</div>
				<?} ?>
			</div>
		</div>
	</div>	
</div>
