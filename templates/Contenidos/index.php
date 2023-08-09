<div class="col-md-12"  style="width: 100% !important">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100% !important">
        <ol class="carousel-indicators">
            <? foreach ($slider as $key => $value) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>" class="<?= ($key==0)?'active':''; ?>"></li>
            <?} ?>

        </ol>        
        <div class="carousel-inner">
            <? foreach ($slider as $key => $value) { ?>
                <div class="carousel-item <?= ($key==0)?'active':''; ?>">
                    <?= $this->Html->image('slider/'.$value['imagen'], array('class'=>'d-block w-100 img-slider')) ?>
                    <div class="carousel-caption d-none d-md-block txt-slider-bl">
                        <h5><?=$value['titulo']?></h5>
                        <p><?=$value['descripcion']?></p>
                    </div>
                </div>
            <?} ?>
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