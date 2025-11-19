<div class="warp">
    <div class="ht7"></div>
    <!--当前位置-->
    <div class="nszw">
        <p> 您当前的位置：<a href="/" target="_self" class="CurrChnlCls">西藏新闻网</a>&nbsp;&gt;&nbsp;<a
                href="https://www.xzxw.com/xw/index.html" target="_self" class="CurrChnlCls">新闻</a>&nbsp;&gt;&nbsp;<a
                href="https://www.xzxw.com/xw/msxw/index.html" target="_self" class="CurrChnlCls">{$category.Name}</a>
        </p>
    </div>
    <!--当前位置结束-->
    <!--左边新闻开始-->
    <div class="wt695 left visit">
        <div class="ht13"></div>
        <div class="visit_title">
            <h3>{$category.Name}</h3>
        </div>

        <div class="visit_detail">
            <div class="ht3"></div>
            {foreach $articles as $i=>$a}

            {if $i % 5 == 0}
            <ul>
                {/if}

                <li style="height:auto;">
                    <a href="{$a.Url}" target="_self" title="{$a.Title}">
                        {$a.Title}
                    </a>
                    <span style="float:right;">{$a.Time("Y-m-d")}</span>
                </li>

                {if $i % 5 == 4 || $i == count($articles)-1}
            </ul>
            {/if}

            {/foreach}
            <div class="line20 clear"></div>
        </div>

        {template:pagebar}
    </div>
    <!--左边新闻结束-->
    <!--右边新闻开始-->
    {template:sidebar}
    <!--右边新闻结束-->
    <div class="clear ht30"></div>
</div>