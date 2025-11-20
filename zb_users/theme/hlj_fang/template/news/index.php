{* Template Name:首页及列表页 *}
<div class="route"><a href="/">黑龙江新闻网</a> &gt;&gt; <a onclick="location.reload()">{$breadName}</a>
</div>

<div class="content">
    <div class="list-box">
        <div class="banner swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" id="swiper-wrapper-fea27b10d69b4ce77" aria-live="polite"
                style="transform: translate3d(0px, 0px, 0px);">

                <a href="location.reload()">
                    <div class="swiper-slide">
                        <img src="/images/hlj_content.jpg" alt="">
                        <div class="name">大庆打造“无废油城” 多项指标领跑全省 </div>
                    </div>
                </a>

                <!-- <div class="swiper-slide">
                        <img src="/resource/data/banner1.jpg" alt="">
                        <div class="name">中国电影 :走在高质量发展的大陆上</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="/resource/data/banner1.jpg" alt="">
                        <div class="name">中国电影 :走在高质量发展的大陆上</div>
                    </div> -->
            </div>
            <div class="swiper-pagination swiper-pagination-bullets"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
        <div class="news-box">
            {foreach $articles as $a}
            <a href="{$a.Url}">
                <div class="news">
                    <img src="https://www.hljnews.cn/ljxw/pic/2025-11/18/869537_3d230875-897b-4a03-8711-dd5e517f0244.jpg"
                        alt="">
                    <div class="info">
                        <div class="name">{$a.Title}（{$a.Time('Y年m月d日')}） </div>
                        <div class="writer">作者:{if $a.Author}{$a.Author.Name}{/if} {$a.Time('Y-m-d h:m:s')}</div>
                    </div>
                </div>
            </a>
            {/foreach}
            {template:pagebar}
            <!-- <div class="news">
                    <img src="/resource/data/fang.jpg" alt="">
                    <div class="info">
                        <div class="name">文章标题xxxxxxxxxx</div>
                        <div class="writer">作者:杨宁书    2020-11-17 12:00:00</div>
                    </div>
                </div>
                <div class="news">
                    <img src="/resource/data/fang.jpg" alt="">
                    <div class="info">
                        <div class="name">文章标题xxxxxxxxxx</div>
                        <div class="writer">作者:杨宁书    2020-11-17 12:00:00</div>
                    </div>
                </div> -->
        </div>

    </div>
    <!-- 右侧导览 begin -->
    <iframe src="http://www.hljnews.cn/column/youce.html" frameborder="0" style="width: 350px;"></iframe>
    <!-- end -->
</div>