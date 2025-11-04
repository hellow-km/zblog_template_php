
<?php if ($socialcomment) { ?>
<?php  echo $socialcomment;  ?>
<?php }else{  ?>
<?php 
    if ($option['ZC_COMMENT_REVERSE_ORDER']=='1') {
        $where = array(array('=', 'comm_LogID', $article->ID),array('=', 'comm_RootID','0'),array('=', 'comm_IsChecking', 0));
        $_comments = $zbp->GetCommentList('*',$where,null,null,null);
        $commentsRootSum = count($_comments)+1;
    } else {
        $commentsRootSum = 0;
    }
 ?>
<div id="commentszbplk" class="commentszbp-area">
<?php  include $this->GetTemplate('commentpost');  ?>
</div>
<label id="AjaxCommentBegin"></label>
<?php if ($article->CommNums>0) { ?>
<div id="commentszbplb" class="commentszbp-area">
<h3 id="pinglunliebiao">评论列表</h3>
<ol class="commentzpb-list">
<?php  foreach ( $comments as $key => $comment) { ?>
<?php  $commentRootFloor=abs($comment->FloorID-$commentsRootSum);  ?>
<?php  include $this->GetTemplate('comment');  ?>
<?php }   ?>
</ol>
</div>
<?php  include $this->GetTemplate('pagebar');  ?>
<label id="AjaxCommentEnd"></label>
	<?php }else{  ?>
	<div id="commentszbpmy" class="commentszbp-area">
		<h3 id="meiyoupinglun">还没有留言，还不快点抢沙发？</h3>
	</div>
	<?php } ?>	
<?php } ?>