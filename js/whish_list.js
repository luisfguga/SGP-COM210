var whish_list = [];

function addWishList(produto_id) {
    if (whish_list.indexOf(produto_id) === -1) {
        whish_list.push(produto_id);
    }
}

function removeWishList(produto_id) {
    if (whish_list.indexOf(produto_id) > -1) {
        whish_list.splice(whish_list.indexOf(produto_id), 1);
    }
}