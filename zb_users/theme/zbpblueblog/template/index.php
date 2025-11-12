{template:header}
<div class="container">
	<div class="inner">
		{if $zbp->CheckPlugin('ResponsiveSlides') && $type == 'index' && $page == '1'}
		<div id="bk8-Slides">
		{ResponsiveSlides_call()}
		</div>
		{/if}
		<main class="main">
			<div class="main-title">
				{if $type == 'index'}
				<h2>最新发布</h2>				
				{elseif $type == 'search'}
				<h2>{$title}的结果</h2>
				{else}
				<h2>{$title}</h2>
				{/if}
			</div>

			{foreach $articles as $article}
			{if $article.IsTop}
			{template:post-istop}
			{else}
			{template:post-multi}
			{/if}
			{/foreach}
			<div class="pagenavi">
				{template:pagebar}	
			</div>
		</main>
		{template:aside}
	</div>
</div>
{template:footer}