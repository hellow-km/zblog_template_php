<?php
RegisterPlugin("zbpblueblog","ActivePlugin_zbpblueblog");
function ActivePlugin_zbpblueblog(){
    global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','zbpblueblog_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','zbpblueblog_Footer');

    $zbp->lang['msg']['sidebar'] = '全站侧栏底部';
    $zbp->lang['msg']['sidebar2'] = '全站侧栏顶部';
    $zbp->lang['msg']['sidebar3'] = '主题不支持';
    $zbp->lang['msg']['sidebar4'] = '主题不支持';
    $zbp->lang['msg']['sidebar5'] = '主题不支持';
    $zbp->lang['msg']['sidebar6'] = '主题不支持';
    $zbp->lang['msg']['sidebar7'] = '主题不支持';
    $zbp->lang['msg']['sidebar8'] = '主题不支持';
    $zbp->lang['msg']['sidebar9'] = '主题不支持';
}

function zbpblueblog_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/zbpblueblog/main.php?act=config","","topmenu_zbpblueblog"));
}
function zbpblueblog_SubMenu($id){
	$arySubMenu = array(
		0 => array('基本设置', 'config', 'left', false),
		1 => array('其它设置', 'other', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}
function zbpblueblog_Footer(&$template) {
    global $zbp;
    $zbp->footer .= '<div class="inner"><p>Theme By <a href="https://www.boke8.net/" title="博客吧" target="_blank">博客吧</a></p></div>'."\r\n";
}
function InstallPlugin_zbpblueblog(){
	global $zbp;
    if(!$zbp->Config('zbpblueblog')->HasKey('Version')){
		$zbp->Config('zbpblueblog')->Version = '1.0';
		/*seo设置*/
		$zbp->Config('zbpblueblog')->title = '';
		$zbp->Config('zbpblueblog')->keywords = '博客吧,zblog主题,zblog php主题';
        $zbp->Config('zbpblueblog')->description = '网站描述内容';
		$zbp->Config('zbpblueblog')->separator = '_';
		$zbp->Config('zbpblueblog')->tongji = '';
		$zbp->Config('zbpblueblog')->ad = '';
	}
		$zbp->SaveConfig('zbpblueblog');
}
function UninstallPlugin_zbpblueblog(){
	
}
function zbpblueblog_thumbnail($related) {
    global $zbp;	
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/";
	$content = $related->Content; 
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0])){
		$thumb=$matchContent[1][0]; 
	}else{		
		$thumb=$zbp->host .'zb_users/theme/zbpblueblog/style/images/no-image.jpg';	
	}
    return $thumb;
}
function zbpblueblog_intro($as,$type,$long,$other){
	global $zbp;
    if ($type=='0') {
    	$str = preg_replace('//', '', trim(SubStrUTF8(TransferHTML($as->Intro,'[nohtml]'),$long)).$other);
    } else {
    	$str = preg_replace('//', '', trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other);
    }
    return $str;
}
?>