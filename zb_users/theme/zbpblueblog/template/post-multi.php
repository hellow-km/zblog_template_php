<article class="main-post">
	{if zbpblueblog_thumbnail($article)}
	<div class="thumbnail">
		<a href="{$article.Url}" title="{$article.Title}" target="_blank"><img src="{zbpblueblog_thumbnail($article)}"/></a>
	</div>
	{/if}
	<div class="info">
		<h2><a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Title}</a></h2>
		<div class="intro">
			{zbpblueblog_intro($article,'1','180','...')}
		</div>
		<div class="intro-meta">
			<span class="cate">分类：<a href="{$article.Category.Url}" title="{$article.Category.Name}">{$article.Category.Name}</a></span>
			<span class="time">{$article.Time('Y-m-d')}</span>
		</div>
	</div>
</article>