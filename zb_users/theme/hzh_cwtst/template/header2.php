{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
$pathname = $_SERVER['REQUEST_URI'];
{/php}

<div class="top-desc">
    <p>1234567</p>
    <div class="cc-page-header">
        <div class="page-logo">
            <img height="50" width="166"
                src="https://www.cwtstour.com//news_web/uploads/allimg/230911/1-2309111601415B.png" alt="">
        </div>
        <div class="nav-box">
            <li class="navbar-item {if $pathname=='/'}navbar-item-active{/if}"><a href="/">首页</a></li>
            {foreach $allCategories as $cate}
            <li class="navbar-item {if isset($category)&&$category.ID==$cate.ID}navbar-item-active{/if}">
                <a target="_self" href="{$cate.Url}">
                    {$cate.Name}
                </a>
            </li>
            {/foreach}
        </div>
    </div>
</div>

<style>
.page-logo {
    cursor: pointer;
    margin-top: 20px
}

.cc-page-header {
    Position: relative;
    margin: 0 auto;
    height: 65px;
    width: 1200px;
    display: flex;
    align-items: center;
}

.top-desc {
    margin-left: -8px;
}

.top-desc p {
    color: #999;
    font-size: 13px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.nav-box {
    margin-top: 15px
}
</style>