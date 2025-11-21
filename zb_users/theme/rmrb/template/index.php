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

<script>
jQuery(function($) {

    var as = document.getElementsByTagName("a")
    for (let i = 0; i < as.length; i++) {
        if (as[i].href.indexOf(location.host) == -1) {
            javascript:void(0)
        }
    }
    NFCHelper.setMenuCurrentCategory(10);

    function wxShow(nodeId) {
        (function($) {
            let imgNode = $("#" + nodeId + " img");
            let txBaseUrl = imgNode.attr('src');
            let ourBaseUrl = imgNode.attr('rel');
            imgNode.hover(function() {
                $(this).fadeOut(500, function() {
                    $(this).attr('src', ourBaseUrl).fadeIn(750);
                });
            }, function() {
                $(this).fadeOut(500, function() {
                    $(this).attr('src', txBaseUrl).fadeIn(750);
                });
            });
        })(jQuery);
    };
    wxShow('w0')
    oVersionHelper = new VersionHelper();
    oVersionHelper.start();
});
</script>

</html>