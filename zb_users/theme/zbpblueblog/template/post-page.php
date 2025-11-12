<article id="article">
	<h1 id="title">{$article.Title}</h1>	
	<div class="entry">
		{$article.Content}	
	</div>
	{if !$article.IsLock}
	{template:comments}		
	{/if}
</article>