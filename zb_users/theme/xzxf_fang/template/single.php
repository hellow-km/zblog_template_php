{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}
    <script src="{$host}zb_system/script/jquery-latest.min.js?v={$version}"></script>
    <style type="text/css">
    /*全局样式*/
    body,
    td,
    th,
    ul,
    ol,
    dl,
    dt,
    dd,
    li,
    div,
    h1,
    h2,
    h3,
    p {
        font-family: "微软雅黑";
        font-size: 15px;
        color: #000;
        margin: 0px auto;
        padding: 0px;
        list-style-type: none;
    }

    a:link,
    a:visited {
        text-decoration: none;
        color: #000;
    }

    a:hover {
        color: #C00;
    }

    /*头部样式*/
    .daoht {
        height: 75px;
        width: 1050px;
        margin-top: 20px;
        margin-right: auto;
        margin-left: auto;
        background-image: url(https://www.xzxw.com/resource/header_bg.jpg);
        position: relative;
        border-bottom: 1px solid #b6d3e1;
        padding-bottom: 15px;
        padding-top: 0px;
    }

    .logo {
        float: left;
        height: 74px;
        width: 256px;
    }

    .enter {
        float: left;
        position: absolute;
        padding-top: 4px;
        line-height: 44px;
        left: 280px;
    }

    .hot_line {
        margin-left: 3px;
        font-size: 14px;
        color: #333;
        line-height: 15px;
    }

    .hot_line span {
        margin-left: 8px;
        font-size: 13px;
        margin-left: 5px;
    }

    .rbkhd {
        float: right;
        height: 70px;
        width: 70px;
        right: 480px;
        position: absolute;
        text-align: center;
    }

    .shuzb {
        float: right;
        height: 70px;
        width: 70px;
        right: 400px;
        position: absolute;
        text-align: center;
    }

    .shuzb1 {
        float: right;
        height: 70px;
        width: 70px;
        right: 320px;
        position: absolute;
        text-align: center;
    }

    /*导航*/
    .nav_100 {
        height: 45px;
        width: 100%;
        background-repeat: repeat-x;
        background-color: #18599d;
    }

    .nav {
        height: 45px;
        width: 1050px;
        margin: auto;
        text-align: center;
    }

    .nav ul li {
        font-size: 15px;
        line-height: 45px;
        color: #FFF;
        float: left;
        height: 45px;
        margin-left: 44px;
    }

    .nav ul li a:link,
    .nav ul li a:visited {
        text-decoration: none;
        color: #FFF;
        font-family: "微软雅黑";
    }

    .nav ul li a:hover {
        color: #c00;
        text-decoration: none;
    }

    .linel {
        background-color: #dedddd;
        height: 1px;
        width: 1050px;
        margin-top: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .daoht .wb {
        float: right;
        height: 70px;
        width: 70px;
        right: 240px;
        position: absolute;
        text-align: center;
    }

    /*搜索框*/
    .info_search {
        margin-top: 10px;
        position: absolute;
        *margin-top: 25px;
        overflow: hidden;
        left: 840px;
        top: -6px;
        width: 216px;
    }

    .info_search input {
        width: 210px;
        height: 40px;
        line-height: 40px !important;
        line-height: 40px\0;
        color: #666;
        padding-left: 0px;
        border: 1px solid #429adc;
        ;
        outline: none;
    }

    .info_search_logo {
        position: absolute;
        top: 8px;
        right: 10px;
        width: 22px;
        height: 22px;
        background: url(https://www.xzxw.com/resource/search_logo.png) no-repeat;
        *top: 9px;
        cursor: pointer;
    }

    .search_cc {
        float: right;
        height: 50px;
        width: 210px;
    }

    .source .s .w {
        font-weight: normal;
    }

    /*页尾*/
    .copyright20170320 {
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

    .copyright20170320 p a:link,
    .copyright20170320 p a:visited {
        color: #FFF;
        text-decoration: none;
    }

    .copyright20170320 p a:hover,
    .copyright20170320 p a:active {
        color: #c00;
        text-decoration: none;
    }

    .copyright20170320 p {
        width: 1050px;
        height: 25px;
        color: #FFF;
        padding-top: 5px;
        text-align: center;
        font-size: 14px;
    }

    .copyright20170320 .nr {
        height: 220px;
        width: 1050px;
        margin-right: auto;
        margin-left: auto;
        position: relative;
        padding-top: 10px;
    }

    .copyright20170320 .nr .fb1 {
        background-image: url(https://www.xzxw.com/resource/blue.png);
        background-repeat: no-repeat;
        height: 59px;
        width: 80px;
        position: absolute;
        left: 210px;
        top: 146px;
    }

    .copyright20170320 .nr .fb2 {
        background-image: url(https://www.xzxw.com/resource/ahaha.jpg);
        height: 50px;
        width: 130px;
        position: absolute;
        left: 319px;
        top: 150px;
    }

    .copyright20170320 .nr .fb3 {
        height: 50px;
        width: 130px;
        position: absolute;
        left: 501px;
        top: 150px;
    }

    .copyright20170320 .nr .fb4 {
        height: 50px;
        width: 130px;
        position: absolute;
        left: 683px;
        top: 150px;
    }

    /*内容*/
    .tbig_title {
        width: 1050px;
        margin: 0px auto
    }

    .tbig_title h1 {
        font: bold 18px/150% "微软雅黑";
        margin: 15px auto;
        clear: both;
        width: 92%;
        color: #333;
        text-align: center;
    }

    .tbig_title h2 {
        font: bold 30px/150% "微软雅黑";
        margin: 15px auto;
        clear: both;
        width: 92%;
        color: #333;
        text-align: center;
    }

    .tbig_title h3 {
        font: bold 22px/150% "微软雅黑";
        margin: 15px auto;
        clear: both;
        width: 92%;
        color: #333;
        text-align: center;
    }

    .warp {
        width: 1000px;
        margin: 0 auto;
        overflow: hidden;
    }

    .wt695 {
        width: 100%;
        float: left;
    }

    .wt275 {
        width: 275px;
        float: right;
    }

    .left {
        float: left;
    }

    .pindao_title {
        background: url(https://www.xzxw.com/resource/xlm_xx3.jpg) no-repeat;
        background-position: 0px 30px;
        height: 41px;
        line-height: 41px
    }

    .pindao_title h3 {
        font-family: "微软雅黑";
        font-size: 16px;
        font-weight: bold;
        color: #18599d
    }

    .pindao_content {
        border-top: none
    }

    .pindao_content ul {
        margin: auto 0px;
    }

    .pindao_content ul li {
        height: 30px;
        line-height: 30px;
        font-size: 14px
    }

    .pindao_content ul li a {
        color: #333333
    }

    .pindao_content1 {
        border-top: none;
        overflow: hidden;
    }

    .pindao_content1 ul {
        margin: auto 0px;
    }

    .pindao_content1 ul li {
        height: 30px;
        line-height: 30px;
        font-size: 12px;
        white-space: nowrap;
        *line-height: 28px;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .pindao_content1 ul li a {
        color: #333333
    }

    .pindao_content1 ul li span a,
    .pindao_content ul li span a {
        color: #666;
        margin-right: 4px
    }

    .phont_img {
        overflow: hidden;
        width: 100%;
        height: 160px;
        margin: auto 10px;
    }

    .phont_img p {
        width: 242px;
        bottom: 35px;
        position: relative;
        height: 35px;
        line-height: 35px;
        padding-left: 10px;
        font-size: 16px;
        background: black;
        opacity: 0.7;
        filter: alpha(opacity=70);
        *bottom: 36px;
        *height: 32px;
    }

    .phont_img p a {
        color: white;
        font-size: 12px;
    }

    .phont_img1 {
        overflow: hidden;
        height: 162px;
        margin: 5px;
        position: relative;
    }

    .phont_img1 img {
        overflow: hidden;
        height: 162px
    }

    .phont_img1 p {
        width: 270px;
        bottom: 30px;
        position: absolute;
        bottom: 0;
        height: 28px;
        line-height: 28px;
        text-align: center;
        font-size: 12px;
        background: black;
        opacity: 0.7;
        filter: alpha(opacity=70);
    }

    .phont_img1 p a {
        color: white;
    }

    .guanggao_img {
        overflow: hidden;
        widows: 100%;
    }

    /*璇︾粏鏂伴椈*/
    .xw_content {
        margin-top: 2px;
    }

    .pd6 {
        padding: 1px 5px;
        background: #8599ce;
        color: white;
        margin-left: 2px
    }

    .xw_daodu {
        margin-top: 8px;
        background: #f7f7f7
    }

    .xw_daodu_content {
        width: 880px;
        margin: auto 15px;
        padding: 6px 0 3px;
    }

    .xw_daodu_content p {
        font-size: 12px;
        line-height: 30px;
        color: #333333;
        *line-height: 31px
    }

    .xw_daodu_content p b {
        font-size: 14px;
        margin-right: 10px
    }

    .xw_daodu_detail {
        margin: 10px
    }

    .xw_daodu_detail p {
        /*text-indent: 2em;*/
        font-size: 18px;
        line-height: 32px;
        color: #414141;
    }

    .xw_daodu_detail .ft12 {
        font-size: 12px;
    }

    .xw_daodu_detail p img {
        margin: auto;
        max-width: 750px;
        /*margin-right:35px;*/
        margin-top: 10px
    }

    .mb10 {
        margin-bottom: 10px;
    }

    .xw_daodu_line {
        width: 995px;
        height: 2px;
    }

    .center {
        text-align: center;
        display: block;
        margin-bottom: 10px;
        margin-top: 5px;
        font-size: 12px;
    }

    /*鍒嗛〉*/
    .fenye {
        width: 400px;
        margin: 0 auto
    }

    .fenye a {
        width: 35px;
        margin-left: 4px;
        height: 27px;
        display: block;
        text-align: center;
        font-size: 12px;
        line-height: 27px;
        float: left;
        border: 1px solid #e6e5e5;
        color: #b6b6b6;
    }

    .art {
        background: #167cca;
    }

    a.art {
        color: white;
        border: 1px solid #167cca;
    }

    /*鍒嗛〉*/
    .read {}

    .read_title {
        height: 39px;
        background: #f7f7f7;
    }

    .bdt {
        height: 2px;
        margin-bottom: 1px;
        background: #f0f0f0;
    }

    .read_title1 h3 {
        font-size: 14px;
        height: 37px;
        line-height: 37px;
        padding: 0px 10px 0 3px;
        color: #1b4f88;
    }

    .i1 {
        /*background: url(icon80.jpg) no-repeat center center;*/
        padding: 1px 8px;
        position: relative;
    }

    .read_title1 h3 span {
        float: right;
        color: #666666;
        font-size: 12px;
        font-weight: normal;
        color: #333;
    }

    .read_login {
        background: #f7f7f7;
        height: 204px;
        line-height: 204px;
        border: #eaeaea 1px solid;
    }

    .read_login_user {
        width: 250px;
        margin: 0 auto
    }

    .read_login_user p {
        font-size: 12px;
        color: #c2c2c2
    }

    .read_login_user p a {
        color: #1b4f88
    }

    .textr {
        text-align: right;
        margin-top: 20px;
    }

    .read_datail {}

    .read_datail ul {
        margin: 14px auto
    }

    .read_datail ul li {
        padding-right: 15px;
        padding-left: 17px;
        background: url(icon99.jpg) no-repeat 8px center;
        height: 36px;
        line-height: 36px;
        font-size: 14px
    }

    .read_datail ul li a span {
        font-size: 12px;
        color: #666666;
        float: right
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


        {template:headers/header3}
        {template:news/index}
        {template:news/footer}

    </div>
</body>

<script>
jQuery(function($) {
    var as = document.getElementsByTagName("a");
    for (let i = 0; i < as.length; i++) {
        as[i].target = "_self";
        if (as[i].href.indexOf(location.host) == -1) {
            as[i].href = "javascript:void(0)";
        }
    }
});
</script>

</html>