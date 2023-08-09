<div class="col-md-12">
	<div class="col-md-8 offset-md-2">
		<h4 class="text-center general-titulos"><?=$noticias[0]['contenido_'.$idioma]['titulo']?></h4>
	</div>
	<div class="separacion"></div>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<p style="text-align: justify;">
				<?= $this->Html->image('prensa/'.$noticias[0]['id'].'.'.$noticias[0]['img'], array('class'=>'img-fluid', 'align'=>'left')) ?>
				<?=$noticias[0]['contenido_'.$idioma]['bajada']?>
			</p>
		</div>	
	</div>
	
</div>