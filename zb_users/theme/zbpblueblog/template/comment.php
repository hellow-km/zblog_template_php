<ol>
	<li id="cmt{$comment.ID}">
	    <figure class="avatar">
			<img alt="{$comment.Author.StaticName}" src="{$comment.Author.Avatar}"/>
		</figure>
		<div class="info">
			<div class="name">
				<a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a> 说：
			</div>
			<div class="replay">
				{$comment.Time()} <a href="javascript:void(0);" onclick="zbp.comment.reply('{$comment.ID}')">回复</a>
			</div>
			<div class="text">{$comment.Content}</div>
		</div>
		{foreach $comment.Comments as $comment}
		{template:comment}
		{/foreach}
	</li>
</ol>