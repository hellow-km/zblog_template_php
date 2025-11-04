
<?php  include $this->GetTemplate('header');  ?>
	<div id="content" class="site-content">
	<?php if ($zbp->Config('zbpNana')->DisplayAd1=='1') { ?>
<div id="abcdh" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm1;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad1;  ?>
	<?php } ?>
</div>
<?php } ?>
<div id="contentab">
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php if ($zbp->Config('zbpNana')->hdpsz_kg=='1') { ?>
				<?php if ($type=='index'&&$page=='1') { ?> 
		<?php  include $this->GetTemplate('slider');  ?>
			<?php } ?>
				<?php } ?>
		<!-- 最新文章代码 -->
<?php if ($zbp->Config('zbpNana')->cms_zxwz_kg=='1') { ?>
		<?php  include $this->GetTemplate('new_post');  ?>
<?php } ?>
		<div class="clear"></div>		
<?php if ($zbp->Config('zbpNana')->Displaytb1=='1') { ?>
	<?php  include $this->GetTemplate('taobao');  ?>
<?php } ?>
		<!-- 双栏开始 -->
<?php if ($zbp->Config('zbpNana')->cms_slwz_kg=='1') { ?>
	<div class="line-big">
		<?php $slflid=$zbp->Config('zbpNana')->cms_slwz_flid;$arrayids = explode(',',$slflid); ?>
		<?php  foreach ( $arrayids as $dira) { ?>
		<div class="xl3 xm3">
		<?php $dirsa=(int)$dira;$slxhnum=$zbp->Config('zbpNana')->cms_slwz_num; ?>
<?php  foreach ( getlist($slxhnum,$dirsa) as $key=>$articlea) { ?>
<?php  $i=$key;  ?>
<?php if ($i==0) { ?>
			<div class="cat-box">
				<h3 class="cat-title"><span class="syfl"><?php  echo $articlea->Category->Name;  ?></span><span class="catmore"><a href="<?php  echo $articlea->Category->Url;  ?>" title="更多<?php  echo $articlea->Category->Name;  ?>文章">More></a></span></h3>
				<div class="clear"></div>
				<div class="cat-site">
					<div class="item"> 
					<?php echo zbpNana_thumbnail($articlea->ID,550,200,1); ?>
<div style="z-index: 1;"> 			
<span class="txt"><a href="<?php  echo $articlea->Url;  ?>" title="<?php  echo $articlea->Title;  ?>"><?php  echo $articlea->Title;  ?></a></span>
<span class="txt-bg"></span>
</div>
		 
	</div>
					<div class="clear"></div>
					<ul class="cat-list">
						<?php }else{  ?>		
						<span class="list-date"><?php  echo $articlea->Time('m/d');  ?></span>						
						<li class="list-title"><a href="<?php  echo $articlea->Url;  ?>" title="<?php  echo $articlea->Title;  ?>"><?php  echo trim(SubStrUTF8(TransferHTML($articlea->Title,'[nohtml]'),50));  ?></a></li>	
						<?php } ?>							
	<?php }   ?>				
					</ul>

				</div>
			</div>
		</div>
		<?php }   ?>
		<div class="clear"></div>
	</div>
	<?php } ?>
	<!-- 双栏结束 -->
	<!-- 单栏开始 -->
<?php if ($zbp->Config('zbpNana')->cms_dlwz_kg=='1') { ?>
	<?php $dlflid=$zbp->Config('zbpNana')->cms_dlwz_flid;$arrayid = explode(',',$dlflid); ?>
	<?php  foreach ( $arrayid as $dir) { ?>
	<div class="line-one">
	<?php $dirs=(int)$dir;$dlxhnum=$zbp->Config('zbpNana')->cms_dlwz_num; ?>
	<?php  foreach ( getlist($dlxhnum,$dirs) as $key=>$article) { ?>
	<?php  $i=$key;  ?>
	<?php if ($i==0) { ?>
		<div class="cat-box">
			<h3 class="cat-title"><span class="syfl"><?php  echo $article->Category->Name;  ?></span><span class="catmore"><a href="<?php  echo $article->Category->Url;  ?>" title="更多<?php  echo $article->Category->Name;  ?>文章">More></a></span></h3>
			<div class="clear"></div>
			<div class="cat-site">

					<div class="cat-dt">
						<figure class="line-one-thumbnail">		
						<?php echo zbpNana_thumbnail($article->ID,371,247,1); ?>					
						</figure>
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h2>		
						</header><!-- .entry-header -->
						<div class="entry-content">	
							<div class="archive-content">			 				
								<?php if (strlen($article->Intro)>0) { ?>
				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...'; ?>
				<?php }else{  ?>
				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),90)).'...'; ?>
			<?php } ?>
			<?php  echo $intro;  ?>
							</div>
							<div class="archive-tag">
								<span class="date"><?php  echo $article->Time('Y-m-d');  ?></span>
								<span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span><?php if (Count($article->Tags)>0) { ?><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag"><?php  echo $tag->Name;  ?></a><?php }   ?><?php } ?></div>
							<div class="clear"></div>
						</div><!-- .entry-content -->
					</div>
				<?php }else{  ?>
				<div class="cat-lists">						
					<div class="item-st"> 
						<div class="thimg">
							<?php if (($zbp->Config('zbpNana')->cebianlanbj == '3') ) { ?>
							<?php echo zbpNana_thumbnail($article->ID,327,150,1); ?>
							<?php }else{  ?>
							<?php echo zbpNana_thumbnail($article->ID,227,135,1); ?>
							<?php } ?>
						</div>
						<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a> </h3>						
						<div class="pricebtn"><span class="archive-tag">
								<span class="date"><?php  echo $article->Time('Y-m-d');  ?></span>
								<span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span></span>
						</div>
					</div>												
				</div>							
				<?php } ?>							
				<?php }   ?>
			<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>	
	</div>	
<?php }   ?>
<!-- 单栏结束 -->
<?php } ?>
		<div class="clear"></div>			
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php if (($zbp->Config('zbpNana')->cebianlanbj !== '3') ) { ?>
<div id="sidebar" class="widget-area">	
<?php  include $this->GetTemplate('sidebar');  ?>	
</div>
<?php } ?>
</div>
<div class="clear"></div>
	</div><!-- .site-content -->		
<?php  include $this->GetTemplate('footer');  ?>