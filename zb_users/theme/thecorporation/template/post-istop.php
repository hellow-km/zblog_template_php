<div class="post">
	<h2><a href="{$article.Url}" title="{$article.Title}">[置顶]：{$article.Title}</a></h2>
	<div class="meta">
		<span class="date">日期：{$article.Time()}</span> 
		<span>作者：{$article.Author.StaticName}</span>
		<span>栏目：<a href="{$article.Category.Url}" title="{$article.Category.Name}" target="_blank">{$article.Category.Name}</a></span>
		<span>评论（{$article.CommNums}）</span>
	</div>
	<div class="intro">
		{if thecorporation_thumbnail($article)}
		<div class="thumbnail">
			<a href="{$article.Url}" title="{$article.Title}">
				<img src="{thecorporation_thumbnail($article)}" alt="{$article.Title}"/>
			</a>
		</div>
		{/if}
		<div class="excerpt{if thecorporation_thumbnail($article)} pd{/if}">
			<div class="rows">
				{thecorporation_intro($article,'1','300','...')}
			</div>
		</div>
	</div>
</div>