{template:header}
<div id="container">
	<div class="inner">
		<main id="main">
		{if $article.Type==ZC_POST_TYPE_ARTICLE}
		{template:post-single}
		{else}
		{template:post-page}
		{/if}
		</main>
		{template:post-sidebar}
	</div>
</div>
{template:footer}