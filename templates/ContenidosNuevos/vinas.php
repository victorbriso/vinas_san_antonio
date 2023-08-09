<div class="col-md-12"  style="width: 100% !important">
    <div class="col-md-12"> 
        <div class="col-md-8 offset-md-4">
            <table width="100%">
                <tr>
                    <td class="inicio-botella-2"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></td>
                    <td class="titulo-botella"><h4 class="text-center general-titulos"><?= $titulo?></h4></td>
                    <td class="fin-botella-2"></td>
                </tr>
            </table>    
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
                            <p style="text-align: justify;"><?= $value['desc_'.$idioma] ?></p>
                            <p style="text-align: center;"><a target="_blank" href="<?=$value['web']?>">Visitar la web</a></p>
                        </div>
                    </div>
                </div>
           <? } ?>
        </div>                    
    </div>
</div> 