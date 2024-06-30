CREATE DEFINER = CURRENT_USER TRIGGER `chokoart`.`tb_carrinhos_itens_AFTER_INSERT` AFTER INSERT ON `tb_carrinhos_itens` FOR EACH ROW
BEGIN
	UPDATE tb_produtos SET qtde_atual = (qtde_atual - NEW.qtde) WHERE id = NEW.tb_produtos_id;
    UPDATE tb_carrinhos SET valor_total = (valor_total + (NEW.qtde*NEW.valor_unitario)) WHERE id = NEW.tb_carrinhos_id;
END
