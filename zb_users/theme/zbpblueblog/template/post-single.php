<article id="article">
	<h1 id="title">{$article.Title}</h1>
	<div id="postmeta">
		<span>{$article.Time('Y-m-d')}</span>
		<span>|</span>
		<span>分类: <a href="{$article.Category.Url}" title="{$article.Category.Name}">{$article.Category.Name}</a></span>
		<span>|</span>
		<span>查看: {$article.ViewNums}</span>
	</div>
	<div class="entry">
		{$article.Content}	
	</div>
	<div class="related">
		<h3>其它推荐</h3>{$array=GetList($zbp->option['ZC_RELATEDLIST_COUNT'],null,null,null,$article->Tags,null,array('is_related'=>$article->ID));}
		{if $array}
		<ul>
			{foreach $array as $related}
			<li><a href="{$related.Url}" target="_blank" title="{$related.Title}">{$related.Title}</a></li>
			{/foreach}		
		</ul>
		{else}
		<p><strong>暂无相关文章</strong></p>
		{/if}
	</div>
	<div id="tags">
		<span>关键词：</span>{foreach $article.Tags as $tag}<a href="{$tag.Url}" title="{$tag.Name}">{$tag.Name}</a>{/foreach}
	</div>
	<div class="postnavi">
		{if $article.Prev}
		<p><span>上一篇：</span><a href="{$article.Prev.Url}" title="{$article.Prev.Title}">{$article.Prev.Title}</a></p>
		{/if}
		{if $article.Next}
		<p><span>下一篇：</span><a href="{$article.Next.Url}" title="{$article.Next.Title}">{$article.Next.Title}</a></p>
		{/if}
	</div>
	{if !$article.IsLock}
	{template:comments}		
	{/if}
</article>