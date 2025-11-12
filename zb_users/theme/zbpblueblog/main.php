<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('zbpblueblog')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';
$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'config' : $_GET['act'];
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
//基本设置
if(isset($_POST['submit'])){
	/*SEO*/
	$zbp->Config('zbpblueblog')->title = $_POST['title'];
	$zbp->Config('zbpblueblog')->keywords = $_POST['keywords'];
	$zbp->Config('zbpblueblog')->description = $_POST['description'];
	$zbp->Config('zbpblueblog')->separator = $_POST['separator'];
	$zbp->Config('zbpblueblog')->tongji = $_POST['tongji'];
	$zbp->Config('zbpblueblog')->ad = $_POST['ad'];
	$zbp->SaveConfig('zbpblueblog');
	$zbp->ShowHint('good');	
}
?>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
	<?php zbpblueblog_SubMenu($act);?>
     <a href="http://www.boke8.net/zblog-php-blueblog.html" target="_blank"><span class="m-right">技术支持</span></a>
    </div>
<div id="divMain2">
<?php if ($act == 'config') { ?>
<table id="form1" name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
<tr>
    <th width="30%"><p align="center">选项名称</p></th>
    <th width="20%"><p align="center">当前LOGO</p></th>
	<th width="50%"><p align="center">上传png格式的logo</p></th>
  </tr>
  <form enctype="multipart/form-data" method="post" action="save.php?type=logo">
	<tr>
    <td><p align="center">LOGO图片</p></td>
	<td>
	<p align="center"><a href="style/images/logo.png" target="_blank"><img src="style/images/logo.png" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="logo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>  
</table>
<table name="form1" width="100%" cellspacing="0" cellpadding="0" class="tableBorder">
	<br/>
	<tr>
    <td>	
		<p>1、blueblog主题是由 <a href="http://www.boke8.net" target="_blank">博客吧</a> 开发制作并免费分享的 zblog php 主题，使用该主题请保留博客吧的版权链接</p>
		<p>2、免费主题不提供在线技术支持，有问题请到 <a href="http://www.boke8.net/zblog-php-blueblog.html" target="_blank">blueblog主题发布页面</a> 留言，尽量解答</p>
		<p>3、博客吧提供zblog php仿站、psd转zblog主题、程序主题插件安装调试服务，有需要可联系！</p>
	</td>
	
	</tr>	
</table>
<?php } if($act == 'other'){?>
<form id="form2" name="form2" method="post">	
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">选项名称</p></th>
			<th width="50%"><p align="center">选项内容</p></th>
			<th width="25%"><p align="center">选项说明</p></th>
		</tr>
		<tr>
			<td><label for="title"><p align="center">站点title标题</p></label></td>
			<td><p align="left"><input type="text" name="title" id="title"style="width:98%;" value="<?php echo $zbp->Config('zbpblueblog')->title;?>"/></p></td>
			<td><p align="left">自定义网站首页title标题</p></td>
		</tr>
		<tr>
			<td><label for="keywords"><p align="center">关键词</p></label></td>
			<td><p align="left"><input type="text" name="keywords" id="title"style="width:98%;" value="<?php echo $zbp->Config('zbpblueblog')->keywords;?>"/></p></td>
			<td><p align="left">自定义网站关键词，多个关键词用英文逗号隔开</p></td>
		</tr>
		<tr>
			 <td><label for="description"><p align="center">网站描述</p></label></td>
			<td><p align="left"><textarea name="description" type="text" id="description" style="width:98%;"><?php echo $zbp->Config('zbpblueblog')->description;?></textarea></p></td>
			<td><p align="left">自定义网站描述</p></td>
		</tr>
		<tr>
			<td><label for="separator"><p align="center">标题分隔符</p></label></td>
			<td><p align="left"><input type="text" name="separator" id="title"style="width:98%;" value="<?php echo $zbp->Config('zbpblueblog')->separator;?>"/></p></td>
			<td><p align="left">网站title标题分隔符</p></td>
		</tr>
		<tr>
			<td><label for="tongji"><p align="center">统计代码</p></label></td>
			<td><p align="left"><textarea name="tongji" type="text" id="tongji" style="width:98%;"><?php echo $zbp->Config('zbpblueblog')->tongji;?></textarea></p></td>
			<td><p align="left">添加统计代码</p></td>
		</tr>
		<tr>
			<td><label for="ad"><p align="center">侧栏广告</p></label></td>
			<td><p align="left"><textarea name="ad" type="text" id="ad" style="width:98%;"><?php echo $zbp->Config('zbpblueblog')->ad;?></textarea></p></td>
			<td></td>
		</tr>
	</table>
	<br />
	<input name="submit" type="Submit" class="button" style="width:15%;" value="保存"/>
</form>
	
<?php
    }	
?>
</div>
</div>
<script type="text/javascript">
ActiveTopMenu("topmenu_zbpblueblog");
</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>