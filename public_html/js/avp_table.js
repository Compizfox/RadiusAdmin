/*
 * 	Filename:   avp_table.js
 * 	Date:       2016-01-20
 * 	Author:     Lars Veldscholte
 * 	            lars@veldscholte.eu
 * 	            http://lars.veldscholte.eu
 *
 * 	Copyright 2016 Lars Veldscholte
 *
 * 	This file is part of RadiusAdmin.
 *
 * 	RadiusAdmin is free software: you can redistribute it and/or modify
 * 	it under the terms of the GNU General Public License as published by
 * 	the Free Software Foundation, either version 3 of the License, or
 * 	(at your option) any later version.
 *
 * 	RadiusAdmin is distributed in the hope that it will be useful,
 * 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 	GNU General Public License for more details.
 *
 * 	You should have received a copy of the GNU General Public License
 * 	along with RadiusAdmin. If not, see <http://www.gnu.org/licenses/>.
 */

$(document).ready(function() {
	$('#checkattrs-table').on("click", '#delete-row', function() {
		$(this).closest('tr').remove();
	});

	$('#add-row-checkattrs').click(function() {
		$('#checkattrs-table').append('<tr><td><input name="checkattrs-id[]" type="hidden" value=""><input name="checkattrs-attribute[]" list="available-attributes" type="text" class="form-control"></td><td><select name="checkattrs-operator[]" class="form-control">' + operatoroptions + '</select></td><td><input name="checkattrs-value[]" type="text" class="form-control"></td><td><button type="button" class="btn btn-default" id="delete-row"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
	});

	$('#add-row-replyattrs').click(function() {
		$('#replyattrs-table').append('<tr><td><input name="replyattrs-id[]" type="hidden" value=""><input name="replyattrs-attribute[]" list="available-attributes" type="text" class="form-control"></td><td><select name="replyattrs-operator[]" class="form-control">' + operatoroptions + '</select></td><td><input name="replyattrs-value[]" type="text" class="form-control"></td><td><button type="button" class="btn btn-default" id="delete-row"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
	});
});