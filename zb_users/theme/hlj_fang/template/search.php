{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}

    {template:header_search}
</head>


<body>

    <div class="container-fluid uc-search">
        <div class="container select">
            <form class="form-horizontal clearfix" name="search" method="post"
                action="{$host}zb_system/cmd.php?act=search">
                <div class="select-search clearfix pull-left">
                    <input id="search-input" type="text" name="q" value="" class="form-control pull-left search-target"
                        placeholder="请输入关键词">
                    <img id="search-img" class="pull-left" src="/images/search.png" alt="搜索">

                    <strong class="search-remove pull-left">×</strong>
                </div>
                <!-- <span id="search-senior" class="pull-left">高级搜索</span> -->
            </form>
            <script>
            document.getElementById('search-img').addEventListener("click", function() {
                document.forms['search'].submit();
            });
            </script>
        </div>

        <div class="container result-head">
            <div class="result-head-cont clearfix">
                <h3 class="pull-left">搜索结果</h3>
                <p id="search-about" class="pull-right" style="display: block;">
                    找到关于“<span class="search-red" id="omission">搜索</span>”的新闻大约<span class="search-red"
                        id="news-number">{$pagebar.AllCount}</span>条
                </p>
            </div>
        </div>


        <ul class="container search-result">
            {foreach $articles as $a}
            <li><a target="_blank" href="{$a.Url}">
                    <h2>{$a.Title}</h2>
                    <div class="search-content">
                        <p>{$a.Time("Y年m月")}，{$a.Intro}
                        </p>
                    </div>
                    <div class="corner clearfix"><span class="pull-right">{$a.Time("Y年m月d日")}</span><span
                            class="pull-right"></span>
                    </div>
                </a></li>
            {/foreach}
        </ul>
        {if $pagebar}
        <div style="text-align: center;">
            <ul class="pagination">


                {foreach $pagebar.buttons as $k=>$v}
                {if $k != "‹‹" && $k != "››" && $k != "›" && $k != "‹"}
                {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
                <li class="active"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
                {else}
                <li class="pointer-cursor"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
                {/if}
                {/if}
                {/foreach}



            </ul>
        </div>
        {/if}
    </div>
</body>



</html>