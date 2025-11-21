<div class="space" style="height:20px;"></div>
<div class="wrap">
    <div class="left w410 h353">
        <!-- 新闻-要闻焦点区-西藏要闻 -->
        {if $articles&&$articles[0]}
        <a target="_self" style="color:#0c5989;font-weight:bold;font-size:17px"
            href="{$articles[0].Url}">{$articles[0].Title}</a>
        {/if}
        <!-- 新闻-要闻焦点区-要闻头条 -->
        <div class="space" style="height:13px;"></div>
        <ul class="m_news_ul1">
            {foreach $articles as $i=>$a}
            {if $i>0}
            <li style="line-height:36px;    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;"><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a>
            </li>
            {/if}
            {/foreach}
            <!-- 新闻-要闻焦点区-西藏要闻列表 -->
        </ul>
    </div>
    <div class="right w571 h353">
        <div id="fsD1" class="focus">
            <div id="D1pic1" class="fPic">
                <div class="fcon" style="display: none;">
                    <a target="_self" href="https://www.xzxw.com/xw/xzyw/2025-11/07/content_6719853.html"><img
                            src="https://www.xzxw.com/pic/2025-11/07/6719853_t2_48X0X600X343_4c3a1aa4-8bff-4227-bea7-b407f7fdd4bb.jpg"
                            style="opacity: 1;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/xzyw/2025-11/07/content_6719853.html">自治区“新时代好少年”
                            先进事迹发布仪式举行</a></span>
                </div>
                <div class="fcon" style="display: none;">
                    <a target="_self" href="https://www.xzxw.com/xw/xzyw/2025-11/07/content_6719863.html"><img
                            src="https://www.xzxw.com/pic/2025-11/07/6719863_t2_0X46X599X418_723a46f9-dafd-42e6-9457-b5ea79d2cebc.jpg"
                            style="opacity: 1;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/xzyw/2025-11/07/content_6719863.html">西藏“好物” 惊艳进博会</a></span>
                </div>
                <div class="fcon" style="display: block;">
                    <a target="_self" href="https://www.xzxw.com/xw/2025-10/16/content_6698024.html"><img
                            src="https://www.xzxw.com/pic/2025-10/16/6698024_7d83b90e-4e99-4633-a83f-51f7a8c42226.jpg"
                            style="opacity: 0.64;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/2025-10/16/content_6698024.html">英才汇聚 志向高原</a></span>
                </div>
                <div class="fcon" style="display: none;">
                    <a target="_self" href="https://www.xzxw.com/xw/2025-10/16/content_6698022.html"><img
                            src="https://www.xzxw.com/pic/2025-10/16/6698022_7d81b290-e459-4993-a3c2-5126672e7e7b.jpg"
                            style="opacity: 0.72;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/2025-10/16/content_6698022.html">西藏山南萨热路跨江大桥完成箱梁架设</a></span>
                </div>
                <div class="fcon" style="display: none;">
                    <a target="_self" href="https://www.xzxw.com/xw/2025-10/09/content_6691375.html"><img
                            src="https://www.xzxw.com/pic/2025-10/09/6691375_6f679968-18e9-44c6-a87f-df255d27b085.jpg"
                            style="opacity: 0.36;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/2025-10/09/content_6691375.html">千年藏香 绽放新彩</a></span>
                </div>
                <div class="fcon" style="display: none;">
                    <a target="_self" href="https://www.xzxw.com/xw/2025-10/09/content_6691367.html"><img
                            src="https://www.xzxw.com/pic/2025-10/09/6691367_a2a8f828-4327-4ae3-95b9-1321d42b09fe.jpg"
                            style="opacity: 1;"></a>
                    <span class="shadow"><a target="_self"
                            href="https://www.xzxw.com/xw/2025-10/09/content_6691367.html">普莫雍错美如画</a></span>
                </div>

                <!-- 新闻-要闻焦点区-焦点图_1421509953524 -->
            </div>
            <div class="fbg">
                <div class="D1fBt" id="D1fBt">
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a>
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a>
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a>
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>5</i></a>
                    <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>6</i></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        Qfast.add('widgets', {
            path: "https://www.xzxw.com/resource/terminator2_2_min.js",
            type: "js",
            requires: ['fx']
        });
        Qfast(false, 'widgets', function() {
            K.tabs({
                id: 'fsD1', //焦点图包裹id  
                conId: "D1pic1", //** 大图域包裹id  
                tabId: "D1fBt",
                tabTn: "a",
                conCn: '.fcon', //** 大图域配置class       
                auto: 1, //自动播放 1或0
                effect: 'fade', //效果配置
                eType: 'click', //** 鼠标事件
                pageBt: true, //是否有按钮切换页码
                bns: ['.prev', '.next'], //** 前后按钮配置class                          
                interval: 3000 //** 停顿时间  
            })
        })
        </script>
    </div>

</div>
{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}



<div class="xwnr">
    {foreach $allCategories as $i=>$cate}
    {if $i<=7} <li style="width:500px;height:330px;float:left">
        <div
            style="background-color: #006dc0;width:120px;height:30px;display:flex;align-items:center;justify-content:center;">
            <a href="{$cate.Url}"><span style="color: #fff;font-weight:600">{$cate.Name}</span></a>
        </div>
        <div style="border-bottom:2px solid #006DC0;margin-right:20px"></div>
        <div style="padding:10px 10px 10px 0">

            {php}
            $cateId = $cate->ID;

            $where = array(
            array('=','log_CateID', $cateId)
            );

            $articles = $zbp->GetArticleList(
            '*',
            $where,
            array('log_PostTime' => 'DESC'),
            array(5),
            null
            );
            {/php}
            {if $articles&&$articles[0]}
            <div style="display:flex;height:150px;overflow:hidden">
                <div style="min-width:200px;max-width:200px"><img src="/images/default.jpg" width="100%" height="100%"
                        alt=""></div>
                <div style="margin-left:10px"><a href="{$articles[0].Url}">
                        <h2>{$articles[0].Title}</h2>
                        <h5>{$articles[0].Intro}</h5>
                    </a></div>

            </div>
            {/if}
            {foreach $articles as $i=>$a}
            {if $i>0}
            <div style="font-size: 15px;line-height: 33px;overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;padding-right:15px"><a href="{$a.Url}">{$a.Title}</a></div>
            {/if}
            {/foreach}
        </div>
        </li>
        {/if}
        {/foreach}

</div>


<div class="tpxw20180903"><a href="/" target="_self"><img
            src="//www.xzxw.com/resource/templateRes/202304/20/51/51/2018gaibanxwtp.jpg" border="0"></a>
    <div class="pic1"><a href="https://www.xzxw.com/xw/xwtp/2025-11/18/content_6729397.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-11/18/6729397_1d1e779e-ea33-433f-8eb0-5f47b7c9b3c4.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht1">幸福底色更鲜亮</div>
    <div class="pic2"><a href="https://www.xzxw.com/xw/xwtp/2025-11/18/content_6729345.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-11/18/6729345_50248ffc-ff26-42ec-b48d-0b99e5cb9b66.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht2">西藏运动员尼玛桑珠获第四名</div>
    <div class="pic3"><a href="https://www.xzxw.com/xw/xwtp/2025-11/08/content_6720787.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-11/08/6720787_774d7cbb-10af-4538-8bda-61614bd72cbd.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht3">赛事火 消费热</div>
    <div class="pic4"><a href="https://www.xzxw.com/xw/xwtp/2025-10/22/content_6703691.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-10/22/6703691_44387353-06f8-401a-9e9a-8688ad991877.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht4">共谋发展策 共话丰收时</div>
    <div class="pic5"><a href="https://www.xzxw.com/xw/xwtp/2025-10/22/content_6703692.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-10/22/6703692_67a5f7f4-d270-4f94-9dff-65bb79034a72.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht5">医养结合 关爱老人</div>
    <div class="pic6"><a href="https://www.xzxw.com/xw/xwtp/2025-10/17/content_6699096.html" target="_self"><img
                src="https://www.xzxw.com/pic/2025-10/17/6699096_2e1e5c5a-ec5a-4486-8bd5-251765ccbe4a.jpg" width="320"
                height="190" align="absbottom"></a></div>
    <div class="ht6">青春飞扬 舞动高原</div>

</div>