{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>

    {template:header}
</head>


<body>
    <div class="container" id="page">
        {template:header2}

        {template:content}

        {template:footer}
    </div>
</body>

<script type="text/javascript">
jQuery(function($) {
    var as = document.getElementsByTagName("a");
    for (let i = 0; i < as.length; i++) {
        as[i].target = "_self";
        if (as[i].href.indexOf(location.host) == -1) {
            as[i].href = "javascript:void(0)";
        }
    }
});
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

</html>