/*
 *
 *   Right - Responsive Admin Template
 *   v 0.3.0
 *   http://adminbootstrap.com
 *
 */

document.addEventListener('keydown', function( event ) {
	var flag = event.getModifierState && event.getModifierState('CapsLock');
	var resultado ='';
	if( flag ){ resultado = '<div class="animate infinite pulse"><strong>CAPS LOCK ativado!</strong><div>'; }
	document.getElementById('capslock').innerHTML = resultado;
});

$(document).ready(function() {
	quickmenu($('.quickmenu__item.active'));

	$('body').on('click', '.quickmenu__item', function() {
		quickmenu($(this))
	});

	function quickmenu(item) {
		var menu = $('.sidebar__menu');
		menu.removeClass('active').eq(item.index()).addClass('active');
		$('.quickmenu__item').removeClass('active');
		item.addClass('active');
		menu.eq(0).css('margin-left', '-'+item.index()*200+'px');
	}

	$('.sidebar li').on('click', function(e) {
		e.stopPropagation();
		var second_nav = $(this).find('.collapse').first();
		if (second_nav.length) {
			second_nav.collapse('toggle');
			$(this).toggleClass('opened');
		}
	});

	$('body.main-scrollable .main__scroll').scrollbar();
	$('.scrollable').scrollbar({'disableBodyScroll' : true});
	$(window).on('resize', function() {
		$('body.main-scrollable .main__scroll').scrollbar();
		$('.scrollable').scrollbar({'disableBodyScroll' : true});
	});

	$('.selectize-dropdown-content').addClass('scrollable scrollbar-macosx').scrollbar({'disableBodyScroll' : true});
	$('.nav-pills, .nav-tabs').tabdrop();

	$('body').on('click', '.header-navbar-mobile__menu button', function() {
		$('.dashboard').toggleClass('dashboard_menu');
	});

	$('.sidestat__chart.sparkline.bar').each(function() {
		$(this).sparkline(
			'html',
			{
				type: 'bar',
				height: '30px',
				barSpacing: 2,
				barColor: '#1e59d9',
				negBarColor: '#ed4949'
			}
		);
	});

	$('.sidestat__chart.sparkline.area').each(function() {
		$(this).sparkline(
			'html',
			{
				width: '145px',
				height: '40px',
				type: 'line',
				lineColor: '#ed4949',
				lineWidth: 2,
				fillColor: 'rgba(237, 73, 73, 0.6)',
				spotColor: '#FF5722',
				minSpotColor: '#FF5722',
				maxSpotColor: '#FF5722',
				highlightSpotColor: '#FF5722',
				spotRadius: 2
			}
		);
	});

	$('.sidestat__chart.sparkline.bar_thin').each(function() {
		$(this).sparkline(
			'html',
			{
				type: 'bar',
				height: '30px',
				barSpacing: 1,
				barWidth: 2,
				barColor: '#FED42A',
				negBarColor: '#ed4949'
			}
		);
	});

	$('.sidestat__chart.sparkline.line').each(function() {
		$(this).sparkline(
			'html',
			{
				type: 'bar',
				height: '30px',
				barSpacing: 2,
				barWidth: 3,
				barColor: '#20c05c',
				negBarColor: '#ed4949'
			}
		);
	});

	$("input.bs-switch").bootstrapSwitch();

	$('.settings-slider').ionRangeSlider({
		decorate_both: false
	});

	if ($('input[type=number]').length) {
		$('input[type=number]').inputNumber({
			mobile: false
		});
	}

	
	$("input[type='checkbox']#funcionario").click(function() {
		var checkado = ($("input[type='checkbox']#funcionario").prop("checked"))?true:false;
		var campos = ["data_admissao","inicio_ferias","termino_ferias","impostos","vale_transporte","salario","banco","agencia_bancaria","num_conta_bancaria","tipo_pagto"];
		var totItens = campos.length;
		if(checkado){ $("div#dados-funcionario").css('display','block'); }else{ $("div#dados-funcionario").css('display','none'); }

		for(var i=0;i<totItens;i++) {
			$("#"+campos[i]).prop('required',checkado);
		}
	})

	$("input[type='checkbox']#principal").click(function() {
		$("div#container_img_principal").toggle();
	})

	$("input[type='checkbox']#secundario").click(function() {
		$("div#container_img_secundario").toggle();
	})
	
});