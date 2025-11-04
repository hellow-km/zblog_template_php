<?php die();?>
{if $socialcomment}
	{$socialcomment}
{else}
	{template:commentpost}
	{if $article.CommNums>0}
<ul class="msg msghead">
	<li class="tbname"><span>{$article.CommNums}</span>条留言<i></i></li>
</ul>
	{/if}
<label id="AjaxCommentBegin"></label>
<!--评论输出-->
{if $article.CommNums=="0"}<div class="nomsg">暂无留言，快抢沙发！</div>{/if}
{foreach $comments as $key => $comment}
{template:comment}
{/foreach}
<!--评论翻页条输出-->
<div class="pages">
{template:pagebar}
</div>
<label id="AjaxCommentEnd"></label>
{/if}