<?php  /* Template Name:文章归档页面 */  ?> 
<?php  include $this->GetTemplate('header');  ?>
<style type="text/css">
.year {
    font-size: 18px;
    font-size: 1.8rem;
    line-height: 150%;
    margin: 10px 0px;
    padding: 0 0 0 5px;
    border-left: 5px solid #C01E22;
}
.mon {
	color: #000;
	line-height: 30px; 
	margin: 5px 0 5px 5px;
	cursor: pointer;
}
.post_list li {
	line-height: 30px;
	text-indent: 2em;
}
.post_list {
	color: #999;
	margin: 0 0 10px 0!important;
}
.single-content ul li {
    list-style-position:outside ;
    list-style-type: none;
	margin: 0;
}
</style>
<div id="content" class="site-content duzhefull">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-<?php  echo $article->ID;  ?>" class="post-<?php  echo $article->ID;  ?> post type-page status-publish hentry">

	<header class="entry-header">
		<h1 class="entry-title"><?php  echo $article->Title;  ?></h1>	
						<div class="single_info">
							<span class="date"><?php  echo $article->Time('Y-m-d');  ?>&nbsp;</span>
							<span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span>
							<span class="comment">评论 <?php  echo $article->CommNums;  ?> 条</span>		
							<span class="edit"><a href="<?php  echo $host;  ?>zb_system/cmd.php?act=PageEdt&id=<?php  echo $article->ID;  ?>" rel="nofollow">编辑</a></span>
						</div>						
	</header><!-- .entry-header -->
<?php if ($zbp->Config('Blogs')->DisplayAd4=='1') { ?>
<div id="abcbt" class="abc-pc abc-site">
	<?php if (Blogs_is_mobile()) { ?>
		<?php  echo $zbp->Config('Blogs')->Adm4;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('Blogs')->Ad4;  ?>
	<?php } ?>
</div>
<?php } ?>
	<div class="entry-content">
	<div class="single-content">
<div id="all_archives">
<?php  Blogs_cx_archives_list();  ?>
</div>
	</div>
<div class="clear"></div>
<?php  include $this->GetTemplate('social');  ?>			
<div class="clear"></div>
	</div><!-- .entry-content -->

	</article><!-- #post -->	
<?php if ($zbp->Config('Blogs')->DisplayAd6=='1') { ?>
<div id="abcpl" class="abc-pc abc-site">
	<?php if (Blogs_is_mobile()) { ?>
		<?php  echo $zbp->Config('Blogs')->Adm6;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('Blogs')->Ad6;  ?>
	<?php } ?>
</div>
<?php } ?>

	<div class="clear"></div>
<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php }else{  ?>
<p class="no-comments">评论已关闭！</p>
<?php } ?>			
</main><!-- .site-main -->
	</div><!-- .content-area -->
</div>
<div class="clear"></div>
</div><!-- .site-content -->
<script type="text/javascript">
$(document).ready(function(){
    (function(){
		$('#all_archives span.mon').each(function(){
			var num=$(this).next().children('li').size();
			var text=$(this).text();
			$(this).html(text+' ( '+num+' 篇文章 )');
		});
		var $al_post_list=$('#all_archives ul.post_list'),
			$al_post_list_f=$('#all_archives ul.post_list:first');
		$al_post_list.hide(1,function(){
			$al_post_list_f.show();
		});
		$('#all_archives span.mon').click(function(){
			$(this).next().slideToggle(400);
			return false;
		});
    })();
 });
</script>
<?php  include $this->GetTemplate('footer');  ?>