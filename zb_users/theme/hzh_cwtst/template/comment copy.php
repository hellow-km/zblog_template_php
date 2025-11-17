{* Template Name:单条评论 *}


<ul style="position: relative;" class="msg {if $comment.ParentID!=0}msg-review{/if}" id="cmt{$comment.ID}">
    <li class="msgname">
        <div class="user-info">
            <img class="avatar" src="{$comment.Author.Avatar}" alt="" width="32" />&nbsp;
            <span class="commentname">
                <a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>
            </span>
            <div class="commit-time">
                <small>{$lang['default']['comment_post_on']}{$comment.Time()} </small>
            </div>
            <div class="opt-box">
                {if $user.ID==$comment.AuthorID}
                <form action="{$host}zb_system/cmd.php?act=CommentDel&id={$comment.ID}" method="post"
                    style="display:inline;">
                    <input type="hidden" name="csrfToken" value="{$zbp->GetCSRFToken()}">
                    <input type="submit" class="a-link" value="删除" onclick="return confirm('确定删除这条评论吗？');" />
                </form>
                {/if}
                <span class="revertcomment">
                    <a class="a-link" href="#comment" onclick="(function(){
                        document.getElementById('cancel-reply').style.display = 'inline-block'
                        document.getElementById('commit-replyName').innerText = '{$comment.Author.StaticName}'
                    })();zbp.comment.reply('{$comment.ID}')">回复</a>
                </span>
            </div>
        </div>
        <div class="msgarticle">
            {$comment.Content}
        </div>

    </li>
    {foreach $comment.Comments as $comment}
    {template:comment}
    {/foreach}
</ul>