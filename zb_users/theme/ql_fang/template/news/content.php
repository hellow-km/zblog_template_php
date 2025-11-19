<div class="section-cnt wrapper clearfix">
    <div class="col-main">
        <!-- 齐鲁原创 -->
        <div class="mod-list">
            <div class="tit-sub">
                <h2><i></i><a href="{$category->Url}" title="{$category->Name}" target="_self">{$category->Name}</a>
                </h2>
            </div>
            <div class="news-pic-a">
                {foreach $articles as $a}
                <div class="news-pic-item">
                    <dl>
                        <dt><a href="{$a.Url}" title="{$a.Title}" target="_self"><img
                                    src="https://img12.iqilu.com/10339/sucaiku/compress/202511/19/f9e66e65142546739c792502ac93c97a.png"
                                    alt="{$a.Title}"></a></dt>
                        <dd>
                            <h3><a href="{$a.Url}" title="{$a.Title}" target="_self">{$a.Title}</a></h3>
                        </dd>
                        <dd> <a href="{$a.Url}" title="{$a.Title}" target="_self">[详细]</a></dd>
                        <dd class="info"><span class="resource">{$category->Name}</span><span
                                class="time">{$a.Time('Y-m-d')}</span></dd>
                    </dl>
                </div>
                {/foreach}
                <!-- 分页 -->
                {template:pagebar}
                <!-- end分页 -->
            </div>
        </div>
        <!-- end齐鲁原创 -->
    </div>
    <!-- end左侧 -->
    <!-- 右侧 -->
    {template:sidebar}
    <!-- end右侧 -->
</div>