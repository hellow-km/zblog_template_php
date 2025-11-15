{* Template Name:文章页文章内容 *}

<div id="article-detail-page" class="article-detail-page">
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
            &nbsp;<a href='{$tag.Url}' style="color: #357abd;" title='{$tag.Name}'>
                <el-tag>{$tag.Name}</el-tag>
            </a>&nbsp;
            {if count($article.Tags) >$i}
            {/if}
            {/foreach}
            {/if}
        </div>
    </div>
    <!-- <div>{$article.IsLock}</div> -->
    <div class="article-context">{$article.Content}</div>
</div>

{if $article.IsLock==0}
{template:comments}
{/if}

<script type="module">
new Vue({
    el: ".article-detail-page",
})
</script>