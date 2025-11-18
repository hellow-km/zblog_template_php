{php}
$cate = $zbp->GetCategoryByName($breadName);

$articles = [];

if ($cate && $cate->ID > 0) {

$w = array(
array('=', 'log_CateID', $cate->ID) // 修正: 必须是二维数组
);

$articles = $zbp->GetArticleList(
'*',
$w,
array('log_PostTime' => 'DESC'),
10,
null
);
}
{/php}
<div class="white-con">
    <div class="dqwz">
        <span>当前位置：<a href="http://www.cwtstour.com/">主页</a> &gt; <a href="{$pathname}">{$breadName}</a> &gt; </span>
    </div>
    <div class="list-doc">
        <ul>
            {foreach $articles as $article}
            <li>
                <div class="img">
                    <a href="{$article.Url}" title="{$article.Title}"><img width="100%" src="/imgs/defaultpic.gif" alt="{$article.Title}"></a>
                </div>
                <div class="desc">
                    <h2><a class="link-a" href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h2>
                    <div class="info">
                        <span>时间：{$article.Time('Y-m-d H:i:s')}</span>
                        <span class="click">阅读：{$article.ViewNums}</span>
                    </div>
                    {$article.Intro}
                </div>
            </li>
            {/foreach}
        </ul>
    </div>

</div>


<style>
.white-con {
    background: #fff;
    padding: 26px 30px;
    margin-bottom: 20px;
    overflow: hidden;
}

.dqwz {
    height: 24px;
    line-height: 24px;
    color: #999;
    margin-bottom: 20px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}


.dqwz a {
    color: #999;
}

.list-doc {
    overflow: hidden;
}

.list-doc ul li {
    height: 120px;
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: solid 1px #eee;
    Position: relative;
}


.list-doc ul li .img {
    width: 180px;
    height: 120px;
    Position: absolute;
    left: 0;
    top: 0;
}

.list-doc ul li .desc {
    padding: 6px 0 0 210px;
}

.list-doc ul li .desc h2 {
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 24px;
    height: 24px;
    font-size: 18px;
    text-align: justify;
    overflow: hidden;
}

.list-doc ul li .desc .info {
    margin-bottom: 10px;
    line-height: 20px;
    height: 20px;
    overflow: hidden;
}

.list-doc ul li .desc .info span {
    color: #999;
    font-size: 12px;
    float: left;
    display: block;
    margin-right: 30px;
}

span.click {
    margin-right: 0;
}

.list-doc ul li .desc .info span {
    color: #999;
    font-size: 12px;
    float: left;
    display: block;
    margin-right: 30px;
}

.list-doc ul li .desc p {
    line-height: 24px;
    height: 48px;
    color: #999;
    font-size: 14px;
    text-align: justify;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
</style>