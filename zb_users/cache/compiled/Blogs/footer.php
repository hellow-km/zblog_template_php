<div id="footer">
<div class="foot">
<?php if ($type=='index'&&$page=='1') { ?> 
		<div id="links"> <ul class="linkcat"> <li><strong>友情链接：</strong></li> 
		<?php  if(isset($modules['link'])){echo $modules['link']->Content;}  ?>
		 </ul><div class="clear"></div></div>
		 <?php } ?>
	<div class="ps">
<div class="p p2">
<div class="p-content">
<p class="t2">站点相关</p>
<ul><?php  echo $zbp->Config('Blogs')->yejiaoxiangguan;  ?></ul>
</div>
<div class="clear"></div>
<div class="site-info"><?php  echo $zbp->Config('Blogs')->banquanxinxi;  ?><span class="footer-tag">&nbsp; | &nbsp; Theme by <a href="http://yigujin.wang/"  target="_blank" title="zblogPHP免费响应式博客主题BlogsV2.0">Blogs</a>&nbsp; | &nbsp; Powered by <a href="http://www.zblogcn.com/" title="RainbowSoft Z-BlogPHP" target="_blank">Z-BlogPHP</a></span></div>
</div>
<!-- 若要删除版权请自觉赞助懿古今(支付宝：yigujin@qq.com)20元，谢谢支持 -->
<div class="p p3">
<div class="p-content">
<p class="t2">欢迎您关注我们</p>
<div class="qcode clearfix">
<div class="img-container">
<img alt="公众号二维码" src="<?php  echo $host;  ?>zb_users/theme/Blogs/image/<?php Blogs_Get_Logo('gongzhonghao','jpg'); ?>">
</div>
<div class="link-container">
<?php  echo $zbp->Config('Blogs')->yejiaoanniu1;  ?><?php  echo $zbp->Config('Blogs')->yejiaoanniu2;  ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="tools">
    <a class="tools_top" title="返回顶部"></a>
    <?php if ($type=='article' || $type=='page') { ?> 	
	<a class="tools_comments" title="发表评论"></a>
	<?php }else{  ?>
	<a href="<?php  echo $zbp->Config('Blogs')->liuyanban;  ?>#divCommentPost" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
	<?php } ?>
    </div>
<?php if ($type=='article' || $type=='page') { ?>
<script type="text/javascript">
const regx = /\.(jpe?g|png|bmp|gif|swf)(?=\?|$)/i;
$('.single-content').find('a').each(function(){
    const href = $(this).attr('href');
    const isImg = regx.test(href);
    if (isImg) {
        $(this).attr({'data-fancybox':'images','class':'cboxElement','rel':'example_group'});
    }
});
</script>
<?php } ?>
<?php if ($zbp->Config('Blogs')->wzfx_kg=='1') { ?>	
<?php if ($type=='article' || $type=='page') { ?> 	
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php } ?>
	<?php } ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/superfish.js" type="text/javascript"></script>
<?php if ($zbp->Config('Blogs')->fanyeanniu =='2' || $zbp->Config('Blogs')->fanyeanniu =='3') { ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery-ias.js" type="text/javascript"></script>
<script type="text/javascript">
	var ias = $.ias({
        container: "#post_list_box",
        item: "article",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	<?php if ($zbp->Config('Blogs')->fanyeanniu=='2') { ?>
    ias.extension(new IASTriggerExtension({
        text: '<i class="fa fa-chevron-circle-down"></i>加载更多', 
        offset: 1, 
    }));
	<?php } ?>
    ias.extension(new IASSpinnerExtension());
    ias.extension(new IASNoneLeftExtension({
        text: '已经加载完成！',
    }));
    ias.on('rendered', function(items) {
        $("img").lazyload({
            effect: "fadeIn",
        failure_limit : 10
        }); 
    })
</script>
<?php } ?>
<?php  echo $zbp->Config('Blogs')->yejiaoewdm;  ?>
<?php  echo $footer;  ?>
</div>
</body></html>