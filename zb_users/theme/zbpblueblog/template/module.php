<section class="widget" id="{$module.HtmlID}">
	{if (!$module.IsHideTitle)&&($module.Name)}
	<h3>{$module.Name}</h3>
	{/if}
	{if $module.Type == 'div'}
	<div class="textwidget">
		{$module.Content}
	</div>
	{else}
	<ul>
		{$module.Content}
	</ul>
	{/if}
</section>

