<?php die();?>
<ul class="msg" id="cmt{$comment.ID}">
	<li class="msgname"><img class="avatar" src="{$comment.Author.Avatar}" alt="" width="32"><span class="commentname"><a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank" class="mcolor">{$comment.Author.StaticName}</a></span><small>{$comment.Time()}</small><span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('{$comment.ID}')" title="回复该信息" class="reply">回复</a></span></li>
	<li class="msgarticle">{$comment.Content}
{foreach $comment.Comments as $comment}
{template:comment}
{/foreach}
	</li>
</ul>