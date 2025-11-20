{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {php}
    $pathname = $_SERVER['REQUEST_URI'];
    {/php}

    {template:search_header}

</head>



<body>
    <div class="container-fluid uc-search">
        <div class="container select">
            <ul class="search-tab clearfix">
                <li class="pull-left tab-active" id="search-normal">全文检索</li>
                <!-- <li class="pull-left" id="search-senior">高级搜索</li> -->
            </ul>
            <script type="text/javascript">
            //检索提交
            function summitForm() {
                document.getElementById("search_form").submit();
            }
            </script>
            <form id="search_form" class="form-horizontal search-normal clearfix" method="post"
                action="{$host}zb_system/cmd.php?act=search">
                <div class="select-search clearfix">
                    <input id="search-input" type="text" name="q" class="form-control pull-left search-target"
                        placeholder="请输入关键词">
                    <img id="search-img" class="pull-left" onclick="summitForm()" src="/images/search.png" alt="搜索">
                    <strong class="search-remove pull-left">×</strong>
                </div>
                <div class="simple-search">
                    <button class="simple-search-btn">检索</button>
                    <button class="simple-result-search-btn" style="display: inline-block;">在结果中检索</button>
                </div>
                <!-- <span id="search-senior" class="pull-left">高级搜索</span> -->
            </form>
            <form class="form-horizontal search-senior" method="get" action="javascript:;">
                <dl class="node-list">
                    <dt class="node-list-all node-select">全部</dt>
                    <dd>
                        <ol class="node-list-item clear">
                            <li class="pull-left" colid="26145">དབུ་ཤོག་ལེ་ཚན།（19553）</li>
                            <li class="pull-left" colid="10997">首页（8）</li>
                            <li class="pull-left" colid="26239">Headline（2546）</li>
                            <li class="pull-left" colid="25904">གསར་འགྱུར།（81500）</li>
                            <li class="pull-left" colid="30970">新媒原创（175）</li>
                            <li class="pull-left" colid="26240">Hot（6532）</li>
                            <li class="pull-left" colid="25916">སྲིད་དོན།（6266）</li>
                            <li class="pull-left" colid="29594">网络中国节（713）</li>
                            <li class="pull-left" colid="26241">Focus（2259）</li>
                            <li class="pull-left" colid="25925">ཞིང་འབྲོག་གསར་པ།（3127）</li>
                            <li class="pull-left" colid="26167">News Center（1188）</li>
                            <li class="pull-left" colid="25936">ཁྲིམས་ལུགས།（12078）</li>
                            <li class="pull-left" colid="25365">新闻（262563）</li>
                            <li class="pull-left" colid="26168">Tourism and Culture（529）</li>
                            <li class="pull-left" colid="25951">ཚན་སློབ་འཕྲོད་བསྟེན།（4059）</li>
                            <li class="pull-left" colid="26172">Visual Xizang（202）</li>
                            <li class="pull-left" colid="26169">Tourism（676）</li>
                            <li class="pull-left" colid="25393">雪域时评（23539）</li>
                            <li class="pull-left" colid="25971">བོད་ཀྱི་རིག་གནས།（4147）</li>
                            <li class="pull-left" colid="25379">政务（13072）</li>
                            <li class="pull-left" colid="26170">Education（158）</li>
                            <li class="pull-left" colid="26010">བོད་ལུགས་གསོ་རིག（484）</li>
                            <li class="pull-left" colid="25402">援藏（2473）</li>
                            <li class="pull-left" colid="26171">Environment（259）</li>
                            <li class="pull-left" colid="26031">སྣོད་བཅུད་དང་ཡུལ་སྐོར།（3556）</li>
                            <li class="pull-left" colid="30322">法制（2619）</li>
                            <li class="pull-left" colid="26042">འཛམ་གླིང་རྒྱང་ལྟ།（3987）</li>
                            <li class="pull-left" colid="26173">Services（243）</li>
                            <li class="pull-left" colid="26050">སྒྲ་དབྱངས་བརྙན་མཐོང་།（2831）</li>
                            <li class="pull-left" colid="26174">Special Reports（973）</li>
                            <li class="pull-left" colid="30228">生态（1246）</li>
                            <li class="pull-left" colid="26057">པར་མཛོད།（3417）</li>
                            <li class="pull-left" colid="26062">ཆེད་སྒྲིག（15106）</li>
                            <li class="pull-left" colid="25410">非遗（794）</li>
                            <li class="pull-left" colid="27247">special（16）</li>
                            <li class="pull-left" colid="26238">འཚོལ་བཤེར（1）</li>
                            <li class="pull-left" colid="25475">生活消费（2761）</li>
                            <li class="pull-left" colid="25498">图片视频（3632）</li>
                            <li class="pull-left" colid="26478">测试（25）</li>
                            <li class="pull-left" colid="25507">教育文化（4898）</li>
                            <li class="pull-left" colid="25525">文旅（7560）</li>
                            <li class="pull-left" colid="25554">公益（1073）</li>
                            <li class="pull-left" colid="25560">拉萨（8281）</li>
                            <li class="pull-left" colid="25569">日喀则（3609）</li>
                            <li class="pull-left" colid="25577">昌都（3123）</li>
                            <li class="pull-left" colid="25586">林芝（3451）</li>
                            <li class="pull-left" colid="25608">山南（4960）</li>
                            <li class="pull-left" colid="25616">那曲（2541）</li>
                            <li class="pull-left" colid="25626">阿里（1908）</li>
                            <li class="pull-left" colid="25699">专题（40863）</li>
                            <li class="pull-left" colid="26065">底部信息（1）</li>
                            <li class="pull-left" colid="29297">广告（45）</li>
                            <li class="pull-left" colid="26524">测试栏目（1）</li>
                            <li class="pull-left" colid="25700">数字报系（11）</li>
                        </ol>
                    </dd>
                </dl>
                <div class="search-position clearfix">
                    <div class="search-title pull-left">搜索位置：</div>
                    <ul class="search-cont pull-left clearfix">
                        <li class="clearfix form-group">
                            <label class="pull-left" for="topic-search">在标题中进行搜索</label>
                            <input id="topic-search" class="pull-left form-control search-target" type="text"
                                name="title" placeholder="请输入关键词" value="">
                            <strong class="search-remove pull-left">×</strong>
                        </li>
                        <li class="clearfix form-group">
                            <label class="pull-left" for="content-search">在正文中进行搜索</label>
                            <input id="content-search" class="pull-left form-control search-target" type="text"
                                name="content" placeholder="请输入关键词" value="">
                            <strong class="search-remove pull-left">×</strong>
                        </li>
                        <li class="clearfix form-group">
                            <label class="pull-left" for="author-search">在作者中进行搜索</label>
                            <input id="author-search" class="pull-left form-control search-target" type="text"
                                name="author" placeholder="请输入关键词" value="">
                            <strong class="search-remove pull-left">×</strong>
                        </li>
                        <li class="clearfix form-group">
                            <label class="pull-left" for="author-search">在记者中进行搜索</label>
                            <input id="author-search" class="pull-left form-control search-target" type="text"
                                name="journalist" placeholder="请输入关键词" value="">
                            <strong class="search-remove pull-left">×</strong>
                        </li>
                    </ul>
                </div>
                <div class="search-range clearfix">
                    <div class="search-title pull-left">日期范围：</div>
                    <ul class="search-cont pull-left clearfix">
                        <li class="clearfix form-group">
                            <label class="pull-left" for="">发布时间为</label>
                            <input class="pull-left form-control date-picker" type="text" name="startDate" value="">
                            <span class="pull-left">至</span>
                            <input class="pull-left form-control date-picker" type="text" name="endDate" value="">
                        </li>
                    </ul>
                </div>
                <!-- <div class="search-sort clearfix">
						<div class="search-title pull-left">排序：</div>
						<ul class="search-cont pull-left clearfix">
							<li class="clearfix form-group">
								<label class="pull-left" for="order-search">搜索结果排序方式是</label>
								<select id="order-search" class="pull-left form-control" name="sort">
			                        <option selected value="">按相关度排序</option>
			                        <option value="orderbypubtime">按发布时间排序</option>
			                    </select>
							</li>
						</ul>
					</div> -->
                <!-- <div class="search-btn clearfix">
						<button id="advanced-search" class="btn">高级搜索</button>
						<button class="btn">全文检索</button>
					</div> -->
                <div class="advanced-search">
                    <span id="reset-condition">重置条件</span>
                    <button class="advanced-search-btn">检索</button>
                    <!-- <button class="advanced-result-search-btn" style="display: inline-block;">在结果中检索</button> -->
                </div>
            </form>
        </div>
        <div class="container result-head">
            <div class="result-head-cont clearfix">
                <p id="search-about" class="pull-left" style="display: block;">
                    共<span class="search-red" id="news-number">{$pagebar.AllCount}</span>条结果
                </p>
                <p id="sort-type" class="sort-type pull-right" style="display: block;">
                    排序：
                    <strong class="sort-relativity">相关度</strong>
                    <strong class="sort-date active-sort">
                        发表时间
                        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                    </strong>

                </p>
            </div>
        </div>
        <ul class="container search-result">
            {foreach $articles as $a}
            <li><a target="_self" href="{$a.Url}">
                    <h2>{$a.Title}</h2>
                    <div class="search-content">
                        <div>{$a.Intro}</div>
                    </div>
                    <div class="corner clearfix"><span class="article-type pull-left">文</span><span
                            class="reporter-parent pull-left"></span><span class="column-name pull-left">新闻</span><span
                            class="search-date pull-right">{$a.Time("Y年m月d日")}</span><span
                            class="pull-right">作者：{$a.Author??$a.Author.Name}</span>
                    </div>
                </a></li>
            {/foreach}
        </ul>


        {if $pagebar}
        <div class="pagin text-center">
            <ul class="pagination">


                {foreach $pagebar.buttons as $k=>$v}
                {if $k != "‹‹" && $k != "››" && $k != "›" && $k != "‹"}
                {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
                <li class="active"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
                {else}
                <li class="pointer-cursor"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
                {/if}
                {/if}
                {/foreach}



            </ul>
        </div>
        {/if}
    </div>
</body>


</html>