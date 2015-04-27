{foreach from=$topmenu_items item=item}
	<li {if $item->active}class="active"{/if}>
		<a href="{$item->getUrl()}">
			{if isset($item->glyphicon)}<span class="glyphicon {$item->glyphicon}"> </span>{/if}
			{$item->title}
		</a>
	</li>
{/foreach}