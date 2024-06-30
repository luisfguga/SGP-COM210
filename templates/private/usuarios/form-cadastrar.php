<?php

    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Cadastrar Novo Usuário:</h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./usuarios" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="insert">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="nome" id="nome" placeholder="Nome" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="login" id="login" placeholder="Login" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-heartbeat"></i></div>
                                        <select class="selectpicker" name="status" id="status" placeholder="Status" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                            <option value="">Selecione</option>
                                            <option value="A">Ativo</option>
                                            <option value="I">Inativo</option>
                                        </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-intersex"></i></div>
                                        <select class="selectpicker" name="sexo" id="sexo" placeholder="Sexo" data-error="Campo de preenchimento obrigatório!"  <?php echo $required; ?>>
                                            <option value="">Selecione</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
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

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input class="form-control" name="senha" id="senha" type="password" placeholder="Senha" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="data_nascto">Data de Nascimento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" name="data_nascto" id="data_nascto" type="date"  data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" data-error="Campo de preenchimento obrigatório!" <?php echo $required; ?>>
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
                                        <label for="complemento">Complemento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input class="form-control" type="text" name="celular" id="celular" onkeypress="$(this).mask('(00) 00000-0000')" placeholder="*Apenas números">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="foto"><div class="fa fa-image"></div> Escolha a foto do seu perfil:</label>
                                            <input type="file" class="form-control-file" name="foto" id="foto">
                                        </label>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 center-align" style="text-align:center">
                                    
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="admin" id="admin" value="1" type="checkbox">
                                        <label for="admin">Admin</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="funcionario" id="funcionario" value="1" type="checkbox">
                                        <label for="funcionario">Funcionário</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="cliente" id="cliente" value="1" type="checkbox" checked="checked">
                                        <label for="cliente">Cliente</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12" style="padding:20px">
                                    <button class="btn btn-success btn-block">CADASTRAR</button>
                                </div>
                            </div>
                            <div id="dados-funcionario" style="display:none">

                                <div class="col-md-12 "><h3>Dados do Funcionário</h3></div>
                            
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="data_admissao">Data de Admissão</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" name="data_admissao" id="data_admissao" type="date" value="" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inicio_ferias">Início de Férias</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" name="inicio_ferias" id="inicio_ferias" type="date" value="" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="termino_ferias">Término de Férias</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" name="termino_ferias" id="termino_ferias" type="date" value="" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="impostos">Impostos</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input class="form-control" type="text" name="impostos" id="impostos" value="" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vale_transporte">Vale Transporte</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input class="form-control" type="text" name="vale_transporte" id="vale_transporte" placeholder="*Ex.: 1200.00" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="salario">Salário</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input class="form-control" type="text" name="salario" id="salario" placeholder="*Ex.: 1200.00" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="banco">Banco</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input class="form-control" type="text" name="banco" id="banco" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="agencia_bancaria">Agência Bancária</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input class="form-control" type="text" name="agencia_bancaria" id="agencia_bancaria" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="num_conta_bancaria">Número da Conta</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input class="form-control" type="text" name="num_conta_bancaria" id="num_conta_bancaria" data-error="Campo de preenchimento obrigatório!">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_pagto">Modalidade de Pagamento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <select class="selectpicker" name="tipo_pagto" id="tipo_pagto" data-error="Campo de preenchimento obrigatório!">
                                            <option value="">selecione</option>
                                            <option value="CHEQUE">CHEQUE</option>
                                            <option value="DEPOSITO">DEPÓSITO</option>
                                            <option value="ESPECIE">EM ESPÉCIE</option>
                                        </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-12">
                                    <label for="observacoes">Observações</label>
                                    <div class="input-group">
                                    <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding:20px">
                                    <button class="btn btn-success btn-block">CADASTRAR</button>
                                </div>

                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>