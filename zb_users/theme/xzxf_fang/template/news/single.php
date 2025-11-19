<div style=" width:1050px; height:38px; margin:0px auto; font-size:14px; text-align:left;line-height:38px"> 您当前的位置：<a
        href="/" target="_blank" class="CurrChnlCls">中国西藏新闻网</a>&nbsp;&gt;&nbsp;<a
        href="https://www.xzxw.com/xw/index.html" target="_blank" class="CurrChnlCls">新闻</a>&nbsp;&gt;&nbsp;<a
        href="https://www.xzxw.com/xw/xzyw/index.html" target="_blank" class="CurrChnlCls">{$article->Category.Name}</a>
</div>
<div class="tbig_title">
    <h1></h1>
    <h2>{$article.Title}</h2>
    <h3>{$article.Intro}</h3>
</div>

<div style="width:1050px; margin:0px auto; border-bottom:1px #CCCCCC solid;height:52px;">
    <div
        style=" width:800px; height:40px;margin:0px auto; font-size:14px; line-height:50px; float:left;text-align:left">
        {$article.Time('Y-m-d
        h:m')}&nbsp;&nbsp;&nbsp;&nbsp;来源：中国西藏新闻网&nbsp;&nbsp;&nbsp;&nbsp;{$article->Author??$article->Author.Name}</div>
    <!-- JiaThis Button BEGIN -->
    <div style=" margin-top:12px; float:left; width:55px; text-align:left; font-size:14px;">分享到:</div>
    <div class="bdsharebuttonbox bdshare-button-style0-32" style=" margin-left:-4px;" data-bd-bind="1763537858271"><a
            href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone"
            data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a
            href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_more"
            data-cmd="more"></a></div>
    <script>
    window._bd_share_config = {
        "common": {
            "bdSnsKey":

            {},
            "bdText": "",
            "bdMini": "2",
            "bdMiniList": false,
            "bdPic": "",
            "bdStyle": "0",
            "bdSize": "32"
        },
        "share": {},
        "image": {
            "viewList":

                ["qzone", "tsina", "tqq", "renren", "weixin"],
            "viewText": "分享到：",
            "viewSize": "16"
        },
        "selectShare": {
            "bdContainerClass": null,
            "bdSelectMiniList":

                ["qzone", "tsina", "tqq", "renren", "weixin"]
        }
    };
    with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement

        ('script')).src = 'https://www.xzxw.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-
        new Date() / 36e5)];
    </script>
    <!-- JiaThis Button END -->
</div>

<div class="warp" style=" margin-top:20px;">
    <!--左边新闻开始-->
    <div class="wt695">
        <!--
    <div class="xw_daodu_line"></div>-->
        <div class="ht12"></div>
        <div class="xw_daodu_detail">
            {$article.Content}
        </div>
        <div class="ht13"></div>
        <div class="read" style="padding-top: 100px;">
            <div class="bdt"></div>
            <div class="read_title">
                <div class="read_title1">
                    <h3><i class="i1"></i>相关阅读<i class="i1"></i></h3>
                </div>
            </div>
            <style type="text/css">
            .read_datail ul li span {
                float: right;
            }
            </style>
            <div class="read_datail">
                <ul></ul>
            </div>
        </div>

        <div class="ht40"></div>
    </div>
    <!--左边新闻结束-->
    <div class="clear"></div>
</div>