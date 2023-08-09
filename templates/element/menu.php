<?
    //$idioma=$this->idioma();
    if($idiomaMenu=='es'){
        $inicio='Inicio';
        $quienesSomos='Quienes Somos';
        $losPioneros='Los Pioneros';
        $vinas='Viñas';
        $codigoEtica='Código de Ética';
        $valleSanAntonio='El Valle de San Antonio';
        $cepas='Cepas';
        $enologos='Los Enólogos y viticultores';
        $mapaFisico='Mapa físico';
        $noticias='Noticias';
        $sustentabilidad='Sustentabilidad';
        $turismo='Turismo';
        $contactos='Contactos';
        $rutaVino='Ruta del Vino';
        $mapaTuristico='Mapa Turístico';
        $tiendaDelValle='Tienda del Valle';
        $contacto='Contacto';
        $idioma='Idioma';
    }else if ($idiomaMenu=='en') {
        $inicio='Home';
        $quienesSomos='About Us';
        $losPioneros='The Pioneer';
        $vinas='Vineyards';
        $codigoEtica='Code of Ethics';
        $valleSanAntonio='San Antonio Valley';
        $cepas='Strains';
        $enologos='winemakers and Winegrowers';
        $mapaFisico='Physical Map';
        $noticias='News';
        $sustentabilidad='Sustainability';
        $turismo='Tourism';
        $contactos='Contacts';
        $rutaVino='Wine Route';
        $mapaTuristico='Touristic map';
        $tiendaDelValle='Valley Store';
        $contacto='Contact us';
        $idioma='language';
    }else if ($idiomaMenu=='br') {
        $inicio='Começar';
        $quienesSomos='';
        $losPioneros='';
        $vinas='';
        $codigoEtica='';
        $valleSanAntonio='';
        $cepas='';
        $enologos='Enólogos e Viticultores';
        $mapaFisico='Mapa físico';
        $noticias='Sustentabilidade';
        $sustentabilidad='';
        $turismo='Turismo';
        $contactos='Contatos';
        $rutaVino='Rota do Vinho';
        $mapaTuristico='Mapa turístico';
        $tiendaDelValle='Loja do Vale';
        $contacto='contato';
        $idioma='língua';
    }else{
        $inicio='Inicio';
        $quienesSomos='Quienes Somos';
        $losPioneros='Los Pioneros';
        $vinas='Viñas';
        $codigoEtica='Código de Ética';
        $valleSanAntonio='El Valle de San Antonio';
        $cepas='Cepas';
        $enologos='Los Enólogos y viticultores';
        $mapaFisico='Mapa físico';
        $noticias='Noticias';
        $sustentabilidad='Sustentabilidad';
        $turismo='Turismo';
        $contactos='Contactos';
        $rutaVino='Ruta del Vino';
        $mapaTuristico='Mapa Turístico';
        $tiendaDelValle='Tienda del Valle';
        $contacto='Contacto';
        $idioma='Idioma';
    }
?>
<div class="row">
    <div class="col-10 col-sm-10 col-md-3">
        <?= $this->Html->image('logos/avvsa.png', array('class'=>'img-fluid rounded mx-auto d-block', 'style'=>'width:100%;')) ?>
    </div>
    <div class="col-2 col-sm-2 col-md-9" style="margin-top: 30px;">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-0">
                    <li class="nav-item active">
                        <?= $this->html->link($inicio, ['action'=>'index'], ['class'=>'nav-link']) ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$quienesSomos?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?= $this->html->link($losPioneros, ['action'=>'losPioneros'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link('AVVSA', ['action'=>'avvsa'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($vinas, ['action'=>'vinas'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($codigoEtica, ['action'=>'codigoEtica'], ['class'=>'dropdown-item']) ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$valleSanAntonio?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?= $this->html->link('Terroir', ['action'=>'terroir'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($cepas, ['action'=>'cepas'], ['class'=>'dropdown-item']) ?>
                            <!--<?= $this->html->link('El Valle en cifras', ['action'=>'valleEnCifras'], ['class'=>'dropdown-item']) ?>-->
                            <?= $this->html->link($enologos, ['action'=>'enologosViticultores'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($mapaFisico, ['action'=>'mapaFisico'], ['class'=>'dropdown-item']) ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?= $this->html->link($noticias, ['action'=>'noticias'], ['class'=>'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->html->link($sustentabilidad, ['action'=>'sustentabilidad'], ['class'=>'nav-link']) ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$turismo?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?= $this->html->link($contactos, ['action'=>'turismo'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($rutaVino, ['action'=>'rutaDelVino'], ['class'=>'dropdown-item']) ?>
                            <?= $this->html->link($mapaTuristico, ['action'=>'mapaTuristico'], ['class'=>'dropdown-item']) ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="https://haciendasanjuan.cl/Pages/tienda" class="nav-link" target="_blanc"><?=$tiendaDelValle?></a>
                    </li>
                    <li class="nav-item">
                        <?= $this->html->link($contacto, ['action'=>'contacto'], ['class'=>'nav-link']) ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$idioma?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="max-width:60px !important">
                            <button class="btn btn-vacio dropdown-item" id="es" onclick="cambiaIdioma(this)" token=<?=$token?>>
                                <?=$this->Html->image('banderas/espana.jpg', array('class'=>'bandera-idioma'))?>
                            </button>
                            <button class="btn btn-vacio dropdown-item" id="en" onclick="cambiaIdioma(this)" token=<?=$token?>>
                                <?=$this->Html->image('banderas/inglaterra.png', array('class'=>'bandera-idioma'))?>
                            </button>
                            <button class="btn btn-vacio dropdown-item" id="br" onclick="cambiaIdioma(this)" token=<?=$token?>>
                                <?=$this->Html->image('banderas/brasil.png', array('class'=>'bandera-idioma'))?>
                            </button>                            
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="d-none">
    <form id="ajaxForm">
        <input type="hidden" name="_Token[fields]" autocomplete="off" value="<?=$token?>">
        <input type="hidden" name="idioma" autocomplete="off" value="es" id="langInput">
    </form>
</div>
<script type="text/javascript">
    function cambiaIdioma(data){        
        var nuevoIdioma=data.id;
        $('#langInput').val(nuevoIdioma);
        var token= $(data).attr('token');
        var ajaxdata = $("#ajaxForm").serializeArray();
        setTimeout(function(){
            $.ajax({
                type: 'POST',
                url: 'cambiaIdioma',
                headers: { 'X-XSRF-TOKEN' : token },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                data: ajaxdata,
                success: function (result) {
                    respuesta=JSON.parse(result);
                    if(respuesta.res==2){
                        location.reload();
                    }else if(respuesta.res==1){
                        alert('error al cambiar el idioma\nlanguage change error\nerro de mudança de idioma');
                    }
                },
                error: function (result){
                    alert('error al cambiar el idioma\nlanguage change error\nerro de mudança de idioma');
                }
            });     
        }, 500);
        
    }
</script>