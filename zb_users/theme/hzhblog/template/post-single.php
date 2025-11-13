{* Template Name:文章页文章内容 *}
<!-- <div class="post single">
    <h2 class="post-title">{$article.Title}<span class="post-date">{$article.Time()}</span></h2>
    <div class="post-body">{$article.Content}</div>
    <p class="post-tags">
        {if count($article.Tags)>0}{$lang['msg']['tags']}:{foreach $article.Tags as $i => $tag}&nbsp;<a
            href='{$tag.Url}' title='{$tag.Name}'>{$tag.Name}</a>&nbsp;{if count($article.Tags) >
        $i}<small>,</small>{/if}{/foreach}
    </p>
    <p class="post-footer">
        {$lang['msg']['author']}:{$article.Author.StaticName} <small>|</small>
        {$lang['msg']['category']}:{$article.Category.Name} <small>|</small>
        {$lang['default']['view']}:{$article.ViewNums} <small>|</small> {$lang['msg']['comment']}:{$article.CommNums}
    </p>
</div> -->
<div class="article-detail-page">
    <div class="article-detail-title">{$article.Title}</div>
    <div class="article-detail-info">
        <div class="detail-info-detail">
            <div class="detail-info-detail-flex">
                <div class="info-detail-author">作者:{$article.Author.StaticName}</div>
                <div class="info-detail-item info-detail-time">{$article.Time()}</div>
            </div>
            <div class="detail-info-detail-flex">
                <div class="info-detail-item">
                    浏览:{$article.ViewNums}
                </div>
            </div>
            <div class="detail-info-detail-flex">
                <div class="info-detail-item">
                    评论:{$article.CommNums}
                </div>
            </div>
        </div>
        <div class="detail-info-tags">
            {if count($article.Tags)>0}标签:{foreach $article.Tags as $i => $tag}
            &nbsp;<a href='{$tag.Url}' style="color: #357abd;" title='{$tag.Name}'>{$tag.Name}</a>&nbsp;
            {if count($article.Tags) >$i}
            <small>,</small>
            {/if}
            {/foreach}
            {/if}
        </div>
    </div>
    <!-- <div>{$article.IsLock}</div> -->
    <div class="article-context">{$article.Content}</div>
</div>
{template:comments}
<!-- {if $article.IsLock==0}

{/if} -->