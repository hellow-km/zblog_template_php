<div id="sidebar-box">
    <el-collapse v-model="activeName">
        <el-collapse-item title="文章分类" name="1">
            <div class="side-cateList">
                <li><a href="/">全部</a></li>
                {module:catalog}
            </div>
        </el-collapse-item>
        <el-collapse-item title="文章作者" name="2">
            <div class="side-cateList">
                <li><a href="/">全部</a></li>
                {module:authors}
            </div>
        </el-collapse-item>
        <el-collapse-item title="文章标签" name="3">
            <div class="side-cateList">
                <li><a href="/">全部</a></li>
                {module:tags}
            </div>
        </el-collapse-item>
    </el-collapse>
</div>

<script type="module">
new Vue({
    el: "#sidebar-box",
    data: {
        activeName: ["1","2","3"],
        drawer: false,
    },
})
</script>