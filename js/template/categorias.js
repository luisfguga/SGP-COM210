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
	}

	var tb_categorias = $('#tb_categorias').DataTable( {
		ordering: true,
		lengthChange: false,
		pagingType: 'numbers',
		ajax: "/data/users/categorias.php",
		stateSave: false,
		columns: [
            { title: "Id" },
            { title: "Titulo" },
            { title: "" }
		],
		columnDefs: [ {
            targets: -1,
            data: null,
            defaultContent: '<i class="fa fa-fw fa-edit" title="Editar"></i>'
        } ]
	} );

	$('#tb_categorias tbody').on( 'click', 'i', function () {
		var data = tb_categorias.row( $(this).parents('tr') ).data();
		document.location.href= "./categorias-"+data[0];
    } );

});
