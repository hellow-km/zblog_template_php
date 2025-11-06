<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="applicable-device" content="mobile"/>
<meta name="renderer" content="webkit"/>
<meta name="format-detection" content="telephone=no"/>
<meta content="email=no" name="format-detection"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<title>{$title}-{$name}</title>
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/style.css" type="text/css" media="screen" />
<script src="{$host}zb_system/script/jquery-latest.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
<script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/boke8.js"></script>
{$header}
{if $type=='index' && $page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
{/if}
{if $type == 'index'}
<link rel="canonical" href="{$host}" />
{elseif $type == 'category'}
<link rel="canonical" href="{$category.Url}" />
{elseif $type == 'tag'}
<link rel="canonical" href="{$tag.Url}" />
{elseif $type == 'page' || $type == 'article'}
<link rel="canonical" href="{$article.Url}" />
{/if}
</head>
<body>
<header id="header">
	<div class="inner">
		<h1 id="logo">			
			<a href="{$host}" title="{$name}">{$name}<small>{$subname}</small></a>			
		</h1>
		<div id="navbtn">
			<i></i>
		</div>
		<nav id="nav">
			<ul>
	          {module:navbar}
	        </ul>
		</nav>
	</div>
</header>
