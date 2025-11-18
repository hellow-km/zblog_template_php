{php}
// 获取热度排行前 10 的文章
$w = array(); // 条件为空表示所有文章
$hotArticles = $zbp->GetArticleList(
'*', // 字段
$w, // 条件
array('log_ViewNums' => 'DESC'), // 按阅读量降序
10, // 数量
null // 分页
);
{/php}

<div class="index-top">
    <div class="index-top-box">
        <div class="top-leftbox">
            <img src="/imgs/defaultpic.gif" width="100%" height="395" alt="">
        </div>
        <div class="top-rightbox">
            <div class="week-click-one">
                <h2><a class="link-a" href="{$hotArticles[0].Url}"
                        title="{$hotArticles[0].Title}">{$hotArticles[0].Title}</a></h2>
                <p>{$hotArticles[0].Title}<a href="{$hotArticles[0].Url}">详细&gt;&gt;</a></p>
            </div>
            <div class="week-click-two">
                <ul>

                    {foreach $hotArticles as $i => $article}
                    {if $i>0}
                    {template:content/components/index-top-message}
                    {/if}
                    {/foreach}

                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.index-top {
    overflow: hidden;
    margin-bottom: 20px;
    background: #fff;
    padding: 30px;
    height: 489px;
    box-sizing: border-box;
}

.index-top-box {
    display: flex;
    min-height: 395px;
}

.top-leftbox {
    width: 680px;

}

.top-rightbox {
    width: 420px;
    margin-left: auto;
}

.week-click-two ul li span {
    display: inline-block;
    color: #ff5500;
    width: 40px;
}

.week-click-two ul li {
    position: relative;
    font-size: 16px;
    height: 34px;
    line-height: 34px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    align-items: center;
}

.week-click-one {
    overflow: hidden;
    border-bottom: solid 1px #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.week-click-one h2 {
    margin-bottom: 10px;
    font-size: 24px;
    line-height: 34px;
    height: 34px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.week-click-one p {
    line-height: 24px;
    height: 48px;
    color: #999;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.week-click-one p a {
    color: #ff5500;
    padding-left: 10px;
}
</style>