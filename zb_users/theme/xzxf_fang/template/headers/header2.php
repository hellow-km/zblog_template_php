{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}
<div class="header">
    <div class="header_center">
        <div class="logo"><a href="https://www.xzxw.com/" target="_blank"><img
                    src="https://www.xzxw.com/resource/logo_zh.png"></a></div>
        <div class="enter">
            <a href="https://tb.xzxw.com/" target="_blank"><img src="https://www.xzxw.com/resource/a_zangwen.png"></a>
            <a href="javascript:void(0)" target="_blank"><img src="https://www.xzxw.com/resource/a_line.png"></a>
            <a href="https://english.xzxw.com/" target="_blank"><img src="https://www.xzxw.com/resource/a_en.png"></a>
            <div class="hot_line">新闻热线 <span>0891-6325020</span></div>
        </div>
        <div class="source">

            <div style="float:left; width:150px; text-align:center">
                <ul>
                    <li style="float:left; width:150px; text-align:center;height:55px;"><a
                            href="http://www.xzxw.com/shuzibao/" class="icon" target="_blank"><img
                                src="https://www.xzxw.com/resource/icon_header02.png"></a></li>
                    <li style="float:left; width:150px; text-align:center"><a
                            href="https://www.xzxw.com/shuzibao/index.html" class="w cl8c" target="_blank">
                            <font color="red">西藏日报数字报系</font>
                        </a></li>
                </ul>
            </div>
            <div class="s">
                <a href="https://www.xzxw.com/sjb/" class="icon" target="_blank"><img
                        src="https://www.xzxw.com/resource/icon_header03.png"></a>
                <a href="https://www.xzxw.com/sjb/" class="w cl25" target="_blank">手机报</a>
            </div>

        </div>
        <script type="text/javascript" charset="utf-8" async=""
            src="https://www.xzxw.com/resource/foundermbduba_min.js"></script>
        <script type="text/javascript">
        function summitForm() {
            document.getElementById("search").submit();
        }
        </script>
        <div class="search_cc">
            <div class="info_search">
                <form id="search" name="search" action="https://search.xzxw.com/founder/SearchServlet.do" method="get"
                    target="_blank">
                    <input type="text" name="content" id="Searchword" value="&nbsp;输入搜索内容"
                        onfocus="javascript:{this.value='';}">
                    <input type="hidden" name="siteID" value="5">
                </form>
                <div class="info_search_logo" onclick="summitForm();"></div>
            </div>
        </div>
    </div>
</div>

<div class="nav">
    <ul>
        <li><a href="/">
                <font color="#fff">首页</font>
            </a></li>
        {foreach $allCategories as $cate}
        <li>
            <a target="_self" href="/?cate={$cate.ID}">
                <font color="#fff">{$cate.Name}</font>
            </a>
        </li>
        {/foreach}

    </ul>
</div>