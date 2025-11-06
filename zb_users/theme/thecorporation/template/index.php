{template:header}
<div id="container">
	{if $zbp->CheckPlugin('ResponsiveSlides') && $type == 'index' && $page == '1'}
	<div id="boke8-slide">
		{ResponsiveSlides_call('')}	
	</div>
	{/if}
	<div class="inner">
		<main id="main">
	        {foreach $articles as $article}
			{if $article.IsTop}
			{template:post-istop}
			{else}
			{template:post-multi}
			{/if}
			{/foreach}        
	        <div id="pagenavi">
				{template:pagebar}
			</div>
		</main>
		{template:post-sidebar}
	</div>
</div>
{template:footer}