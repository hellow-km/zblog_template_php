<aside class="sidebar">
	{template:sidebar2}
	{if $zbp->Config('zbpblueblog')->ad}
	<div class="widget">
	{$zbp->Config('zbpblueblog')->ad}
	</div>
	{/if}
	{template:sidebar} 	
</aside>