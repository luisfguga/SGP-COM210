<?php

    use Ajrc\Model\Categoria;

    $id = (int) trim($data["form"]); //id do usuário
    $f = Categoria::List($id);
    
    if(empty($f)){
        echo "Categoria inexistente!";
        exit();
    }
    
    $checked = ($f->destaque=="S")?" checked":null;
    
    $required = " required ";


?>

<div class="col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Editar Categoria - <?php echo strtoupper($f->titulo); ?></h3></div>
        <div class="panel-body">
            <form class="form users-new" data-toggle="validator" data-disable="false" role="form" method="POST" action="./categorias">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="id" id="id" value="<?php echo $f->id; ?>">
                <div class="container-fluid float-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="titulo">Título da Categoria</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input data-error="Campo de preenchimento obrigatório!" class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $f->titulo; ?>" placeholder="Título da Categoria" <?php echo $required; ?>>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success center-block" style="text-align:center;padding-top:30px">
                                            <input name="destaque" id="destaque" value="S" type="checkbox" <?php echo $checked; ?>>
                                            <label for="destaque">Destaque na Página Principal?</label>
                                        </div>
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