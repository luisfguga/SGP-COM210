CREATE VIEW `vw_listar_itens_carrinho` AS 
Select 
ci.tb_carrinhos_id as carrinho_id,
ci.tb_produtos_id as produto_id,
(SELECT titulo FROM tb_produtos WHERE id=ci.tb_produtos_id) AS produto_titulo,
(SELECT peso FROM tb_produtos WHERE id=ci.tb_produtos_id) AS produto_peso,
(SELECT unidade_medida FROM tb_produtos WHERE id=ci.tb_produtos_id) AS produto_unidade_medida,
(SELECT qtde_atual FROM tb_produtos WHERE id=ci.tb_produtos_id) AS estoque,
ci.qtde as qtde_item,
ci.valor_unitario as preco_item,
c.tb_usuarios_id,
c.sessionid,
c.forma_pagto,
c.cep_frete,
c.modalidade_frete,
c.valor_frete,
c.valor_total,
c.estagio_atual,
c.data_cadastro,
c.data_conclusao
from tb_carrinhos_itens ci LEFT JOIN tb_carrinhos c ON ci.tb_carrinhos_id = c.id