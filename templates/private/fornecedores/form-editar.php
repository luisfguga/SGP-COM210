<?php

    use Ajrc\Model\Fornecedor;

    $id = (int) trim($data["form"]); //id do usuário
    $f = Fornecedor::List($id);
    
    if(empty($f)){
        echo "Fornecedor inexistente!";
        exit();
    }
    
    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Editar Fornecedor - <?php echo strtoupper($f->razao_social); ?></h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./fornecedores">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="id" id="id" value="<?php echo $f->id; ?>">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="razao_social">Razão Social</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="razao_social" id="razao_social" value="<?php echo $f->razao_social; ?>" placeholder="Razão Social" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cnpj">CNPJ</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="cnpj" id="cnpj" value="<?php echo $f->cnpj; ?>" placeholder="CNPJ" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inscricao_municipal">Inscrição Municipal</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="inscricao_municipal" id="inscricao_municipal" value="<?php echo $f->inscricao_municipal; ?>" placeholder="Inscrição Municipal" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado/UF</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado/UF" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->estado; ?>" maxlength="2" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bairro">Bairro</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->bairro; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->numero; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="*Apenas números" onkeypress="$(this).mask('(00) 0000-0000')" value="<?php echo $f->telefone; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->email; ?>"  <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        

                                    </div>
                                    <div class="col-md-6">

                                        
                                        <div class="form-group">
                                            <label for="nome_fantasia">Nome Fantasia</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" placeholder="Nome Fantasia" value="<?php echo $f->nome_fantasia; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inscricao_estadual">Inscrição Estadual</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual" value="<?php echo $f->inscricao_estadual; ?>"  <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" onkeypress="$(this).mask('00.000-000')" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->cep; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->cidade; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="endereco">Endereço</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" data-error="Campo de preenchimento obrigatório!" value="<?php echo $f->endereco; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="complemento">Complemento</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                            <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento" value="<?php echo $f->complemento; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="celular">Celular</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input class="form-control" type="text" name="celular" id="celular" placeholder="*Apenas números" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $f->celular; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contato">Contato</label>
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="contato" id="contato" placeholder="Contato" value="<?php echo $f->contato; ?>" <?php echo $required; ?>>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                </div>
                                </div>
                                <div class="col-xs-12">
                                    <label for="observacoes">Observações</label>
                                    <div class="input-group">
                                    <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="7"><?php echo $f->observacoes; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="padding:20px">
                                    <button class="btn btn-success btn-block">SALVAR</button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>