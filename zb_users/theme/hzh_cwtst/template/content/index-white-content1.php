{php}
$cate = $zbp->GetCategoryByID($cat->ID);

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

<div class="index-white-bg">
    <div class="index-head">
        <h2>{$cat->Name}</h2>
        <span class="index-head-more"><a class="link-a" href="/{$cat->Alias}">更多&gt;&gt;</a></span>
    </div>
    <div class="index-img-more">
        <ul>
            {foreach $articles as $a}
            <li>
                <div class="index-img-more-once">
                    <div class="index-img-more-once-imgbox">
                        <img src="/imgs/defaultpic.gif" height="180" width="262" alt="">
                    </div>
                    <h2><a href="{$a.Url}">{$a.Title}</a></h2>
                    <div class="li-intro"><span>简介</span>{$a.Intro}</div>

                </div>
            </li>
            {/foreach}
        </ul>
    </div>
</div>
<style>
.index-img-more ul li {
    cursor: pointer;

}

.index-img-more ul li:hover a {
    color: #ff5500;

}

.index-img-more ul li .li-intro {
    display: flex;
    align-items: baseline;
}

.index-img-more ul li .li-intro p {
    height: auto;
}

.index-img-more ul li .li-intro>span {
    margin-right: 15px;
    font-size: 13px;
    display: inline-block;
    position: relative;
    height: 20px;
    line-height: 20px;
    padding: 0 6px;
    background: #ff5500;
    color: #fff;
}


.index-img-more ul li .li-intro>span:after {
    content: '';
    position: absolute;
    right: -4px;
    top: 50%;
    margin-top: -6px;
    border-left: 6px solid #ff5500;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}
</style>