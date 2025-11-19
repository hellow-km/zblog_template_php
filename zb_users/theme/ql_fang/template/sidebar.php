<div class="col-sub">
    <!-- 广告位 -->
    <div class="mod-ad">
        <!-- PHPADM Start From # -->
        <!--娱乐末级页右画1-->
        <script type="text/javascript" src="https://g3.iqilu.com/static_files/zones/455/455.js"></script>
        <!-- PHPADM End From # -->
    </div>
    <!-- end广告位 -->
    <!-- 热点推荐 -->
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
    <div class="mod-a">
        <div class="tit-sub">
            <h2><i></i><a href="/" title="热点推荐" target="_self">热点推荐</a></h2>
        </div>
        <div class="news-pic-b clearfix">
            {foreach $randArticles as $i=>$rand}
            {if $i<=3} <dl>
                <dt><a href="{$rand.Url}" title="{$rand.Title}" target="_self"><img
                            src="https://img12.iqilu.com/10339/sucaiku/compress/202511/16/fd0a933aaf494efc9ba55b496dbfbd7a.png"></a>
                </dt>
                <dd><a href="{$rand.Url}" title="{$rand.Title}" target="_self">{$rand.Title}</a></dd>
                </dl>
                {/if}
                {/foreach}
        </div>
        <ul class="news-list type-b">
            {foreach $randArticles as $i=>$rand}
            {if $i>3}
            <li><a href="{$rand.Url}" title="{$rand.Title}" target="_self">{$rand.Title}</a></li>
            {/if}
            {/foreach}
        </ul>
        <ul class="city-list clearfix">
            <li><a target="_blank" title="济南" href="https://jinan.iqilu.com/">济南</a></li>
            <li><a target="_blank" title="淄博" href="https://zibo.iqilu.com/">淄博</a></li>
            <li><a target="_blank" title="枣庄" href="https://zaozhuang.iqilu.com/">枣庄</a></li>
            <li><a target="_blank" title="东营" href="https://dongying.iqilu.com/">东营</a></li>
            <li><a target="_blank" title="烟台" href="https://yantai.iqilu.com/">烟台</a></li>
            <li><a target="_blank" title="潍坊" href="https://weifang.iqilu.com/">潍坊</a></li>
            <li><a target="_blank" title="济宁" href="https://jining.iqilu.com/">济宁</a></li>
            <li><a target="_blank" title="泰安" href="https://taian.iqilu.com/">泰安</a></li>
            <li><a target="_blank" title="威海" href="https://weihai.iqilu.com/">威海</a></li>
            <li><a target="_blank" title="日照" href="https://rizhao.iqilu.com/">日照</a></li>
            <!--<li><a target="_blank" title="莱芜" href="https://laiwu.iqilu.com/">莱芜</a></li>-->
            <li><a target="_blank" title="临沂" href="https://linyi.iqilu.com/">临沂</a></li>
            <li><a target="_blank" title="德州" href="https://dezhou.iqilu.com/">德州</a></li>
            <li><a target="_blank" title="聊城" href="https://liaocheng.iqilu.com/">聊城</a></li>
            <li><a target="_blank" title="滨州" href="https://binzhou.iqilu.com/">滨州</a></li>
            <li><a target="_blank" title="菏泽" href="https://heze.iqilu.com/">菏泽</a></li>
        </ul>
    </div>
    <!-- end热点推荐 -->
    <!-- 广告位 -->
    <div class="mod-ad">
        <!-- PHPADM Start From # -->
        <!--娱乐末级页右画2-->
        <script type="text/javascript" src="https://g3.iqilu.com/static_files/richmedia/zoneid_456_tpad.js"></script>
        <!-- PHPADM End From # -->
    </div>
    <!-- end广告位 -->
    <!-- 热门视频 -->
    <div class="mod-b">
        <div class="tit-sub">
            <h2><i></i><a href="https://v.iqilu.com/" target="_blank" title="热门视频">热门视频</a></h2>
        </div>
        <div class="news-pic-c clearfix">
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/mrxw/2025/1117/5808351.html" target="_blank"
                        title="绿色矿山看山东：东平书写矿山转型新答卷"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/17/3378347_68cc6a80c54f49af82bcaa4f773cf4fe.jpg"
                            alt="绿色矿山看山东：东平书写矿山转型新答卷"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/mrxw/2025/1117/5808351.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/mrxw/2025/1117/5808351.html" target="_blank"
                        title="绿色矿山看山东：东平书写矿山转型新答卷">绿色矿山看山东：东平书写矿山转型新答卷</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/l0/2025/1116/5807781.html" target="_blank"
                        title="刚出牢狱乔装盗窃 不料当天就被抓获"><img src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png"
                            class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/16/3289824_474f2e215c3a4bed94a63a90dfebd43f.jpg"
                            alt="刚出牢狱乔装盗窃 不料当天就被抓获"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/l0/2025/1116/5807781.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/l0/2025/1116/5807781.html" target="_blank"
                        title="刚出牢狱乔装盗窃 不料当天就被抓获">刚出牢狱乔装盗窃 不料当天就被抓获</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808313.html" target="_blank"
                        title="济南：售楼处拟改建医院 小区居民：坚决反对"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/17/3377254_c81eef85757840f9adc0668e35c356d2.jpg"
                            alt="济南：售楼处拟改建医院 小区居民：坚决反对"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808313.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808313.html" target="_blank"
                        title="济南：售楼处拟改建医院 小区居民：坚决反对">济南：售楼处拟改建医院 小区居民：坚决反对</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807867.html" target="_blank"
                        title="小溪跑社区：电梯半年坏三次 何时能彻底修好？"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/16/3291681_bb4d69a6e53e4d3c897fe3343ff30a90.jpg"
                            alt="小溪跑社区：电梯半年坏三次 何时能彻底修好？"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807867.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807867.html" target="_blank"
                        title="小溪跑社区：电梯半年坏三次 何时能彻底修好？">小溪跑社区：电梯半年坏三次 何时能彻底修好？</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/shpd/shb/2025/1116/5807893.html" target="_blank"
                        title="【帮办出马】新车两天两次刹车失灵 车主诉求退车遇“强修”"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/16/3290094_bb57aa0062384721bfefd2e9f95e5a4b.jpg"
                            alt="【帮办出马】新车两天两次刹车失灵 车主诉求退车遇“强修”"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/shpd/shb/2025/1116/5807893.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/shpd/shb/2025/1116/5807893.html" target="_blank"
                        title="【帮办出马】新车两天两次刹车失灵 车主诉求退车遇“强修”">【帮办出马】新车两天两次刹车失灵 车主诉求退车遇“强修”</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808307.html" target="_blank"
                        title="烟台开发区：污水倒灌 新家变“化粪池”？"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/17/3376994_b3f6962e4dc645268fe782e581c9b54e.jpg"
                            alt="烟台开发区：污水倒灌 新家变“化粪池”？"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808307.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/xxbs/2025/1117/5808307.html" target="_blank"
                        title="烟台开发区：污水倒灌 新家变“化粪池”？">烟台开发区：污水倒灌 新家变“化粪池”？</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807869.html" target="_blank"
                        title="委托车商报废车辆 残值分配引发纠纷"><img src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png"
                            class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/16/3291810_3c01ab4d4a0d46228ab7f0060e2e0c30.jpg"
                            alt="委托车商报废车辆 残值分配引发纠纷"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807869.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/xxbs/2025/1116/5807869.html" target="_blank"
                        title="委托车商报废车辆 残值分配引发纠纷">委托车商报废车辆 残值分配引发纠纷</a></dd>
            </dl>
            <dl>
                <dt><a href="https://v.iqilu.com/qlpd/xxbs/2025/1118/5808757.html" target="_blank"
                        title="宁津：交房一年未通燃气 因开发商拖欠费用？"><img
                            src="https://file.iqilu.com/custom/new/v2016/images/btn-play.png" class="icon"><img
                            src="https://img8.iqilu.com/vmsimgs/2025/11/18/3459377_4585832a2f9146b59c901c2c52e0c46f.jpg"
                            alt="宁津：交房一年未通燃气 因开发商拖欠费用？"></a></dt>
                <dd class="div-opa"><a href="https://v.iqilu.com/qlpd/xxbs/2025/1118/5808757.html" target="_blank"></a>
                </dd>
                <dd><a href="https://v.iqilu.com/qlpd/xxbs/2025/1118/5808757.html" target="_blank"
                        title="宁津：交房一年未通燃气 因开发商拖欠费用？">宁津：交房一年未通燃气 因开发商拖欠费用？</a></dd>
            </dl>
        </div>
    </div>
    <!-- end热门视频 -->
    <!-- 广告位 -->
    <div class="mod-ad">
        <!-- PHPADM Start From # -->
        <!--娱乐末级页右画3-->
        <script type="text/javascript" src="https://g3.iqilu.com/static_files/richmedia/zoneid_457_tpad.js"></script>
        <!-- PHPADM End From # -->
    </div>
    <!-- end广告位 -->
    <!-- 视觉山东 -->
    <div class="mod-c">
        <div class="tit-sub">
            <h2><i></i><a href="javascript:;" title="视觉山东">视觉山东</a></h2>
        </div>
        <div class="news-pic-d">
            <dl>
                <dt><a href="https://yx.iqilu.com/2025/0918/5852240.shtml" title="29.04米！秋雨后 济南趵突泉水位创新高"
                        target="_blank"><img
                            src="https://img12.iqilu.com/10339/sucaiku/compress/202509/18/fe6f99316abf43deaa2c2828e97e11d5.png"></a>
                </dt>
                <dd><a href="https://yx.iqilu.com/2025/0918/5852240.shtml" title="29.04米！秋雨后 济南趵突泉水位创新高"
                        target="_blank">29.04米！秋雨后 济南趵突泉水位创新高</a></dd>
            </dl>
            <dl>
                <dt><a href="https://yx.iqilu.com/2025/0918/5852239.shtml" title="大明湖“夏雨荷”景观成为济南文化新地标"
                        target="_blank"><img
                            src="https://img12.iqilu.com/10339/sucaiku/compress/202509/18/31ca04b4c21b4a18a6892c9c07b4b36a.png"></a>
                </dt>
                <dd><a href="https://yx.iqilu.com/2025/0918/5852239.shtml" title="大明湖“夏雨荷”景观成为济南文化新地标"
                        target="_blank">大明湖“夏雨荷”景观成为济南文化新地标</a></dd>
            </dl>
            <dl>
                <dt><a href="https://yx.iqilu.com/2025/0917/5851758.shtml" title="瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”"
                        target="_blank"><img
                            src="https://img12.iqilu.com/10339/sucaiku/compress/202509/17/99c5d0480e7a487a95b1b0b31c74a148.png"></a>
                </dt>
                <dd><a href="https://yx.iqilu.com/2025/0917/5851758.shtml" title="瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”"
                        target="_blank">瓜果丰收采摘忙 无棣农家喜迎“甜蜜季”</a></dd>
            </dl>
        </div>
    </div>
    <!-- end视觉山东 -->
    <!-- 广告位 -->
    <div class="mod-ad">
        <!-- PHPADM Start From # -->
        <!--娱乐末级页右画4-->
        <script type="text/javascript" src="https://g3.iqilu.com/static_files/zones/458/458.js"></script>
        <!-- PHPADM End From # -->
    </div>
    <!-- end广告位 -->
    <!-- 排行榜 -->
    <div class="mod-d">
        <div class="tit-sub">
            <h2><i></i><a href="javascript:;" title="排行榜">排行榜</a></h2>
        </div>
        {php}
        if(isset($category)){
        $cateId = $category->ID;
        }else{
        $cateId = $article->Category->ID;
        }


        $where = array(
        array('=','log_CateID', $cateId)
        );

        $articles = $zbp->GetArticleList(
        '*',
        $where,
        array('log_PostTime' => 'DESC'),
        array(10),
        null
        );
        {/php}
        <ul class="news-list type-c">
            {foreach $articles as $i=>$a}

            <li><span class="cur">1</span><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></li>
            {/foreach}
        </ul>
    </div>
    <!-- end排行榜 -->
</div>