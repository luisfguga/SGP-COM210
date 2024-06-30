<?php

    use Ajrc\Model\Destaque;

    $id = (int) trim($data["form"]); //id do usuário
    $f = Destaque::List($id);
    
    if(empty($f)){
        echo "Destaque inexistente!";
        exit();
    }

    $principal = ($f->principal==1) ? " checked='checked'" : null;
    $eh_principal = ($f->principal!=1) ? " style='display:none'" : null;
    $secundario = ($f->secundario==1) ? " checked='checked'" : null;
    $eh_secundario = ($f->secundario!=1) ? " style='display:none'" : null;

    //FOTO DO DESTAQUE PRINCIPAL
    $check_excluir_principal = null;
    $img_principal = null;
    $pasta_imagens = "img/destaques/principal/";
    foreach (glob($pasta_imagens . $f->id.".*") as $url_img_principal) {
        $img_principal = "<img src='".$url_img_principal."' class='img-responsive center-block' style='max-width:120px'>";
        $check_excluir_principal =  '<br><div class="checkbox checkbox-success center-block" style="text-align:center">
                                    <input name="excluir_img_principal" id="excluir_img_principal" value="'.$url_img_principal.'" type="checkbox">
                                    <label for="excluir_img_principal">Excluir a imagem?</label>
                                </div>';
    }
    //----------------------------
    
    //FOTO DO DESTAQUE SECUNDÁRIO
    $check_excluir_secundario = null;
    $img_secundario = null;
    $pasta_imagens = "img/destaques/secundario/";
    foreach (glob($pasta_imagens . $f->id.".*") as $url_img_secundario) {
        $img_secundario = "<img src='".$url_img_secundario."' class='img-responsive center-block' style='max-width:120px'>";
        $check_excluir_secundario =  '<br><div class="checkbox checkbox-success center-block" style="text-align:center">
                                    <input name="excluir_img_secundario" id="excluir_img_secundario" value="'.$url_img_secundario.'" type="checkbox">
                                    <label for="excluir_img_secundario">Excluir a imagem?</label>
                                </div>';
    }
    //----------------------------
    
    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Editar Destaque - <?php echo strtoupper($f->titulo); ?></h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./destaques" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="id" id="id" value="<?php echo $f->id; ?>">
                
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="titulo">Título do Destaque</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="titulo" id="titulo" placeholder="Título do Destaque" value="<?php echo $f->titulo; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_superior">Texto Superior - PRINCIPAL</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_superior" id="texto_superior" placeholder="Texto Superior do Destaque" maxlength="15" value="<?php echo $f->texto_superior; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_superior_secundario">Texto Superior - SECUNDÁRIO</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_superior_secundario" id="texto_superior_secundario" placeholder="Texto Superior do Destaque Secundario" maxlength="15" value="<?php echo $f->texto_superior_secundario; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inicio_exibicao">Início da Exibição</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="date" name="inicio_exibicao" id="inicio_exibicao" placeholder="Data de Início da Exibição" value="<?php echo $f->inicio_exibicao; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="url_destino">Url:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="url_destino" id="url_destino" placeholder="Link / Url para direcionamento" value="<?php echo $f->url_destino; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_inferior">Texto Inferior - SECUNDÁRIO</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_inferior" id="texto_inferior" placeholder="Texto Inferior do Destaque" maxlength="25" value="<?php echo $f->texto_inferior; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="texto_inferior_secundario">Texto Inferior - SECUNDÁRIO</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="texto_inferior_secundario" id="texto_inferior_secundario" placeholder="Texto Inferior do Destaque Secundário" maxlength="165" value="<?php echo $f->texto_inferior_secundario; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fim_exibicao">Término da Exibição</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="date" name="fim_exibicao" id="fim_exibicao" placeholder="Data de Início da Exibição" value="<?php echo $f->fim_exibicao; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                                <div class="col-md-12" style="text-align:center">
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="principal" id="principal" value="1" type="checkbox" <?php echo $principal; ?>>
                                        <label for="principal">Principal</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="secundario" id="secundario" value="1" type="checkbox" <?php echo $secundario; ?>>
                                        <label for="secundario">Secundário</label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="container_img_principal" <?php echo $eh_principal; ?>>
                                    <div><?php echo $img_principal . $check_excluir_principal; ?></div>
                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="principal"><div class="fa fa-image"></div> Escolha a Imagem do Destaque Principal:<br>(dimensão mínima: 1920x1280px)</label>
                                            <input type="file" class="form-control-file" name="img_principal" id="img_principal">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="container_img_secundario" <?php echo $eh_secundario; ?>>
                                    <div><?php echo $img_secundario . $check_excluir_secundario; ?></div>
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
                            <button class="btn btn-success btn-block">SALVAR</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>