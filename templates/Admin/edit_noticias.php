<?= $this->Html->scriptBlock(sprintf("var imagenes = %s;", $imagenes )); ?>
<script src="https://cdn.tiny.cloud/1/hm20tsdrfnoul0y5rmq22axfts1ozunqxx9seh8azvk1e2q2/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
<form method="post" action="/Admin/editNoticias" id="ajaxForm">
	<input type="hidden" name="_Token[fields]" autocomplete="off" value="<?=$token?>">
	<input type="hidden" name="_csrfToken" autocomplete="off" value="<?=$token?>">
	<input type="hidden" name="id" autocomplete="off" value="<?=$data[0]['id']?>">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center">Titulos</h4>
					</div>
					<table class="table">
						<tr>
							<td>Español</td>
							<td><input type="text" name="tituloEs" class="form-control" value="<?= (isset($data[0]['titulos']['es']))?$data[0]['titulos']['es']:''; ?>"></td>
						</tr>
						<tr>
							<td>Ingles</td>
							<td><input type="text" name="tituloEn" class="form-control" value="<?= (isset($data[0]['titulos']['en']))?$data[0]['titulos']['en']:''; ?>"></td>
						</tr>
						<tr>
							<td>Portugues</td>
							<td><input type="text" name="tituloBr" class="form-control" value="<?= (isset($data[0]['titulos']['br']))?$data[0]['titulos']['br']:''; ?>"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center">Contenido Español</h4>
			</div>
			<div class="col-md-12">
				<textarea id="mytextarea1" name="contenido_es"><?= $data[0]['contenido_es'] ?></textarea>
			</div>
			<div class="col-md-12">
				<h4 class="text-center">Contenido Ingles</h4>
			</div>
			<div class="col-md-12">
				<textarea id="mytextarea2" name="contenido_en"><?= $data[0]['contenido_en'] ?></textarea>
			</div>
			<div class="col-md-12">
				<h4 class="text-center">Contenido Portugues</h4>
			</div>
			<div class="col-md-12">
				<textarea id="mytextarea3" name="contenido_br"><?= $data[0]['contenido_br'] ?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="float-right">
			<input type="submit" value="Guardar" class="btn btn-success">
		    <button class="btn btn-danger">Cancelar</button>
		</div>
	</div>
</form>
<script>
    tinymce.init({
      	selector: '#mytextarea1',
      	images_upload_url: 'postAcceptor.php',
  		automatic_uploads: false,
  		toolbar: "image",
  		plugins: ["image imagetools", "table"],
  		imagetools_cors_hosts: ['vinosdesanantonio.cl'],
  		language: 'es',
  		encoding: 'UTF-8',
  		image_list: imagenes,
		menu: [{
				  //file: {title: 'File', items: 'newdocument'},
				  edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
				  insert: {title: 'Insert', items: 'table |'},
				  view: {title: 'View', items: 'visualaid |'},
				  format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
				  table: {title: 'Table'},
				  tools: {title: 'Tools'}
				}],
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
    });
    tinymce.init({
      	selector: '#mytextarea2',
      	images_upload_url: 'postAcceptor.php',
  		automatic_uploads: false,
  		toolbar: "image",
  		plugins: ["image imagetools", "table"],
  		imagetools_cors_hosts: ['vinosdesanantonio.cl'],
  		language: 'es',
  		encoding: 'UTF-8',
  		image_list: imagenes,
		menu: [{
				  //file: {title: 'File', items: 'newdocument'},
				  edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
				  insert: {title: 'Insert', items: 'table |'},
				  view: {title: 'View', items: 'visualaid |'},
				  format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
				  table: {title: 'Table'},
				  tools: {title: 'Tools'}
				}],
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
    });
    tinymce.init({
      	selector: '#mytextarea3',
      	images_upload_url: 'postAcceptor.php',
  		automatic_uploads: false,
  		toolbar: "image",
  		plugins: ["image imagetools", "table"],
  		imagetools_cors_hosts: ['vinosdesanantonio.cl'],
  		language: 'es',
  		encoding: 'UTF-8',
  		image_list: imagenes,
		menu: [{
				  //file: {title: 'File', items: 'newdocument'},
				  edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
				  insert: {title: 'Insert', items: 'table |'},
				  view: {title: 'View', items: 'visualaid |'},
				  format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
				  table: {title: 'Table'},
				  tools: {title: 'Tools'}
				}],
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
    });

</script>