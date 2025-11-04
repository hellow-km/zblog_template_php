{* Template Name:搜索页面 *}
{template:header}
<article>
	<div class="content">
    	<div class="abox searchbox">
			<h2 class="atitle">{$article.Title}的结果</h2>
{$article.Content}
{if !empty($tag)}
{/if}
{if !$article.IsLock}
{template:comments}
{/if}
		</div>
	</div>
</article>
{template:footer}