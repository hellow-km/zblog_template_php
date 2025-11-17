{php}
// 获取随机文章，例如 5 篇
$randArticles = $zbp->GetArticleList(
    '*',                    // 获取全部字段
    array(),                 // 条件为空表示所有文章
    array('RAND()' => ''),   // 随机排序
    9                       // 数量
);

$hasArticles =false;
if (isset($randArticles) && is_array($randArticles) && count($randArticles) > 0) {
    $hasArticles = true;
} else {
    $hasArticles = false;
}

{/php}

<div class="white-con">
    {if $hasArticles}
    <div class="head-nav">
        <h2>长春新闻网推荐浏览</h2>
    </div>
    <div id="tagdeadfd62b2eb1dbfd19139abbce6a38a">
        <div class="big-news">
            <a class="link-a" href="{$randArticles[0].Url}">
                <img src="/imgs/defaultpic.gif">
                <div class="desc">
                    <h2>{$randArticles[0].Title}</h2>
                    <div class="info">
                        <span>时间：{$randArticles[0].Time('Y-m-d')}</span>
                        <span class="click">阅读：{$randArticles[0].ViewNums}</span>
                    </div>
                    <div class="desc-intro">{$randArticles[0].Intro}</div>
                </div>
            </a>
        </div>
    </div>

    <div class="about-list">
        <ul>
            <div id="tage0854fef3fb3c70ce63b34ca00a759f6">
                {foreach $randArticles as $i=>$a}
                {if $i>0}
                <li>
                    <div class="box">
                        <p><a class="link-a" href="{$a.Url}" title="{$a.Title}＂">{$a.Title}</a></p>
                    </div>
                </li>
                {/if}
                {/foreach}
            </div>

        </ul>
    </div>
    {/if}
</div>

<style>
.big-news {
    margin-bottom: 20px;
    Position: relative;
    height: 160px;
}

.big-news img {
    width: 240px;
    height: 160px;
    position: absolute;
    left: 0;
    top: 0;
}

.big-news .desc {

    padding: 7px 0 0 270px;
}

.big-news .desc h2 {
    margin-bottom: 10px;
    height: 30px;
    line-height: 30px;
    overflow: hidden;
    font-size: 20px;
}
.desc-intro{
    max-height: 70px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.big-news .desc .info {
    height: 24px;
    line-height: 24px;
    overflow: hidden;
    margin-bottom: 10px;
}

.big-news .desc .info span {
    display: block;
    float: left;
    margin-right: 30px;
    color: #999;
}

.big-news .desc .info span.click {
    margin: 0;
}

.big-news .desc p {
    height: 72px;
    line-height: 24px;
    color: #999;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.about-list {
    overflow: hidden;
}

.about-list ul {
    margin-left: -40px;
}

.about-list ul li {
    width: 50%;
    float: left;
}

.about-list ul li .box {
    margin-left: 40px;
    height: 34px;
    line-height: 34px;
    Position: relative;
}

.about-list ul li .box:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    margin-top: -3px;
    height: 6px;
    width: 6px;
    border-radius: 100%;
    background: #ccc;
}

.about-list ul li p {
    font-size: 16px;
    padding-left: 20px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>