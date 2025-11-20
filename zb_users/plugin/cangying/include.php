<?php
#注册插件
RegisterPlugin("cangying","ActivePlugin_cangying");

function ActivePlugin_cangying() {
Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags', 'cangying_addheader');
}
function cangying_addheader(&$template)
{
    global $zbp;
    $zbp->footer .= '<img alt="" src="'.$zbp->host."zb_users/plugin/cangying/1.gif".'" style="
width:80px;
height:80px;
position:fixed;
left:200px;
top:200px;
z-index:100;
	 ">';
}
