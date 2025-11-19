{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}

    {if $pathname == "/"}
    {template:header_links/header}
    {else}
    {template:header_links/header3}
    {/if}

    <style type="text/css">
    a:hover {
        color: #F90;
        text-decoration: underline;
    }

    a:link,
    a:visited {
        text-decoration: none;
        color: #000;

    }

    .qlfooter {
        height: 230px;
        width: 100%;
        background-color: #174a8b;
        text-align: center;
        line-height: 20px;
        color: #000;
        font-size: 12px;
        margin-top: 10px;
        margin-right: auto;
        margin-bottom: 20px;
        margin-left: auto;
    }

    .qlfooter p a:link,
    .qlfooter p a:visited {
        color: #FFF;
        text-decoration: none;
    }

    .qlfooter p a:hover,
    .qlfooter p a:active {
        color: #FFF;
        text-decoration: underline;
    }

    .qlfooter p {
        width: 1050px;
        height: 25px;
        color: #FFF;
        padding-top: 5px;
        text-align: center;
    }

    .qlfooter .qlfoot1 p {
        line-height: 25px;
        text-align: center;
    }

    .qlfooter .qlfoot1 {
        height: 220px;
        width: 1050px;
        margin-right: auto;
        margin-left: auto;
        position: relative;
        padding-top: 10px;
    }

    .qlfooter .qlfoot1 .fb1 {
        background-image: url(https://www.xzxw.com/resource/blue.png);
        background-repeat: no-repeat;
        height: 59px;
        width: 80px;
        position: absolute;
        left: 210px;
        top: 146px;
    }

    .qlfooter .qlfoot1 .fb2 {
        background-image: url(https://www.xzxw.com/resource/ahaha.jpg);
        height: 50px;
        width: 130px;
        position: absolute;
        left: 319px;
        top: 150px;
    }

    .qlfooter .qlfoot1 .fb3 {
        height: 50px;
        width: 130px;
        position: absolute;
        left: 501px;
        top: 150px;
    }

    .qlfooter .qlfoot1 .fb4 {
        height: 50px;
        width: 130px;
        position: absolute;
        left: 683px;
        top: 150px;
    }
    </style>
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
        {template:headers/header}
        {template:content}
        {template:footer}
        {else}
        {template:headers/header2}
        {template:news/index}
        {template:news/footer}
        {/if}

    </div>
</body>


</html>