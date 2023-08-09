<div class="separacion"></div>
<div class="separacion"></div>
<div class="panel panel-default">
    <div class="panel-heading">
    	<div class="col-md-12">
    		<div class="row">
    			<div class="col-md-6">
    				<h4 class="general-titulos">Galeria de imagenes</h4>
    			</div>	    		
		        <div class="col-md-6">
		            <form method="post" action="/admin/sube-imagen" enctype="multipart/form-data">
					<?= $this->Form->input('image', array('type' => 'file', 'class'=>'file', 'multiple')); ?>
					<input type="hidden" name="_Token[fields]" autocomplete="off" value="<?=$token?>" id="tok">
					<input type="hidden" name="_csrfToken" autocomplete="off" value="<?=$token?>" id="tok">
					<input type="submit" class="btn btn-primary"  autocomplete="off" data-loading-text="Espera un momento..." value="Guardar">
					</form>
		        </div>		
    		</div>	    	
    	</div>
    </div>
    <div class="separacion"></div>
    <div class="panel-body">
    	<div class="col-md-12">
    		<div class="row">
    			<? foreach ($imagenes as $key => $value) {?>
		    		<div class="col-md-4">
		    			<table class="table">
		    				<tr>
		    					<td>
		    						<?= $this->Html->image('galeria/'.$value, ['class'=>'card-img-top img-fluid']); ?>
		    					</td>
		    				</tr>
		    				<tr>
		    					<td>
		    						<?= $value ?>
		    					</td>
		    				</tr>
		    				<tr>
		    					<td>
		    						<?= $this->Html->link('Eliminar',	['action' => 'eliminaImagen', $value],['escape' => false, 'class'=>'btn btn-danger btn-block']); ?>
		    					</td>
		    				</tr>
		    			</table>
		    		</div>
		    	<?} ?>
    		</div>
    	</div>        
    </div>
    <div class="panel-footer">

    </div>
</div>