<?php

    use Ajrc\Model\Usuario;

    $id = (int) trim($data["form"]); //id do usuário
    $u = Usuario::List($id);
    
    if(empty($u)){
        echo "Usuário inexistente!";
        exit();
    }
    
    $check_excluir_foto = null;
    $foto_usuario = null;
    $pasta_imagens = "img/usuarios/";
    foreach (glob($pasta_imagens . $u->id."_1.*") as $foto) {
        $foto_usuario = "<img src='".$foto."'>";
        $check_excluir_foto =  '<br><div class="checkbox checkbox-success checkbox-inline">
                                    <input name="excluir_foto" id="excluir_foto" value="'.$foto.'" type="checkbox">
                                    <label for="excluir_foto">Excluir a foto atual?</label>
                                </div>';
    }

    $stt = null;
    $tp = ["I"=>"Inativo", "A"=>"Ativo"];
    foreach($tp as $key=>$value){
        $sel = ($u->status==$key)?" selected='selected'":null;
        $stt.= "<option value='".$key."'".$sel.">".$value."</option>";
    }
    
    $sexo = null;
    $sexos = [""=>"Selecione", "M"=>"Masculino", "F"=>"Feminino"];
    foreach($sexos as $key=>$value){
        $sel = ($u->sexo==$key)?" selected='selected'":null;
        $sexo.= "<option value='".$key."'".$sel.">".$value."</option>";
    }

    $fps = null;
    $fp = [""=>"Selecione", "CHEQUE"=>"CHEQUE", "DEPOSITO"=>"DEPOSITO", "ESPECIE"=>"ESPECIE"];
    foreach($fp as $key=>$value){
        $sel = ($u->tipo_pagto==$key)?" selected='selected'":null;
        $fps.= "<option value='".$key."'".$sel.">".$value."</option>";
    }

    $admin = ($u->admin==1) ? " checked='checked'" : null;
    $funcionario = null;
    $eh_funcionario =" style=\"display:none\"";
    if($u->funcionario==1){
        $eh_funcionario =" style=\"display:block\"";
        $funcionario = " checked='checked'";
    }
    $cliente = ($u->cliente==1) ? " checked='checked'" : null;

    $required = " required ";

?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Editar Usuário - <?php echo strtoupper($u->nome); ?></h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./usuarios" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="id" id="id" value="<?php echo $u->id; ?>">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="nome" id="nome" value="<?php echo $u->nome; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="login" id="login" value="<?php echo $u->login; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-heartbeat"></i></div>
                                        <select data-error="Campo de preenchimento obrigatório!" class="selectpicker" name="status" id="status" <?php echo $required; ?>>
                                            <?php echo $stt;?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-intersex"></i></div>
                                        <select data-error="Campo de preenchimento obrigatório!" class="selectpicker" name="sexo" id="sexo" <?php echo $required; ?>>
                                            <?php echo $sexo;?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="cep" id="cep" value="<?php echo $u->cep; ?>" onkeypress="$(this).mask('00.000-000')" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="cidade" id="cidade" value="<?php echo $u->cidade; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="endereco">Endereço</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="endereco" id="endereco" value="<?php echo $u->endereco; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="numero" id="numero" value="<?php echo $u->numero; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $u->telefone; ?>" onkeypress="$(this).mask('(00) 0000-0000')">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top:20px;text-align:center">
                                        <label>
                                            <label for="foto"><div class="fa fa-image"></div> Escolha a foto do seu perfil:</label>
                                            <input type="file" class="form-control-file" name="foto" id="foto">
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="email" name="email" id="email" value="<?php echo $u->email; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input class="form-control" name="senha" id="senha" type="password" placeholder="Senha">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="data_nascto">Data de Nascimento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" name="data_nascto" id="data_nascto" type="date" value="<?php echo $u->data_nascto; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="cpf" id="cpf" value="<?php echo $u->cpf; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado/UF</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="estado" id="estado" value="<?php echo $u->estado; ?>" maxlength="2" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="bairro" id="bairro" value="<?php echo $u->bairro; ?>" <?php echo $required; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" type="text" name="complemento" id="complemento" value="<?php echo $u->complemento; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input class="form-control" type="text" name="celular" id="celular" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $u->celular; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12  foto_usuario" style="text-align:center">
                                        <?php echo $foto_usuario . $check_excluir_foto; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 center-align" style="text-align:center">
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="admin" id="admin" value="1" type="checkbox" <?php echo $admin; ?>>
                                        <label for="admin">Admin</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="funcionario" id="funcionario" value="1" type="checkbox" <?php echo $funcionario; ?>>
                                        <label for="funcionario">Funcionário</label>
                                    </div>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input name="cliente" id="cliente" value="1" type="checkbox" <?php echo $cliente; ?>>
                                        <label for="cliente">Cliente</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12" style="padding:10px">
                                    <button class="btn btn-success btn-block">SALVAR</button>
                                </div>
                            </div>
                            <div id="dados-funcionario" <?php echo $eh_funcionario; ?>>

                                <div class="col-md-12 "><h3>Dados do Funcionário</h3></div>

                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="data_admissao">Data de Admissão</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" name="data_admissao" id="data_admissao" type="date" value="<?php echo $u->data_admissao; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inicio_ferias">Início de Férias</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" name="inicio_ferias" id="inicio_ferias" type="date" value="<?php echo $u->inicio_ferias; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="termino_ferias">Término de Férias</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" name="termino_ferias" id="termino_ferias" type="date" value="<?php echo $u->termino_ferias; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="impostos">Impostos</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="impostos" id="impostos" value="<?php echo $u->impostos; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vale_transporte">Vale Transporte</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="vale_transporte" id="vale_transporte" value="<?php echo $u->vale_transporte; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                                                        
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="salario">Salário</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="salario" id="salario" value="<?php echo $u->salario; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="banco">Banco</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="banco" id="banco" value="<?php echo $u->banco; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="agencia_bancaria">Agência Bancária</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="agencia_bancaria" id="agencia_bancaria" value="<?php echo $u->agencia_bancaria; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="num_conta_bancaria">Número da Conta</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="num_conta_bancaria" id="num_conta_bancaria" value="<?php echo $u->num_conta_bancaria; ?>">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_pagto">Modalidade de Pagamento</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <select data-error="Campo de preenchimento obrigatório!" class="selectpicker" name="tipo_pagto" id="tipo_pagto">
                                            <?php echo $fps;?>
                                        </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-xs-12">
                                    <label for="observacoes">Observações</label>
                                    <div class="input-group">
                                    <textarea id="observacoes" name="observacoes" class="form-control" placeholder="" rows="7"><?php echo $u->observacoes; ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12" style="padding:20px">
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