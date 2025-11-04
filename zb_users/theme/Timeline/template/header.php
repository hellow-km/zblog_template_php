{* Template Name:公共头部 *}
<?php die();?><!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
	<meta charset="utf-8">
	<!--微信图片微信图片不显示de -->
	<meta name="referrer" content="never">
    <!--百度站长 -->
	<meta name="baidu-site-verification" content="BR4OJUVTh4" />
	<meta http-equiv="Content-Language" content="{$language}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
{if $type=='article'}
	<title>{$title}_{$article.Category.Name}_{$name}</title>
	<meta name="keywords" content="{foreach $article.Tags as $tag}{$tag.Name},{/foreach}">
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...');{/php}
	<meta name="description" content="{$description}">
{elseif $type=='page'}
	<title>{$title}_{$name}</title>
	<meta name="keywords" content="{$title},{$name}">
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...');{/php}
	<meta name="description" content="{$description}">
	<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
	<title>{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}</title>
	<meta name="Keywords" content="{$zbp->Config('Timeline')->keywords}">
	<meta name="description" content="{$zbp->Config('Timeline')->description}">
{elseif $type=='category'}
	<title>{$title}_{$name}</title>
	<meta name="Keywords" content="{$title},{$name}">
	<meta name="description" content="{$category.Intro}">
{else}
	<title>{$title}_{$name}</title>
	<meta name="Keywords" content="{$zbp->Config('Timeline')->keywords}">
	<meta name="description" content="{$zbp->Config('Timeline')->description}">
{/if}
	<link href="{$host}zb_users/theme/{$theme}/style/main.css?v=1.1" rel="stylesheet">
	<script src="{$host}zb_system/script/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
	<script src="{$host}zb_users/theme/{$theme}/js/main.js?v=1.1" type="text/javascript"></script>
{if $type=='index'&&$page=='1'}
	<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}">
{/if}
<style type="text/css">
body,.mainlist li .readmore,.relist h3,.pages a:hover{background-color:#{$zbp->Config('Timeline')->mcolor};}
.content{box-shadow:#{$zbp->Config('Timeline')->mcolor} 0 1px 10px;}
.plist figure p a{color:#{$zbp->Config('Timeline')->mcolor};}
</style>
<script>
(function(){
    // 360
var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
document.write('<script src="' + src + '" id="sozz"><\/script>');
// bai'du百度 
 var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https'){
   bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  }
  else{
  bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</head>
<body>
<header>
	<div class="logo" data-scroll-reveal="enter right over 1s"><a href="{$host}"><img src="{$zbp->Config('Timeline')->logopic}"></a></div>
    <div class="search">
        <form action="{$host}zb_system/cmd.php?act=search" name="search" method="post">
            <input type="text" name="q" autocomplete="off" value="" class="int">
            <button type="submit" class="btn">搜</button>
        </form>
    </div>
	<nav class="topnav">
		{module:navbar}
	</nav>
</header>
