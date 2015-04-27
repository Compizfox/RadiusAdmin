{* 2-level vertical menu *}

{foreach from=$leftmenu_items item=item}
	<li {if $item->active}class="active"{/if}>
		<a href="{$item->getUrl()}">
			{if isset($item->glyphicon)}<span class="glyphicon {$item->glyphicon}"> </span>{/if}
			{$item->title}
		</a>
		{if !empty($item->submenuitems)}
			<ul class="nav">
				{foreach from=$item->submenuitems item=sub}
					<li {if $sub->active}class="active"{/if}>
						<a href="{$sub->getUrl()}">
							{if isset($sub->glyphicon)}<span class="glyphicon {$sub->glyphicon}"> </span>{/if}
							{$sub->title}
						</a>
					</li>
				{/foreach}
			</ul>
		{/if}
	</li>
{/foreach}