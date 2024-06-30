$(document).ready(function() {
	
	var select = $('.datalist-filter__email').selectize({
		create: false,
		sortField: 'text'
	});


	var slider = $(".slider").data("ionRangeSlider");

	// Table tab count update
	function tabInfo(table) {
		var id = $(table).closest('.tab-pane').attr('id'),
			tab = $('.nav-tabs a[aria-controls='+id+']'),
			length = $(table).DataTable().page.info().recordsDisplay,
			label = tab.find('span.label');
		if (label.length) { label.remove(); }
		tab.append('<span class="label">'+length+'</span>');
	}

	// Preview update
	function previewUpdate(data) {
		var user = $('.users-preview');
		user.find('.users-preview__categ').text(data[1]).attr('title', data[1]);
		user.find('.users-preview__titulo').text(data[2]).attr('title', data[2]);
		user.find('.users-preview__qtda').text(data[3]).attr('title', data[3]);
		user.find('.users-preview__qtdi').text(data[4]).attr('title', data[4]);
		user.find('.users-preview__situ').text(data[5]).attr('title', data[5]);
		user.find('.users-preview__lucro').text(data[6]).attr('title', data[6]);
		user.find('.users-preview__cestq').text(data[7]).attr('title', data[7]);
		user.find('.users-preview__lestq').text(data[8]).attr('title', data[8]);
		user.find('.users-preview__stts').text(data[9]).attr('title', data[9]);
	}

	var tb_produtos = $('#tb_produtos').DataTable( {
		ordering: true,
		lengthChange: false,
		pagingType: 'numbers',
		ajax: "/data/users/produtos.php",
		stateSave: false,
		columns: [
            { title: "Id" },
            { title: "Categoria" },
            { title: "Titulo" },
            { title: "Qtde Atual" },
            { title: "Qtde Ideal" },
            { title: "Situação" },
            { title: "Lucro" },
            { title: "Custo Estoque" },
            { title: "Lucro Estoque" },
            { title: "Status" },
            { title: "" }
		],
		columnDefs: [ {
            targets: -1,
            data: null,
            defaultContent: '<i class="fa fa-fw fa-edit" title="Editar"></i>'
        } ]
	} );

	$('#tb_produtos tbody').on( 'click', 'i', function () {
		var data = tb_produtos.row( $(this).parents('tr') ).data();
		document.location.href= "./produtos-"+data[0];
    } );

});
