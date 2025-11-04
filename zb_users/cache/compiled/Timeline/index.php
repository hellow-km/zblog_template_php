<?php  /* Template Name:首页和列表 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<article>
	<div class="content">
  		<?php if ($type=='index'&&$page=='1') { ?>
		<div class="plist">
			<?php  foreach ( GetList(3,$zbp->Config('Timeline')->homepcid, null, null, null, null, array("has_subcate"  => true)) as $toparticle) { ?>
			<?php  include $this->GetTemplate('picget');  ?>
			<figure>
				<h4><a href="<?php  echo $toparticle->Url;  ?>" title="<?php  echo $toparticle->Title;  ?>" target="_blank" ><img src="<?php  echo $topp;  ?>"><span><?php  echo $toparticle->Time('Y-m-d');  ?></span></a></h4>
				<p><a href="<?php  echo $toparticle->Url;  ?>" title="<?php  echo $toparticle->Title;  ?>" target="_blank" ><?php  echo $toparticle->Title;  ?></a></p>
				<figcaption><?php $description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($toparticle->Intro,'[nohtml]'),56)).'...'); ?><?php  echo $description;  ?></figcaption>
			</figure>
			<?php }   ?>
		</div>
		<?php }else{  ?>
		<div class="pagenow listnav"><a href="<?php  echo $host;  ?>"><?php  echo $name;  ?></a><?php if ($type=='category') { ?><?php if ($category->Parent) { ?><span>&gt;</span><a href="<?php  echo $category->Parent->Url;  ?>"><?php  echo $category->Parent->Name;  ?></a><?php } ?><span>&gt;</span><a href="<?php  echo $category->Url;  ?>"><?php  echo $category->Name;  ?></a><?php } ?><?php if ($type=='author'||$type=='tag'||$type=='date') { ?><span>&gt;</span><?php  echo $title;  ?><?php } ?><?php if ($page>'1') { ?><span>&gt;</span>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></div>
		<?php } ?>
		<ul class="mainlist">
<?php  foreach ( $articles as $article) { ?>
<?php  include $this->GetTemplate('picget');  ?>
<?php if ($article->IsTop) { ?>
			<li class="up">
				<time class="ctime"><span><?php  echo $article->Time('m-d');  ?></span> <span><?php  echo $article->Time('Y');  ?></span></time>
				<div class="cdot"></div>
				<div class="cbox" data-scroll-reveal="enter right over 1s">
					<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank" ><?php  echo $article->Title;  ?></a></h3>
					<div class="des">
						<span class="pic"><a href="<?php  echo $article->Url;  ?>" target="_blank" title="<?php  echo $article->Title;  ?>"><img src="<?php  echo $temp;  ?>"></a></span>
						<p><?php $description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),132)).'...'); ?><?php  echo $description;  ?><br><a href="<?php  echo $article->Url;  ?>" target="_blank" class="readmore">阅读全文&hellip;</a><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag" class="tags"><?php  echo $tag->Name;  ?></a><?php }   ?></p>
					</div>
				</div>
			</li>
<?php }else{  ?>
			<li>
				<time class="ctime"><span><?php  echo $article->Time('m-d');  ?></span> <span><?php  echo $article->Time('Y');  ?></span></time>
				<div class="cdot"></div>
				<div class="cbox" data-scroll-reveal="enter right over 1s">
					<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank" ><?php  echo $article->Title;  ?></a></h3>
					<div class="des">
						<span class="pic"><a href="<?php  echo $article->Url;  ?>" target="_blank" title="<?php  echo $article->Title;  ?>"><img src="<?php  echo $temp;  ?>"></a></span>
						<p><?php $description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),132)).'...'); ?><?php  echo $description;  ?><br><a href="<?php  echo $article->Url;  ?>" target="_blank" class="readmore">阅读全文&hellip;</a><?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" rel="tag" class="tags"><?php  echo $tag->Name;  ?></a><?php }   ?></p>
					</div>
				</div>
			</li>
<?php } ?>
<?php }   ?>
		</ul>
		<div class="pages"><?php  include $this->GetTemplate('pagebar');  ?></div>
	</div>
</article>
<?php  include $this->GetTemplate('footer');  ?>