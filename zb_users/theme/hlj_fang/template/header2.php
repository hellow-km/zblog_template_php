{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}


<div class="top">
    <div class="center">
        <img src="https://www.hljnews.cn/resource/img/logo5.png" alt="" class="logo-top">
        <div class="search">
            <input type="text" class="searchBox" value="搜索">
            <div type="button" class="searchButton"></div>
        </div>
        <!-- <div class="email">热线投稿信箱：heiljnews@126.com</div> -->
        <a href="http://wap.hljnews.cn/wap/home" target="_blank"><img
                src="https://www.hljnews.cn/resource/img/indexLogoRight2023.png" alt="" class="logo-right"></a>
    </div>
</div>

<div class="tab-menu-bg">
    <div class="tab-mune">
        <a href="/" target="_self">
            <li>首页</li>
        </a>
        {foreach $allCategories as $i=>$cate}
        <a href="/?cate={$cate.ID}" target="_self">
            <li>{$cate.Name}</li>
        </a>
        {/foreach}
    </div>
</div>