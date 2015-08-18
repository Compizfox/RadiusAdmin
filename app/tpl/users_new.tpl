{extends file="users_edit.tpl"}

{block name=title}RadiusAdmin - New user{/block}
{block name=pagename}New user{/block}

{block name=generalinfo}
	<div class="form-group">
		<label class="col-sm-2 control-label">Username</label>
		<div class="col-sm-2">
			<input name="name" type="text" class="form-control">
		</div>
	</div>
{/block}

{block name=alert}
	<div class="alert alert-info" role="alert"><strong>Please note</strong> that, due to rlm_sql database design, it is not possible to add a new user without specifying any groups or attributes. Such an user will be silently discarded.</div>
{/block}