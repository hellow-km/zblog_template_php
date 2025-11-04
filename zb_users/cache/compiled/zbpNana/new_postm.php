
<?php $cmszxwznum=$zbp->Config('zbpNana')->cms_zxwz_num; ?>
<div id="post_list_box" class="border_gray">
<?php  foreach ( getlist($cmszxwznum) as $keyd=>$article) { ?>	
<article id="post-<?php  echo $article->ID;  ?>" class="archive-list">
		<figure class="thumbnail">	
<?php echo zbpNana_thumbnail($article->ID,270,180,1); ?>								
		</figure>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h2>		
		</header><!-- .entry-header -->
		<div class="entry-content">
			<span class="entry-meta">
				<span class="post_cat"><a href="<?php  echo $article->Category->Url;  ?>" target="_blank" rel="category tag"><?php  echo $article->Category->Name;  ?></a></span>
				<span class="post_spliter">•</span>
			<span class="date" title="<?php  echo $article->Time('Y/m/d H:i');  ?>"><?php echo zbpNana_timeago($article->Time()); ?></span>			
			</span>		
			
			<div class="archive-content">			
			<?php if (strlen($article->Intro)>0) { ?>
				<?php $introd= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),80)).'...'; ?>
				<?php }else{  ?>
				<?php $introd= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),90)).'...'; ?>
			<?php } ?>
			<?php  echo $introd;  ?>
			</div>
			<div class="archive-tag"><span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span><?php if (Count($article->Tags)>0) { ?><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag"><?php  echo $tag->Name;  ?></a><?php }   ?><?php } ?></div>
			<div class="clear"></div>
		</div><!-- .entry-content -->
	</article><!-- #post -->

 	<!-- ad -->
<?php  $i=$keyd;  ?>
<?php if ($i==0) { ?>
<?php if ($zbp->Config('zbpNana')->DisplayAd2=='1') { ?>
<div id="abclbo" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm2;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad2;  ?>
	<?php } ?>
</div>
<?php } ?>
<?php } ?>
		<?php if ($i==4) { ?>
		<?php if ($zbp->Config('zbpNana')->DisplayAd3=='1') { ?>
<div id="abclbt" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm3;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad3;  ?>
	<?php } ?>
</div>
<?php } ?>
			<?php } ?>
	<!-- end: ad -->
	<?php }   ?>	
</div>