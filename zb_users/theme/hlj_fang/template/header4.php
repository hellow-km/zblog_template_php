{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}
<div class="logo-bg">
    <div class="logo-box">
        <img src="http://www.hljnews.cn/resource/img/logo3.png" alt="" class="logo">
        <!--<div class="search-box">
                <input type="text" placeholder="搜索">
                <img src="http://www.hljnews.cn/resource/img/search.png" alt="">
            </div>-->
    </div>
</div>
<div class="tab-bg">
    <div class="tab-menu">
        <a href="/" target="_self">
            <li>首页</li>
        </a>
        {foreach $allCategories as $i=>$cate}
        <a href="/?cate={$cate.ID}" target="_self">
            <li class="{if $category&&$category.ID==$cate.ID}tab-menu-active{/if}">{$cate.Name}</li>
        </a>
        {/foreach}

    </div>
</div>