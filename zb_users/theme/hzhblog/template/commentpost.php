{* Template Name:评论发布框 *}
<div class="post" id="divCommentPost">
    <p class="posttop"><a name="comment">{if $user.ID>0}{$user.StaticName}{/if}:</a><a class="a-link" rel="nofollow"
            style="display: none;" id="cancel-reply" href="#divCommentPost"><small>取消回复<span
                    id="commit-replyName"></span></small></a></p>
    <form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}">
        <input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
        <input type="hidden" name="inpRevID" id="inpRevID" value="0" />
        {if $user.ID>0}
        <input type="hidden" name="inpName" id="inpName" value="{$user.StaticName}" />
        <input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
        <input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
        {else}
        <p><input type="text" name="inpName" id="inpName" class="text" value="{$user.StaticName}" size="28"
                tabindex="1" /> <label for="inpName">{$lang['msg']['name']}(*)</label></p>
        <p><input type="text" name="inpEmail" id="inpEmail" class="text" value="{$user.Email}" size="28" tabindex="2" />
            <label for="inpEmail">{$lang['msg']['email']}</label>
        </p>
        <p><input type="text" name="inpHomePage" id="inpHomePage" class="text" value="{$user.HomePage}" size="28"
                tabindex="3" /> <label for="inpHomePage">{$lang['msg']['homepage']}</label></p>
        {template:commentpost-verify}
        {/if}
        <p style="display:none;"><label for="txaArticle">{$lang['msg']['content']}(*)</label></p>
        <p><textarea class="common-textarea" name="txaArticle" id="txaArticle" class="text" cols="100" rows="4"
                tabindex="5"></textarea></p>
        <p><input style="margin-top: 15px;" name="sumbit" type="submit" tabindex="6" value="提交"
                onclick="$('.msg').hide();zbp.comment.post();location.reload();" class="prm-btn" /></p>
        <input type="hidden" name="BackUrl" value="{$article.Url}?a=1">
    </form>
    <div id="comment"></div>
    <p class="postbottom">{$lang['default']['reply_notice']}</p>
</div>