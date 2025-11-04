
<div class="social-main">
<?php if ($zbp->Config('zbpNana')->wzdz_kg=='1') { ?>
		<div class="like clr"><?php  echo zbpNana_prise_html($article->ID);  ?></div>
<?php } ?>
<?php if ($zbp->Config('zbpNana')->wzds_kg=='1') { ?>
		<span class="liubaixx">
		<div class="shang clr">	
			<a  title="好文！一定要打赏！" class="dashang" href="JavaScript:void(0)"><i class="fas fa-gift"></i>赞赏<span><img src="<?php  echo $host;  ?>zb_users/theme/zbpNana/image/<?php zbpNana_Get_Logo('dashang','jpg'); ?>" alt="打赏二维码"></span></a>
		</div>
		</span>
		<?php } ?>
		<?php if ($zbp->Config('zbpNana')->wzfx_kg=='1') { ?>
		<div class="bdsharebuttonbox">
		<span class="s-txt">分享：</span>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		<a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
		<a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a>
		<a href="#" class="bds_more" data-cmd="more"></a>
		</div>
		<?php } ?>
				<div class="clear"></div>
</div>							