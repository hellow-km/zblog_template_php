{* Template Name:列表页单条置顶文章 *}
<div class="acticle-list-item">
    <a class="acticle-item-info" href="{$article.Url}">
        <div class="info-head">
            <div class="info-title">{$article.Title}</div>
            <div class="info-time">{$article.Time()}</div>
        </div>
        <div class="info-content">{$article.Intro}</div>
        <div class="info-desc">
            <div class="desc-item">作者:{$article.Author.StaticName}</div>
            <div class="desc-item">预览:{$article.ViewNums}</div>
            <div class="desc-item">评论:{$article.CommNums}</div>
            <div class="desc-item">
                {if count($article.Tags)>0}
                <span>标签：</span>
                {/if}
                {foreach $article.Tags as $i => $tag}
                {$tag.Name}
                {if count($article.Tags) >$i}
                <small>,</small>
                {/if}
                {/foreach}

            </div>
        </div>
    </a>
</div>