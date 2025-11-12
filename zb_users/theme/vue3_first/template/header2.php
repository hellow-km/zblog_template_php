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
const {
    ref,
    reactive,
    computed,
    watch,
    onMounted,
    onBeforeUnmount,
    nextTick
} = Vue

const headerApp = {
    setup() {
        const headerList = ref([{
                title: "AI",
                path: "/AI"
            },
            {
                title: "文章",
                path: "/articles"
            },
        ])

        const activeLine = ref(null)
        const activeI = ref(0)
        const listItem = ref([])

        const toPath = (path, i) => {
            activeI.value = i
            location.href = path
        }

        const getData = () => {
            getNavBar().then(res => {
                console.log("res", res);
                setActiveI()
                barLineMove()
            })
        }

        const barLineMove = (moveI = activeI.value) => {
            const moveItem = listItem.value[moveI]
            Object.assign(activeLine.value.style, {
                left: moveItem.offsetLeft + "px",
                top: moveItem.offsetTop + moveItem.offsetHeight + 5 + "px",
                width: moveItem.offsetWidth + "px"
            })
        }

        const onItemLeave = () => barLineMove()
        const onItemHover = (_, i) => barLineMove(i)

        const setActiveI = () => {
            headerList.value.some((item, index) => {
                if (location.pathname == item.path) {
                    activeI.value = index
                    return true
                }
            })
        }

        onMounted(() => {
            getData()

        })

        return {
            headerList,
            activeLine,
            listItem,
            activeI,
            onItemHover,
            onItemLeave,
            toPath
        }
    }
}
window.addEventListener('DOMContentLoaded', function() {
    Vue.createApp(headerApp).mount('#headerApp')
});
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