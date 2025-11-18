{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}

<div id="header">
    <div id="logo">
        <a href="/" title="南风窗网"><img src="/images/logo-banner.png" alt="南风窗网"></a>
        <div class="header_line"></div>
        <div class="livetime_time" id="livetime_time"></div>
        <div class="livetime_date" id="livetime_date">1</div>
        <div class="clear"></div>
    </div>
    <div id="menu">
        {foreach $allCategories as $i=>$cate}
        {if $i!=0}<span>|</span>{else}<a href="/" title="首页" class="">首页</a><span>|</span>{/if}
        <a href="{$cate.Url}" title="{$cate.Name}" class="">{$cate.Name}</a>
        {/foreach}
    </div>
</div>



<script>
document.getElementById("livetime_date").textContent = getWeekday();
setInterval(() => {
    document.getElementById("livetime_time").textContent = formatTime(new Date())
}, 1000)
</script>