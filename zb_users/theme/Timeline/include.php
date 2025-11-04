<?php
#注册插件
RegisterPlugin("Timeline","ActivePlugin_Timeline");
function ActivePlugin_Timeline() {
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','Timeline_AddMenu');
}

function Timeline_AddMenu(&$m){
	global $zbp;
	array_unshift($m,MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/Timeline/main.php","","topmenu_Timeline"));
}
function InstallPlugin_Timeline(){
	global $zbp;
	//配置初始化	
	if(!$zbp->Config('Timeline')->HasKey('Version')){
	$zbp->Config('Timeline')->Version = '1.0';
	$zbp->Config('Timeline')->logopic = $zbp->host.'zb_users/theme/Timeline/images/logo.png';
	$zbp->Config('Timeline')->mcolor = '076098';
	$zbp->Config('Timeline')->homepcid = '1';
	$zbp->Config('Timeline')->setsave = 0;
	$zbp->Config('Timeline')->description = '网站描述';
	$zbp->Config('Timeline')->keywords = '网站关键词';
	$zbp->SaveConfig('Timeline');
	}
}
//卸载主题
function UninstallPlugin_Timeline(){
	global $zbp;
	if ($zbp->Config('Timeline')->setsave){
		$zbp->DelConfig('Timeline');
	}
	$zbp->DelConfig('Timeline');
}
?>