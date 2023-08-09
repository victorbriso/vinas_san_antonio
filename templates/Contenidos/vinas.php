<div class="col-md-12"  style="width: 100% !important">
    <div class="col-md-12"> 
        <div class="col-md-8 offset-md-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></div>
                    <div class="col-md-4 general-titulos-blanco"><h4><?= $titulo?></h4></div>
                    <div class="col-md-4 fin-botella"></div>
                </div>                
            </div>    
        </div>               
        <div class="row">            
            <? foreach ($vinas as $key => $value) {
                $img=(file_exists('img/logos/vinas/'.$value['img'])?'logos/vinas/'.$value['img']:'logos/avvsa.png');
            ?>
                <div class="col-md-12" style="padding: 10px;">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <?= $this->Html->image($img, array('class'=>'img-fluid rounded mx-auto d-block', 'style'=>'max-height:150px;')) ?>
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-center general-titulos"><?=$value['nombre']?></h4>
                            <p style="text-align: justify;"><?= json_decode($value['desc_'.$idioma]) ?></p>
                            <p style="text-align: center;"><a target="_blank" href="<?=$value['web']?>">Visitar la web</a></p>
                        </div>
                    </div>
                </div>
           <? } ?>
        </div>                    
    </div>
</div> 