<?php
RegisterPlugin("thecorporation","ActivePlugin_thecorporation");
function ActivePlugin_thecorporation(){
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','thecorporation_AddMenu');
}

function thecorporation_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root","<strong style='color:#f00;'>主题说明</strong>",$zbp->host . "zb_users/theme/".$zbp->theme."/panel/service.php","","topmenu_show"));
}
function thecorporation_SubMenu($id){
	
}
function InstallPlugin_thecorporation(){
	
}
function UninstallPlugin_thecorporation(){
	
}
function thecorporation_intro($as,$type,$long,$other){
	global $zbp;
    if ($type=='0') {
		$str = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other);
    } else {
		$str = trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other;
    }
    return $str;
}
function thecorporation_thumbnail($related) {
    global $zbp;	
	$pattern="/<img[^>]*src=\"([^\"]+\.(gif|jpg|png|jpeg))\"[^>]*>/i";
	$content = $related->Content; 
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0])){
		$thumb=$matchContent[1][0]; 
	}else{		
		$thumb='';	
	}
    return $thumb;
}
?>