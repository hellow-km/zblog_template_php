<div class="jkyh_qztnav">
    <!-- 全站顶部导航-->
    <div class="zt_qztnav"> <a name="zt-top"></a>
        <div class="ztbwcqz"> <span class="zt_logo"> <a href="/" title="齐鲁网">齐鲁网</a></span> <span class="ztqzdh">
                <a href="/" title="首页" target="_blank">首页</a>
                <a href="/" title="闪电新闻" target="_blank">闪电新闻</a>
                <a href="/" title="山东网络台" target="_blank">山东网络台</a>
                <a href="/" title="山东广电微矩阵" target="_blank">山东广电微矩阵</a>
            </span> </div>
    </div>
    <!--end 全站顶部导航-->
</div>
<div class="section-top wrapper clearfix">

    <div class="bar-top">
        <a href="" class="logo"></a>
        <!-- 导航 -->
        <div class="nav-top">
            <p>
                <a href="/" title="新闻" target="_blank">新闻</a>
                &gt;<a href="/" title="山东新闻" target="_blank">山东新闻</a>
                {if isset($category)}
                &gt;<a href="/" title="{$category->Name}" target="_blank">{$category->Name}</a>
                {else}

                {/if}

            </p>
        </div>
        <!-- end导航 -->
        <!-- 搜索 -->
        <div class="search-form">
            <form method="get" action="https://s.iqilu.com/cse/search" id="search-all" target="_blank">
                <input type="hidden" name="s" value="2576961992730276856">
                <input type="hidden" name="entry" value="1">
                <select name="nsid" id="search-ct" style="display:none;">
                    <option value="1" selected="selected">全部</option>
                    <option value="2">新闻</option>
                    <option value="3">视频</option>
                </select>
                <div>
                    <a href="javascript:;" title="全部" class="cat-selected">全部</a>
                    <ul class="cat-list">
                        <li onclick="$(&quot;#search-ct&quot;).val(&quot;1&quot;);"><a href="javascript:;"
                                title="全部">全部</a></li>
                        <li onclick="$(&quot;#search-ct&quot;).val(&quot;2&quot;);"><a href="javascript:;"
                                title="新闻">新闻</a></li>
                        <li onclick="$(&quot;#search-ct&quot;).val(&quot;3&quot;);"><a href="javascript:;"
                                title="视频">视频</a></li>
                    </ul>
                </div>
                <input type="text" name="q" class="keywords" placeholder="站内搜索">
                <input type="submit" name="sa" class="search-btn" value="">
            </form>
        </div>
        <!-- end搜索 -->
    </div>
</div>