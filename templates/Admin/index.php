<div class="col-md-12"  style="width: 100% !important">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100% !important">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 img-slider" src="img/slider/4.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block txt-slider-bl">
                    <h5>Valle de San Antonio</h5>
                    <p>Asociación de Viñas focalizada en vinos finos con Denominación de Origen en el valle con mayor influencia costera de Chile</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="img/slider/8.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block txt-slider-bl">
                    <h5>Valle de San Antonio</h5>
                    <p>Asociación de Viñas focalizada en vinos finos con Denominación de Origen en el valle con mayor influencia costera de Chile</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="img/slider/3.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block txt-slider-bl">
                    <h5>Valle de San Antonio</h5>
                    <p>Asociación de Viñas focalizada en vinos finos con Denominación de Origen en el valle con mayor influencia costera de Chile</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="img/slider/1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block txt-slider-bl">
                    <h5>Valle de San Antonio</h5>
                    <p>Asociación de Viñas focalizada en vinos finos con Denominación de Origen en el valle con mayor influencia costera de Chile</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="img/slider/10.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block txt-slider-bl">
                    <h5>Valle de San Antonio</h5>
                    <p>Asociación de Viñas focalizada en vinos finos con Denominación de Origen en el valle con mayor influencia costera de Chile</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="separacion-5"></div>
    <div class="col-md-12">
        <div class="row">
            
            <? foreach ($noticias as $key => $value) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <?= $this->Html->image('prensa/'.$value['id'].'.'.$value['img'], array('class'=>'card-img-top', 'style'=>'max-height:200px; width: 150px; margin: 0 auto')) ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= substr($value['contenido_'.$idioma]['titulo'], 0, 75) ?>...</h5>
                            <p class="card-text text-justify"><?= substr($value['contenido_'.$idioma]['bajada'], 0, 90) ?>...</p>
                            <?= $this->html->link('Ver Más', ['action'=>'noticia', $value['id']], ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>                      
    </div>
</div>