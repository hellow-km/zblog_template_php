<div class="article">
	<h2>{$article.Title}</h2>
	<div class="clr"></div>
     <div class="entry">
        {$article.Content}
	</div>    
</div>
{if !$article.IsLock}
{template:comments}		
{/if}