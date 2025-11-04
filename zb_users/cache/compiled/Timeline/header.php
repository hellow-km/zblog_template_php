<?php  /* Template Name:公共头部 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
	<meta charset="utf-8">
	<!--微信图片微信图片不显示de -->
	<meta name="referrer" content="never">
    <!--百度站长 -->
	<meta name="baidu-site-verification" content="BR4OJUVTh4" />
	<meta http-equiv="Content-Language" content="<?php  echo $language;  ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ($type=='article') { ?>
	<title><?php  echo $title;  ?>_<?php  echo $article->Category->Name;  ?>_<?php  echo $name;  ?></title>
	<meta name="keywords" content="<?php  foreach ( $article->Tags as $tag) { ?><?php  echo $tag->Name;  ?>,<?php }   ?>">
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...'); ?>
	<meta name="description" content="<?php  echo $description;  ?>">
<?php }elseif($type=='page') {  ?>
	<title><?php  echo $title;  ?>_<?php  echo $name;  ?></title>
	<meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...'); ?>
	<meta name="description" content="<?php  echo $description;  ?>">
	<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
<?php }elseif($type=='index') {  ?>
	<title><?php  echo $name;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>_<?php  echo $subname;  ?></title>
	<meta name="Keywords" content="<?php  echo $zbp->Config('Timeline')->keywords;  ?>">
	<meta name="description" content="<?php  echo $zbp->Config('Timeline')->description;  ?>">
<?php }elseif($type=='category') {  ?>
	<title><?php  echo $title;  ?>_<?php  echo $name;  ?></title>
	<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
	<meta name="description" content="<?php  echo $category->Intro;  ?>">
<?php }else{  ?>
	<title><?php  echo $title;  ?>_<?php  echo $name;  ?></title>
	<meta name="Keywords" content="<?php  echo $zbp->Config('Timeline')->keywords;  ?>">
	<meta name="description" content="<?php  echo $zbp->Config('Timeline')->description;  ?>">
<?php } ?>
	<link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/main.css?v=1.1" rel="stylesheet">
	<script src="<?php  echo $host;  ?>zb_system/script/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
	<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
	<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/js/main.js?v=1.1" type="text/javascript"></script>
<?php if ($type=='index'&&$page=='1') { ?>
	<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>">
<?php } ?>
<style type="text/css">
body,.mainlist li .readmore,.relist h3,.pages a:hover{background-color:#<?php  echo $zbp->Config('Timeline')->mcolor;  ?>;}
.content{box-shadow:#<?php  echo $zbp->Config('Timeline')->mcolor;  ?> 0 1px 10px;}
.plist figure p a{color:#<?php  echo $zbp->Config('Timeline')->mcolor;  ?>;}
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
<?php  echo $header;  ?></head>
<body>
<header>
	<div class="logo" data-scroll-reveal="enter right over 1s"><a href="<?php  echo $host;  ?>"><img src="<?php  echo $zbp->Config('Timeline')->logopic;  ?>"></a></div>
    <div class="search">
        <form action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" name="search" method="post">
            <input type="text" name="q" autocomplete="off" value="" class="int">
            <button type="submit" class="btn">搜</button>
        </form>
    </div>
	<nav class="topnav">
		<?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
	</nav>
</header>
