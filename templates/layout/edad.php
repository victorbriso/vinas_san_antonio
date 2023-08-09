<?php
$cakeDescription = 'Asociación de viñas del Valle de San Antonio';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>    
	<?= $this->Html->script('jquery.js') ?>
	<?= $this->Html->script('jQuery.min.js') ?>
	<?= $this->Html->script('bootstrap.bundle.js') ?>
	<?= $this->Html->script('bootstrap.bundle.js.map') ?>
	<?= $this->Html->script('bootstrap.bundle.min.js') ?>
	<?= $this->Html->script('bootstrap.bundle.min.js.map') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->Html->script('bootstrap.js.map') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('bootstrap.min.js.map') ?>
	<?= $this->Html->css('bootstrap-grid.css') ?>
	<?= $this->Html->css('bootstrap-grid.css.map') ?>
	<?= $this->Html->css('bootstrap-grid.min.css') ?>
	<?= $this->Html->css('bootstrap-grid.min.css.map') ?>
	<?= $this->Html->css('bootstrap-reboot.css') ?>
	<?= $this->Html->css('bootstrap-reboot.css.map') ?>
	<?= $this->Html->css('bootstrap-reboot.min.css') ?>
	<?= $this->Html->css('bootstrap-reboot.min.css.map') ?>
	<?= $this->Html->css('bootstrap.css') ?>
	<?= $this->Html->css('bootstrap.css.map') ?>
	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('bootstrap.min.css.map') ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>    
    <div class="container-fluid" style="height: 100%">
		<div class="row" style="height: 100%">			
			<div class="col-md-12 contenedor-contenido">
				<div class="row ">
					<div class="separacion"></div>
					<div class="col-md-4 offset-md-4 pregunta-edad-es" style="display: none;">
						<div class="col-md-12 col-12">
							<div class="row">								
								<div class="col-md-12 text-center"><p class="pregunta-edad">¿Es mayor de edad?</p></div>
								<div class="col-md-6 col-6 text-center">
									<?= $this->Html->link('Si', ['action' => 'validacionEdad', 'es'],['escape' => false, 'class'=>'btn btn-simple']); ?>
								</div>
								<div class="col-md-6 col-6 text-center">
									<button class="btn btn-simple" onclick="menorEdad();">No</button>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-4 pregunta-edad-en" style="display: none;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12 text-center"><p class="pregunta-edad">Are you of legal age?</p></div>
								<div class="col-md-6 text-center">
									<?= $this->Html->link('Yes', ['action' => 'validacionEdad', 'en'],['escape' => false, 'class'=>'btn btn-simple']); ?>
								</div>
								<div class="col-md-6 text-center">
									<button class="btn btn-simple" onclick="menorEdad();">No</button>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-4 pregunta-edad-br" style="display: none;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12 text-center"><p class="pregunta-edad">¿Ele é mais velho?</p></div>
								<div class="col-md-6 text-center">
									<?= $this->Html->link('Sim', ['action' => 'validacionEdad', 'br'],['escape' => false, 'class'=>'btn btn-simple']); ?>
								</div>
								<div class="col-md-6 text-center">
									<button class="btn btn-simple" onclick="menorEdad();">Ñao</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-md-12 contenedor-logo"></div>
			<div class="col-md-12 footer"></div>
		</div>
	</div>
</body>
<style type="text/css">
	html, body {
		height: 100%;
	}
	.footer{
		position: absolute;
  		bottom: 0;
		background-image: url('../img/generales/mar.jpg');
		height: 30%;
		background-repeat: no-repeat;
		background-size: 100% 100%;
	}
	.contenedor-logo{
		margin-top: 10%;
		position: absolute;
		background-image: url('../img/logos/avvsa.png');
		height: 50% !important;
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
	}
	.contenido{
		height: 20%;
	}
	.btn-simple{
		border: solid grey;
		border-radius: 5px;
		background-color: silver;
	}

</style>
<script type="text/javascript">	
	window.onload = function() {
		var ln = x=window.navigator.language||navigator.browserLanguage;
		if(ln == 'es'){
			$('.pregunta-edad-es').show();
			$('.pregunta-edad-es').css({'z-index':999}); 
		}else if(ln == 'en'){
			$('.pregunta-edad-en').show();
			$('.pregunta-edad-en').css({'z-index':999});
		}else if(ln == 'br'){
			$('.pregunta-edad-br').show();
			$('.pregunta-edad-br').css({'z-index':999});
		}else{
			$('.pregunta-edad-es').show();
			$('.pregunta-edad-es').css({'z-index':999});
		}
	}
	function validaEdad(lang){
		window.location.href = 'validacionEdad/'+lang.id;
	}
	function menorEdad(){
		window.location.href = 'https://google.com';
	}
</script>