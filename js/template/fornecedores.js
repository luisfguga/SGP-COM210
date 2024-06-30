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
		user.find('.users-preview__nome').text(data[1]).attr('title', data[1]);
		user.find('.users-preview__razaos').text(data[2]).attr('title', data[2]);
        user.find('.users-preview__nomef').text(data[3]).attr('title', data[3]);
        user.find('.users-preview__cnpj').text(data[4]).attr('title', data[4]);
        user.find('.users-preview__contato').text(data[5]).attr('title', data[5]);
        user.find('.users-preview__tel').text(data[6]).attr('title', data[6]);
        user.find('.users-preview__cel').text(data[7]).attr('title', data[7]);
        user.find('.users-preview__email').text(data[8]).attr('title', data[8]);
	}

	var tb_fornecedores = $('#tb_fornecedores').DataTable( {
		ordering: true,
		lengthChange: false,
		pagingType: 'numbers',
		ajax: "/data/users/fornecedores.php",
		stateSave: false,
		columns: [
            { title: "Id" },
            { title: "Razão Social" },
            { title: "Nome Fantasia" },
            { title: "CNPJ" },
            { title: "Contato" },
            { title: "Telefone" },
			{ title: "Celular" },
			{ title: "E-mail" },
            { title: "" }
		],
		columnDefs: [ {
            targets: -1,
            data: null,
            defaultContent: '<i class="fa fa-fw fa-edit" title="Editar"></i>'
        } ]
	} );

	$('#tb_fornecedores tbody').on( 'click', 'i', function () {
		var data = tb_fornecedores.row( $(this).parents('tr') ).data();
		document.location.href= "./fornecedores-"+data[0];
    } );

});
