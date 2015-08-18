{* 2-level vertical menu *}

{foreach from=$leftmenu_items item=item}
	{if $item->visible}
		<li{if $item->active} class="active"{/if}>
			<a {if !$item->activeonly}href="{$item->getUrl()}"{/if}>
				{if isset($item->glyphicon)}<span class="glyphicon {$item->glyphicon}"> </span>{/if}
				{$item->title}
			</a>
			{if !empty($item->submenuitems)}
				<ul class="nav">
					{include file="include/leftmenu.tpl" leftmenu_items=$item->submenuitems}
				</ul>
			{/if}
		</li>
	{/if}
{/foreach}