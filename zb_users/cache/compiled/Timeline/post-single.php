<article>
	<div class="content">
    	<div class="abox">
			<h2 class="atitle"><span><?php  echo $article->Time('Y-m-d');  ?></span><?php  echo $article->Title;  ?></h2>
			<div class="pagenow"><a href="<?php  echo $host;  ?>">首页</a><?php if ($article->Category->Parent) { ?><span>&gt;</span><a href="<?php  echo $article->Category->Parent->Url;  ?>"><?php  echo $article->Category->Parent->Name;  ?></a><?php } ?><span>&gt;</span><a href="<?php  echo $article->Category->Url;  ?>"><?php  echo $article->Category->Name;  ?></a><span>&gt;</span><a href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a><span class="data" title="评论/浏览">[<?php  echo $article->CommNums;  ?>/<?php  echo $article->ViewNums;  ?>]</span></div>
<?php  echo $article->Content;  ?>
<?php if (!empty($tag)) { ?>
			<div class="tags">
			    <span>本文关键字</span>：<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank"><?php  echo $tag->Name;  ?></a><?php }   ?>  
			</div>
<?php } ?>
			<div class="pnext">
				<?php if ($article->Prev) { ?><p>上一篇：<a href="<?php  echo $article->Prev->Url;  ?>"><?php  echo $article->Prev->Title;  ?></a></p><?php } ?>
				<?php if ($article->Next) { ?><p>下一篇：<a href="<?php  echo $article->Next->Url;  ?>"><?php  echo $article->Next->Title;  ?></a></p><?php }else{  ?>
				<p>下一篇：没有了，<a href="<?php  echo $article->Category->Url;  ?>">返回<?php  echo $article->Category->Name;  ?></a></p>
				<?php } ?>
			</div>
			<div class="relist">
				<h3>相关文章</h3>
				<ul>
				<?php  foreach ( GetList(10,$article->Category->ID) as $relarticle) { ?>
					<li><a href="<?php  echo $relarticle->Url;  ?>" title="<?php  echo $relarticle->Title;  ?>"><?php  echo $relarticle->Title;  ?></a></li>
				<?php }   ?>
				</ul>
			</div>
<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php } ?>
		</div>
	</div>
</article>
