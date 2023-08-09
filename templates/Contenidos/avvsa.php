<div class="col-md-12">
    <div class="row">
        <div class="col-md-8 offset-md-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></div>
                    <div class="col-md-2 general-titulos-blanco"><h4><?= $titulo?></h4></div>
                    <div class="col-md-6 fin-botella"></div>
                </div>                
            </div>    
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <?= $this->Html->image('generales/IMG_8206_1.jpg', array('class'=>'img-fluid')) ?>
                </div>
                <div class="col-md-6">
                    <p><?= $texto ?></p>
                    <p><?= $texto2 ?></p>
                    <h4 class="general-titulos"><?= $titulo3 ?></h4>
                    <ul class="text-left">
                        <? foreach ($requisitos as $key => $value) {?>
                            <li><?= $value['requisito_'.$lang] ?></li>
                        <?} ?>    
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>