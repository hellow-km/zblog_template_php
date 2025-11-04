{template:header}
	<div id="content" class="site-content">	
	<div class="clear"></div>
{if $zbp->Config('Blogs')->DisplayAd1=='1'}
<div id="abcdh" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm1}
	{else}
		{$zbp->Config('Blogs')->Ad1}
	{/if}
</div>
{/if}<div id="contentab">	
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		{if $zbp->Config('Blogs')->hdpsz_kg=='1'}
		{if $type=='index'&&$page=='1'} 
		{template:slider}
			{/if}
				{/if}
<div id="post_list_box" class="border_gray">
{foreach $articles as $keyd=>$article}
{template:post-multi}
{/foreach}			
</div>		
</main><!-- .site-main -->
{template:pagebar}	
	</section><!-- .content-area -->
{if ($zbp->Config('Blogs')->cebianlanbj !== '3') }<div id="sidebar" class="widget-area">	{template:sidebar}	</div>{/if}</div>
<div class="clear"></div>
</div>
{template:footer}