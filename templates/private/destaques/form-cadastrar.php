<?php

    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Cadastrar Novo Destaque:</h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./destaques" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="insert">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="titulo">Título do Destaque</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="titulo" id="titulo" placeholder="Título do Destaque" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_superior">Texto Superior - PRINCIPAL</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_superior" id="texto_superior" placeholder="Texto Superior do Destaque" maxlength="15">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_superior_secundario">Texto Superior - SECUNDÁRIO</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_superior_secundario" id="texto_superior_secundario" placeholder="Texto Superior do Destaque Secundario" maxlength="15">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inicio_exibicao">Início da Exibição</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="date" name="inicio_exibicao" id="inicio_exibicao" placeholder="Data de Início da Exibição" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="url_destino">Url:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="url_destino" id="url_destino" placeholder="Link / Url para direcionamento" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_inferior">Texto Inferior - PRINCIPAL</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_inferior" id="texto_inferior" placeholder="Texto Inferior do Destaque Principal"  maxlength="25">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_inferior_secundario">Texto Inferior - SECUNDÁRIO</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_inferior_secundario" id="texto_inferior_secundario" placeholder="Texto Inferior do Destaque Secundário" maxlength="165">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fim_exibicao">Término da Exibição</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="date" name="fim_exibicao" id="fim_exibicao" placeholder="Data de Início da Exibição" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                                <div class="col-md-12" style="text-align:center">
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="principal" id="principal" value="1" type="checkbox">
                                        <label for="principal">Principal</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="secundario" id="secundario" value="1" type="checkbox">
                                        <label for="secundario">Secundário</label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="container_img_principal" style="display:none">
                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="principal"><div class="fa fa-image"></div> Escolha a Imagem do Destaque Principal:<br>(dimensão mínima: 1920x1280px)</label>
                                            <input type="file" class="form-control-file" name="img_principal" id="img_principal">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="container_img_secundario" style="display:none">
                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="secundario"><div class="fa fa-image"></div> Escolha a Imagem do Destaque Secundário:<br>(dimensão mínima: 640x320px)</label>
                                            <input type="file" class="form-control-file" name="img_secundario" id="img_secundario">
                                        </label>
                                    </div>
                                </div>

                                
                            </div>
                            
                        </div>
                        <div class="col-xs-12" style="padding:20px">
                            <button class="btn btn-success btn-block">CADASTRAR</button>
                        </div>
                        
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>