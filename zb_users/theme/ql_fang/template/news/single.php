<div class="section-cnt wrapper clearfix">
    <!-- 标题 -->
    <div class="section-cnt-tit clearfix">
        <h1> {$article.Title}</h1>
        <div class="info">
            <p class="resource">来源：<span>{$article->Category.Name}</span></p>
            <p class="author">作者：<span>{$article->Author??$article->Author.Name}</span></p>
            <p class="time">{$article.Time('Y-m-d h:m:s')}</p>
        </div>
        <!-- end标题 -->
        <!-- 分享 -->
        <div class="share_baidu">
            <div class="bdsharebuttonbox bdshare-button-style1-16" data-bd-bind="1471314420174">
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <!-- <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a> -->
                <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网" style="display: none;"></a>
                <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博" style="display: none;"></a>
                <!-- <a href="#" class="bds_more" data-cmd="more"></a> -->
            </div>
            <script>
            window._bd_share_config = {
                "common": {
                    "bdSnsKey": {},
                    "bdText": "",
                    "bdMini": "2",
                    "bdMiniList": false,
                    "bdPic": "",
                    "bdStyle": "1",
                    "bdSize": "16"
                },
                "share": {}
            };
            with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src =
                'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() /
                    36e5)];
            </script>
        </div>
        <!-- end分享 -->
    </div>
    <!-- end标题 -->
    <!-- 左侧 -->
    <div class="col-main">
        <!-- 文章主体 -->
        <div class="article-main">
            <!--old ad area-->
            <div class="clear"></div>
            <div class="clear"></div>
            {$article.Content}

        </div>
        <!-- end文章主体 -->
        <div class="article-sub">
            <!-- iframe -->
            <div class="iframe-wrap">
                <script type="text/javascript">
                (function() {
                    document.write(unescape('%3Cdiv id="bdcsFrameBox"%3E%3C/div%3E'));
                    var bdcs = document.createElement("script");
                    bdcs.type = "text/javascript";
                    bdcs.async = true;
                    bdcs.src = "http://znsv.baidu.com/customer_search/api/rs?sid=2576961992730276856" +
                        "&plate_url=" + encodeURIComponent(window.location.href) + "&t=" + Math.ceil(new Date() /
                            3600000);
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(bdcs, s);
                })();
                </script>
                <div id="bdcsFrameBox"></div>
            </div>
            <!-- end iframe -->
            <!-- 为您推荐 -->
            <div class="mod-reco">
                <div class="tit-sub">
                    <h2><i></i><a href="" title="" target="_blank">为您推荐</a></h2>
                </div>
                <div class="news-pic-a">
                    {php}
                    if(isset($category)){
                    $w = array(
                    array('=', 'log_CateID', $category->ID) // 修正: 必须是二维数组
                    );
                    }else{

                    $w = array(
                    array('=', 'log_CateID', $article->Category->ID) // 修正: 必须是二维数组
                    );
                    }


                    // 获取随机文章，例如 5 篇
                    $randArticles = $zbp->GetArticleList(
                    '*', // 获取全部字段
                    $w, // 条件为空表示所有文章
                    array('RAND()' => ''), // 随机排序
                    9 // 数量
                    );

                    $hasArticles =false;
                    if (isset($randArticles) && is_array($randArticles) && count($randArticles) > 0) {
                    $hasArticles = true;
                    } else {
                    $hasArticles = false;
                    }

                    {/php}
                    {foreach $randArticles as $rand}
                    <div class="news-pic-item">
                        <dl>
                            <dt><a href="{$rand.Url}" title="{$rand.Title}" target="_blank"><img
                                        src="https://img12.iqilu.com/10339/sucaiku/compress/202511/15/d3d46ef1a97e4fdc8b7abda865f1f350.png"
                                        alt="{$rand.Title}"></a></dt>
                            <dd>
                                <h3><a href="{$rand.Url}" title="{$rand.Title}" target="_blank">{$rand.Title}</a></h3>
                            </dd>
                            <dd><a href="{$rand.Url}" target="_blank">[详细]</a>
                            </dd>
                            <dd class="info">
                                <span class="resource">{$rand->Category.Name}</span>
                                <span class="time">{$rand.Time("Y:m:d")}</span>
                            </dd>
                        </dl>
                    </div>
                    {/foreach}
                    <div class="other">
                        <a href="javascript:;" class="more">查看更多</a>
                    </div>
                </div>
            </div>
            <!-- end为您推荐 -->

        </div>
    </div>
    <!-- end左侧 -->
    <!-- 右侧 -->
    {template:sidebar}
    <!-- end右侧 -->
</div>