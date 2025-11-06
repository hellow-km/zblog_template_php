<ol>
	<li id="cmt{$comment.ID}">
		<figure class="avatar">
			<img alt="{$comment.Author.StaticName}" src="{$comment.Author.Avatar}"/>
		</figure>
		<div class="info">
			<div class="name">网友<a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>留言：</div>
			<time>{$comment.Time()}</time>
			<div class="replay"><a href="javascript:void(0);" onclick="zbp.comment.reply('{$comment.ID}')">回复该留言</a></div>
			<div class="text">
				{$comment.Content}
			</div>
		</div>
		{foreach $comment.Comments as $comment}
		{template:comment}
		{/foreach}
	</li>
</ol>