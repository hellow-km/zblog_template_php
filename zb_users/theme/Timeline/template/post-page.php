<article>
	<div class="content">
    	<div class="abox">
			<h2 class="atitle">{$article.Title}</h2>
{$article.Content}
{if !empty($tag)}
{/if}
{if !$article.IsLock}
{template:comments}
{/if}
		</div>
	</div>
</article>
