<article>
	<div class="content">
    	<div class="abox">
			<h2 class="atitle"><span>{$article.Time('Y-m-d')}</span>{$article.Title}</h2>
			<div class="pagenow"><a href="{$host}">首页</a>{if $article.Category.Parent}<span>&gt;</span><a href="{$article.Category.Parent.Url}">{$article.Category.Parent.Name}</a>{/if}<span>&gt;</span><a href="{$article.Category.Url}">{$article.Category.Name}</a><span>&gt;</span><a href="{$article.Url}">{$article.Title}</a><span class="data" title="评论/浏览">[{$article.CommNums}/{$article.ViewNums}]</span></div>
{$article.Content}
{if !empty($tag)}
			<div class="tags">
			    <span>本文关键字</span>：{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank">{$tag.Name}</a>{/foreach}  
			</div>
{/if}
			<div class="pnext">
				{if $article.Prev}<p>上一篇：<a href="{$article.Prev.Url}">{$article.Prev.Title}</a></p>{/if}
				{if $article.Next}<p>下一篇：<a href="{$article.Next.Url}">{$article.Next.Title}</a></p>{else}
				<p>下一篇：没有了，<a href="{$article.Category.Url}">返回{$article.Category.Name}</a></p>
				{/if}
			</div>
			<div class="relist">
				<h3>相关文章</h3>
				<ul>
				{foreach GetList(10,$article.Category.ID) as $relarticle}
					<li><a href="{$relarticle.Url}" title="{$relarticle.Title}">{$relarticle.Title}</a></li>
				{/foreach}
				</ul>
			</div>
{if !$article.IsLock}
{template:comments}
{/if}
		</div>
	</div>
</article>
