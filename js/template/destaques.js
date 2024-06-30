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
		user.find('.users-preview__titulo').text(data[1]).attr('title', data[1]);
		user.find('.users-preview__iexib').text(data[2]).attr('title', data[2]);
		user.find('.users-preview__fexib').text(data[3]).attr('title', data[3]);
		user.find('.users-preview__stts').text(data[4]).attr('title', data[4]);
	}

	var tb_destaques= $('#tb_destaques').DataTable( {
		ordering: true,
		lengthChange: false,
		pagingType: 'numbers',
		ajax: "/data/users/destaques.php",
		stateSave: false,
		columns: [
            { title: "Id" },
            { title: "Titulo" },
            { title: "Início Exibição" },
            { title: "Fim Exibição" },
            { title: "Status" }
		],
		columnDefs: [ {
            targets: -1,
            data: null,
            defaultContent: '<i class="fa fa-fw fa-edit" title="Editar"></i>'
        } ]
	} );

	$('#tb_destaques tbody').on( 'click', 'i', function () {
		var data = tb_destaques.row( $(this).parents('tr') ).data();
		document.location.href= "./destaques-"+data[0];
    } );

});
