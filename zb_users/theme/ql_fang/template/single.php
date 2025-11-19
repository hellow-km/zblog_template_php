{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}

    {if $pathname == "/"}
    {template:header}
    {else}
    {template:header3}
    {/if}
</head>


{php}
$breadName = "";

switch ($pathname) {
case "/ccxw":
$breadName = "长春新闻";
break;

case "/ccfc":
$breadName = "长春房产";
break;

case "/ccjj":
$breadName = "长春经济";
break;

case "/ccly":
$breadName = "长春旅游";
break;

case "/ccqc":
$breadName = "长春汽车";
break;

case "/ccms":
$breadName = "长春美食";
break;

case "/cczp":
$breadName = "长春招聘";
break;

case "/ccjy":
$breadName = "长春教育";
break;
}
{/php}

<body>
    <div class="container">

        {if $pathname == "/"}
        {template:header2}
        {template:content}
        {template:footer}
        {else}
        {template:news/header}
        {template:news/index}
        {template:news/footer}
        {/if}

    </div>
</body>


</html>