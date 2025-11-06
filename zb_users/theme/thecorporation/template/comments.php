{if $socialcomment}
{$socialcomment}
{else}
<div id="commentlist">
	<h2 class="boxTitle"><span>{$article.CommNums}</span> 评论</h2>
	<label id="AjaxCommentBegin"></label>
	{foreach $comments as $key => $comment}
		{template:comment}
	{/foreach}
	<div id="pagenavi">
	{template:pagebar}
	</div>
	<label id="AjaxCommentEnd"></label>
</div>
{template:commentpost}
{/if}