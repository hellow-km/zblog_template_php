<div class="content">
    <div id="mainWrapper" class="wrapper clearfix">
        <div class="main-content fl">
            <div class="news-content clearfix">
                <div class="news-nav">
                    <div class="nav-list">
                        <div class="list-content">
                            <ul>
                                {php}
                                // 获取所有分类
                                $allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
                                {/php}


                                <li><a href="/" data-chname="homepage" data-catid="0">推荐</a></li>
                                {foreach $allCategories as $cate}
                                <li><a href="{$cate.Url}">{$cate.Name}</a></li>

                                {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="news-main">
                    <div class="news-slider">
                        <div class="tempWrap" style="overflow:hidden; position:relative; width:660px">
                            <ul class="slider-list"
                                style="width: 3960px; left: -1980px; position: relative; overflow: hidden; padding: 0px; margin: 0px;">
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/489aaa2436ced565123d0cdd791aa0d6.jpg">
                                        <div class="news-title">露营，正在书写桂林山水间的新故事</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5driffb1a772b8f255be.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/5a76e15e84897622f10f5565b68987f9.jpg">
                                        <div class="news-title">预计年内建成通车！广西多条高速最新进展→</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri4e8a59ccf2b02888.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/5a85c38ad663f4b4a159721de9dc4748.jpg">
                                        <div class="news-title">寒潮入桂！有霜冻！广西迎9级大风+降温+降雨！</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dribe82317d06e4be00.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/4766575a010b5f91105f6a65137056e9.png">
                                        <div class="news-title">现场不设停车位！2025桂林漓江徒步大会请乘坐官方接驳车往返</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5drif6ce0c2d9557ff3c.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/e69f4fe8e03ba067b8530ffcb20fedb7.png">
                                        <div class="news-title">多所高校官宣：压学分、减“水课”！</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri6d6ee9f0f076c885.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/a7abf33c715ad26f06fd4f3af6a7d4eb.jpg">
                                        <div class="news-title">乘专列“一票通游” 广西推出五大精品旅游专列线路</div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <ul class="slider-index">
                            <li class="">1</li>
                            <li class="">2</li>
                            <li class="">3</li>
                            <li class="on">4</li>
                            <li class="">5</li>
                            <li class="">6</li>
                        </ul>
                        <a class="prev-btn">上一张</a>
                        <a class="next-btn">下一张</a>
                    </div>
                    <script>
                    jQuery(function($) {
                        var $slider = $(".news-slider .slider-list");
                        var $li = $slider.find("li");
                        var index = 0;
                        var count = $li.length;
                        var width = $li.outerWidth();

                        function showSlide(i) {
                            $slider.stop().animate({
                                left: -i * width
                            }, 500);
                            $(".slider-index li").removeClass("on").eq(i).addClass("on");
                        }

                        var timer = setInterval(function() {
                            index = (index + 1) % count;
                            showSlide(index);
                        }, 3000);

                        $(".prev-btn").click(function() {
                            index = (index - 1 + count) % count;
                            showSlide(index);
                        });
                        $(".next-btn").click(function() {
                            index = (index + 1) % count;
                            showSlide(index);
                        });

                        $(".slider-index li").click(function() {
                            index = $(this).index();
                            showSlide(index);
                        });
                    });
                    </script>
                    <div class="news-list">
                        <ul id="newsListContainer">
                            {foreach $articles as $a}
                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="{$a.Url}" target="_self">{$a.Title}</a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">话题</span>
                                        <span class="post-date">{$a.Time('Y-m-d')}</span>

                                    </div>
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                        <div class="load-more">
                            <a class="load-btn"><span>加载更多</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-content">
            <div class="ad-item" id="AD510"><iframe id="glshw_ad_iframe_80028" name="glshw_ad_iframe_80028"
                    src="about:blank" width="320" height="200" align="center,center" vspace="0" hspace="0"
                    marginwidth="0" marginheight="0" scrolling="no" frameborder="0"
                    style="border:0;vertical-align:bottom;margin:0;width:320px;height:200px"
                    allowtransparency="true"></iframe></div>

            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">视频</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh13e782fc786f6151.html"
                                title="2025桂林马拉松半马男子组冠军诞生，是来自山东的27岁小伙王佩林"
                                target="_blank">2025桂林马拉松半马男子组冠军诞生，是来自山东的27岁小伙王佩林</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drhfd447106030f4a41.html"
                                title="当马拉松遇上桂林最美季节！在桂花香里奔跑，在山水间相遇，实在太浪漫啦~"
                                target="_blank">当马拉松遇上桂林最美季节！在桂花香里奔跑，在山水间相遇，实在太浪漫啦~</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh6fd7a0b6737c4208.html"
                                title="广西人能歌善舞不是说说而已！2025桂林马拉松现场，观众载歌载舞为运动员加油"
                                target="_blank">广西人能歌善舞不是说说而已！2025桂林马拉松现场，观众载歌载舞为运动员加油</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh169f03dc5315945d.html"
                                title="大喇叭都用上了！桂林马拉松志愿者卖力加油，情绪价值拉满！隔着屏幕都能感受到热情"
                                target="_blank">大喇叭都用上了！桂林马拉松志愿者卖力加油，情绪价值拉满！隔着屏幕都能感受到热情</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh3c8b0fc6fafe716c.html"
                                title="桂林市民在马拉松沿途热情为参赛选手加油助威" target="_blank">桂林市民在马拉松沿途热情为参赛选手加油助威</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">话题</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                title="一对情侣庆祝纪念日，小伙扭头亲吻女友头发被点燃，当事人回应：只烧焦一点，目前已理发"
                                target="_blank">一对情侣庆祝纪念日，小伙扭头亲吻女友头发被点燃，当事人回应：只烧焦一点，目前已理发</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dric12d0a7e50f0d7a9.html"
                                title="弟弟无民事行为能力，大姐照顾13年转走135万元，被俩妹妹告上法庭……"
                                target="_blank">弟弟无民事行为能力，大姐照顾13年转走135万元，被俩妹妹告上法庭……</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dri2795eb29517c745c.html"
                                title="一头野猪“跳桥寻短见”？目击者：它看到桥两头都有车，受惊吓坠桥"
                                target="_blank">一头野猪“跳桥寻短见”？目击者：它看到桥两头都有车，受惊吓坠桥</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                title="结婚8年妻子花光116万积蓄，其中67万打赏男主播，丈夫痛哭：不爱了，她耐不住寂寞，妻子：上头了；平台回应"
                                target="_blank">结婚8年妻子花光116万积蓄，其中67万打赏男主播，丈夫痛哭：不爱了，她耐不住寂寞，妻子：上头了；平台回应</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dricebbb69c60a08385.html"
                                title="广州一女子在商场厕所被纸巾盒铁片划伤臀部，商场：正处理，会考虑加以改进"
                                target="_blank">广州一女子在商场厕所被纸巾盒铁片划伤臀部，商场：正处理，会考虑加以改进</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ad_baidu_news_001"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953898",
                container: "ad_baidu_news_001",
                async: true
            });
            </script>
            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">直播</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10061" title="直播：第十四届桂林永福福寿节颁奖暨大型综合文艺晚会"
                                target="_blank">直播：第十四届桂林永福福寿节颁奖暨大型综合文艺晚会</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10060" title="秋收稻浪" target="_blank">秋收稻浪</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10059" title="2025桂林桂花生活节"
                                target="_blank">2025桂林桂花生活节</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10058"
                                title="直播：“高质量完成‘十四五’规划”系列主题新闻发布会（第四场）"
                                target="_blank">直播：“高质量完成‘十四五’规划”系列主题新闻发布会（第四场）</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10057" title="“桃花林中的民族”“红瑶”晒衣节"
                                target="_blank">“桃花林中的民族”“红瑶”晒衣节</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">专题</div>
                </div>
                <div class="list-content">
                    <ul>

                        <li>
                            <a href="/special/jwmsxf.html" title="讲文明树新风" target="_blank">讲文明树新风</a>
                        </li>

                        <li>
                            <a href="/special/esjszqh.html" title="学习贯彻党的二十届四中全会精神" target="_blank">学习贯彻党的二十届四中全会精神</a>
                        </li>

                        <li>
                            <a href="/special/chongyang2025.html" title="2025年网络中国节·重阳"
                                target="_blank">2025年网络中国节·重阳</a>
                        </li>

                        <li>
                            <a href="/special/guilinfestival2025.html" title="2025年桂林艺术节" target="_blank">2025年桂林艺术节</a>
                        </li>

                        <li>
                            <a href="/special/wlzgjzq2025.html" title="2025年网络中国节·中秋" target="_blank">2025年网络中国节·中秋</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="ad_baidu_news_002"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953899",
                container: "ad_baidu_news_002",
                async: true
            });
            </script>
            <!-- 广告位：AD511新闻内容页方块位下 -->
            <!--<div class="ad-item" id="AD511"></div>-->


            <div class="news-rank-list talk">
                <div class="list-header clearfix">
                    <div class="list-title">24小时热闻</div>
                </div>
                <div class="list-content">
                    <ul>
                        {foreach $articles as $a}
                        <li><a href="{$a.Url}" target="_blank" title="{$a.Title}">{$a.Title}</a>
                        </li>
                        {/foreach}

                    </ul>
                </div>
            </div>
            <div class="media-list">
                <div class="list-header">全媒体平台</div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//m.guilinlife.com/appdown/index.html" target="_blank" class="app">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林生活网客户端</div>
                            </a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/m/3g/index.html" target="_blank" class="touch">
                                <div class="media-icon"></div>
                                <div class="media-name">手机触屏版</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&amp;__biz=MzAwNjUyODc4MA==&amp;scene=124#wechat_redirect"
                                target="_blank" class="wx">
                                <div class="media-icon"></div>
                                <img src="//assets.glshimg.com/home/2021/img/qrcode_wx.png">
                                <div class="media-name">官方微信</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="wxxcx">
                                <div class="media-icon"></div>
                                <div class="media-name">官方小程序</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://weibo.com/glshw" target="_blank" class="wb">
                                <div class="media-icon"></div>
                                <img src="//assets.glshimg.com/home/2021/img/qrcode_wb.png">
                                <div class="media-name">官方微博</div>
                            </a>
                        </li>
                        <li>
                            <a href="//bbs.guilinlife.com/" target="_blank" class="bbs">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林人论坛</div>
                            </a>
                        </li>
                        <li>
                            <a href="//epaper.guilinlife.com/glrbpc/" target="_blank" class="glrb">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林日报</div>
                            </a>
                        </li>
                        <li>
                            <a href="//epaper.guilinlife.com/glwbpc/" target="_blank" class="glwb">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林晚报</div>
                            </a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/m/3g/index.html" target="_blank" class="paper">
                                <div class="media-icon"></div>
                                <div class="media-name">手机看报</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ad_baidu_news_004"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953911",
                container: "ad_baidu_news_004",
                async: true
            });
            </script>
            <div class="ad_baidu_news_005"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6954398",
                container: "ad_baidu_news_005",
                async: true
            });
            </script>


        </div>
    </div>

</div>