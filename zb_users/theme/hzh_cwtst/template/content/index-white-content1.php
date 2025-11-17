<div class="index-white-bg">
    <div class="index-head">
        <h2>长春新闻</h2>
        <span class="index-head-more"><a class="link-a" href="/">更多&gt;&gt;</a></span>
    </div>
    <div class="index-img-more">
        <ul>
            {foreach [1,2,3,4,5,6,7,8] as $i}
            <li>
                <div class="index-img-more-once">
                    <div class="index-img-more-once-imgbox">
                        <img src="" height="180" width="262" alt="">
                    </div>
                    <h2><a href="#">占位占位占位占位占位占位占位占位占位占位{$i}</a></h2>
                    <p><span>简介</span>2025年11月5日，香港——作为亚洲金融科技领域的年度盛事，2025香港金融科技周（与StartmeupHK创业节首次联合举办）于11月5日在香港会议展览中心圆满落幕。本次大会以“策动金融科技新
                    </p>
                </div>
            </li>
            {/foreach}
        </ul>
    </div>
</div>
<style>
.index-img-more ul li {
    cursor: pointer;

}

.index-img-more ul li:hover a {
    color: #ff5500;

}

.index-img-more ul li p span {
    margin-right: 15px;
    font-size: 13px;
    display: inline-block;
    position: relative;
    height: 20px;
    line-height: 20px;
    padding: 0 6px;
    background: #ff5500;
    color: #fff;
}


.index-img-more ul li p span:after {
    content: '';
    position: absolute;
    right: -4px;
    top: 50%;
    margin-top: -6px;
    border-left: 6px solid #ff5500;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}
</style>