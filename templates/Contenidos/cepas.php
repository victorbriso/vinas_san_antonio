<div class="col-md-12">
    <div class="row">
        <div class="col-md-8 offset-md-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></div>
                    <div class="col-md-3 general-titulos-blanco"><h4><?= $titulo?></h4></div>
                    <div class="col-md-5 fin-botella"></div>
                </div>                
            </div>    
        </div>
        <? foreach ($texto as $key => $value) { ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <?= $this->Html->image('cepas/'.$value['img'], array('class'=>'img-fluid', 'style'=>'max-height:250px; margin: 0 auto; max-width:250px;')) ?>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <h4 class="general-titulos"><?= $value['titulo']?></h4>
                        </div>
                        <div class="col-md-12">
                            <p style="text-align: justify;"><?= $value['contenido']?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?} ?>
        
    </div>
</div>