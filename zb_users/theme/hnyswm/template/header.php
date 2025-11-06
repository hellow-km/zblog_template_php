<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="PAGE-ENTER" content="RevealTrans(Duration=0,Transition=1)" />
{if $zbp->Config('hnyswm')->seo}{template:post-header-seo}{else}
<title>{$name}-{$title}</title>
{/if}
<link rel="shortcut icon" href="{$zbp->Config('hnyswm')->favicon}" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/css/pintuer.css" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/css/iconfont.css" />
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/css/flexslider.css" type="text/css" media="screen" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/style/js/main.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/style/js/pintuer.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/style/css/iconfont.js" type="text/javascript"></script>
<style type="text/css">
.icon { width: 1.4em; height: 1.4em; vertical-align: -0.35em; fill: currentColor; overflow: hidden; }
</style>
</head><body id="index_box_id">
<header id="fh5co-header"> 
  <!--切换中英文代码-->
  <div class="ww100">
    <div id="hntop" class="container"> {if $zbp->Config('hnyswm')->gonggao}
      <div class="hntopleft">
        <p>
          <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-gonggao"></use>
          </svg>
          <a target="_blank" href="{$zbp->Config('hnyswm')->gonggaourl}">{$zbp->Config('hnyswm')->gonggao}</a></p>
      </div>
      {/if}
      <div class="hntopright"> {if $zbp->Config('hnyswm')->china}
        <li>
          <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-zhongwen"></use>
          </svg>
          <a target="_blank" href="{$zbp->Config('hnyswm')->china}">中文版</a></li>
        {/if}
        {if $zbp->Config('hnyswm')->english}
        <li>
          <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-yingwen"></use>
          </svg>
          <a target="_blank" href="{$zbp->Config('hnyswm')->english}">English</a></li>
        {/if} </div>
    </div>
  </div>
  <div class="layout">
    <div class="container">
      <div class="xm4 xs4 xl12 logo"> <a href="{$host}"><img src="{$zbp->Config('hnyswm')->logo}"/></a> </div>
      <div class="xm8  xs8 xl12 search-top nav-navicon" id="form-search">
        <div class="float-right">
          <form name="serch-form" action="{$host}zb_system/cmd.php?act=search" method="post">
            {if $zbp->Config('hnyswm')->enandch}
            <input name="q" type="text" class="inputkey" id="search-keyword" style="color:#ccc" value="keyword" onfocus="if(this.value=='keyword'){this.value='';}"  onblur="if(this.value==''){this.value='keyword';}" />
            <input type="submit" name="search" class="go" value="ok" />
            {else}
            <input name="q" type="text" class="inputkey" id="search-keyword" style="color:#ccc" value="关键词" onfocus="if(this.value=='关键词'){this.value='';}"  onblur="if(this.value==''){this.value='关键词';}" />
            <input type="submit" name="search" class="go" value="搜索" />
            {/if}
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="layout hidden-s hidden-m hidden-b nav_bg">
    <div class="container"><span class="text-white">{if $zbp->Config('hnyswm')->enandch}Web navigation{else}网站导航{/if}</span>
      <button class="iconfont  icon-daohang" data-target="#nav-main1"> </button>
      <button class="iconfont icon-sousuo1" data-target="#form-search"> </button>
    </div>
  </div>
  <div class="layout fixed header-nav bg-main bg-inverse">
    <div class="container">
      <ul class="nav nav-menu nav-inline  nav-navicon" id="nav-main1">
        {if $zbp->Config('hnyswm')->ysnavon}
        {$zbp->Config('hnyswm')->ysnav}
        {else}
        {module:navbar} {/if}
      </ul>
     <script type="text/javascript">
	 $(document).ready(function() {
    var A = document.location;
    $(".nav a").each(function() {
        if (this.href == A.toString().split("#")[0]) {
            $(this).addClass("cur");
            return false;
        }
    });
 });</script>
    </div>
  </div>
</header>
