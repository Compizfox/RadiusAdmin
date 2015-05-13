/**
 * Created by Lars Veldscholte on 12/05/2015.
 */

$(document).ready(function() {
	$('#move-up').click(moveUp);
	$('#move-down').click(moveDown);
	$('#add').click(add);
	$('#delete').click(function() {
		$('#groups :selected').remove();
	});

	$('#textbox').keypress(function(event) {
		if(event.keyCode == 13){
			event.preventDefault();
			add();
		}
	});
});

function moveUp() {
	$('#groups :selected').each(function() {
		if (!$(this).prev().length) return false;
		$(this).insertBefore($(this).prev());
	});
	$('#groups select').focus().blur();
}

function moveDown() {
	$($('#groups :selected').get().reverse()).each(function() {
		if (!$(this).next().length) return false;
		$(this).insertAfter($(this).next());
	});
	$('#groups select').focus().blur();
}

function add() {
	var opt = $('#textbox').val();

	$('#groups')
		.append($("<option></option>")
			.attr("value",opt )
			.text(opt));

	$('#textbox').val('');
}