<div class="col-md-12 text-center">
    <div class="col-md-6 offset-md-3">
        <div class="col-md-12">
            <h4 class="text-center general-titulos">
                <?= $titulo; ?>
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="nombre" class="form-control" placeholder="<?=$nombre?>">
                    </div>
                    <div class="form-group">
                        <input type="email" id="mail" class="form-control" placeholder="E-Mail">
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="fono" class="form-control" placeholder="<?=$fono?>">
                    </div> 
                    <div class="form-group">
                        <input type="text" id="asunto" class="form-control" placeholder="<?=$asunto?>">
                    </div>               
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" id="mensaje">
                        
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block">Enviar</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<div class="d-none">
    <form id="ajaxForm">
        <input type="hidden" name="_Token[fields]" autocomplete="off" value="<?=$token?>">
        <input type="hidden" name="nombre" autocomplete="off" value="es" id="langInput">
        <input type="hidden" name="mail" autocomplete="off" value="es" id="langInput">
        <input type="hidden" name="fono" autocomplete="off" value="es" id="langInput">
        <input type="hidden" name="asunto" autocomplete="off" value="es" id="langInput">
        <input type="hidden" name="mensaje" autocomplete="off" value="es" id="langInput">
    </form>
</div>