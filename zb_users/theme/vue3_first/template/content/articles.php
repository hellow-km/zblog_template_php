<div id="articles-page">
    <div style="overflow:hidden" @mousedown="onBarMousedown" @mousemove="onBarMousemove" @mouseup="onBarMouseup"
        @mousewheel="onBarMousewheel" :style="{ width: moveObj.barWidth + 'px' }">
        <div class="acticle-header-bar">
            <div class="header-list"
                :style="{ width: moveObj.boxWidth + 'px', transform: `translateX(${moveObj.x}px)` }">
                <div class="header-list-item" v-for="(item, index) in list" :key="item.id" ref="listItem"
                    :style="{ cursor: moveObj.cursor }" @mouseover="onItemHover($event, index)"
                    @mouseleave="onItemLeave($event, index)" @click="toPath(item)">
                    {{ item.title }}
                </div>
                <div ref="activeLine" class="active-bar"></div>
            </div>
        </div>
    </div>
    <div class="articles-list">
        <div class="article-item-anime" id="article-item-anime">
            <div class="acticle-list-item" v-for="item in articlesList" :key="item.ID" @click="toArticleDetail(item)">
                <div class="acticle-item-info">
                    <div class="info-head">
                        <div class="info-title">{{item.title}}</div>
                        <div class="info-time">{{item.createTime}}</div>
                    </div>
                    <div class="info-content">{{item.ac_desc}}</div>
                    <div class="info-desc">
                        <div class="desc-item">{{item.ViewNums}}</div>
                        <div class="desc-item">{{item.CommNums}}</div>
                        <!-- <div class="desc-item">{{item.readNum}}</div>
                        <div class="desc-item">{{item.commitNum}}</div>
                        <div class="desc-item">{{item.goodNum}}</div>
                        <div class="desc-item">{{item.likeNum}}</div>
                        <div class="desc-item desc-item-flex">
                            <div class="desc-item">
                                <span class="author-text">{{item.author}}</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

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

const App = {
    setup() {
        const list = ref([]);
        const modelValue = ref("/");
        const canMouseWheel = ref(true);
        const minBarWidth = ref(80);

        const moveObj = reactive({
            barWidth: window.innerWidth,
            boxWidth: 0,
            isDown: false,
            downX: 0,
            x: 0,
            pL: 50,
            pR: 50,
            minX: 0,
            maxX: 0,
            moreX: 200,
            isMore: false,
            isClick: false,
            downClientX: 0,
            cursor: "pointer"
        });

        const activeI = ref(0);
        const activeLine = ref(null);
        const listItem = ref([]); // 初始化为空数组

        // 跳转
        const toPath = (item) => {
            if (item.title !== modelValue.value) {
                modelValue.value = item.title;
                emitChange(item);
            }
        };

        const emitChange = (item) => {
            console.log("导航改变:", item);
            // 这里可以加载对应分类的文章
            getArticle(item.id);
        };

        // 鼠标滚轮
        const onBarMousewheel = (e) => {
            if (!canMouseWheel.value) return;
            e.stopPropagation();
            e.preventDefault();
            const n = e.deltaY > 0 ? -300 : 300;
            if (moveObj.x + n > moveObj.maxX) moveTo(moveObj.x, moveObj.maxX);
            else if (moveObj.x + n < moveObj.minX) moveTo(moveObj.x, moveObj.minX);
            else moveTo(moveObj.x, moveObj.x + n);
        };

        // 移动下方标记
        const barLineMove = (moveIndex = activeI.value) => {
            nextTick(() => {
                const items = listItem.value;
                if (!items || !Array.isArray(items) || !items[moveIndex]) return;

                const item = items[moveIndex];
                if (!activeLine.value || !item) return;

                activeLine.value.style.left = item.offsetLeft + 10 + "px";
                activeLine.value.style.top = item.offsetTop + item.offsetHeight + 5 + "px";
                activeLine.value.style.width =
                    (item.offsetWidth < minBarWidth.value ? minBarWidth.value : item.offsetWidth) - 20 +
                    "px";
            });
        };

        const onItemHover = (e, i) => barLineMove(i);
        const onItemLeave = (e, i) => barLineMove();

        // 获取总宽度 - 修复版本
        const getBoxWidth = () => {
            const items = listItem.value;
            if (!items || !Array.isArray(items) || items.length === 0) {
                return 0;
            }

            let w = 0;
            for (let i = 0; i < items.length; i++) {
                if (items[i] && items[i].offsetWidth) {
                    w += items[i].offsetWidth;
                }
            }
            return w;
        };

        // 鼠标按下
        const onBarMousedown = (e) => {
            moveObj.isDown = true;
            moveObj.cursor = "grabbing";
            moveObj.isClick = true;
            moveObj.downClientX = e.clientX;
            moveObj.downX = e.clientX - moveObj.x;
            window.addEventListener("mousemove", onBarMousemove);
            window.addEventListener("mouseup", onBarMouseup);
        };

        // 鼠标移动
        const onBarMousemove = (e) => {
            if (!moveObj.isDown) return;
            const disX = e.clientX - moveObj.downX;
            if (disX >= moveObj.minX - moveObj.pL && disX <= moveObj.maxX + moveObj.pR) {
                moveObj.isMore = e.clientX > moveObj.downClientX;
                moveObj.x = disX;
                if (Math.abs(e.clientX - moveObj.downClientX) > 20) {
                    moveObj.isClick = false;
                }
            }
        };

        // 鼠标抬起
        const onBarMouseup = (e) => {
            window.removeEventListener("mousemove", onBarMousemove);
            window.removeEventListener("mouseup", onBarMouseup);
            moveObj.isDown = false;
            moveObj.cursor = "pointer";

            if (!moveObj.isClick) {
                const n = moveObj.isMore ? moveObj.moreX : -moveObj.moreX;
                if (moveObj.x + n > moveObj.maxX) moveTo(moveObj.x, moveObj.maxX);
                else if (moveObj.x + n < moveObj.minX) moveTo(moveObj.x, moveObj.minX);
                else moveTo(moveObj.x, moveObj.x + n);

                if (moveObj.x > moveObj.maxX) moveTo(moveObj.x, moveObj.maxX);
                if (moveObj.x < moveObj.minX) moveTo(moveObj.x, moveObj.minX);
            }

            moveObj.isClick = false;
        };

        // 动画移动
        const moveTo = (currentX, targetX, duration = 500) => {
            const startX = currentX;
            const distance = targetX - startX;
            const startTime = performance.now();

            const animate = (time) => {
                const elapsed = time - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easing = 1 - Math.pow(1 - progress, 3);
                moveObj.x = startX + distance * easing;
                if (progress < 1) {
                    requestAnimationFrame(animate);
                }
            };
            requestAnimationFrame(animate);
        };

        // 初始化导航栏
        const initBar = () => {
            nextTick(() => {
                moveObj.boxWidth = getBoxWidth();
                moveObj.barWidth = Math.min(window.innerWidth, 1200);
                moveObj.maxX = 0;
                const disW = moveObj.boxWidth - moveObj.barWidth;
                moveObj.minX = disW > 0 ? -disW : 0;

                // 初始位置居中或者根据激活项调整
                if (moveObj.minX < 0 && activeI.value > 0) {
                    const activeItem = listItem.value[activeI.value];
                    if (activeItem) {
                        const targetX = -Math.max(0, activeItem.offsetLeft - 100);
                        moveObj.x = Math.max(moveObj.minX, Math.min(0, targetX));
                    }
                }
            });
        };

        // 初始化激活索引
        const initActiveIndex = () => {
            const index = list.value.findIndex(item => modelValue.value === item.title);
            if (index !== -1) {
                activeI.value = index;
            }
        };

        // 获取数据
        const getData = () => {
            getCategories().then(data => {
                console.log('分类列表:', data);
                list.value = data;
                getArticle(data[0].id)
                // 数据加载完成后初始化
                nextTick(() => {
                    initActiveIndex();
                    initBar();
                    setTimeout(() => {
                        barLineMove();
                    }, 100);
                });
            }).catch(error => {

            });
        };

        const articlesList = ref([]);

        const getArticle = (tagId) => {
            getArticles(tagId).then(data => {
                console.log('文章数据:', data);
                articlesList.value = data;

                // 数据加载完成后初始化
                nextTick(() => {
                    animeArticleItems();
                });
            }).catch(error => {

            });
        };

        const toArticleDetail = (item) => {
            console.log("irtem", item);

            location = item.url
        }

        const animeArticleItems = () => {
            let animeItems = document.getElementsByClassName("article-item-anime")
            let curTop = 50
            for (let i = 0; i < animeItems.length; i++) {
                const el = animeItems[i];
                setTimeout(() => {
                    el.style.top = curTop + "px"
                    el.style.transform = "translateY(0)"
                    curTop += el.offsetHeight
                    nextTick(() => {
                        el.style.top = "0px"
                        el.style.position = "relative"
                    });
                }, 100 * (i + 1));
            }
        }

        onMounted(() => {
            getData();
            window.addEventListener("resize", initBar);

        });

        onBeforeUnmount(() => {
            window.removeEventListener("resize", initBar);
        });

        watch(modelValue, () => {
            initActiveIndex();
            barLineMove();
        });

        // 监听列表变化，重新初始化
        watch(list, () => {
            nextTick(() => {
                initBar();
                barLineMove();
            });
        }, {
            deep: true
        });

        return {
            list,
            modelValue,
            canMouseWheel,
            moveObj,
            activeLine,
            listItem,
            articlesList,
            onBarMousedown,
            onBarMousemove,
            onBarMouseup,
            onBarMousewheel,
            onItemHover,
            onItemLeave,
            toArticleDetail,
            toPath
        };
    }
};

window.addEventListener('DOMContentLoaded', function() {
    const articleApp = Vue.createApp(App)
    articleApp.use(ElementPlus);
    articleApp.mount("#articles-page");
});
</script>

<style>
.articles-list {}

#articles-page {
    overflow: hidden;
    overflow-y: auto;
    margin: 0 auto;
}

.acticle-header-bar {
    position: relative;
    padding: 15px 0;
    overflow: hidden;
    cursor: grab;
    user-select: none;
    background: #fff;
    border-bottom: 1px solid #f0f0f0;
}

.acticle-header-bar .header-list {
    display: flex;
    margin: 0 auto;
    position: relative;
    padding: 0 20px;
}

.acticle-header-bar .header-list .header-list-item {
    padding: 12px 24px;
    white-space: nowrap;
    font-size: 14px;
    transition: all 0.2s;
    cursor: pointer;
    color: #666;
    border-bottom: 2px solid transparent;
}

.acticle-header-bar .header-list .header-list-item:hover {
    color: #1890ff;
    font-size: 15px;
}

.acticle-header-bar .active-bar {
    position: absolute;
    transition: all 0.3s ease;
    height: 3px;
    background-color: #1890ff;
    border-radius: 2px;
    bottom: -1px;
}

.articles-content {
    padding: 20px;
    height: 400px;
}

.article-item-anime {
    transition: all 0.2s;
    position: absolute;
    top: 0;
    transform: translateY(-100%);
}

.acticle-list-item {
    display: flex;
    padding: 15px 5px;
    cursor: pointer;
    border-bottom: 1px solid #e0e0e2;
    align-items: center;
}

.acticle-list-item:hover {
    background: #fafafa;
}

.acticle-list-item .acticle-item-img {
    width: 160px;
}

.acticle-list-item .acticle-item-img img {
    width: 160px;
    height: 90px;
    object-fit: scale-down;
}

.acticle-list-item .acticle-item-info {
    width: 100%;
    margin-left: 15px;
}

.acticle-list-item .acticle-item-info .info-head {
    display: flex;
}

.acticle-list-item .acticle-item-info .info-head .info-title {
    font-size: 24px;
    font-weight: bold;
}

.acticle-list-item .acticle-item-info .info-head .info-time {
    margin-left: auto;
    margin-right: 10px;
    color: #555666;
}

.acticle-list-item .acticle-item-info .info-content {
    margin: 5px 0;
    font-size: 14px;
    font-weight: 400;
    color: #555666;
    overflow: hidden;
    white-space: normal;
    word-break: break-word;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.acticle-list-item .acticle-item-info .info-desc {
    font-size: 14px;
    opacity: 0.88;
    display: flex;
    position: relative;
    flex-wrap: wrap;
}

.acticle-list-item .acticle-item-info .info-desc .desc-item {
    margin-right: 15px;
}

.acticle-list-item .acticle-item-info .info-desc .desc-item .q-icon {
    margin-right: 5px;
}

.acticle-list-item .acticle-item-info .info-desc .desc-item .desc-tag {
    margin-right: 10px;
    padding: 5px 10px;
}

.acticle-list-item .acticle-item-info .info-desc .desc-item-flex {
    display: flex;
    flex-wrap: wrap;
}

.acticle-list-item .acticle-item-info .info-desc .dot-menu {
    position: absolute;
    right: 50px;
    font-size: 20px;
}

.acticle-list-item .acticle-item-info .desc-time {
    font-size: 13px;
    margin-top: 5px;
}
</style>