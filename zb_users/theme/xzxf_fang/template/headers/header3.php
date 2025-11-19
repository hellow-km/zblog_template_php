{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}
<div class="daoht">
    <div class="logo"><a href="https://www.xzxw.com" target="_blank"><img
                src="https://www.xzxw.com/resource/zgxzxwwlogox1213816.jpg" data-bd-imgshare-binded="1"></a></div>
    <div class="enter"> <a href="https://tb.xzxw.com/" target="_blank"><img
                src="https://www.xzxw.com/resource/a_zangwen.png" data-bd-imgshare-binded="1"></a> <a
            href="javascript:void(0)" target="_blank"><img src="https://www.xzxw.com/resource/a_line.png"
                data-bd-imgshare-binded="1"></a> <a href="https://english.xzxw.com/" target="_blank"><img
                src="https://www.xzxw.com/resource/a_en.png" data-bd-imgshare-binded="1"></a>
        <div class="hot_line">新闻热线 <span>0891-6325020</span></div>
    </div>
    <div class="rbkhd">
        <style>
        .khdweixin {
            width: 70px;
            height: 30px;
            margin: 0px auto;
            position: relative;
            font-size: 15px;
            text-align: center;
        }

        .khdweixin a {
            width: 70px;
            height: 30px;
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            no-repeat center top;
        }

        .khdweixin .khdweixin_nr {
            background: #fff;
            text-align: center;
            position: absolute;
            left: -20px;
            top: 50px;
            display: none;
        }

        .khdweixin .khdweixin_nr img {
            width: 100px;
            height: 100px;
        }

        .khdweixin.on .khdweixin_nr {
            display: block;
        }
        </style>

        <div class="khdweixin" onmouseover="this.className = 'khdweixin on';"
            onmouseout="this.className = 'khdweixin';">
            <a href="javascript:;"><img src="https://www.xzxw.com/resource/2017rbkhdlogo.png" width="50" height="50"
                    data-bd-imgshare-binded="1"><br>客户端</a>
            <div class="khdweixin_nr"><img src="https://www.xzxw.com/resource/khd20230627110316.jpg"
                    data-bd-imgshare-binded="1">
            </div>
        </div>
    </div>
    <div class="shuzb"> <a href="https://www.xzxw.com/shuzibao/index.html" target="_blank"><img
                src="https://www.xzxw.com/resource/icon_header02.png" width="50" height="50"
                data-bd-imgshare-binded="1"></a><br>
        <a href="http://www.xzxw.com/shuzibao/" target="_blank">数字报系</a>
    </div>
    <div class="shuzb1"> <a href="https://m.xzxw.com" target="_blank"><img
                src="https://www.xzxw.com/resource/icon_header03.png" width="50" height="50"
                data-bd-imgshare-binded="1"></a><br>
        <a href="https://m.xzxw.com" target="_blank">移动端</a>
    </div>

    <script type="text/javascript">
    //检索提交
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

<div class="nav_100">
    <div class="nav">
        <ul>

            <li><a href="/">
                    首页</a></li>
            {foreach $allCategories as $cate}
            <li>
                <a target="_self" href="/?cate={$cate.ID}">{$cate.Name}
                </a>
            </li>
            {/foreach}

        </ul>
    </div>
</div>