
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
<ul><?php  echo $zbp->Config('zbpNana')->yejiaoxiangguan;  ?></ul>
</div>
<div class="clear"></div>
<div class="site-info"><?php  echo $zbp->Config('zbpNana')->banquanxinxi;  ?><span class="footer-tag">&nbsp; | &nbsp; Theme by <a href="https://app.zblogcn.com/?id=1326"  target="_blank" title="zblogPHP免费响应式博客主题zbpNana">zbpNana</a>&nbsp; | &nbsp; Powered by <a href="http://www.zblogcn.com/" title="RainbowSoft Z-BlogPHP" target="_blank">Z-BlogPHP</a></span></div>
</div>
<!-- 若要删除版权请自觉赞助懿古今(支付宝：yigujin@qq.com)20元，谢谢支持 -->
<div class="p p3">
<div class="p-content">
<p class="t2">欢迎您关注我们</p>
<div class="qcode clearfix">
<div class="img-container">
<img alt="公众号二维码" src="<?php  echo $host;  ?>zb_users/theme/zbpNana/image/<?php zbpNana_Get_Logo('gongzhonghao','jpg'); ?>">
</div>
<div class="link-container">
<?php  echo $zbp->Config('zbpNana')->yejiaoanniu1;  ?><?php  echo $zbp->Config('zbpNana')->yejiaoanniu2;  ?>
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
	<a href="<?php  echo $zbp->Config('zbpNana')->liuyanban;  ?>#divCommentPost" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
	<?php } ?>
    </div>
	<?php if ($zbp->Config('zbpNana')->wzfx_kg=='1') { ?>	
<?php if ($type=='article' || $type=='page') { ?> 	
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php } ?>
	<?php } ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/superfish.js" type="text/javascript"></script>
<?php if ($type=='article' || $type=='page') { ?>	
<?php }else{  ?> 
<?php if ($zbp->Config('zbpNana')->fanyeanniu =='2' || $zbp->Config('zbpNana')->fanyeanniu =='3') { ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery-ias.js" type="text/javascript"></script>
<script type="text/javascript">
	<?php if (($zbp->Config('zbpNana')->shouyebuju=='3' && $type=='index')  || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='category') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='author') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='tag') || ($zbp->Config('zbpNana')->fltpbj_kg=='1' && $type=='date')) { ?>
    var ias = $.ias({
        container: ".cat-one-list",
        item: ".cat-lists",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	<?php }elseif(($zbp->Config('zbpNana')->shouyebuju=='1' && $type=='index') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='category') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='author') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='tag') || ($zbp->Config('zbpNana')->fltpbj_kg!=='1' && $type=='date')) {  ?>
	var ias = $.ias({
        container: "#post_list_box",
        item: "article",
        pagination: "nav-links",
        next: ".nav-links .next a",
    });
	<?php } ?>
	<?php if ($zbp->Config('zbpNana')->fanyeanniu=='2') { ?>
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
<?php } ?>
<?php  echo $zbp->Config('zbpNana')->yejiaoewdm;  ?>
<?php  echo $footer;  ?>
</div>
</body></html>