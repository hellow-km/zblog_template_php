<article>
	<div class="content">
    	<div class="abox">
			<h2 class="atitle"><?php  echo $article->Title;  ?></h2>
<?php  echo $article->Content;  ?>
<?php if (!empty($tag)) { ?>
<?php } ?>
<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php } ?>
		</div>
	</div>
</article>
