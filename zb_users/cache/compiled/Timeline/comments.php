
<?php if ($socialcomment) { ?>
	<?php  echo $socialcomment;  ?>
<?php }else{  ?>
	<?php  include $this->GetTemplate('commentpost');  ?>
	<?php if ($article->CommNums>0) { ?>
<ul class="msg msghead">
	<li class="tbname"><span><?php  echo $article->CommNums;  ?></span>条留言<i></i></li>
</ul>
	<?php } ?>
<label id="AjaxCommentBegin"></label>
<!--评论输出-->
<?php if ($article->CommNums=="0") { ?><div class="nomsg">暂无留言，快抢沙发！</div><?php } ?>
<?php  foreach ( $comments as $key => $comment) { ?>
<?php  include $this->GetTemplate('comment');  ?>
<?php }   ?>
<!--评论翻页条输出-->
<div class="pages">
<?php  include $this->GetTemplate('pagebar');  ?>
</div>
<label id="AjaxCommentEnd"></label>
<?php } ?>