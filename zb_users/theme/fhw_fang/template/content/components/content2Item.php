
{php}
// 获取该分类下最新 5 篇文章
$articles = $zbp->GetArticleList(
    '*', 
    array(array('=', 'log_CateID', $cat->ID)), // 条件：分类ID
    array('log_PostTime' => 'DESC'),           // 按时间降序
    8                                         // 数量
);
{/php}
<li class="content-item2">
    <div class="content-item2-box">
        <div class="index-head">
            <h2>{$cat.Name}</h2>
            <span class="index-head-more"><a class="link-a" href="/{$cat->Alias}">更多&gt;&gt;</a></span>
        </div>
        <div class="content-item2-messages">
            {foreach $articles as $article}
            {template:content/components/content2Item-message}
            {/foreach}
        </div>
    </div>
</li>

<style>
.content-item2 {
    width: 33.33%;
    float: left;
}

.content-item2-box {
    margin-left: 30px;
}

.content-item2-messages {
    overflow: hidden;
}

.content-item2-messages p {
    position: relative;
    height: 34px;
    line-height: 34px;
}

.content-item2-messages a {
    font-size: 16px;
    position: absolute;
    left: 0;
    top: 0;
    right: 85px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.content-item2-messages span {
    display: inline-block;
    float: right;
    color: #999;
    font-size: 13px;
}
</style>