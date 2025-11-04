<?php  /* Template Name:搜索页面 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<article>
	<div class="content">
    	<div class="abox searchbox">
			<h2 class="atitle"><?php  echo $article->Title;  ?>的结果</h2>
<?php  echo $article->Content;  ?>
<?php if (!empty($tag)) { ?>
<?php } ?>
<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php } ?>
		</div>
	</div>
</article>
<?php  include $this->GetTemplate('footer');  ?>