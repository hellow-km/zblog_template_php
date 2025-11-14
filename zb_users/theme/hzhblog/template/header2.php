<div id="headerApp" class="header-bar">
    <div class="header-list">
        <div class="header-list-item" :class="index === activeI ? 'list-item-active' : ''" ref="listItem"
            @mouseover="onItemHover($event,index)" @mouseleave="onItemLeave($event,index)"
            @click="toPath(item.path,index)" v-for="(item,index) in headerList" :key="item.title">
            <div class="header-list-item-title">{{item.title}}</div>
            <a :href="item.path"></a>
        </div>
        <div ref="activeLine" class="active-bar"></div>
    </div>
</div>
<script type="module">
new Vue({
    el: '#headerApp',
    data: {
        headerList: [{
                title: "文章",
                path: "/"
            },
            {
                title: "AI",
                path: "/AI"
            },

        ],
        activeLine: null,
        activeI: 0,
        listItem: []
    },
    mounted() {
        this.getData()
    },
    methods: {
        toPath(path, i) {
            this.activeI = i
            location.href = path
        },
        getData() {
            this.setActiveI()
            this.barLineMove()
        },
        barLineMove(moveI = this.activeI) {
            const moveItem = this.$refs.listItem[moveI]
            Object.assign(this.$refs.activeLine.style, {
                left: moveItem.offsetLeft + "px",
                top: moveItem.offsetTop + moveItem.offsetHeight + 5 + "px",
                width: moveItem.offsetWidth + "px"
            })
        },
        onItemLeave() {
            this.barLineMove()
        },
        onItemHover(_, i) {
            this.barLineMove(i)
        },
        setActiveI() {
            this.headerList.some((item, index) => {
                if (location.pathname == item.path) {
                    this.activeI = index
                    return true
                }
            })
        }
    },

})
</script>

<style>
.header-bar {
    display: flex;
    margin: 0 auto;
    position: relative;
}

.header-bar .header-list {
    display: flex;
    margin: 0 auto;
    position: relative;
}

.header-bar .header-list .header-list-item {
    margin-right: 15px;
    cursor: pointer;
    transition: all 0.2s;
}

.list-item-active {
    color: #fff;
    background-color: #4285f4;
    transform: scaleY(1);
    border-radius: 4px;
}

.header-bar .header-list .header-list-item .header-list-item-title {
    padding: 5px 10px;
    position: relative;
}

.header-bar .header-list .header-list-item .header-list-item-title::before {
    content: "";
    position: absolute;
    border-radius: 4px;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    transform: scaleY(0);
    transform-origin: 50% 100%;
    transition: transform 0.3s ease-out;
}

.header-bar .header-list .header-list-item:hover {
    color: #fff;
}

.header-bar .header-list .header-list-item:hover .header-list-item-title::before {
    background-color: #4285f4;
    transform: scaleY(1);
}

.header-bar .active-bar {
    position: absolute;
    transition: all 0.3s;
    height: 3px;
    background-color: #4285f4;
}
</style>