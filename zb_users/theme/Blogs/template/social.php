<div class="social-main">
{if $zbp->Config('Blogs')->wzdz_kg=='1'}
		<div class="like clr">{Blogs_prise_html($article->ID)}</div>
{/if}
{if $zbp->Config('Blogs')->wzds_kg=='1'}
		<span class="liubaixx">
		<div class="shang clr">	
			<a  title="好文！一定要打赏！" class="dashang" href="JavaScript:void(0)"><i class="fas fa-gift"></i>赞赏<span><img src="{$host}zb_users/theme/Blogs/image/{php}Blogs_Get_Logo('dashang','jpg');{/php}" alt="打赏二维码"></span></a>
		</div>
		</span>
		{/if}
		{if $zbp->Config('Blogs')->wzfx_kg=='1'}
		<div class="bdsharebuttonbox">
		<span class="s-txt">分享：</span>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		<a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
		<a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a>
		<a href="#" class="bds_more" data-cmd="more"></a>
		</div>
		{/if}
				<div class="clear"></div>
</div>	