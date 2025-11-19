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
5 // 数量
);

$hasArticles =false;
if (isset($randArticles) && is_array($randArticles) && count($randArticles) > 0) {
$hasArticles = true;
} else {
$hasArticles = false;
}

{/php}
<div class="wt275 right">
    <div class="ht2"></div>
    <div class="pindao">
        <div class="pindao_title">
            <h3>频道推荐</h3>
        </div>
        <div class="pindao_content">
            <div class="ht6"></div>
            <ul>
                {foreach $randArticles as $rand}
                <li><a target="_self" href="{$rand.Url}" title="{$rand.Title}"> {$rand.Title}</a></li>
                {/foreach}
                <!-- 公共区域-右侧新闻-频道推荐 -->
            </ul>
            <div class="ht12"></div>
        </div>
    </div>
    <div class="ht1"></div>
    <div class="pindao">
        <div class="pindao_title">
            <h3>文旅</h3>
        </div>
        <div class="pindao_content1">
            <div class="ht13"></div>
            <div class="phont_img"> <a target="blank"
                    href="https://www.xzxw.com/xw/xzyw/2025-11/18/content_6729456.html"><img
                        src="https://www.xzxw.com/pic/2025-11/18/6729456_6d6615e2-9a3c-4d41-90fd-8730b66b4c39.jpg"
                        style="width:253px;height:160px"></a>
                <p><a target="blank" href="https://www.xzxw.com/xw/xzyw/2025-11/18/content_6729456.html">
                        波密县招商引资暨文旅（广州）宣传推介会圆满举行</a></p>
            </div>
            <div class="ht1"></div>
            <ul>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="西藏霞义沟：冬日暖阳下的“五彩土林”"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/19/content_6729871.html"> 西藏霞义沟：冬日暖阳下的“五彩...</a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="波密县招商引资暨文旅（广州）宣传推介会圆满举行"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/18/content_6729456.html"> 波密县招商引资暨文旅（广州）宣...</a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="湖南岳阳援藏为桑日县农文旅融合谋新篇"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728950.html"> 湖南岳阳援藏为桑日县农文旅融合...</a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="林芝市连续九年空气质量全国第一"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728934.html"> 林芝市连续九年空气质量全国第一...</a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="拉萨冬季林卡来了"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/16/content_6728697.html">拉萨冬季林卡来了 </a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[文旅]</a></span> <a
                        target="_self" title="樟木口岸出入境人数突破36万 "
                        href="https://www.xzxw.com/xw/xzyw/2025-11/14/content_6726562.html"> 樟木口岸出入境人数突破36万 ...</a></li>

            </ul>
            <!-- 公共区域-右侧新闻-旅游人文-->
            <div class="ht1"></div>
        </div>
    </div>
    <div class="ht1"></div>
    <div class="guanggao_img">
        <!--<img src="pic3_2.jpg" width="275" height="180" />-->
        <!-- 广告位-右侧广告-右侧广告1 -->
    </div>
    <div class="ht1"></div>
    <div class="pindao">
        <div class="pindao_title">
            <h3><span></span>雪域时评</h3>
        </div>
        <div class="pindao_content">
            <div class="ht6"></div>
            <ul>
                <li><a target="_self" href="https://www.xzxw.com/jysp/2025-11/19/content_6729836.html"
                        title="用改革疏浚发展的航道">用改革疏浚发展的航道 </a></li>
                <li><a target="_self" href="https://www.xzxw.com/jysp/2025-11/19/content_6729742.html"
                        title="刹歪风！管住“文抄公”">刹歪风！管住“文抄公” </a></li>
                <li><a target="_self" href="https://www.xzxw.com/jysp/2025-11/18/content_6729400.html"
                        title="数字时代如何破解“伪适老”困局">数字时代如何破解“伪适老”困局 </a></li>
                <li><a target="_self" href="https://www.xzxw.com/jysp/2025-11/18/content_6729404.html"
                        title="严格执法和人性化关怀并不冲突">严格执法和人性化关怀并不冲突 </a></li>
                <li><a target="_self" href="https://www.xzxw.com/jysp/2025-11/17/content_6728845.html"
                        title="书写绿色发展的高原答卷">书写绿色发展的高原答卷 </a></li>

                <!-- 公共区域-右侧新闻-九眼时评_1421592671925 -->
            </ul>
            <div class="ht1"></div>
        </div>
    </div>
    <div class="ht1"></div>
    <div class="pindao">
        <div class="pindao_title">
            <h3>图库 · 视频</h3>
        </div>
        <div class="pindao_content1">
            <div class="ht8"></div>
            <div class="img1_fix pdl6">
                <div class="phont_img1 left"><a target="blank"
                        href="https://www.xzxw.com/tpsp/2023-02/14/content_5541697.html"><img
                            src="https://www.xzxw.com/pic/2023-02/14/5541697_t1_0X29X237X162_b9bfec4f-ab4f-4d77-b4ea-89216e482358.jpg"
                            width="122"></a>
                    <p><a target="blank"
                            href="https://www.xzxw.com/tpsp/2023-02/14/content_5541697.html">重磅呈现：《扎什伦布》</a></p>
                </div>
                <div class="phont_img1 left"><a target="blank"
                        href="https://www.xzxw.com/tpsp/2023-01/06/content_5496305.html"><img
                            src="https://www.xzxw.com/pic/2023-01/06/5496305_t1_39X29X578X332_W020230106692825258854.jpg"
                            width="122"></a>
                    <p><a target="blank"
                            href="https://www.xzxw.com/tpsp/2023-01/06/content_5496305.html">【我们的家园】从一个小村庄到一座城市的演变</a>
                    </p>
                </div>
                <div class="phont_img1 left"><a target="blank"
                        href="https://www.xzxw.com/tpsp/2022-07/12/content_5304010.html"><img
                            src="https://www.xzxw.com/pic/2022-07/12/5304010_t1_0X0X600X338_W020220712679398546747.jpg"
                            width="122"></a>
                    <p><a target="blank"
                            href="https://www.xzxw.com/tpsp/2022-07/12/content_5304010.html">拉萨：215万尾鱼苗游入拉萨河</a></p>
                </div>
                <div class="phont_img1 left"><a target="blank"
                        href="https://www.xzxw.com/tpsp/2022-04/27/content_5185233.html"><img
                            src="https://www.xzxw.com/pic/2022-04/27/5185233_t1_6X13X600X347_a5eee7f1-a2e0-4b8d-b333-0656e2ec2dd1.jpg"
                            width="122"></a>
                    <p><a target="blank" href="https://www.xzxw.com/tpsp/2022-04/27/content_5185233.html">曲水的柳条有故事</a>
                    </p>
                </div>
                <!-- 公共区域-右侧新闻-图库视频 -->
            </div>
            <div class="clear"></div>
            <div class="ht1"></div>
        </div>
    </div>
    <div class="ht1"></div>
    <div class="pindao">
        <div class="pindao_title">
            <h3>生活 · 消费</h3>
        </div>
        <div class="pindao_content1">
            <div class="ht1"></div>
            <div class="img1_fix pdl6">
                <div class="phont_img1 left"> <a target="blank"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728928.html"><img
                            src="https://www.xzxw.com/pic/2025-11/17/6728928_54dfe642-b01d-4757-9c06-780e9d6d870c.jpg"
                            style="width:120px;"></a>
                    <p><a target="blank" href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728928.html">冬桃迎丰收
                            果农采收忙</a></p>
                </div>
                <div class="phont_img1 left"> <a target="blank"
                        href="https://www.xzxw.com/shxf/2025-11/13/content_6725610.html"><img
                            src="https://www.xzxw.com/pic/2025-11/13/6725610_dc369336-4817-4fb4-803b-bbc0a288b08b.jpg"
                            style="width:120px;"></a>
                    <p><a target="blank" href="https://www.xzxw.com/shxf/2025-11/13/content_6725610.html">藏汇仓“特产+文创”双核驱动
                        </a></p>
                </div>

                <!-- 公共区域-右侧新闻-生活消费图片 -->
            </div>
            <div class="clear"></div>
            <div class="ht4"></div>
            <ul>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[生活消费]</a></span> <a
                        target="_self" title="冈仁波齐矿泉水首批出口尼泊尔"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728944.html">
                        冈仁波齐矿泉水首批出口尼泊尔 </a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[生活消费]</a></span> <a
                        target="_self" title="冬桃迎丰收 果农采收忙"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/17/content_6728928.html">
                        冬桃迎丰收 果农采收忙 </a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[生活消费]</a></span> <a
                        target="_self" title="拉鲁天街成为多元消费新地标"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/13/content_6725851.html">
                        拉鲁天街成为多元消费新地标 </a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/shxf/node_25475.html">[生活消费]</a></span> <a
                        target="_self" title="藏汇仓“特产+文创”双核驱动 "
                        href="https://www.xzxw.com/shxf/2025-11/13/content_6725610.html">
                        藏汇仓“特产+文创”双核驱动 ...</a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/xw/xzyw/index.html">[生活消费]</a></span> <a
                        target="_self" title="优化原种辣椒 提质增产增收"
                        href="https://www.xzxw.com/xw/xzyw/2025-11/12/content_6724198.html">
                        优化原种辣椒 提质增产增收 </a></li>
                <li><span><a target="blank" href="https://www.xzxw.com/shxf/node_25475.html">[生活消费]</a></span> <a
                        target="_self" title="与西藏相遇 在风景之外"
                        href="https://www.xzxw.com/shxf/2025-11/13/content_6725591.html">
                        与西藏相遇 在风景之外 </a></li>

                <!-- 公共区域-右侧新闻-生活消费列表 -->
            </ul>
            <div class="ht1"></div>
        </div>
    </div>
    <div class="ht1 "></div>
    <div class="pindao">
        <div class="pindao_title">

            <h3>新闻摘要</h3>
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

        <div class="pindao_content">
            <div class="ht1"></div>
            <ul>
                {foreach $articles as $a}
                <li><a target="_self" href="{$a.Url}" title="{$a.Title}">{$a.Title} </a></li>
                {/foreach}

                <!-- 公共区域-右侧新闻-新闻摘要-->
            </ul>
            <div class="ht1"></div>
        </div>
    </div>
    <div class="ht1"></div>
    <div class="guanggao_img">
        <!--<img src="pic3_2.jpg" width="275" height="180" />-->
        <!-- 广告位-右侧广告-右侧广告2 -->
    </div>
</div>