<div class="col-md-12">
    <div class="row">
        <div class="col-md-8 offset-md-4">
            <table width="100%">
                <tr>
                    <td class="inicio-botella-2"><?= $this->Html->image('banderas/botella.svg', array('class'=>'img-fluid float-right')) ?></td>
                    <td class="titulo-botella"><h4 class="text-center general-titulos"><?= $data['titulo']?></h4></td>
                    <td class="fin-botella-2"></td>
                </tr>
            </table>   
        </div>
        <div class="separacion"></div>
        <div class="col-md-12">
            <?= $data['contenido'] ?>
        </div>
    </div>
</div>
