{*
    Filename:   avp_table.tpl
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
*}

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Attribute</th>
			<th>Operator</th>
			<th>Value</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="{$type}-table">
		{foreach from=$attributes item=attr}
			<tr>
				<td>
					<input name="{$type}-id[]" type="hidden" value="{$attr->id}">
					<input name="{$type}-attribute[]" list="available-attributes" type="text" class="form-control" value="{$attr->attribute}">
				</td>
				<td>
					<select name="{$type}-operator[]" class="form-control">
						{html_options values=$operatorlist output=$operatorlist selected=$attr->operator}
					</select>
				</td>
				<td>
					<input name="{$type}-value[]" type="text" class="form-control" value="{$attr->value}">
				</td>
				<td>
					<button type="button" class="btn btn-default" id="delete-row"><span class="glyphicon glyphicon-remove"></span></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>

<button type="button" class="btn btn-default" id="add-row-{$type}"><span class="glyphicon glyphicon-plus"></span> Add row</button>