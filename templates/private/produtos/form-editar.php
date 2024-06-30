<?php

    use Ajrc\Model\Produto;
    use Ajrc\Model\Fornecedor;
    use Ajrc\Model\Categoria;

    $id = (int) trim($data["form"]); //id do usuário
    $P = Produto::List($id);
    
    if(empty($P)){
        echo "Produto inexistente!";
        exit();
    }
    
    $required = " required ";

    
    //HTML SELECT FORNECEDORES
    $selFornecedores = '<select class="selectpicker" name="tb_fornecedores_id" id="tb_fornecedores_id" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selFornecedores.= '<option value="">Selecione</option>';
    foreach(Fornecedor::ListAll() as $forn){
        $sel = ($forn->nome_fantasia == $P->fornecedor)?"selected":null;
        $selFornecedores.= '<option value="'.$forn->id.'" '.$sel.'>'.$forn->nome_fantasia.'</option>';
    }
    $selFornecedores.= '</select>';
    
    //HTML SELECT CATEGORIAS 
    $selCategorias = '<select class="selectpicker" name="tb_categorias_id" id="tb_categorias_id" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selCategorias.= '<option value="">Selecione</option>';
    foreach(Categoria::ListAll() as $categ){
        $sel = ($categ->titulo == $P->categoria)?"selected":null;
        $selCategorias.= '<option value="'.$categ->id.'" '.$sel.'>'.$categ->titulo.'</option>';
    }
    $selCategorias.= '</select>';

    if($P->status=="A"){ $sel1 = 'selected="selected"'; $sel2 = null; }else{  $sel2 = 'selected="selected"'; $sel1 = null;  }
    $selStatus = '<select class="selectpicker" name="status" id="status" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selStatus.=    '<option value="">Selecione</option>';
    $selStatus.=    '<option value="A" '.$sel1.'>ATIVO</option>';
    $selStatus.=    '<option value="I" '.$sel2.'>INATIVO</option>';
    $selStatus.= '</select>';
    
    if($P->unidade_medida=="Kg"){ $sel1 = 'selected="selected"'; $sel2 = null; }else{  $sel2 = 'selected="selected"'; $sel1 = null;  }
    $selUnidM = '<select class="selectpicker" name="unidade_medida" id="unidade_medida" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selUnidM.=    '<option value="">Selecione</option>';
    $selUnidM.=    '<option value="Kg" '.$sel1.'>KILOGRAMA</option>';
    $selUnidM.=    '<option value="g" '.$sel2.'>GRAMA</option>';
    $selUnidM.= '</select>';

    $check_excluir_foto = null;
    $fotos_produto = null;
    $contador = 0;
    $pasta_imagens = "img/produtos/";
    foreach (glob($pasta_imagens . $P->id."_*") as $foto) {
        $fotos_produto.= "<div class='col-xs-12 col-sm-6 col-md-2 d-flex justify-content-center' style='text-align:center'>";
        $fotos_produto.=    "<img src='".$foto."' class='img-responsive center-block' style='max-width:80px'>";
        $fotos_produto.=    '<br><div class="checkbox checkbox-success checkbox-inline">
                                <input name="excluir_foto[]" id="excluir_foto'.$contador.'" value="'.$foto.'" type="checkbox">
                                <label for="excluir_foto'.$contador.'">Excluir</label>
                            </div>';
        $fotos_produto.= "</div>";
        $contador++;
    }

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Editar Produto - <?php echo strtoupper($P->titulo); ?></h3></div>
        <div class="panel-body">
        
                <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./produtos" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="id" id="id" value="<?php echo $P->id; ?>">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="titulo" id="titulo" placeholder="Título do produto" value="<?php echo $P->titulo; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="qtde_atual">Quantidade Atual</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="qtde_atual" id="qtde_atual" placeholder="*Apenas número inteiro" value="<?php echo $P->qtde_atual; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="qtde_ideal">Quantidade Ideal</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="qtde_ideal" id="qtde_ideal" placeholder="*Apenas número inteiro" value="<?php echo $P->qtde_ideal; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="peso" id="peso" placeholder="*Apenas número inteiro" value="<?php echo $P->peso; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unidade_medida">Unidade de Medida</label>
                                        <div class="input-group">
                                        <?php echo $selUnidM; ?>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="preco_custo">Preço de Custo</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="preco_custo" id="preco_custo" placeholder="*Preço de Custo - Ex.: 150.55" value="<?php echo $P->preco_custo; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="preco_venda">Preço de Venda</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="preco_venda" id="preco_venda" placeholder="*Preço de Venda - Ex.: 150.55" value="<?php echo $P->preco_venda; ?>" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="fotos"><div class="fa fa-image"></div> Escolha as fotos do produto:</label>
                                            <input type="file" class="form-control-file" name="fotos[]" id="fotos" multiple>
                                        </label>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="tb_categorias_id">Categoria</label>
                                        <div class="input-group">
                                        <?php echo $selCategorias; ?>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sexo">Fornecedor</label>
                                        <div class="input-group">
                                        <?php echo $selFornecedores; ?>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="input-group">
                                        <?php echo $selStatus; ?>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="observacoes">Observações</label>
                                        <div class="input-group">
                                        <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="5"><?php echo $P->observacoes; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descritivo">Descritivo para exibir no site</label>
                                        <div class="input-group">
                                        <textarea id="descritivo" name="descritivo" class="form-control" placeholder="" rows="5"> <?php echo $P->descritivo; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                    <?php echo $fotos_produto; ?>
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