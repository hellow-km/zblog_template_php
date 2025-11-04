<article id="post-{$article.ID}" class="post-{$article.ID} post type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title">{$article.Title}</h1>	
						<div class="single_info">
							<span class="date"><i class="fas fa-clock"></i>&nbsp;{$article.Time('Y-m-d H:i')}&nbsp;</span>
							<span class="views"><i class="fas fa-users"></i>&nbsp;{$article.ViewNums} 人阅读</span>
							<span class="comment"><i class="fas fa-comment"></i>&nbsp;{$article.CommNums} 条评论</span>
							{if $user.ID>0}<span class="edit"><i class="fas fa-pencil-alt"></i>&nbsp;<a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" rel="nofollow">编辑</a></span>{/if}
						</div>						
	</header><!-- .entry-header -->
{if $zbp->Config('Blogs')->DisplayAd4=='1'}
<div id="abcbt" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm4}
	{else}
		{$zbp->Config('Blogs')->Ad4}
	{/if}
</div>
{/if}
	<div class="entry-content">
					<div class="single-content">									
					{$article->Content}	
	</div>
<div class="clear"></div>
{template:social}			
<div class="clear"></div>
	</div><!-- .entry-content -->

	</article><!-- #post -->	
{if $zbp->Config('Blogs')->DisplayAd6=='1'}
<div id="abcpl" class="abc-pc abc-site">
	{if Blogs_is_mobile()}
		{$zbp->Config('Blogs')->Adm6}
	{else}
		{$zbp->Config('Blogs')->Ad6}
	{/if}
</div>
{/if}

	<div class="clear"></div>
{if !$article.IsLock}
{template:comments}
{else}
<p class="no-comments">评论已关闭！</p>
{/if}