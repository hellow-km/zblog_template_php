    {if $pagebar}
    <ul class="pages">


        {if isset($pagebar.buttons['‹'])}
        <li><a class="page-previous" title="{$pagebar.buttons['‹']}" href="{$pagebar.buttons['‹']}">&lt;</a></li>
        {/if}

        {foreach $pagebar.buttons as $k=>$v}
        {if $k != "‹‹" && $k != "››" && $k != "›" && $k != "‹"}
        {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
        <li class="page page-active"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
        {else}
        <li class="page"><a title="{$k}" href="{$v}"><span>{$k}</span></a></li>
        {/if}
        {/if}
        {/foreach}

        {if isset($pagebar.buttons['›'])}
        <li><a class="page-next" title="{$pagebar.buttons['›']}" href="{$pagebar.buttons['›']}">></a></li>
        {/if}


    </ul>

    {/if}