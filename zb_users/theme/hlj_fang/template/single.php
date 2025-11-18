{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}

    {template:header}
    {template:header3}
</head>


<body>
    <div class="container" id="page">
        {template:header2}


        {template:post-single}
        <div class="bottom-bg">
            <ul class="bottom-box">
                <li>版权所有黑龙江日报报业集团 <a href="https://beian.miit.gov.cn">黑ICP备11001326-2号</a>，未经允许不得镜像、复制、下载</li>
                <li>黑龙江日报报业集团地址：黑龙江省哈尔滨市道里区地段街1号</li>
                <li>许可证编号：23120170002 黑网公安备 23010202010023号</li>
            </ul>
        </div>

    </div>
</body>

<script>
window.addEventListener("DOMContentLoaded", () => {
    // let imgs = document.getElementsByTagName("img")
    // for (let i = 0; i < imgs.length; i++) {
    //     const img = imgs[i];
    //     img.src = "/images/wx150t.jpg"
    // }
    var swiper = new Swiper('.banner', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
    })

    //导航栏添加反色效果
    $('.tab-menu a li').each(function(index, element) {
        if (this.innerText == $('.route a')[1].text) {
            $(this).addClass('tab-menu-active')
        }
    });
    var dome = document.getElementById("dome");
    var dome1 = document.getElementById("dome1");
    var dome2 = document.getElementById("dome2");
    var speed = 50; //璁剧疆鍚戜笂杞姩鐨勯€熷害 
    dome2.innerHTML = dome1.innerHTML; //澶嶅埗鑺傜偣 
    function moveTop() {
        if (dome1.offsetHeight - dome.scrollTop <= 0) {
            dome.scrollTop = 0;
        } else {
            dome.scrollTop++;
        }
    }
    var myFunction = setInterval("moveTop()", speed);
    dome.onmouseover = function() {
        clearInterval(myFunction);
    }
    dome.onmouseout = function() {
        myFunction = setInterval(moveTop, speed);
    }
})
</script>

</html>