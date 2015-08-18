{*
    Filename:   radentity_edit.tpl
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
	<form action="{block name=formaction}{/block}" method="POST">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#generalinfo">General information</a></li>
			<li><a data-toggle="tab" href="#checkattrs">Check attributes</a></li>
			<li><a data-toggle="tab" href="#replyattrs">Reply attributes</a></li>
		</ul>
		<div class="tab-content">
			<div id="generalinfo" class="tab-pane fade in active">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>General information</h2>
						<div class="form-horizontal">
							{block name=generalinfo}
								<input name="name" type="hidden" value="{$entity->name}">
							{/block}
							<h3>Groups</h3>
							<div class="form-group">
								<label class="col-sm-2 control-label">{block name=label1}{/block}</label>
								<div class="col-sm-5">
									<div class="row">
										<div class="col-xs-6">
											<select name="children[]" id="children" class="form-control" multiple size="5">
												{html_options values=$entity->children output=$entity->children}
											</select>
										</div>
										<div class="col-xs-1">
											<button type="button" class="btn btn-default" id="move-up"><span class="glyphicon glyphicon-chevron-up"></span></button><br>
											<button type="button" class="btn btn-default" id="delete"><span class="glyphicon glyphicon-remove"></span></button><br>
											<button type="button" class="btn btn-default" id="move-down"><span class="glyphicon glyphicon-chevron-down"></span></button>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">{block name=label2}{/block}</label>

								<div class="col-sm-5">
									<div class="row">
										<div class="col-xs-6">
											<input type="text" list="available-children" class="form-control" id="textbox">
										</div>
										<div class="col-xs-1">
											<button type="button" class="btn btn-default" id="add"><span class="glyphicon glyphicon-plus"></span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="checkattrs" class="tab-pane fade">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Check attributes</h2>
						{include file="include/avp_table.tpl" type="checkattrs" attributes=$entity->checkattrs}
					</div>
				</div>
			</div>
			<div id="replyattrs" class="tab-pane fade">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Reply attributes</h2>
						{include file="include/avp_table.tpl" type="replyattrs" attributes=$entity->replyattrs}
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-default">Apply</button>

		<datalist id="available-children">{html_options values=$childrenlist}</datalist>
		<datalist id="available-attributes">{html_options values=$attributelist}</datalist>
	</form>
{/block}

{block name=script}
	{capture operatoroptions assign="operatoroptions"}{html_options values=$operatorlist output=$operatorlist}{/capture}
	<script>
		var operatoroptions = '{$operatoroptions|escape:javascript}';
	</script>
	<script src="js/sortable_select.js"></script>
	<script src="js/avp_table.js"></script>
{/block}