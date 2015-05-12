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
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="userinfo" class="tab-pane fade in active">
						<h2>User information</h2>
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-1 control-label">Username</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" placeholder="Username" value="{$user->name}">
								</div>
							</div>
							<h3>Groups</h3>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-1">
									<select name="groups" id="groups" class="form-control" size="5">
										{html_options values=$user->groups output=$user->groups}
									</select>
								</div>
								<div class="col-sm-1">
									<button type="button" class="btn btn-default" id="move-up"><span class="glyphicon glyphicon-chevron-up"></span></button>
									<br><br>
									<button type="button" class="btn btn-default" id="move-down"><span class="glyphicon glyphicon-chevron-down"></span></button>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-1">
									<input type="text" list="available-groups" class="form-control" id="textbox">

									<datalist id="available-groups">
										<option value="Internet Explorer">
										<option value="Firefox">
										<option value="Chrome">
										<option value="Opera">
										<option value="Safari">
									</datalist>
								</div>
								<div class="col-sm-1">
									<button type="button" class="btn btn-default" id="add"><span class="glyphicon glyphicon-plus"></span></button>
								</div>
							</div>
						</div>
					</div>
					<div id="checkattrs" class="tab-pane fade">

					</div>
					<div id="replyattrs" class="tab-pane fade">

					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-default">Apply</button>
	</form>
{/block}

{block name=script}
	<script src="js/sortable_select.js"></script>
{/block}