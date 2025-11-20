    {if $pagebar}
    <div id="pageUpDown1">
        <ul id="page">


            {if isset($pagebar.buttons['‹'])}
            <li><a class="prev" title="{$pagebar.buttons['‹']}" href="{$pagebar.buttons['‹']}">上一页</a></li>
            {/if}

            {foreach $pagebar.buttons as $k=>$v}
            {if $k != "‹‹" && $k != "››" && $k != "›" && $k != "‹"}
            {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
            <li><a class="row" title="{$k}" href="{$v}"><span>{$k}</span></a></li>
            {else}
            <li><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
            {/if}
            {/if}
            {/foreach}

            {if isset($pagebar.buttons['›'])}
            <li><a class="next" title="{$pagebar.buttons['›']}" href="{$pagebar.buttons['›']}">下一页</a></li>
            {/if}


        </ul>
    </div>

    {/if}

    <style>

    </style>