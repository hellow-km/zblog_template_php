<div class="breadcrumbs">您的位置：<a href="/">南风窗网</a>
    » <span>{if $category} {$category.Name} {else} 首页{/if}</span>
</div>
<div id="content">
    <!-- a区 -->
    <div id="category-zone-a" class="layout-zone-3">
        <div class="side-left">
            <div class="hotArticleBox comBox">
                <h4>热门文章</h4>
                <div class="list">
                    <ul class="tab tab_month_view" style="display: block;">

                        {php}
                        $hotInCate = array();
                        if( $category){ // 判断对象存在
                        $cateId = $category->ID;
                        $hotInCate = GetList(
                        10,
                        $cateId,
                        null,
                        null,
                        null,
                        array('log_ViewCount' => 'DESC')
                        );
                        }else{
                        $hotInCate=$articles;
                        }
                        {/php}
                        {foreach $hotInCate as $a}
                        <li><a href="{$a.Url}" title="标题：{$a.Title}, 时间：{$a.Time('Y-m-d')}">{$a.Title}</a>
                        </li>
                        {/foreach}
                    </ul>
                    <div class="tabsNav">
                        <a href="javascript:void(0);" rel="tab_month_view" title="月点击" class="current">月点击</a>&nbsp;
                        <a href="javascript:void(0);" rel="tab_quarter_view" title="季点击">季点击</a>&nbsp;
                    </div>
                </div>
            </div>
            <div id="w0" class="comBox">
                <h4><a href="#">微信：SouthReviews</a></h4>
                <div class="content">
                    <img src="/images/wx150t.jpg" alt="微信：SouthReviews" rel="/images/wx150.jpg"
                        style="display: inline;">
                </div>
            </div>
        </div>
        <div class="side-center">

            <div class="category-header">
                <h3><a href="/rss/category.html?id=10" title="RSS订阅">
                        {if $category} {$category.Name} {else} 首页{/if}</a></h3>
            </div>
            <div class="category-article-box">
                <div id="w1" class="list-view" style="position: relative;">

                    {foreach $articles as $a}

                    <div data-key="9490">
                        <div class="article-items">
                            <h5>
                                <a href="{$a.Url}" title="{$a.Title}">{$a.Title}</a>
                                <span class="author">{$a.Author.Name}</span>
                            </h5>
                            <div>
                                <a href="{$a.Url}" title="{$a.Title}">{$a.Intro}</a>
                            </div>
                            <div class="date">{$a.Time('Y-m-d')}</div>
                        </div>
                    </div>
                    {/foreach}

                    {template:pagebar}
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="side-right">
            <div class="lastest-magazine comBox">
                <p class="navRight"></p>
                <h4>最新杂志</h4>
                <div class="cover pr">
                    <a href="/magazine/521.html" title="2025年23期"><img src="/images/ttt.png" title="2025年23期封面"></a>
                </div>
                <p class="magaInfo">
                    <a href="/magazine/521.html" title="2025年23期">南风窗 2025年 第 23 期</a> <br>
                    <a href="/magazine/521.html" title="2025年23期">出版时间：2025-11-03</a>
                </p>
                <div class="clear"></div>
            </div>
            {php}
            $latest = array();
            if( $category){
            $cateId = $category->ID; // 当前分类ID
            $latest = GetList(10, $cateId);
            }else{
            $latest=$articles;
            }
            {/php}


            <div class="current-article comBox">
                <h4>最新文章</h4>
                <ul>
                    {foreach $latest as $a}
                    <li>
                        <h5><a href="{$a.Url}" title="{$a.Title}">{$a.Title}</a></h5>
                        <h6>{$a.Author.Name}</h6>
                        <p><a href="{$a.Url}" title="{$a.Title}">{$a.Intro}</a></p>
                        <span class="date icon_triangle">{$a.Time('Y-m-d')}</span>
                        <div class="clear"></div>
                    </li>

                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>