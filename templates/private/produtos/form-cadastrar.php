<?php
    use Ajrc\Helper\Sessions;
    use Ajrc\Model\Usuario;
    use Ajrc\Model\Fornecedor;
    use Ajrc\Model\Categoria;

    $required = "  ";

    //HTML SELECT FORNECEDORES
    $selFornecedores = '<select class="selectpicker" name="tb_fornecedores_id" id="tb_fornecedores_id" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selFornecedores.= '<option value="">Selecione</option>';
    foreach(Fornecedor::ListAll() as $f){
        $selFornecedores.= '<option value="'.$f->id.'">'.$f->nome_fantasia.'</option>';
    }
    $selFornecedores.= '</select>';
    
    //HTML SELECT CATEGORIAS 
    $selCategorias = '<select class="selectpicker" name="tb_categorias_id" id="tb_categorias_id" data-error="Campo de preenchimento obrigatório!" '.$required.'>';
    $selCategorias.= '<option value="">Selecione</option>';
    foreach(Categoria::ListAll() as $f){
        $selCategorias.= '<option value="'.$f->id.'">'.$f->titulo.'</option>';
    }
    $selCategorias.= '</select>';
    


?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Cadastrar Novo Produto:</h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./produtos" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="insert">
                <input type="hidden" name="tb_usuarios_id" value="<?php echo Sessions::UserID(); ?>">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="titulo" id="titulo" placeholder="Título do produto" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="qtde_atual">Quantidade Atual</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="qtde_atual" id="qtde_atual" placeholder="*Apenas número inteiro" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="qtde_ideal">Quantidade Ideal</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="qtde_ideal" id="qtde_ideal" placeholder="*Apenas número inteiro" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="peso" id="peso" placeholder="*Apenas número inteiro" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="unidade_medida">Unidade de Medida</label>
                                        <div class="input-group">
                                        <select class="selectpicker" name="unidade_medida" id="unidade_medida" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                            <option value="">Selecione</option>
                                            <option value="Kg">KILOGRAMAS</option>
                                            <option value="g">GRAMAS</option>
                                        </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="preco_custo">Preço de Custo</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="preco_custo" id="preco_custo" placeholder="*Preço de Custo - Ex.: 150.55" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="preco_venda">Preço de Venda</label>
                                        <div class="input-group">
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="preco_venda" id="preco_venda" placeholder="*Preço de Venda - Ex.: 150.55" <?php echo $required; ?>>
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
                                        <select class="selectpicker" name="status" id="status" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                            <option value="">Selecione</option>
                                            <option value="A">ATIVO</option>
                                            <option value="I">INATIVO</option>
                                        </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="observacoes">Observações</label>
                                        <div class="input-group">
                                        <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descritivo">Descritivo para exibir no site</label>
                                        <div class="input-group">
                                        <textarea id="descritivo" name="descritivo" class="form-control" placeholder="" rows="5"></textarea>
                                        </div>
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