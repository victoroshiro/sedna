$(function(){

	// Check all the checkboxes when the head one is selected:
	$('.checkall').click(
		function(){
			$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
		}
	);

	/*$(".close").click(
		function () {
			$(this).fadeTo(400, 0, function () { // Links with the class "close" will close parent
				$(this).slideUp(400);
			});
		return false;
		}
	);*/

	$('.btn-group a, .btn-group button').click(function() {
		$(this).toggleClass('active');
	});
});

// Funções customizadas CMS
$(document).ready(function(){
	$('[name=excluir-registros]').click(function(event){
		event.preventDefault();
		excluirRegistros($(this).data('module'), 'excluir_selecionados');
	});
});