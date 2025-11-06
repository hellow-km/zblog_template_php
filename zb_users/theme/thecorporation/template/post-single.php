<div id="post">
	<h2 id="postTitle">{$article.Title}</h2>
	<div class="postmeta">
		<span>作者：{$article.Author.StaticName}</span>
		<span>栏目：<a href="{$article.Category.Url}" title="{$article.Category.Name}" target="_blank">{$article.Category.Name}</a></span>
	</div>
	<div class="entry">
        {$article.Content}
	</div>
	{if $article.Tags}
	<div id="postTags">
		<span>关键词:</span>
		{foreach $article.Tags as $tag}
		<a href="{$tag.Url}" title="{$tag.Name}">{$tag.Name}</a>
		{/foreach}
	</div>
	{/if}
	<div class="postmeta">
		<span>日期（{$article.Time()}）</span>
		<span>评论（{$article.CommNums}）</span>
		<span>浏览（{$article.ViewNums}）</span>
	</div>
</div>
{if !$article.IsLock}
{template:comments}		
{/if}