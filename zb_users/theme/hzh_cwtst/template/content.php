{php}
$pathname = $_SERVER['REQUEST_URI'];
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


{if $pathname == "/"}
{template:content/index-top}
{template:content/index-white-bg}
{else}
{template:news/index}
{/if}