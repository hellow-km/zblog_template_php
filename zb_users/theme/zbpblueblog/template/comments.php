{if $socialcomment}
{$socialcomment}
{else}
<div id="commentlist">
	<h3 class="boxtitle">目前有{$article.CommNums} 条留言</h3>
	<label id="AjaxCommentBegin"></label>
	{foreach $comments as $key => $comment}
		{template:comment}
	{/foreach}
	<div class="pagenavi">
	{template:pagebar}
	</div>
	<label id="AjaxCommentEnd"></label>
</div>
{template:commentpost}
{/if}