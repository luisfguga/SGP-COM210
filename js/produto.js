

$(function () {

    $("button.menos").click(function(){
        var btnId = $(this).attr("id");
        var id = btnId.split("-")[1];
        var qtde = parseInt($("input#qtde-"+id).val())
        if(qtde==0) { $("input#qtde-"+id).val(1) } 
        else if(qtde>=1) {
            var preco = parseFloat($("input#preco_unit_item-"+id).val()) //preco unitário
            var valor_total_pedido = parseFloat($("input#valor_total_pedido").val())
            var novaQtde = (qtde>1)?qtde--:qtde=1;
            var novoPreco = parseFloat(novaQtde * preco).toFixed(2)
            valor_total_pedido -= parseFloat(preco);
            
            $("input#valor_total_pedido").val(valor_total_pedido)
            $("input#preco_total_item-"+id).val(novoPreco)
            $("span#spanPrecoItem-"+id).html("R$ "+novoPreco)
            $("#h3TotalPedido").html("R$  "+parseFloat(valor_total_pedido).toFixed(2))
        }
    })

    $("button.mais").click(function(){
        var btnId = $(this).attr("id");
        var id = btnId.split("-")[1];
        var qtde = parseInt($("input#qtde-"+id).val())
        var qtde_estoque = parseInt($("input#qtde_estoque-"+id).val())
        var valor_total_pedido = parseFloat($("input#valor_total_pedido").val())
        if( qtde==(qtde_estoque+1) ){ $("input#qtde-"+id).val(qtde_estoque) }
        else if( qtde<=qtde_estoque ){
            var preco = parseFloat($("input#preco_unit_item-"+id).val()) //preco unitário
            var novaQtde = (qtde<=qtde_estoque)?qtde++:qtde_estoque;
            var novoPreco = parseFloat(novaQtde * preco).toFixed(2)
            valor_total_pedido += parseFloat(preco)

            $("input#valor_total_pedido").val(valor_total_pedido)
            $("input#preco_total_item-"+id).val(novoPreco)
            $("span#spanPrecoItem-"+id).html("R$ "+novoPreco)
            $("#h3TotalPedido").html("R$  "+parseFloat(valor_total_pedido).toFixed(2))
        }
    })

    
});