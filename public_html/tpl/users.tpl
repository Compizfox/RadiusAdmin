{extends file="tpl/parent.tpl"}

{block name=title}RadiusAdmin - Users{/block}
{block name=pagename}Users list{/block}

{block name=body}
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Username</th>
				<th>Groups</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$users item=user}
				<tr class="clickable-row" data-href="index.php?page=users_edit&amp;user={$user->name}">
					<td>{$user->name}</td>
					<td>{foreach from=$user->groups item=group}{$group}{/foreach}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
{/block}

{block name=script}
	<script src="js/clickable_table_rows.js"></script>
{/block}