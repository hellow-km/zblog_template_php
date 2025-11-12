{template:header}
<div class="container">
	<div class="inner">
		<main class="main">	
			<div class="main-title">
				{if $type == 'article'}
				<h2>{$article.Category.Name}</h2>
				{else}
				<h2>{$title}</h2>
				{/if}
			</div>	
			{if $article.Type==ZC_POST_TYPE_ARTICLE}
			{template:post-single}
			{else}
			{template:post-page}
			{/if}		
		</main>
		{template:aside}
	</div>
</div>	
{template:footer}