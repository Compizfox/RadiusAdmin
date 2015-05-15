{extends file="tpl/parent.tpl"}

{block name=title}RadiusAdmin - Edit user{/block}
{block name=pagename}Edit user{/block}

{block name=body}
	<form action="" method="POST">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#userinfo">User information</a></li>
			<li><a data-toggle="tab" href="#checkattrs">Check attributes</a></li>
			<li><a data-toggle="tab" href="#replyattrs">Reply attributes</a></li>
		</ul>
		<div class="tab-content">

			<div id="userinfo" class="tab-pane fade in active">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>User information</h2>
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" placeholder="Username" value="{$user->name}">
								</div>
							</div>
							<h3>Groups</h3>
							<div class="form-group">
								<label class="col-sm-2 control-label">Groups user is member of (top is highest priority)</label>
								<div class="col-sm-2">
									<select name="groups" id="groups" class="form-control" size="5">
										{html_options values=$user->groups output=$user->groups}
									</select>
								</div>
								<div class="col-sm-1">
									<button type="button" class="btn btn-default" id="move-up"><span class="glyphicon glyphicon-chevron-up"></span></button><br>
									<button type="button" class="btn btn-default" id="delete"><span class="glyphicon glyphicon-remove"></span></button><br>
									<button type="button" class="btn btn-default" id="move-down"><span class="glyphicon glyphicon-chevron-down"></span></button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Add groups</label>
								<div class="col-sm-2">
									<input type="text" list="available-groups" class="form-control" id="textbox">
								</div>
								<div class="col-sm-1">
									<button type="button" class="btn btn-default" id="add"><span class="glyphicon glyphicon-plus"></span></button>
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
						{include file="tpl/include/avp_table.tpl" type="checkattrs" attributes=$user->checkattrs}
					</div>
				</div>
			</div>
			<div id="replyattrs" class="tab-pane fade">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Reply attributes</h2>
						{include file="tpl/include/avp_table.tpl" type="replyattrs" attributes=$user->replyattrs}
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-default">Apply</button>

		<datalist id="available-groups">{html_options values=$grouplist}</datalist>
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