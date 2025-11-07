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
?>
<style>
._--a-to-top{
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
    z-index: 999;
}

._--a-to-radius{
    border-radius: 50%;
}
</style>


<div class="_--a-to-top">
    <img width="50" height="50" class="<?php echo $isCircle?"_--a-to-radius":"";?>" src="<?php echo $image??$zbp->host.'zb_users/plugin/toTop/logo.png';?>" alt="">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toTopBtn = document.querySelector("._--a-to-top");
        toTopBtn.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>