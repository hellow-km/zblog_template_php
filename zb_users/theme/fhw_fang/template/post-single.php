<div id="content">
    <div id="article-zone-a" class="layout-zone-2">
        <div class="side-left">
            <div class="lastest-magazine comBox">
                <p class="navRight"></p>
                <h4>本期杂志</h4>
                <div class="cover pr">
                    <a href="/magazine/520.html" title="2025年22期"><img src="/images/ttt.png" title="2025年22期封面"></a>
                </div>
                <p class="magaInfo">
                    <a href="/magazine/520.html" title="2025年22期">南风窗 2025年 第 22 期</a> <br>
                    <a href="/magazine/520.html" title="2025年22期">出版时间：2025-10-20</a>
                </p>
                <div class="clear"></div>
            </div>
            <div class="current-article comBox">
                <h4>本期文章</h4>
                <ul>
                    {php}
                    // 获取随机文章，例如 5 篇
                    $randArticles = $zbp->GetArticleList(
                    '*', // 获取全部字段
                    array(), // 条件为空表示所有文章
                    array('RAND()' => ''), // 随机排序
                    2 // 数量
                    );

                    $hasArticles =false;
                    if (isset($randArticles) && is_array($randArticles) && count($randArticles) > 0) {
                    $hasArticles = true;
                    } else {
                    $hasArticles = false;
                    }

                    {/php}

                    {foreach $randArticles as $a}
                    <li>
                        <h5><a href="{$a.Url}" title="{$a.Title}">{$a.Title}</a></h5>
                        <h6>{if $a.Author}
                            {$a.Author.Name}
                            {/if}</h6>
                        <p><a href="{$a.Url}" title="{$a.Title}">{$a.Intro}</a></p>
                        <span class="date icon_triangle">{$a.Time('Y-m-d')}</span>
                        <div class="clear"></div>
                    </li>
                    {/foreach}
                </ul>
            </div>
            <div id="w0" class="comBox">
                <h4><a href="#">微信：SouthReviews</a></h4>
                <div class="content">
                    <img src="/assets/fba50f49/images/wx150t.jpg" alt="微信：SouthReviews"
                        rel="/assets/fba50f49/images/wx150.jpg">
                </div>
            </div>
        </div>
        <div class="side-right">
            <div class="article-content-box">
                <h3 class="subject">{$article.Title}</h3>
                <div class="intro">
                    <p><span style="font-family:'宋体';"><span style="font-family:'宋体';"></span><span
                                style="font-family:'宋体';">{$article.Intro}</span></span><br>
                    </p>
                </div>
                <div class="info">
                    <span class="author">
                        作者：{if $article.Author}
                        {$article.Author.Name}
                        {/if}</span>
                    <span class="author"></span>
                    <span class="author">
                        日期：{$article.Time('Y-m-d')}</span>
                </div>
                <div class="content">
                    {$article.Content}
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>