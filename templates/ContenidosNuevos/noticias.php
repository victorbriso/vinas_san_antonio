<div class="col-md-12">
	<div class="row">
        <div class="col-md-8 offset-md-4">
            <table width="100%">
                <tr>
                    <td class="inicio-botella-2"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></td>
                    <td class="titulo-botella"><h4 class="text-center general-titulos"><?= $data['titulo'][$idioma]?></h4></td>
                    <td class="fin-botella-2"></td>
                </tr>
            </table>    
        </div>
        <div class="separacion"></div>
        <div class="separacion"></div>
        <div class="separacion"></div>
		<? foreach ($noticias as $key => $value) { ?>
            <div class="col-md-4">
                <table style="height: 100%;">
                    <tr>
                        <td align="center"><h5 class="text-center general-titulos"><?= $value['titulos'][$idioma] ?></h5></td>
                    </tr>
                    <tr>
                        <td align="center"><?= $this->Html->image('prensa/'.$value['id'].'.'.$value['img'], array('class'=>'img-fluid')) ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->html->link('Ver Más', ['action'=>'noticia', $value['id']], ['class'=>'btn btn-primary']) ?></td>
                    </tr>
                </table>
                <!--
                <div class="row">
                	<h5 class="text-center general-titulos"><?= $value['titulos'][$idioma] ?></h5>
                	<div class="col-md-4">
                		<?= $this->Html->image('prensa/'.$value['id'].'.'.$value['img'], array('class'=>'img-fluid', 'style'=>'max-height:200px; width: 150px; margin: 0 auto')) ?>
                	</div>
                    <?= $this->html->link('Ver Más', ['action'=>'noticia', $value['id']], ['class'=>'btn btn-primary btn-block']) ?>
                </div>
                -->
            </div>
        <? } ?>
	</div>
</div>