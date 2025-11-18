<div class="content">
    <div id="mainWrapper" class="wrapper clearfix">
        <div class="main-content fl">
            <div class="news-content clearfix">
                <div class="news-nav">
                    <div class="nav-list">
                        <div class="list-content">
                            <ul>
                                {php}
                                // 获取所有分类
                                $allCategories = $zbp->GetCategoryList(); // 返回所有分类对象数组
                                {/php}


                                <li><a href="/" class="active" data-chname="homepage" data-catid="0">推荐</a></li>
                                {foreach $allCategories as $cate}
                                <li><a href="{$cate.Url}">{$cate.Name}</a></li>

                                {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="news-main">
                    <div class="news-slider">
                        <div class="tempWrap" style="overflow:hidden; position:relative; width:660px">
                            <ul class="slider-list"
                                style="width: 3960px; left: -1980px; position: relative; overflow: hidden; padding: 0px; margin: 0px;">
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/489aaa2436ced565123d0cdd791aa0d6.jpg">
                                        <div class="news-title">露营，正在书写桂林山水间的新故事</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5driffb1a772b8f255be.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/5a76e15e84897622f10f5565b68987f9.jpg">
                                        <div class="news-title">预计年内建成通车！广西多条高速最新进展→</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri4e8a59ccf2b02888.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/5a85c38ad663f4b4a159721de9dc4748.jpg">
                                        <div class="news-title">寒潮入桂！有霜冻！广西迎9级大风+降温+降雨！</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dribe82317d06e4be00.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/4766575a010b5f91105f6a65137056e9.png">
                                        <div class="news-title">现场不设停车位！2025桂林漓江徒步大会请乘坐官方接驳车往返</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5drif6ce0c2d9557ff3c.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/e69f4fe8e03ba067b8530ffcb20fedb7.png">
                                        <div class="news-title">多所高校官宣：压学分、减“水课”！</div>
                                    </a>
                                </li>
                                <li style="float: left; width: 660px;">
                                    <a href="https://news.guilinlife.com/article/5dri6d6ee9f0f076c885.html"
                                        target="_blank">
                                        <img
                                            src="https://fm.glshimg.com/image/2025/1118/a7abf33c715ad26f06fd4f3af6a7d4eb.jpg">
                                        <div class="news-title">乘专列“一票通游” 广西推出五大精品旅游专列线路</div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <ul class="slider-index">
                            <li class="">1</li>
                            <li class="">2</li>
                            <li class="">3</li>
                            <li class="on">4</li>
                            <li class="">5</li>
                            <li class="">6</li>
                        </ul>
                        <a class="prev-btn">上一张</a>
                        <a class="next-btn">下一张</a>
                    </div>
                    <script>
                    jQuery(".news-slider").slide({
                        mainCell: ".slider-list",
                        effect: "left", // left / top / fade
                        autoPlay: true, // 自动播放
                        delayTime: 500, // 切换时间(ms)
                        interTime: 3000, // 自动切换间隔(ms)
                        trigger: "click" // 鼠标触发方式
                    });
                    </script>
                    <div class="news-list">
                        <ul id="newsListContainer">
                            <li>
                                <div class="multi-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                            target="_blank">
                                            一对情侣庆祝纪念日，小伙扭头亲吻女友头发被点燃，当事人回应：只烧焦一点，目前已理发 </a>
                                    </div>
                                    <div class="content-img clearfix">

                                        <div class="img-item img1">
                                            <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/0UK3QGFqN1BsUv8cZhDy21mH9FDpeb8TfyRNPygOPpo7c-zhNd-b-rn-eF_porfTPUU8pe4Swtx6c-wTOV0QShyKo3c54MZBo4mpzbb_eraIU47AXXTTx32GdD-hHSh6sguWMpLt1b0W9W8P4rfWbA%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/0UK3QGFqN1BsUv8cZhDy21mH9FDpeb8TfyRNPygOPpo7c-zhNd-b-rn-eF_porfTPUU8pe4Swtx6c-wTOV0QShyKo3c54MZBo4mpzbb_eraIU47AXXTTx32GdD-hHSh6sguWMpLt1b0W9W8P4rfWbA%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>

                                        <div class="img-item img2">
                                            <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/3oIv89ZkhD8kTpzoqL1A7LgQ3MSEaLj2zO4tvvR5XJWZy46UPR2CWJvQA1w_WzcRIjab9sCdQ5CuOlRLmOp4sI5T2R-Yt2cTRaDsVFElxDcmXMAQeOrF-pcCbdrPEk3a-CxgS8fsKhIQHcR51MAQ7Q%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/3oIv89ZkhD8kTpzoqL1A7LgQ3MSEaLj2zO4tvvR5XJWZy46UPR2CWJvQA1w_WzcRIjab9sCdQ5CuOlRLmOp4sI5T2R-Yt2cTRaDsVFElxDcmXMAQeOrF-pcCbdrPEk3a-CxgS8fsKhIQHcR51MAQ7Q%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>

                                        <div class="img-item img3">
                                            <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/5s9LMemAORdULmtBfnhTPuhF4JqpZ8_ObIenL7MjhYiUEJpSv5vIQa__MPQ8GcBGIdtMPZkCYCjUHvuzVdkHUc-m-jq5pDYRp-t3umBFTnqRIy1R7H_ySuhbxIptiu44SPczS96RzKho-1H2weqVjA%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/5s9LMemAORdULmtBfnhTPuhF4JqpZ8_ObIenL7MjhYiUEJpSv5vIQa__MPQ8GcBGIdtMPZkCYCjUHvuzVdkHUc-m-jq5pDYRp-t3umBFTnqRIy1R7H_ySuhbxIptiu44SPczS96RzKho-1H2weqVjA%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">话题</span>
                                        <span class="post-date">2025-11-18</span>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dric12d0a7e50f0d7a9.html"
                                            target="_blank">
                                            弟弟无民事行为能力，大姐照顾13年转走135万元，被俩妹妹告上法庭…… </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">话题</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5dri2795eb29517c745c.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/6ZG6LHpOB_Xeh9ZYLPO9666stxsfwWr8bzDq24QHrrEj04AO_gHwx3PHNibCCeLhF-i8DH2N8V_9JR8mti0KUvdDi_ZdGmh95j2MT1A_P0Z7HuRuFtSfupvP3pl8IR4QvHX0VPQuz-cZoeoyun1-jw%3D%3D/media"
                                                src="https://nimg.guilinlife.com/mmbiz/6ZG6LHpOB_Xeh9ZYLPO9666stxsfwWr8bzDq24QHrrEj04AO_gHwx3PHNibCCeLhF-i8DH2N8V_9JR8mti0KUvdDi_ZdGmh95j2MT1A_P0Z7HuRuFtSfupvP3pl8IR4QvHX0VPQuz-cZoeoyun1-jw%3D%3D/media"
                                                style="display: block;">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5dri2795eb29517c745c.html"
                                                    target="_blank">
                                                    一头野猪“跳桥寻短见”？目击者：它看到桥两头都有车，受惊吓坠桥 </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">话题</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="multi-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                            target="_blank">
                                            结婚8年妻子花光116万积蓄，其中67万打赏男主播，丈夫痛哭：不爱了，她耐不住寂寞，妻子：上头了；平台回应 </a>
                                    </div>
                                    <div class="content-img clearfix">

                                        <div class="img-item img1">
                                            <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/0NtCCkhmYZA_RvSRrAEJ_4ZhVcyLUFhLxx0F4-hR3Hx-EpH4YShXmBLVu7NCxpUpIH1LrHN9GkzQqe5oUQTmhQm_ViyvzBbg9P_sQIxoNb15Ixg0jLa4FiiQcF28GcpQtWrOnFjhj-N5ouhuQXaMyg%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/0NtCCkhmYZA_RvSRrAEJ_4ZhVcyLUFhLxx0F4-hR3Hx-EpH4YShXmBLVu7NCxpUpIH1LrHN9GkzQqe5oUQTmhQm_ViyvzBbg9P_sQIxoNb15Ixg0jLa4FiiQcF28GcpQtWrOnFjhj-N5ouhuQXaMyg%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>

                                        <div class="img-item img2">
                                            <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/gATS6qZdHY4yb100P9I_mslKz_O2PryDVhDw35alvntwaLn7MRh5RAB6mdgviDlUQ7OTEbc9vwXmxAvXvUD_CoZM9_zRfax_8jVUD5ZWb9wvnX5w1VVqiicrOcHDRLyfasrGnxb5t5MYqOpMIn1zSw%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/gATS6qZdHY4yb100P9I_mslKz_O2PryDVhDw35alvntwaLn7MRh5RAB6mdgviDlUQ7OTEbc9vwXmxAvXvUD_CoZM9_zRfax_8jVUD5ZWb9wvnX5w1VVqiicrOcHDRLyfasrGnxb5t5MYqOpMIn1zSw%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>

                                        <div class="img-item img3">
                                            <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/-P0UUccMqa8v2fJQ9P9r4tqRViN6KeaCVgRYd9XOLD3QR0j0cF2ZcZyu5ydqZDkGT3rIZUfHXfex8dvjeAUPO5LcaLy5NWKGUSDcnsNUSkwMtAFrIOglc5JJQgYKW_Z0eVVmuQ5fMZrVOSffiUil-g%3D%3D/media"
                                                    src="https://nimg.guilinlife.com/mmbiz/-P0UUccMqa8v2fJQ9P9r4tqRViN6KeaCVgRYd9XOLD3QR0j0cF2ZcZyu5ydqZDkGT3rIZUfHXfex8dvjeAUPO5LcaLy5NWKGUSDcnsNUSkwMtAFrIOglc5JJQgYKW_Z0eVVmuQ5fMZrVOSffiUil-g%3D%3D/media"
                                                    style="display: block;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">话题</span>
                                        <span class="post-date">2025-11-18</span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5dricebbb69c60a08385.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/IZxPnjuyL5IWavweKOwAgxAt-NGDzyw24rn0Mt7bfF1tAKWuuBwbm0-robH-aP7-4ZT6quXgeaONVi6Vap9Fp5R5J8L3S72VPVyp5tV0mR7rm11jJDti9DSnqSD6ZZtPCxYXh900Ss2WN8w-DnddvA%3D%3D/media"
                                                src="https://nimg.guilinlife.com/mmbiz/IZxPnjuyL5IWavweKOwAgxAt-NGDzyw24rn0Mt7bfF1tAKWuuBwbm0-robH-aP7-4ZT6quXgeaONVi6Vap9Fp5R5J8L3S72VPVyp5tV0mR7rm11jJDti9DSnqSD6ZZtPCxYXh900Ss2WN8w-DnddvA%3D%3D/media"
                                                style="display: block;">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5dricebbb69c60a08385.html"
                                                    target="_blank">
                                                    广州一女子在商场厕所被纸巾盒铁片划伤臀部，商场：正处理，会考虑加以改进 </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">话题</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri934b1f500f512392.html"
                                            target="_blank">
                                            用AI假图骗“仅退款”？技术不该用来薅羊毛 </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">生活帮</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri72c4f371fe3e6e4f.html"
                                            target="_blank">
                                            这种慢慢“吃掉”肺功能的病，早期症状隐匿，极易被忽视 </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">生活帮</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5dri84fdf2f8b97893f9.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/QB3_Nk-hGOJQ-PXYuhhU6IQwxlXC_hWFFNlC5MGI3TCc_SEwK0sd6uiNhmENWyV320fa4GGiVGuWjqZi8RjdyQCDUV-5IFEqz6BDv7toMUiVk05VRzUxmcKnv_ffZrBBjjnJEnxQBFTnwlyFKIpIPw%3D%3D/media">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5dri84fdf2f8b97893f9.html"
                                                    target="_blank">
                                                    “冬藏”不是“不动”！做好四件事，养出来年好底子 </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">生活帮</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="multi-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5drid3dc6024d3717f5a.html"
                                            target="_blank">
                                            “升糖大户”被揪出，不是米饭！很多人不听劝，每天都在吃 </a>
                                    </div>
                                    <div class="content-img clearfix">

                                        <div class="img-item img1">
                                            <a href="//news.guilinlife.com/article/5drid3dc6024d3717f5a.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/FdcKJZqOX36NpVIP1Nws-ms_CxxYUsJcu57hiQWLQNkX2scrQHaWP9B1qjGhu0t9DxfKMPfcHROnyMJ49fP2tYkNPm_R4auffQSMSBnjC3PPKjJEZD6uWgFrHuMG0QI61tF5O3W1v9Q9tRb6KD4VYQ%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img2">
                                            <a href="//news.guilinlife.com/article/5drid3dc6024d3717f5a.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/tv1lwqIJBX3zTvw-Lqr4zMKMFmzgYN2LjT2GcM28g1MX1B7aOoF_HNg_nnmw0a9H7dbjdDbvp_STs3esg8gQb9IN1SDcFrrMRqOlaI09MNIQ8oirqlTMBgv6-YE3Rne5J9C0XtIXV7ZFL_Iwmf_LTQ%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img3">
                                            <a href="//news.guilinlife.com/article/5drid3dc6024d3717f5a.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/VIVnW-tmuAB9e-Cy2XY3wBV0c_pHX3et4dCT6ONxELLHw4LtCbFOmJ_1emohstGBa9tcNsr6JZ9eMNyku7S5UJgoBuXZO05XxvT_vzLI_1YbPNPStZFVn2qtpYdSMYLX52QkHfQ8vOz4KSNDDXRfNg%3D%3D/media">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">生活帮</span>
                                        <span class="post-date">2025-11-18</span>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri4941b2e419ca9ef7.html"
                                            target="_blank">
                                            补贴25%!年底截止，快来看看你符合申请条件吗? </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5drif2f010b76d81d3a8.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/zSU4Sk01VojSsiL6VlaPfEBCZ12xXy5U0jYBko-tGvwVnYM5V_ZKki1lLbgnyy0mXm4Hp8cbJgcO_ae-2qo5eoG5DKh2rw3_Anocj6OPjS7_jpXdnsSApw66Lrpsb42a4lqff-g9NNhf27S8oGr0Wg%3D%3D/media">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5drif2f010b76d81d3a8.html"
                                                    target="_blank">
                                                    百万元资金扶持!广西“微短剧+文旅”重点作品项目面向全国征集 </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">桂林</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri04f97fc2bbf23340.html"
                                            target="_blank">
                                            智能制造推动桂林产业发展向“新”而行 </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri73cc4e66b70d6c94.html"
                                            target="_blank">
                                            下月起全区实现医保刷脸支付 </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5drifa2701f50763d369.html"
                                            target="_blank">
                                            我市启动失业保险一次性扩岗补助申领工作 </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="multi-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                            target="_blank">
                                            露营，正在书写桂林山水间的新故事 </a>
                                    </div>
                                    <div class="content-img clearfix">

                                        <div class="img-item img1">
                                            <a href="//news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/eqqDpdGVeoR2nPIZY7q7S7AnJb7-JjmK024gfb3SNa7XwIFkgQZV_MlIfQP2THz-JaBcsMjLya2vwCHqj81Cu4-hr70ujjbRGO4AR8O9KVPGzGTTmI1mtV0MdWhStWi_0KakF6ImBVHEe933pkBMlg%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img2">
                                            <a href="//news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/z_j25S6k9OJi8g85WkfK_NyA8gcl9oZ5eYYQrAUmsdWBI8jpWo3F3oL96ZuDCU0-N9UoytaAlkdht_A7eSdWeA8FNN-RBtec-gnRUPw_CIbSaJqjAwk-Tq8_3UZ2vDkmKe53uhcZ52O2yibO6VQY5Q%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img3">
                                            <a href="//news.guilinlife.com/article/5dri49b6da44acccda50.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/QmQX4VUyN70a0MYf1h3-80Cv7zbmM2R2XVNiPaRs5PyBQFH3v83y2oMeL6PjqYGE9fmDBYPvo5TQws2QyZlq1r27HrpkiyCyzm7yboB5uDGoSWPJOEv_j-iPwqoje9EQsf6L7Fs83wjokwk0iZvE7g%3D%3D/media">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri39cf29d7119d2efb.html"
                                            target="_blank">
                                            被称为“最营养的早餐”，每天吃几个更健康？ </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="multi-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5drib0894eb507e71cb4.html"
                                            target="_blank">
                                            孩子成绩不太理想，家长花20多万元打点疏通关系，希望孩子可以上名校，结果…… </a>
                                    </div>
                                    <div class="content-img clearfix">

                                        <div class="img-item img1">
                                            <a href="//news.guilinlife.com/article/5drib0894eb507e71cb4.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/isVuqvDzE2mVPpa3lNdk0UdRWcKjMYu_lWoq9J3GBhz5HgihdJnypFvz-1UWJpmbheV8dtXz-7siYCvmAQjh64aZ1UP9ifqMm_7YHxYri7r6he12gD-tZxzpTnzlNscbKMMKugOkIobEJOyBqnn8jg%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img2">
                                            <a href="//news.guilinlife.com/article/5drib0894eb507e71cb4.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/bUs4GyM9074tkHzz4LINsF-xitYmIuxNV_BeCljj6YC5dAB-bSlTgUGFFaBPHxCJubdPpGQiRqmbz0VFDHtONNR9KhM_3iLirwWmiMRBDBMZaqvCZ5aYJ-7PIEbcDhe0XNq0SCJsFCy1J7Hl78BN0w%3D%3D/media">
                                            </a>
                                        </div>

                                        <div class="img-item img3">
                                            <a href="//news.guilinlife.com/article/5drib0894eb507e71cb4.html"
                                                target="_blank">
                                                <img class="lazy"
                                                    data-original="https://nimg.guilinlife.com/mmbiz/XmJcPjEdZ-2CDWlmG3TTL6S_L-ex-8P6w2cIUni_34zq2dn6umIbh42lqaU8etuNivINH00rZQuDgmEO5khzRDgLl_V5XmeV0plW0lDYVfBM-W80ufWMAWMToRVnpYRHS_HriL3I0bG1u1ALDtQYUQ%3D%3D/media">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="big-pic-content">
                                    <div class="content-title">
                                        <a href="//news.guilinlife.com/article/5dri5a78ca7ad54c99ac.html"
                                            target="_blank">
                                            一个血液黏稠的人，身体会发出5个信号！ </a>
                                    </div>
                                    <div class="content-img ">
                                    </div>
                                    <div class="content-other clearfix">
                                        <span class="content-type">桂林</span>
                                        <span class="post-date">2025-11-18</span>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5driffb1a772b8f255be.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/cCjUcyMz2P1iV04aMyo6jGbPeb9sMbZve5cl7MV9LTVx2y9qmVxHh05QHTpLX0RWSbezvXdilTsKmvDpEoyEhxPoQ6nYBSylyDR9iUVQbIpo7FR40JM9yqJpG6njozUsn_esyNkYf3J3o-MEX3GINg%3D%3D/media">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5driffb1a772b8f255be.html"
                                                    target="_blank">
                                                    预计年内建成通车！广西多条高速最新进展→ </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">桂林</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="normal-content">
                                    <div class="content-img">
                                        <a href="//news.guilinlife.com/article/5dri4e8a59ccf2b02888.html"
                                            target="_blank">
                                            <img class="lazy"
                                                data-original="https://nimg.guilinlife.com/mmbiz/7g2VvbTE0q6GpBaH85zUt5f0rXJ_q8Guxw9_cu22UCANRvf7cwwe9g38uaFIfX-jQYL6LAh1Ejj9ZHsg4zjra5j0Q3a117yL2oVOvf53D6vbJbpWrX8r98rY4MW0v3XKLCCHsONKuZMUpKOSviRuNg%3D%3D/media">
                                        </a>
                                    </div>
                                    <div class="content-main">
                                        <div class="content-title">
                                            <div>
                                                <a href="//news.guilinlife.com/article/5dri4e8a59ccf2b02888.html"
                                                    target="_blank">
                                                    寒潮入桂！有霜冻！广西迎9级大风+降温+降雨！ </a>
                                            </div>
                                        </div>
                                        <div class="content-other">
                                            <span class="content-type">桂林</span>
                                            <span class="post-date">2025-11-18</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="load-more">
                            <a class="load-btn"><span>加载更多</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-content">
            <div class="ad-item" id="AD510"><iframe id="glshw_ad_iframe_80028" name="glshw_ad_iframe_80028"
                    src="about:blank" width="320" height="200" align="center,center" vspace="0" hspace="0"
                    marginwidth="0" marginheight="0" scrolling="no" frameborder="0"
                    style="border:0;vertical-align:bottom;margin:0;width:320px;height:200px"
                    allowtransparency="true"></iframe></div>

            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">视频</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh13e782fc786f6151.html"
                                title="2025桂林马拉松半马男子组冠军诞生，是来自山东的27岁小伙王佩林"
                                target="_blank">2025桂林马拉松半马男子组冠军诞生，是来自山东的27岁小伙王佩林</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drhfd447106030f4a41.html"
                                title="当马拉松遇上桂林最美季节！在桂花香里奔跑，在山水间相遇，实在太浪漫啦~"
                                target="_blank">当马拉松遇上桂林最美季节！在桂花香里奔跑，在山水间相遇，实在太浪漫啦~</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh6fd7a0b6737c4208.html"
                                title="广西人能歌善舞不是说说而已！2025桂林马拉松现场，观众载歌载舞为运动员加油"
                                target="_blank">广西人能歌善舞不是说说而已！2025桂林马拉松现场，观众载歌载舞为运动员加油</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh169f03dc5315945d.html"
                                title="大喇叭都用上了！桂林马拉松志愿者卖力加油，情绪价值拉满！隔着屏幕都能感受到热情"
                                target="_blank">大喇叭都用上了！桂林马拉松志愿者卖力加油，情绪价值拉满！隔着屏幕都能感受到热情</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5drh3c8b0fc6fafe716c.html"
                                title="桂林市民在马拉松沿途热情为参赛选手加油助威" target="_blank">桂林市民在马拉松沿途热情为参赛选手加油助威</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">话题</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//news.guilinlife.com/article/5dri9c47d962e59aa6ca.html"
                                title="一对情侣庆祝纪念日，小伙扭头亲吻女友头发被点燃，当事人回应：只烧焦一点，目前已理发"
                                target="_blank">一对情侣庆祝纪念日，小伙扭头亲吻女友头发被点燃，当事人回应：只烧焦一点，目前已理发</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dric12d0a7e50f0d7a9.html"
                                title="弟弟无民事行为能力，大姐照顾13年转走135万元，被俩妹妹告上法庭……"
                                target="_blank">弟弟无民事行为能力，大姐照顾13年转走135万元，被俩妹妹告上法庭……</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dri2795eb29517c745c.html"
                                title="一头野猪“跳桥寻短见”？目击者：它看到桥两头都有车，受惊吓坠桥"
                                target="_blank">一头野猪“跳桥寻短见”？目击者：它看到桥两头都有车，受惊吓坠桥</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5driec180142ba122bb8.html"
                                title="结婚8年妻子花光116万积蓄，其中67万打赏男主播，丈夫痛哭：不爱了，她耐不住寂寞，妻子：上头了；平台回应"
                                target="_blank">结婚8年妻子花光116万积蓄，其中67万打赏男主播，丈夫痛哭：不爱了，她耐不住寂寞，妻子：上头了；平台回应</a>
                        </li>
                        <li>
                            <a href="//news.guilinlife.com/article/5dricebbb69c60a08385.html"
                                title="广州一女子在商场厕所被纸巾盒铁片划伤臀部，商场：正处理，会考虑加以改进"
                                target="_blank">广州一女子在商场厕所被纸巾盒铁片划伤臀部，商场：正处理，会考虑加以改进</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ad_baidu_news_001"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953898",
                container: "ad_baidu_news_001",
                async: true
            });
            </script>
            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">直播</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10061" title="直播：第十四届桂林永福福寿节颁奖暨大型综合文艺晚会"
                                target="_blank">直播：第十四届桂林永福福寿节颁奖暨大型综合文艺晚会</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10060" title="秋收稻浪" target="_blank">秋收稻浪</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10059" title="2025桂林桂花生活节"
                                target="_blank">2025桂林桂花生活节</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10058"
                                title="直播：“高质量完成‘十四五’规划”系列主题新闻发布会（第四场）"
                                target="_blank">直播：“高质量完成‘十四五’规划”系列主题新闻发布会（第四场）</a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/live/scene/index/id/10057" title="“桃花林中的民族”“红瑶”晒衣节"
                                target="_blank">“桃花林中的民族”“红瑶”晒衣节</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="article-list">
                <div class="list-header clearfix">
                    <div class="list-title">专题</div>
                </div>
                <div class="list-content">
                    <ul>

                        <li>
                            <a href="/special/jwmsxf.html" title="讲文明树新风" target="_blank">讲文明树新风</a>
                        </li>

                        <li>
                            <a href="/special/esjszqh.html" title="学习贯彻党的二十届四中全会精神" target="_blank">学习贯彻党的二十届四中全会精神</a>
                        </li>

                        <li>
                            <a href="/special/chongyang2025.html" title="2025年网络中国节·重阳"
                                target="_blank">2025年网络中国节·重阳</a>
                        </li>

                        <li>
                            <a href="/special/guilinfestival2025.html" title="2025年桂林艺术节" target="_blank">2025年桂林艺术节</a>
                        </li>

                        <li>
                            <a href="/special/wlzgjzq2025.html" title="2025年网络中国节·中秋" target="_blank">2025年网络中国节·中秋</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="ad_baidu_news_002"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953899",
                container: "ad_baidu_news_002",
                async: true
            });
            </script>
            <!-- 广告位：AD511新闻内容页方块位下 -->
            <!--<div class="ad-item" id="AD511"></div>-->


            <div class="news-rank-list talk">
                <div class="list-header clearfix">
                    <div class="list-title">24小时热闻</div>
                </div>
                <div class="list-content">
                    <ul>
                        <li><a href="//news.guilinlife.com/article/5drh45bd8e9f7935d735.html" target="_blank"
                                title="叠彩区大河乡举办2025年农村党员干部及后备力量能力素质提升培训班">叠彩区大河乡举办2025年农村党员干部及后备力量能力素质提升培训班</a></li>
                        <li><a href="//news.guilinlife.com/article/5drhd27c9a5844fcddfb.html" target="_blank"
                                title="【坚守与传承】   深山篾匠龚厚友与他的竹编">【坚守与传承】 深山篾匠龚厚友与他的竹编</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh422d19e3b6ee614a.html" target="_blank"
                                title="一习话·迈向“十五五”｜“以更大气魄深化改革、扩大开放”">一习话·迈向“十五五”｜“以更大气魄深化改革、扩大开放”</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh0696270c9d12d22c.html" target="_blank"
                                title="第一视点丨以自主创新塑造发展新优势">第一视点丨以自主创新塑造发展新优势</a></li>
                        <li><a href="//news.guilinlife.com/article/5drhbfd1ea59c97ed025.html" target="_blank"
                                title="思想之光照亮法治航程——习近平法治思想引领新时代法治中国建设述评">思想之光照亮法治航程——习近平法治思想引领新时代法治中国建设述评</a></li>
                        <li><a href="//news.guilinlife.com/article/5drhd0641b74fc5399ec.html" target="_blank"
                                title="桂林导游在第六届全国导游大赛中获英语组银牌">桂林导游在第六届全国导游大赛中获英语组银牌</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh0c7a0fed0aa69d47.html" target="_blank"
                                title="七星区社山桥社区新时代文明实践站打造“智慧父母”">七星区社山桥社区新时代文明实践站打造“智慧父母”</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh544652cedbab6da4.html" target="_blank"
                                title="学习·故事丨总书记回信里的誓词碑 让民族团结的佳话代代相传">学习·故事丨总书记回信里的誓词碑 让民族团结的佳话代代相传</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh71d744e910ea6fff.html" target="_blank"
                                title="学习时节｜“久久为功推动粤港澳大湾区建设”">学习时节｜“久久为功推动粤港澳大湾区建设”</a></li>
                        <li><a href="//news.guilinlife.com/article/5drh38c3041ed09220b9.html" target="_blank"
                                title="天天学习｜“这就是好样的！”">天天学习｜“这就是好样的！”</a></li>

                    </ul>
                </div>
            </div>
            <div class="media-list">
                <div class="list-header">全媒体平台</div>
                <div class="list-content">
                    <ul>
                        <li>
                            <a href="//m.guilinlife.com/appdown/index.html" target="_blank" class="app">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林生活网客户端</div>
                            </a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/m/3g/index.html" target="_blank" class="touch">
                                <div class="media-icon"></div>
                                <div class="media-name">手机触屏版</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&amp;__biz=MzAwNjUyODc4MA==&amp;scene=124#wechat_redirect"
                                target="_blank" class="wx">
                                <div class="media-icon"></div>
                                <img src="//assets.glshimg.com/home/2021/img/qrcode_wx.png">
                                <div class="media-name">官方微信</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="wxxcx">
                                <div class="media-icon"></div>
                                <div class="media-name">官方小程序</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://weibo.com/glshw" target="_blank" class="wb">
                                <div class="media-icon"></div>
                                <img src="//assets.glshimg.com/home/2021/img/qrcode_wb.png">
                                <div class="media-name">官方微博</div>
                            </a>
                        </li>
                        <li>
                            <a href="//bbs.guilinlife.com/" target="_blank" class="bbs">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林人论坛</div>
                            </a>
                        </li>
                        <li>
                            <a href="//epaper.guilinlife.com/glrbpc/" target="_blank" class="glrb">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林日报</div>
                            </a>
                        </li>
                        <li>
                            <a href="//epaper.guilinlife.com/glwbpc/" target="_blank" class="glwb">
                                <div class="media-icon"></div>
                                <div class="media-name">桂林晚报</div>
                            </a>
                        </li>
                        <li>
                            <a href="//m.guilinlife.com/m/3g/index.html" target="_blank" class="paper">
                                <div class="media-icon"></div>
                                <div class="media-name">手机看报</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ad_baidu_news_004"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6953911",
                container: "ad_baidu_news_004",
                async: true
            });
            </script>
            <div class="ad_baidu_news_005"></div>
            <script type="text/javascript">
            (window.slotbydup = window.slotbydup || []).push({
                id: "u6954398",
                container: "ad_baidu_news_005",
                async: true
            });
            </script>


        </div>
    </div>

</div>