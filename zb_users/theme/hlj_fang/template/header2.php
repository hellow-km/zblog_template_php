{php}
// 获取所有分类
$allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
{/php}


<div class="top">
    <div class="center">
        <img src="https://www.hljnews.cn/resource/img/logo5.png" alt="" class="logo-top">
        <form class="search" name="search" method="post" action="{$host}zb_system/cmd.php?act=search"
            onsubmit="return checkSearch()">
            <input class="searchBox" type="text" name="q" id="edtSearch" class="s" value="" placeholder="请输入搜索关键词" />
            <input class="searchButton1" type="submit" name="submit" id="btnPost" class="submit" value="" />
        </form>
        <script>
        function checkSearch() {
            var searchValue = document.getElementById("edtSearch").value.trim(); // 获取搜索框内容并去除空格
            if (searchValue === "") {
                alert("请输入搜索关键词！"); // 弹出提示
                return false; // 阻止表单提交
            }
            return true; // 如果不为空，则提交表单
        }
        </script>
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

<style>
.searchButton1 {
    cursor: pointer;
    width: 70px;
    height: 42px;
    background: url(http://www.hljnews.cn/resource/img/search.gif) center no-repeat;
    background-color: #5786c3;
    color: #fff;
    outline: none;
    border: 0;
}
</style>