{*
    Filename:   radentities.tpl
    Date:       2015-05-30
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

{extends file="abstract/parent.tpl"}

{block name=body}
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				{block name=tableheaders}{/block}
			</tr>
		</thead>
		<tbody>
			{foreach from=$entities item=entity}
				<tr class="clickable-row" data-href="index.php?page={$linkpage}&amp;name={$entity->name}">
					<td>{$entity->name}</td>
					<td>{foreach from=$entity->children item=child name=children}{$child}{if !$smarty.foreach.children.last}, {/if}{/foreach}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
{/block}

{block name=script}
	<script src="js/clickable_table_rows.js"></script>
{/block}