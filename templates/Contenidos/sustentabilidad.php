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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center">
                            <?= $this->Html->image('generales/pajaro.jpg', array('class'=>'img-fluid', 'style'=>' margin: 0 auto;')) ?>
                        </div>
                        <div class="separacion"></div>
                        <div class="col-md-12 d-flex align-items-center">
                            <?= $this->Html->image('generales/bosque.jpg', array('class'=>'img-fluid', 'style'=>' margin: 0 auto;')) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <? foreach ($texto as $key => $value) { ?>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <h4 class="general-titulos"><?= $value['titulo']?></h4>
                            </div>
                            <div class="col-md-12">
                                <p style="text-align: justify;"><?= $value['bajada']?></p>
                            </div>
                        </div>
                    <?} ?>            
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <? foreach ($imagenes as $key2 => $value2) {?>
                            <div class="col-md-3" style="max-height: 350px;">
                                <table width="100%">
                                    <tr>
                                        <td style="text-align: center;" class="text-center">
                                            <?= $this->Html->image('sustentabilidad/'.$value2['path'], array('class'=>'img-fluid', 'style'=>'max-height: 270px; margin: 0 auto;')) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;" class="text-center">
                                            <?=$value2['nombre']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;" class="text-center">
                                            <p style="font-style: italic;">(<?=$value2['nomOtro']?>)</p> 
                                        </td>
                                    </tr>
                                </table>                          
                            </div>
                        <?} ?>    
                    </div>                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>