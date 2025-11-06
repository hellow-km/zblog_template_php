<el-menu
style="height:100%"
  default-active="text"
  background-color="#fff"
  class="el-menu-vertical-demo"
>
  <el-menu-item :index="item.type" v-for="(item,i) in leftBarData" @click="changeMode(item.type)">
    <i :class="item.icon"></i>
    <span slot="title">{{item.name}}</span>
  </el-menu-item>
</el-menu>