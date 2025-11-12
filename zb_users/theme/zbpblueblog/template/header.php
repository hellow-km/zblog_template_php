<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
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
{php}
	if($zbp->Config('zbpblueblog')->separator){
		$separator = $zbp->Config('zbpblueblog')->separator;
	}else{
		$separator = '_';
	}
	if($type =='index'){
		if($page == '1'){
			if($zbp->Config('zbpblueblog')->title){
				$topTitle = $zbp->Config('zbpblueblog')->title;
			}else{
				$topTitle = $zbp->name.$separator.$zbp->subname;
			}
		}else{
			if($zbp->Config('zbpblueblog')->title){
				$topTitle = $zbp->Config('zbpblueblog')->title.$separator.'第'.$page.'页';
			}else{
				$topTitle = $zbp->name.$separator.'第'.$page.'页'.$separator.$zbp->subname;
			}			
		}
		$keywords = $zbp->Config('zbpblueblog')->keywords;
		$description = $zbp->Config('zbpblueblog')->description;
	}elseif($type == 'category'){
		if ($page=='1') {
            $topTitle = $zbp->title.$separator.$zbp->name;
        } else {
            $topTitle = $zbp->title.$separator.'第'.$page.'页'.$separator.$zbp->name;
        }
		$keywords = $category->Name;
		$description = $category->Intro;      
	}elseif($type == 'article'){
		$topTitle = $article->Title.$separator.$article->Category->Name.$separator.$zbp->name;		
        $aryTags = array();
        foreach($article->Tags as $key){
            $aryTags[] = $key->Name;
        }
        if(count($aryTags)>0){
            $keywords = implode(',',$aryTags);
        } else {
            $keywords = $zbp->name.','.$zbp->Config('zbpblueblog')->keywords;
        }
		$description = zbpblueblog_intro($article,1,80,'');
	}elseif($type == 'page'){
		$topTitle = $article->Title.$separator.$zbp->name;		
        $keywords = $article->Title . ',' . $zbp->Config('zbpblueblog')->keywords;
		$description = zbpblueblog_intro($article,1,80,'');
	}else {
        if($page>'1') {
            $topTitle = $zbp->title.$separator.'第'.$page.'页'.$separator.$zbp->name;
        } else {
            $topTitle = $zbp->title.$separator.$zbp->name;
        }
		$keywords = $zbp->Config('zbpblueblog')->keywords;
        $description = $zbp->Config('zbpblueblog')->description;        
    }
{/php}
<title>{$topTitle}</title>
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$description}" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/style.css" media="screen"/>
<script src="{$host}zb_system/script/jquery-latest.min.js" type="text/javascript"></script>
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
<div class="topbar">
	<div class="inner">
		{$subname}
	</div>
</div>
<header class="header">
	<div class="inner">
		<div class="logo">
			<a href="{$host}" title="{$name}"><img src="{$host}zb_users/theme/{$theme}/style/images/logo.png" alt="{$name}"/></a>
		</div>
		<div class="search">
			<form name="search" method="post" action="{$host}zb_system/cmd.php?act=search">
				<input type="text" name="q" id="edtSearch" class="s" value="" placeholder="请输入搜索关键词"/>
				<input type="submit" name="submit" id="btnPost" class="submit" value=""/>
			</form>
		</div>
		<div id="navbtn">
			<i></i>
		</div>
	</div>
</header>
<nav class="nav">
	<div class="inner">
		<ul>
			{module:navbar}
		</ul>
	</div>
</nav>
