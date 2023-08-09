<div class="col-md-12">
	<div class="row">
		<? foreach ($noticias as $key => $value) { ?>
            <div class="col-md-4">
                <div class="row">
                	<h5 class="text-center general-titulos"><?= $value['contenido_'.$idioma]['titulo'] ?></h5>
                	<div class="col-md-4">
                		<?= $this->Html->image('prensa/'.$value['id'].'.'.$value['img'], array('class'=>'img-fluid', 'style'=>'max-height:200px; width: 150px; margin: 0 auto')) ?>
                	</div>
                    <div class="col-md-8">
                    	<p class="card-text text-justify"><?= substr($value['contenido_'.$idioma]['bajada'], 0, 200) ?>...</p>
                    </div>
                    <?= $this->html->link('Ver Más', ['action'=>'noticia', $value['id']], ['class'=>'btn btn-primary btn-block']) ?>
                </div>
            </div>
        <? } ?>
	</div>
</div>