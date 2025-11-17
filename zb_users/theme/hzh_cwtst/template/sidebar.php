

{php}
$cateName = "";

if ($breadName) {
    $cateName = $breadName;
} else if ($article && $article->Category) {
    $cateName = $article->Category->Name;
}

$cate = $zbp->GetCategoryByName($cateName);

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

<div class="head-nav">
    <h2>长春新闻网浏览月榜</h2>
</div>
<div class="side-keek">
    <ul>
        {foreach $articles as $i=>$a}
        <li>
            <span class="nums">{$i+1}</span>
            <h2><a class="link-a" href="{$a.Url}"
                    title="{$a.Title}">{$a.Title}</a>
            </h2>
        </li>
        {/foreach}
    </ul>
</div>


<style>
.head-nav {
    height: 40px;
    line-height: 40px;
    margin-bottom: 20px;
    border-bottom: solid 1px #ddd;
}

.head-nav h2 {
    float: left;
    font-size: 20px;
    font-weight: 800;
    height: 39px;
    border-bottom: solid 2px #ff5500;
    position: relative;
}

.head-nav:after {
    content: "";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}

.side-keek {
    overflow: hidden;
    text-align: justify;
}

.side-keek ul li {
    margin-bottom: 16px;
    Position: relative;
    padding-left: 30px;
}

.side-keek ul li:nth-child(1) span.nums {
    background: #ff5500;
}

.side-keek ul li:nth-child(2) span.nums {
    background: #ff5500;
}

.side-keek ul li:nth-child(3) span.nums {
    background: #ff5500;
}

.side-keek ul li span.nums {
    border-radius: 3px;
    background: #ddd;
    color: #fff;
    display: block;
    text-align: center;
    width: 20px;
    height: 20px;
    line-height: 20px;
    font-size: 12px;
    Position: absolute;
    left: 0;
    top: 2px;
}

.side-keek ul li h2 {
    font-weight: 500;
    line-height: 24px;
    font-size: 16px;
    text-align: justify;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>