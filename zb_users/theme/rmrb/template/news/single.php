<div class="white-con">
    <div class="dqwz">
        <span>当前位置：<a href="/">主页</a> &gt;  {if $article && $article->Category}
                <a href="/{$article.Category.Alias}">{$article.Category.Name}</a> &gt;
            {/if}  <a
                href="/">{$article.Title}</a></span>
    </div>
    <div class="arcticle-head">
        <h1>{$article.Title}</h1>
        <div class="word-info">
            <span>{$article.Time('Y-m-d H:i:s')} </span><i>/</i>
            <span>来源：<a href="/">网络转载</a></span><i>/</i>
            <span>阅读：{$article.ViewNums}</span>
        </div>
    </div>

    <div class="article-body">
        {$article.Content}

    </div>

       <div class="sxp">
        <p class="pre">
            上一篇：
            {if  $article.Prev}
                <a href="{$article.Prev.Url}">{$article.Prev.Title}</a>
            {else}
                没有了
            {/if}
        </p>
        <p class="next">
            下一篇：
            {if  $article.Next}
                <a href="{$article.Next.Url}">{$article.Next.Title}</a>
            {else}
                没有了
            {/if}
        </p>
    </div>

    <div class="article-copy">
        <p>免责声明：长春新闻网是长春市最具有新闻权威性的新闻门户网站，本篇内容来自于网络，不为其真实性负责，只为传播网络信息为目的，非商业用途，如有异议请及时联系btr2031@163.com，长春新闻网的作者将予以删除。
        </p>
    </div>

</div>

{template:news/suggest}

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

.arcticle-head {
    overflow: hidden;
    text-align: justify;
    border-bottom: solid 1px #ccc;
    margin-bottom: 20px;
}

.arcticle-head h1 {
    line-height: 38px;
    font-size: 28px;
    color: #333;
    margin-bottom: 10px;
}

.word-info {
    line-height: 24px;
    font-size: 14px;
    color: #999;
    overflow: hidden;
    margin-bottom: 20px;
}

.word-info span {
    display: block;
    float: left;
}

.word-info i {
    display: block;
    float: left;
    padding: 0 10px;
    font-style: normal;
}

.article-body {
    text-align: justify;
    line-height: 28px;
    font-size: 15px;
    color: #555;
}

.sxp {
    line-height: 28px;
    overflow: hidden;
    margin-bottom: 40px;
}

.sxp p {
    font-size: 16px;
    width: 48%;
    float: left;
    height: 28px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: #555;
}

.sxp p a {
    color: #555;
}

.sxp p.next {
    float: right;
    text-align: right;
}

.article-copy {
    margin-bottom: 0px;
    padding: 16px 20px;
    background: #f5f5f5;
    color: #666;
    font-size: 13px;
    line-height: 22px;
    border-radius: 6px;
}
</style>