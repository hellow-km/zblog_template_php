<li class="content-item2">
    <div class="content-item2-box">
        <div class="index-head">
	      <h2>长春新闻</h2>
	      <span class="index-head-more"><a class="link-a" href="/">更多&gt;&gt;</a></span>
	    </div>
        <div class="content-item2-messages">
            {foreach [1,2,3,4,5,6,7,8] as $i}
            {template:content/components/content2Item-message}
            {/foreach}
        </div>
    </div>
</li>

<style>
.content-item2{
    width: 33.33%;
    float: left;
}
.content-item2-box{
    margin-left: 30px;
}
.content-item2-messages{
    overflow: hidden;
}

.content-item2-messages p {
    position: relative;
    height: 34px;
    line-height: 34px;
}

.content-item2-messages a {
    font-size: 16px;
    position: absolute;
    left: 0;
    top: 0;
    right: 85px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.content-item2-messages span {
    display: inline-block;
    float: right;
    color: #999;
    font-size: 13px;
}
</style>