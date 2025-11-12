<h3 class="boxtitle">发表留言</h3>
<div class="comment-form" id="comment">	
	{if $user.ID>0}<div class="item">登录用户：{$user.StaticName}</div>{/if}
	<form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}">
		<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
		<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
		{if $user.ID>0}
		<input type="hidden" name="inpName" id="inpName" value="{$user.Name}" />
		<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
		<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
		{else}
        <div class="item">
			<label for="name">昵称 (必填)</label>
			<input type="text" name="inpName" id="inpName" class="text" value="{$user.Name}" tabindex="1"/>
		</div>
		<div class="item">
			<label for="email">邮箱 (必填)</label>
			<input type="text" name="inpEmail" id="inpEmail" class="text" value="{$user.Email}" tabindex="2"/>
		</div>
		<div class="item">
			<label for="website">网址</label>
			<input type="text" name="inpHomePage" id="inpHomePage" class="text" value="{$user.HomePage}" tabindex="3"/>
		</div>
		{if $option['ZC_COMMENT_VERIFY_ENABLE']}
		<div class="item">
			<label for="verify">验证码（必填)</label>
			<div class="verify">
				<input type="text" name="inpVerify" id="inpVerify" class="text" value="" size="28" tabindex="4" />
				<img src="{$article.ValidCodeUrl}" alt="验证码" title="点击刷新验证码" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();"/>
			</div>
		</div>
		{/if}
		{/if}
        <div class="item">
			<label for="message">评论内容</label>
			<textarea id="txaArticle" class="text" name="txaArticle" tabindex="5" rows="8" cols="50"></textarea>
		</div>
		<div class="item">
			<input type="submit" name="submit" class="submit" tabindex="6" onclick="return zbp.comment.post()" value="提交评论"/>
			<a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;">取消回复</a>
		</div>
	</form>
</div>