<div class="head-search header-right-normal">
    <form name="search" method="post" action="{$host}zb_system/cmd.php?act=search"  onsubmit="return checkSearch()">
        <input class="search-ipt" type="text" name="q" id="edtSearch" class="s" value="" placeholder="请输入搜索关键词" />
        <input class="search-btn" type="submit" name="submit" id="btnPost" class="submit" value="搜索" />
    </form>
</div>

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