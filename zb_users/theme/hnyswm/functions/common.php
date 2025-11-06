<?php
//调取图片
function hnyswm_thumbnail($related) {
    global $zbp;
    $thumb='';
	$temp=mt_rand(1,1);
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
	$content = $related->Content; 
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0])){
		$thumb=$matchContent[1][0]; 
	}
    return $thumb;
}
// hnyswm_category() 
function hnyswm_category() {
    global $zbp, $Catenews;
    $Catenews = $zbp->GetCategoryList(
    array( '*') , null);
    foreach ($Catenews as $Catenew) {
        echo '<option value="' . $Catenew->ID . '">' . $Catenew->Name . ' -> ID:' . $Catenew->ID . '</option>';
    }
}
//调用下级分类
function hnyswm_subCate($CateID){
	global $zbp;	
	if($CateID) {
		foreach ($zbp->categorys[$CateID]->SubCategorys as $cate) {	
			echo '<li><i class="iconfont icon-jiantouxiangyou"></i><a href="'.$cate->Url.'" title="'.$cate->Name.'">'.$cate->Name.'</a></li>';			
		}
	}
}

?>