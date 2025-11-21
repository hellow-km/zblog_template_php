<div class="head-nav">
    <h2>长春新闻网最新资讯</h2>
</div>
<div class="sidex-img-big">
    {if isset($articles) &&$articles&&$articles[0]}
    <a href="{$articles[0].Url}" title="{$articles[0].Title}"><img src="/imgs/defaultpic.gif">
        <p>{$articles[0].Title}</p>
    </a>
    {/if}
</div>

<div class="side-text-list">

    <ul>
        {foreach $articles as $i=>$a}
        {if $i>0}
        <li>
            <p><a class="link-a" href="{$a.Url}" title="{$a.Title}">{$a.Title}</a></p>
        </li>
        {/if}
        {/foreach}
    </ul>
</div>


<style>
.sidex-img-big {
    overflow: hidden;
    text-align: justify;
    Position: relative;
    margin-bottom: 20px;
}

.sidex-img-big img {
    width: 100%;
    height: 200px;
}

.sidex-img-big p {
    background: rgba(0, 0, 0, 0.6);
    padding: 0 20px;
    color: #fff;
    height: 40px;
    line-height: 40px;
    Position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.side-text-list {
    overflow: hidden;
}

.side-text-list ul li {
    font-size: 16px;
    height: 34px;
    line-height: 34px;
    Position: relative;
}

.side-text-list ul li:before {
    content: '';
    position: absolute;
    left: -2px;
    top: 50%;
    margin-top: -6px;
    border-left: 6px solid #ccc;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}

.side-text-list ul li p {
    padding-left: 20px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>