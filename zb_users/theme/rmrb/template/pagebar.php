    {if $pagebar}
    <ul class="pagination">


        {if isset($pagebar.buttons['‹'])}
        <li><a class="prev" title="{$pagebar.buttons['‹']}" href="{$pagebar.buttons['‹']}">&lt;</a></li>
        {/if}

        {foreach $pagebar.buttons as $k=>$v}
        {if $k != "‹‹" && $k != "››" && $k != "›" && $k != "‹"}
        {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
        <li class="active"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
        {else}
        <li><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
        {/if}
        {/if}
        {/foreach}

        {if isset($pagebar.buttons['›'])}
        <li><a class="next" title="{$pagebar.buttons['›']}" href="{$pagebar.buttons['›']}">></a></li>
        {/if}


    </ul>

    {if $pagebar}
    {php}
    // 每页数量
    $pagesize = $pagebar->PageCount;

    // 当前页
    $pagenow = $pagebar->PageNow;

    // 总记录数
    $total = $pagebar->AllCount;

    // 计算开始条数和结束条数
    $start = ($pagenow - 1) * $pagesize + 1;
    $end = min($pagenow * $pagesize, $total);
    {/php}

    <div class="summary" style="position: absolute;top:0;right:0">
        第 <b>{$start}-{$end}</b> 条，共 <b>{$pagebar.AllCount}</b> 条数据.
    </div>
    {/if}
    {/if}