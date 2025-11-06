<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/RegBuildModule.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions/common.php';
RegisterPlugin("hnyswm","ActivePlugin_hnyswm");
function ActivePlugin_hnyswm() {
	global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','hnyswm_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','hnyswm_article_AE');
	if ($zbp->Config('hnyswm')->seo=="1"){
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','hnyswm_cate_seo');
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','hnyswm_tag_seo');
	}
}
function hnyswm_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/hnyswm/main.php?act=bas","","topmenu_hnyswm"));
	}
function hnyswm_SubMenu($id){
	$arySubMenu = array(
		//0 => array('主题说明', 'wiki', 'left', false),
		1 => array('基本设置', 'bas', 'left', false),
		2 => array('首页版块设置', 'index', 'left', false),
		3 => array('首页SEO设置', 'seo', 'left', false),
		4 => array('侧栏设置', 'celan', 'left', false),
		5 => array('自定义导航', 'nav', 'left', false),
		6 => array('轮播图', 'banner', 'left', false),
		7 => array('联系方式', 'contact', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}
function InstallPlugin_hnyswm(){
	global $zbp;
	if(!$zbp->Config('hnyswm')->HasKey('Version')){
		$zbp->Config('hnyswm')->Version = '1.0';
		
  //首页设置
  $zbp->Config('hnyswm')->favicon = $zbp->host . 'zb_users/theme/hnyswm/style/favicon.ico';
  $zbp->Config('hnyswm')->logo = $zbp->host . 'zb_users/theme/hnyswm/style/logo.png';
  $zbp->Config('hnyswm')->labj = $zbp->host . 'zb_users/theme/hnyswm/style/images/list_bj.jpg';
  $zbp->Config('hnyswm')->labjon = '1';
  $zbp->Config('hnyswm')->gonggao = '这里是一段网站公告';//网站公告
  $zbp->Config('hnyswm')->gonggaourl = 'http://www.hnysnet.com';//网站公告链接 
  $zbp->Config('hnyswm')->china = '#';
  $zbp->Config('hnyswm')->english = '#';
  $zbp->Config('hnyswm')->enandch = '0';
  //版块设置
  $zbp->Config('hnyswm')->ysproduct = '1';
  $zbp->Config('hnyswm')->ysproduct1 = '一句话介绍这里吧！这里添加一段文字显示的更加美观';
  $zbp->Config('hnyswm')->ysabout = '1';
  $zbp->Config('hnyswm')->ysaboutzy = '这里是关于我们版块在首页显示的摘要内容';
  $zbp->Config('hnyswm')->yscase = '1';
  $zbp->Config('hnyswm')->ysnews = '1';
  //侧栏设置
  $zbp->Config('hnyswm')->clnav = '<li><i class="iconfont icon-jiantouxiangyou"></i><a href="#" title="关于我们">公司新闻</a></li><li><i class="iconfont icon-jiantouxiangyou"></i><a href="#" title="行业动态">行业动态</a></li>';
  $zbp->Config('hnyswm')->clnavon = '1';
  //自定义导航
  $zbp->Config('hnyswm')->ysnavon = '0';
  $zbp->Config('hnyswm')->ysbnavon = '0';
  $zbp->Config('hnyswm')->ysnav = '<li ><a href="/">首页</a></li>
<li><a href="#网址">一级分类</a></li>
<li><a href="#网址">一级分类</a>
<ul class="drop-menu">
<li><a href="#网址">二级分类</a></li>
<li><a href="#网址">二级分类</a></li>
</ul></li>
<li><a href="#网址">一级分类</a></li>';
  $zbp->Config('hnyswm')->ysbnav = '<li><a href="#">关于我们</a></li>|<li><a href="#">联系我们</a></li>|<li><a href="#">服务支持</a></li>|<li><a href="#">意见反馈</a></li>|<li><a href="#">常见问题</a></li>';
  //首页seo配置
   $zbp->Config('hnyswm')->seo ='1'; //seo开关
   $zbp->Config('hnyswm')->ystitle = '网站标题，网站大标题+后缀关键词为宜（一般不超过80个字符）'; //首页title标题
   $zbp->Config('hnyswm')->yskeywords = '网站关键字,用英文的逗号隔开！（一般不超过100个字符）'; //首页keywords关键词
   $zbp->Config('hnyswm')->ysdescription = '用一段话描述你的网站！（一般不超过200个字符）'; //首页description描述
   //轮播图
   $zbp->Config('hnyswm')->banner1 = $zbp->host . 'zb_users/theme/hnyswm/style/images/banner1.jpg';
   $zbp->Config('hnyswm')->banner2 = $zbp->host . 'zb_users/theme/hnyswm/style/images/banner2.jpg';
   $zbp->Config('hnyswm')->banner3 = $zbp->host . 'zb_users/theme/hnyswm/style/images/banner3.jpg';
   $zbp->Config('hnyswm')->banner4 = $zbp->host . 'zb_users/theme/hnyswm/style/images/banner4.jpg';
   $zbp->Config('hnyswm')->banner1url = '#链接';
   $zbp->Config('hnyswm')->banner2url = '#链接';
   $zbp->Config('hnyswm')->banner3url = '#链接';
   $zbp->Config('hnyswm')->banner4url = '#链接';
   $zbp->Config('hnyswm')->banner1alt = '图片名称';
   $zbp->Config('hnyswm')->banner2alt = '图片名称';
   $zbp->Config('hnyswm')->banner3alt = '图片名称';
   $zbp->Config('hnyswm')->banner4alt = '图片名称';
   $zbp->Config('hnyswm')->banner1show = '1';
   $zbp->Config('hnyswm')->banner2show = '1';
   $zbp->Config('hnyswm')->banner3show = '0';
   $zbp->Config('hnyswm')->banner4show = '0';
   //联系方式
   $zbp->Config('hnyswm')->yslx = '<p><i class="iconfont icon-icon-home"></i>河南燕山网络科技有限公司</p>
<p><i class="iconfont icon-dizhi"></i>河南省郑州市经济开发区哈航海东路1319号</p>
<p><i class="iconfont icon-lianxiren"></i>张经理</p>
<p><i class="iconfont icon-phone"></i>15639981097</p>
<p><i class="iconfont icon-dianhua"></i>0371-12345678</p>
<p><i class="iconfont icon-chuanzhen"></i>0371-12345678</p>
<p><i class="iconfont icon-youxiang"></i>hnysnet@qq.com</p>
'; 
   $zbp->Config('hnyswm')->clearSetting ='0';
   $zbp->Config('hnyswm')->hnyswm_pro = '0';
   $zbp->SaveConfig('hnyswm');
	}
}

  //清除主题配置
function UninstallPlugin_hnyswm(){
	global $zbp;
	if ($zbp->Config('hnyswm')->clearSetting){
		$zbp->DelConfig('hnyswm');		
	}
}
?>