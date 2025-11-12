<?php

RegisterPlugin("toTop","ActivePlugin_toTop");
$image=$zbp->Config('toTop')->topImg;
$isCircle=$zbp->Config('toTop')->isCircle;
function ActivePlugin_toTop() {

}

function InstallPlugin_toTop() {
    global $zbp;
    $image=$zbp->Config('toTop')->topImg;
    $isCircle=$zbp->Config('toTop')->isCircle;
}

function UninstallPlugin_toTop() {

}

function UpdatePlugin_toTop()
{
    global $zbp;
    $image=$zbp->Config('toTop')->topImg;
    $isCircle=$zbp->Config('toTop')->isCircle;
}

function toTop_SubMenu($id){
	$arySubMenu = array(
		0 => array('插件说明', 'info', 'left', false),
        1 => array('插件配置', 'set', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="./'.$v[1].'.php" '.($v[3]==true?'target="_blank"':'').'><span class="-_-'.$v[2].' '.($id==$k?'-_-active':'').'">'.$v[0].'</span></a>';
	}
}

echo '<link href="'.$zbp->host.'zb_users/plugin/toTop/default.css?v=1.0" rel="stylesheet">'
?>
<style>
._--a-to-top {
    position: fixed;
    left: 50%;
    width: 50px;
    height: 50px;
    transform: translateX(-50%);
    bottom: 100px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99999;
    display: none;
}

._--a-to-radius {
    border-radius: 50%;
}
</style>


<div class="_--a-to-top">
    <img width="50" height="50" class="<?php echo $isCircle?"_--a-to-radius":"";?>"
        src="<?php echo $image??$zbp->host.'zb_users/plugin/toTop/logo.png';?>" alt="">
    <input id="_--a-to-top_scroll" hidden type="text" value="<?php $zbp->Config('toTop')->scrollHeight??"";?>">
</div>

<script>
function checkShow() {
    const toTopBtn = document.querySelector("._--a-to-top");
    let scrollTop = document.querySelector("#_--a-to-top_scroll").value || 200;
    if (document.documentElement.scrollTop > scrollTop) {
        toTopBtn.style.display = "flex";
    } else {
        toTopBtn.style.display = "none";
    }
}
window.onload = function() {
    checkShow();
};
window.onscroll = function() {
    checkShow();
};

document.addEventListener("DOMContentLoaded", function() {
    const toTopBtn = document.querySelector("._--a-to-top");
    toTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>