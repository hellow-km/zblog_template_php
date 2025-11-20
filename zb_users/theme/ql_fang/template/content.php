<div class="wrapper">
    <div class="ad1000x90">
        <div style="overflow:hidden;max-height:90px" name="PHPADM_MULTIADS" imp="5:5" time="3">
            <script type="text/javascript" src="https://g3.iqilu.com/static_files/multiads/32/smultiads_32.js"></script>
        </div>
    </div>
    <div class="header">
        <div class="logo">
            <a href="https://news.iqilu.com/" target="_self" title="齐鲁网新闻频道">
                <img src="/images/news_logo.jpg" alt="齐鲁网新闻频道">
            </a>
        </div>
    </div>
</div>
<div class="wrapper">
    <!-- 幻灯上部通栏 start -->
    <div class="mod-headline-added wrapper">
        <div class="mod-headline-title">
            {if $articles[0]}
            <h2><a href="{$articles[0].Url}" title="{$articles[0].Title}" target="_self"
                    style="">{$articles[0].Title}</a>
            </h2>
            {/if}

        </div>
        <div class="mod-headline-box">
            <ul class="news-list type-c clearfix">
                {foreach $articles as $i=>$a}
                {if $i<=5} <li class="first-item">
                    <a href="{$a.Url}" title="{$a.Title}" target="_self" style="">{$a.Title}</a>
                    </li>
                    {/if}
                    {/foreach}
            </ul>
        </div>
    </div>
    <!-- 幻灯上部通栏 end -->
    <div class="section1" style="width:1000px;margin: 30px auto;">
        <div class="col-a-right fl">
            <ul class="pic-text">
                <li style="display: none;">
                    <a href="https://sdxw.iqilu.com/w/article/YS0yMS0xNjg4MTQxNg.html"
                        title="“鸳鸯锅 潮汐树 红地毯” 360度全景飞行看遍黄河口" target="_self" class="palybox">
                        <img src="https://img11.iqilu.com/21/2025/11/18/5f58156d5c3944ae8138fba98b790f11.png" alt="">
                        <img src="https://file.iqilu.com/custom/new/v2019/shouye/images/icon-play.png" alt=""
                            class="paly_btn">
                        <p>“鸳鸯锅 潮汐树 红地毯” 360度全景飞行看遍黄河口</p>
                    </a>
                </li>
                <li style="display: none;">
                    <a href="https://news.iqilu.com/shandong/yuanchuang/2025/1118/5868885.shtml"
                        title="济南芦南村：从“瘌痢头”到“网红村”的绿色逆袭" target="_self" class="palybox">
                        <img src="https://img11.iqilu.com/21/2025/11/18/ab9074f6c6aa437c8c68a8a9947961b3.png" alt="">
                        <img src="https://file.iqilu.com/custom/new/v2019/shouye/images/icon-play.png" alt=""
                            class="paly_btn">
                        <p>济南芦南村：从“瘌痢头”到“网红村”的绿色逆袭</p>
                    </a>
                </li>
                <li style="display: none;">
                    <a href="https://sdxw.iqilu.com/w/article/YS0yMS0xNjg4MjM0Ng.html" title="双向奔赴的信任！这座城市把观鸟体验做到极致"
                        target="_self" class="palybox">
                        <img src="https://img11.iqilu.com/21/2025/11/18/978255e4a8f7433382df36529814fed8.png" alt="">
                        <img src="https://file.iqilu.com/custom/new/v2019/shouye/images/icon-play.png" alt=""
                            class="paly_btn">
                        <p>双向奔赴的信任！这座城市把观鸟体验做到极致</p>
                    </a>
                </li>
                <li style="display: block;">
                    <a href="https://sdxw.iqilu.com/w/article/YS0yMS0xNjg4MjM1MA.html" title="山东有多美丨初冬藏暖意 崮云湖上流光驻"
                        target="_self" class="palybox">
                        <img src="https://img11.iqilu.com/21/2025/11/18/b6fd514b9568499ca796eeb2fe0e2b95.png" alt="">
                        <img src="https://file.iqilu.com/custom/new/v2019/shouye/images/icon-play.png" alt=""
                            class="paly_btn">
                        <p>山东有多美丨初冬藏暖意 崮云湖上流光驻</p>
                    </a>
                </li>

            </ul>
            <div class="pagination"><span class="pagination-switch"></span><span class="pagination-switch"></span><span
                    class="pagination-switch"></span><span class="pagination-switch active-switch"></span>
            </div>
        </div>
        <div class="col-b-left fr">
            {foreach $articles as $i=>$a}
            {if $i<=2} <h3 class="artitle-title-list" style="font-size:px;overflow:hidden"><a href="{$a.Url}"
                    title="{$a.Title}" target="_self">{$a.Title}</a></h3>
                {/if}
                {/foreach}
        </div>
    </div>
    <div class="section1 clearfix">
        <div class="col-lft">
            <div class="row-news">
                {php}
                $cateName = "长春新闻"; // 分类名称
                $cate = $zbp->GetCategoryByName($cateName);

                $where = array(
                array('=','log_CateID', $cate->ID)
                );

                $arts = $zbp->GetArticleList(
                '*',
                $where,
                array('log_PostTime'=>'DESC'),
                array(10),
                null
                );
                {/php}
                <div class="row-title">
                    <h3><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h3>
                </div>
                <ul>
                    {foreach $arts as $a}
                    <li>
                        <a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a>
                    </li>
                    {/foreach}
                </ul>

            </div>
        </div>
        <div class="col-rgt">
            <!-- 幻灯 -->
            <!-- 幻灯end -->
            <div class="ad450x60">
                <div style="overflow:hidden;height:60px" name="PHPADM_MULTIADS" imp="5:5" time="3">
                    <script type="text/javascript" src="https://g3.iqilu.com/static_files/multiads/36/smultiads_36.js">
                    </script>
                </div>
            </div>
            {php}
            $cateName = "长春房产"; // 分类名称
            $cate = $zbp->GetCategoryByName($cateName);

            $where = array(
            array('=','log_CateID', $cate->ID)
            );

            $arts = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime'=>'DESC'),
            array(10),
            null
            );
            {/php}
            <!-- 山东要闻 -->
            <div class="row-news fs14">
                <h2><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h2>
                <ul class="fs14">
                    {foreach $arts as $a}
                    <li><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
                    {/foreach}
                </ul>
            </div>
            <!-- end  山东要闻 -->
        </div>
    </div>
    <div class="ad1000x90">
        <div style="overflow:hidden;height:90px" name="PHPADM_MULTIADS" imp="5:5" time="3">
            <script type="text/javascript" src="https://g3.iqilu.com/static_files/multiads/33/dmultiads_33.js"></script>
        </div>
    </div>
    <div class="section2 clearfix">
        <div class="col-lft">
            {php}
            $cateName = "长春经济"; // 分类名称
            $cate = $zbp->GetCategoryByName($cateName);

            $where = array(
            array('=','log_CateID', $cate->ID)
            );

            $arts = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime'=>'DESC'),
            array(10),
            null
            );
            {/php}
            <div class="row-news">
                <div class="row-title">
                    <h3><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h3>
                </div>
                <ul>
                    {foreach $arts as $a}
                    <li><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="col-rgt">
            {php}
            $cateName = "长春旅游"; // 分类名称
            $cate = $zbp->GetCategoryByName($cateName);

            $where = array(
            array('=','log_CateID', $cate->ID)
            );

            $arts = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime'=>'DESC'),
            array(10),
            null
            );
            {/php}
            <!--齐鲁时评 -->
            <div class="row-news row-title fs14 cmt-qilu">
                <h3><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h3>
                <ul class="fs14">
                    {foreach $arts as $a}
                    <li><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
                    {/foreach}
                </ul>
            </div>
            <!-- end  齐鲁时评 -->
            <div class="row-title">
                <h3><a href="https://www.iqilu.com/html/zt/" title="专题推荐" target="_self">专题推荐</a></h3>
            </div>
            <div class="gallery">
                <div class="gallery-sub clearfix">
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/china/qcszk" title="青春思政课" target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/202412/04/ca3356ccc04a4418b718d1d4e64b77ac.png"
                                    alt="青春思政课"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/china/qcszk" title="青春思政课" target="_self">青春思政课</a>
                        </dd>
                    </dl>
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/shandong/wwbs" title="山东文物标识设计大赛" target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/compress/202402/20/097280d5c43a4a56b7fe3b78e25b2931.png"
                                    alt="山东文物标识设计大赛"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/shandong/wwbs" title="山东文物标识设计大赛"
                                target="_self">山东文物标识设计大赛</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/no-1/231121" title="Remarkable Shandong"
                                target="_self"><img
                                    src="https://img11.iqilu.com/21/2023/11/12/4e9058af3c572f25d62af6c86cee273c.jpg"
                                    alt="Remarkable Shandong"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/no-1/231121" title="Remarkable Shandong"
                                target="_self">Remarkable Shandong</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/shandong/yzhhyjh" title="专题丨沿着黄河遇见海"
                                target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/202310/18/53462e53a0a343be8c8f0efebd8e9d68.png"
                                    alt="专题丨沿着黄河遇见海"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/shandong/yzhhyjh" title="专题丨沿着黄河遇见海"
                                target="_self">专题丨沿着黄河遇见海</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/shandong/kzhn" title="孔子喊你来看戏！青年导演创作扶持计划（第二季）来啦"
                                target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/202309/14/2be1c1783c324ebcb91f303bded00755.png"
                                    alt="孔子喊你来看戏！青年导演创作扶持计划（第二季）来啦"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/shandong/kzhn" title="孔子喊你来看戏！青年导演创作扶持计划（第二季）来啦"
                                target="_self">孔子喊你来看戏！青年导演创作扶持计划（第二季</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="https://www.iqilu.com/html/zt/hpsd/zhangyu02"
                                title="让假酒无处遁形！张裕布局区块链技术，为每瓶酒定制“数字身份证”" target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/202309/14/a246ee355a914ec3b9abff41a7a4d054.png"
                                    alt="让假酒无处遁形！张裕布局区块链技术，为每瓶酒定制“数字身份证”"></a></dt>
                        <dd><a href="https://www.iqilu.com/html/zt/hpsd/zhangyu02"
                                title="让假酒无处遁形！张裕布局区块链技术，为每瓶酒定制“数字身份证”" target="_self">让假酒无处遁形！张裕布局区块链技术，为每瓶酒</a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="ad1000x90">
        <div style="overflow:hidden;height:90px" name="PHPADM_MULTIADS" imp="5:5" time="3">
            <script type="text/javascript" src="https://g3.iqilu.com/static_files/multiads/34/dmultiads_34.js"></script>
        </div>
    </div>
    <div class="section3 clearfix">
        <div class="col-lft">
            {php}
            $cateName = "长春汽车"; // 分类名称
            $cate = $zbp->GetCategoryByName($cateName);

            $where = array(
            array('=','log_CateID', $cate->ID)
            );

            $arts = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime'=>'DESC'),
            array(10),
            null
            );
            {/php}
            <div class="row-news">
                <div class="row-title">
                    <h3><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h3>
                </div>
                <ul>
                    {foreach $arts as $a}
                    <li><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
                    {/foreach}
                </ul>
            </div>

            {php}
            $cateName = "长春美食"; // 分类名称
            $cate = $zbp->GetCategoryByName($cateName);

            $where = array(
            array('=','log_CateID', $cate->ID)
            );

            $arts = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime'=>'DESC'),
            array(10),
            null
            );
            {/php}
            <div class="row-news">
                <div class="row-title">
                    <h3><a href="{$cate.Url}" title="{$cate.Name}" target="_self">{$cate.Name}</a></h3>
                </div>
                <ul>
                    {foreach $arts as $a}
                    <li><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="col-rgt">
            <div class="row-top">
                <div class="row-bottom">
                    <!-- 视频新闻 -->
                    <div class="row-title">
                        <h3><a href="https://v.iqilu.com/" title="视频新闻" target="_self">视频新闻</a></h3>
                    </div>
                    <div class="gallery">
                        <div class="gallery-sub clearfix">
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808897.html"
                                        title="2025年11月18日山东新闻联播完整版" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/8184810_e9fd7820fe734abdaa10c2009c8dd1c8.jpg"
                                            alt="2025年11月18日山东新闻联播完整版"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808897.html"
                                        title="2025年11月18日山东新闻联播完整版" target="_self">2025年11月18日山东新闻联播完整版</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808881.html"
                                        title="新装备新技术助力晚播小麦“抢农时” 【强信心 稳经济 促发展】" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3bc4791ed5275001c1cc79b8dfb2179d.jpg"
                                            alt="新装备新技术助力晚播小麦“抢农时” 【强信心 稳经济 促发展】"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808881.html"
                                        title="新装备新技术助力晚播小麦“抢农时” 【强信心 稳经济 促发展】" target="_self">新装备新技术助力晚播小麦“抢农时” 【强信心
                                        稳经济 促发展】</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808793.html"
                                        title="2025“沿着黄河遇见海”全国旅行商山东行活动在青岛启动" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463665_469b54294a334f7199af643fc39e64d9.jpg"
                                            alt="2025“沿着黄河遇见海”全国旅行商山东行活动在青岛启动"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808793.html"
                                        title="2025“沿着黄河遇见海”全国旅行商山东行活动在青岛启动"
                                        target="_self">2025“沿着黄河遇见海”全国旅行商山东行活动在青岛启动</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808791.html"
                                        title="德州首次跻身全球集成电路产业综合竞争力百强城市" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463644_10ff288f0ad245e39be20287403ef4a7.jpg"
                                            alt="德州首次跻身全球集成电路产业综合竞争力百强城市"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808791.html"
                                        title="德州首次跻身全球集成电路产业综合竞争力百强城市" target="_self">德州首次跻身全球集成电路产业综合竞争力百强城市</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808785.html"
                                        title="山东19项产品入选工信部老年用品产品推广目录" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463625_e88270921e614359ae563a5ae0701224.jpg"
                                            alt="山东19项产品入选工信部老年用品产品推广目录"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808785.html"
                                        title="山东19项产品入选工信部老年用品产品推广目录" target="_self">山东19项产品入选工信部老年用品产品推广目录</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808783.html"
                                        title="山东将在人形机器人等领域补齐一批省级制造业中试平台" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463606_d02fde73a7a548b6bb4b08996cb08c9f.jpg"
                                            alt="山东将在人形机器人等领域补齐一批省级制造业中试平台"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808783.html"
                                        title="山东将在人形机器人等领域补齐一批省级制造业中试平台" target="_self">山东将在人形机器人等领域补齐一批省级制造业中试平台</a>
                                </dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808781.html"
                                        title="多措并举确保生产生活平稳有序【应对寒潮降温】" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463594_eb0f7f6dd59f48b0a52a4c9367d208ec.jpg"
                                            alt="多措并举确保生产生活平稳有序【应对寒潮降温】"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808781.html"
                                        title="多措并举确保生产生活平稳有序【应对寒潮降温】" target="_self">多措并举确保生产生活平稳有序【应对寒潮降温】</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808779.html"
                                        title="山东划定水土流失治理区16540平方公里 系统保护修复筑牢生态屏障【权威发布】" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463251_e4e23f78b9a3416ca8898577f9e98943.jpg"
                                            alt="山东划定水土流失治理区16540平方公里 系统保护修复筑牢生态屏障【权威发布】"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808779.html"
                                        title="山东划定水土流失治理区16540平方公里 系统保护修复筑牢生态屏障【权威发布】"
                                        target="_self">山东划定水土流失治理区16540平方公里 系统保护修复筑牢生态屏障【权威发布】</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808777.html"
                                        title="张展硕荣膺“五金王” 山东游泳队力夺7金创历史【第十五届全运会】" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463206_5b01da4a8c3e4872865e5133e678ddbd.jpg"
                                            alt="张展硕荣膺“五金王” 山东游泳队力夺7金创历史【第十五届全运会】"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808777.html"
                                        title="张展硕荣膺“五金王” 山东游泳队力夺7金创历史【第十五届全运会】" target="_self">张展硕荣膺“五金王”
                                        山东游泳队力夺7金创历史【第十五届全运会】</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808775.html"
                                        title="省委宣讲团成员赴东营、枣庄宣讲【学习贯彻党的二十届四中全会精神】" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3463019_4470cc355a9c4f42a949d88a12f69ce6.jpg"
                                            alt="省委宣讲团成员赴东营、枣庄宣讲【学习贯彻党的二十届四中全会精神】"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808775.html"
                                        title="省委宣讲团成员赴东营、枣庄宣讲【学习贯彻党的二十届四中全会精神】"
                                        target="_self">省委宣讲团成员赴东营、枣庄宣讲【学习贯彻党的二十届四中全会精神】</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808773.html"
                                        title="中央第十生态环境保护督察组对山东省、河南省开展大运河专项督察" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3465963_af1e4f2f51f84a2fa75125c67e6e9ba0.jpg"
                                            alt="中央第十生态环境保护督察组对山东省、河南省开展大运河专项督察"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808773.html"
                                        title="中央第十生态环境保护督察组对山东省、河南省开展大运河专项督察"
                                        target="_self">中央第十生态环境保护督察组对山东省、河南省开展大运河专项督察</a></dd>
                            </dl>
                            <dl>
                                <dt><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808771.html"
                                        title="省十四届人大常委会第十八次会议举行" target="_self"><img
                                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3462980_4f2b6b62573f492cbee9f0df26661112.jpg"
                                            alt="省十四届人大常委会第十八次会议举行"></a></dt>
                                <dd><a href="https://v.iqilu.com/sdws/sdxwlb/2025/1118/5808771.html"
                                        title="省十四届人大常委会第十八次会议举行" target="_self">省十四届人大常委会第十八次会议举行</a></dd>
                            </dl>
                        </div>
                    </div>
                    <!-- end 视频新闻 -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video wrapper-full">
    <div class="row-title wrapper">
        <h4><a href="https://yx.iqilu.com/" title="影像力" target="_self">影像力</a></h4>
    </div>
    <div class="video-content">
        <div class="wrapper">
            <div class="video-main">
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0918/5852240.shtml" title="29.04米！秋雨后 济南趵突泉水位创新高"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/18/fe6f99316abf43deaa2c2828e97e11d5.png"
                                alt="29.04米！秋雨后 济南趵突泉水位创新高"></a></dt>
                    <dd class="dd-opa"></dd>
                    <dd><a href="https://yx.iqilu.com/2025/0918/5852240.shtml" title="29.04米！秋雨后 济南趵突泉水位创新高"
                            target="_self">29.04米！秋雨后 济南趵突泉水位创新高</a></dd>
                </dl>
            </div>
            <div class="video-sub clearfix">
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0918/5852239.shtml" title="大明湖“夏雨荷”景观成为济南文化新地标"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/18/31ca04b4c21b4a18a6892c9c07b4b36a.png"
                                alt="大明湖“夏雨荷”景观成为济南文化新地标"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0918/5852239.shtml" title="大明湖“夏雨荷”景观成为济南文化新地标"
                            target="_self">大明湖“夏雨荷”景观成为济南文化新地标</a></dd>
                </dl>
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0917/5851758.shtml" title="瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/17/99c5d0480e7a487a95b1b0b31c74a148.png"
                                alt="瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0917/5851758.shtml" title="瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”"
                            target="_self">瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”</a></dd>
                </dl>
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0917/5851741.shtml" title="收获成熟夏玉米！东营绘就乡村初秋好“丰”景"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/17/afa76ecb66d64c068625e1a092abb697.png"
                                alt="收获成熟夏玉米！东营绘就乡村初秋好“丰”景"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0917/5851741.shtml" title="收获成熟夏玉米！东营绘就乡村初秋好“丰”景"
                            target="_self">收获成熟夏玉米！东营绘就乡村初秋好“丰”景</a></dd>
                </dl>
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0904/5847689.shtml" title="青岛智能化生产线全速运转 照亮汽车产业升级之路"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/04/6a523ca000764b75a546e4aa04e85bfe.png"
                                alt="青岛智能化生产线全速运转 照亮汽车产业升级之路"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0904/5847689.shtml" title="青岛智能化生产线全速运转 照亮汽车产业升级之路"
                            target="_self">青岛智能化生产线全速运转 照亮汽车产业升级之路</a></dd>
                </dl>
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0904/5847657.shtml" title="见者好运！烟台天空现双彩虹景观"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202509/04/9186622bbc584dc888c265ba0f368121.png"
                                alt="见者好运！烟台天空现双彩虹景观"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0904/5847657.shtml" title="见者好运！烟台天空现双彩虹景观"
                            target="_self">见者好运！烟台天空现双彩虹景观</a></dd>
                </dl>
                <dl>
                    <dt><a href="https://yx.iqilu.com/2025/0828/5845806.shtml" title="潍宿高铁全线完成首个铁路转体 取得重大突破"
                            target="_self"><img
                                src="https://img12.iqilu.com/10339/sucaiku/compress/202508/28/31beeb61cee9473dbaa90a255f55934f.png"
                                alt="潍宿高铁全线完成首个铁路转体 取得重大突破"></a></dt>
                    <dd><a href="https://yx.iqilu.com/2025/0828/5845806.shtml" title="潍宿高铁全线完成首个铁路转体 取得重大突破"
                            target="_self">潍宿高铁全线完成首个铁路转体 取得重大突破</a></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $(".section1 .col-a-right .pic-text li").css("display", "none");
    $(".section1 .col-a-right .pic-text li:first").css("display", "block");

    function funcTab() {
        if ($(".section1 .col-a-right li:visible").index() != 3) {
            $(".section1 .col-a-right li:visible").css("display", "none").next().css("display", "block");
            $(".section1 .col-a-right li:visible").siblings().css("display", "none");
            tab = $(".section1 .col-a-right li:visible").index();
            //alert(tab);
            $(".section1 .col-a-right .pagination span").removeClass("active-switch");
            $(".section1 .col-a-right .pagination span").eq(tab).addClass("active-switch");
        } else {
            $(".section1 .col-a-right .pic-text li").css("display", "none");
            $(".section1 .col-a-right .pic-text li:first").css("display", "block");
            $(".section1 .col-a-right .pagination span").removeClass("active-switch");
            $(".section1 .col-a-right .pagination span").eq(0).addClass("active-switch");
        }
    }

    timer = setInterval(function() {
        funcTab();
    }, 3000);

    $(".section1 .col-a-right .pic-text li").hover(function() {
        clearInterval(timer);
    }, function() {
        timer = setInterval(function() {
            funcTab();
        }, 3000);
    })

    $(".section1 .col-a-right .pagination span").click(function() {
        clearInterval(timer);
        $(".section1 .col-a-right .pagination span").removeClass("active-switch");
        $(this).addClass("active-switch");
        var pageNum = $(this).index();
        $(".section1 .col-a-right .pic-text li").css("display", "none");
        $(".section1 .col-a-right li").eq(pageNum).css("display", "block");
        timer = setInterval(function() {
            funcTab();
        }, 3000);
    })
})
</script>