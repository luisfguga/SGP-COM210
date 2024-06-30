<?php

    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Cadastrar Novo Fornecedor:</h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./fornecedores">
                <input type="hidden" name="operacao" value="insert">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="razao_social">Razão Social</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="razao_social" id="razao_social" placeholder="Razão Social" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cnpj">CNPJ</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inscricao_municipal">Inscrição Municipal</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="inscricao_municipal" id="inscricao_municipal" placeholder="Inscrição Municipal" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado/UF</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado/UF" data-error="Campo de preenchimento obrigatório!" maxlength="2" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="numero" id="numero" placeholder="Número" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" type="text" name="telefone" id="telefone" placeholder="*Apenas números" onkeypress="$(this).mask('(00) 0000-0000')">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    

                                </div>
                                <div class="col-md-6">

                                    
                                    <div class="form-group">
                                        <label for="nome_fantasia">Nome Fantasia</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" placeholder="Nome Fantasia" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inscricao_estadual">Inscrição Estadual</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" onkeypress="$(this).mask('00.000-000')" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" type="text" name="celular" id="celular" placeholder="*Apenas números" onkeypress="$(this).mask('(00) 00000-0000')">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contato">Contato</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="contato" id="contato" placeholder="Contato" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <div class="col-xs-12">
                            <label for="observacoes">Observações</label>
                            <div class="input-group">
                            <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="7"></textarea>
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