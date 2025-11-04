
							<article id="post-<?php  echo $article->ID;  ?>" class="post-<?php  echo $article->ID;  ?> post type-post status-publish format-standard hentry category-<?php  echo $article->Category->Alias;  ?>">
					<header class="entry-header">
						<h1 class="entry-title"><?php  echo $article->Title;  ?></h1>
						<div class="single_info">
						<?php if ($zbp->Config('zbpNana')->wzlx_kg=='1') { ?>
									<span class="leixing">
										<?php if ($article->Metas->zbpNana_wzlx==2) { ?>
										<span class="zzlx">转载</span>
										<?php }elseif($article->Metas->zbpNana_wzlx==3) {  ?>
										<span class="tglx">投稿</span>
										<?php }else{  ?>
										<span class="yclx">原创</span>
										<?php } ?>
									</span>
									<a href="<?php zbpNana_wenzhanglaiyuan($article->ID) ?>" rel="nofollow" target="_blank"><?php zbpNana_wenzhangzuozhe($article->ID) ?></a>&nbsp;
							<?php } ?>
							<span class="date"><?php  echo $article->Time();  ?>&nbsp;</span>
							<span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span>
							<span class="comment">评论 <?php  echo $article->CommNums;  ?> 条</span>		
							<?php if ($user->ID>0) { ?><span class="edit"><a href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" rel="nofollow">编辑</a></span><?php } ?>
						</div>		
					</header><!-- .entry-header -->

						<?php if ($zbp->Config('zbpNana')->DisplayAd4=='1') { ?>
<div id="abcbt" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm4;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad4;  ?>
	<?php } ?>
</div>
<?php } ?>
						<div class="entry-content">
						<div class="single-content">
						<?php if ($zbp->Config('zbpNana')->wzzy_kg=='1') { ?>
						<?php if (($article->Intro)) { ?>
						<fieldset><legend><strong>摘要：</strong></legend><p><?php  echo $article->Intro;  ?></p></fieldset>
						<?php } ?>
						<?php } ?>						
						<?php  echo $article->Content;  ?>																	
						</div>
						<div class="clear"></div>
							<div class="single_banquan">	
								<strong>本文地址：</strong><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"  target="_blank"><?php  echo $article->Url;  ?></a><br/>
								<?php if ($article->Metas->zbpNana_wzlx==3) { ?>
									<strong>温馨提示：</strong>文章内容系作者个人观点，不代表<?php  echo $name;  ?>对观点赞同或支持。<br/>
									<strong>版权声明：</strong>本文为投稿文章，感谢&nbsp;<a href="<?php zbpNana_wenzhanglaiyuan($article->ID) ?>" target="_blank" rel="nofollow"><?php zbpNana_wenzhangzuozhe($article->ID) ?></a>&nbsp;的投稿，版权归原作者所有，欢迎分享本文，转载请保留出处！
								<?php }elseif($article->Metas->zbpNana_wzlx==2) {  ?>
									<strong>温馨提示：</strong>文章内容系作者个人观点，不代表<?php  echo $name;  ?>对观点赞同或支持。<br/>
									<strong>版权声明：</strong>本文为转载文章，来源于&nbsp;<a href="<?php zbpNana_wenzhanglaiyuan($article->ID) ?>" target="_blank" rel="nofollow"><?php zbpNana_wenzhangzuozhe($article->ID) ?></a>&nbsp;，版权归原作者所有，欢迎分享本文，转载请保留出处！
								<?php }else{  ?>
									<strong>版权声明：</strong>本文为原创文章，版权归&nbsp;<a href="<?php  echo $article->Author->Url;  ?>" target="_blank"><?php  echo $article->Author->StaticName;  ?></a>&nbsp;所有，欢迎分享本文，转载请保留出处！
								<?php } ?>
							</div>
<div class="clear"></div>
<?php  include $this->GetTemplate('social');  ?>					
<div class="clear"></div>
<div class="post-navigation">
<div class="post-previous">
<?php if ($article->Prev) { ?>
<a href="<?php  echo $article->Prev->Url;  ?>" rel="prev"><span>PREVIOUS:</span><?php  echo $article->Prev->Title;  ?></a> 
<?php }else{  ?>
<span>PREVIOUS:</span><a href="JavaScript:void(0)">已经是最后一篇了</a> 
<?php } ?>
</div>
<div class="post-next">
<?php if ($article->Next) { ?>
<a href="<?php  echo $article->Next->Url;  ?>" rel="next"><span>NEXT:</span><?php  echo $article->Next->Title;  ?></a> 
<?php }else{  ?>
<span>NEXT:</span><a href="JavaScript:void(0)">已经是最新一篇了</a> 
<?php } ?>
</div>
</div>
<nav class="nav-single-c"> 	
	<nav class="navigation post-navigation" role="navigation">		
		<h2 class="screen-reader-text">文章导航</h2>		
		<div class="nav-links">	
		<?php if ($article->Prev) { ?>
		<div class="nav-previous"> <a href="<?php  echo $article->Prev->Url;  ?>" rel="prev"><span class="meta-nav-r" aria-hidden="true"><i class="fas fa-angle-left"></i></span></a> </div>
		<?php } ?>
		<?php if ($article->Next) { ?>
		<div class="nav-next"> <a href="<?php  echo $article->Next->Url;  ?>" rel="next"><span class="meta-nav-l" aria-hidden="true"><i class="fas fa-angle-right"></i></span> </a> </div>
		<?php } ?>
		</div>	
	</nav>
</nav>
					</div><!-- .entry-content -->
				</article><!-- #post -->	
<?php if ($zbp->Config('zbpNana')->Displaytb2=='1') { ?>
	<?php  include $this->GetTemplate('taobao');  ?>
<?php } ?>				
<?php if ($zbp->Config('zbpNana')->DisplayAd5=='1') { ?>
<div id="abcxg" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm5;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad5;  ?>
	<?php } ?>
</div>
<?php } ?>
					
<?php if ($zbp->Config('zbpNana')->wzxg_kg=='1') { ?>
<?php if ($zbp->Config('zbpNana')->xgwzkps_kg=='1') { ?>
<div id="kpxgwz" class="line-one">
	<div class="cat-box">
		<div class="tit">
        <span class="name">相关文章</span>
            <span class="plxiaoshi"><span class="keyword">
            	<?php if (Count($article->Tags)>0) { ?>关键词：<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag"><?php  echo $tag->Name;  ?></a><?php }   ?><?php } ?>
            </span></span>
        </div>
			<div class="clear"></div>
			<div class="cat-site">
				<ul class="cat-one-list">
		<?php $i=0;$excludeid = $article->ID;$xgnum=$zbp->Config('zbpNana')->xgwz_num; ?>
		<?php  foreach ( GetList($xgnum,null,null,null,null,null,array('is_related'=>$article->ID)) as $articles) { ?>
<div class="cat-lists"><div class="item-st"><div class="thimg"><?php echo zbpNana_thumbnail($articles->ID,257,135,1); ?></div><p><a href="<?php  echo $articles->Url;  ?>"><?php  echo $articles->Title;  ?></a></p></div></div>
<?php $i+=1;$excludeid .= ',' . $articles->ID; ?>
<?php }   ?>
	<?php if ($i<$xgnum) { ?>
<?php $j=$xgnum-$i;
    $where = array(array('=','log_Status','0'),array('=','log_CateID',$article->Category->ID),array('not in','log_ID',$excludeid));
    $array = $zbp->GetArticleList(array('*'),$where,array('log_PostTime'=>'DESC'),array($j),''); ?>
    <?php  foreach ( $array as $articless ) { ?>
    <div class="cat-lists"><div class="item-st"><div class="thimg"><?php echo zbpNana_thumbnail($articless->ID,257,135,1); ?></div><p><a href="<?php  echo $articless->Url;  ?>"><?php  echo $articless->Title;  ?></a></p></div></div>
<?php }   ?>
	<?php } ?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>		
</div>
<?php }else{  ?>
<div class="tab-site">
	<div id="layout-tab">
		<div class="tit">
        <span class="name">相关文章</span>
            <span class="plxiaoshi"><span class="keyword">
            	关键词：<?php if (Count($article->Tags)>0) { ?><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag"><?php  echo $tag->Name;  ?></a><?php }   ?><?php } ?></span></span>
        </div>
		<ul class="tab-bd">
		<?php $i=0;$excludeid = $article->ID;$xgnum=$zbp->Config('zbpNana')->xgwz_num; ?>
		<?php  foreach ( GetList($xgnum,null,null,null,null,null,array('is_related'=>$article->ID)) as $articles) { ?>
	<li><span class="post_spliter">•</span><a href="<?php  echo $articles->Url;  ?>" target="_blank"><?php  echo $articles->Title;  ?></a></li>
	<?php $i+=1;$excludeid .= ',' . $articles->ID; ?>
<?php }   ?>
	<?php if ($i<$xgnum) { ?>
<?php $j=$xgnum-$i;zbpNana_wenzhangxgfl($excludeid,$article->Category->ID,$j); ?>
	<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>
<?php } ?>
	<?php if ($zbp->Config('zbpNana')->DisplayAd6=='1') { ?>
<div id="abcpl" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm6;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad6;  ?>
	<?php } ?>
</div>
<?php } ?>
	<div class="clear"></div>
<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php }else{  ?>
<p class="no-comments">评论已关闭！</p>
<?php } ?>