/*
	Filename:   sortable_select.js
	Date:       2015-05-15
	Author:     Lars Veldscholte
	lars@veldscholte.eu
	http://lars.veldscholte.eu

	Copyright 2015 Lars Veldscholte

	This file is part of RadiusAdmin.

	RadiusAdmin is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	RadiusAdmin is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with RadiusAdmin. If not, see <http://www.gnu.org/licenses/>.
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

	$('form').submit( function() {
		$("#groups option").prop("selected", true);
		return true;
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
			.attr("value", opt)
			.text(opt));

	$('#textbox').val('');
}