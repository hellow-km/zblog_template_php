{* Template Name:分页 *}
<div class="page-bar">
    {if $pagebar}
    <a class="link-btn m-10 {if $pagebar.PageNow == 1}link-btn-disable{/if}" title="{$pagebar.buttons['‹']}"
        href="{$pagebar.buttons['‹']}">&lt;</a>

    {foreach $pagebar.buttons as $k=>$v}
    {if $k != "‹‹" && $k != "››" &&$k !="›" && $k!="‹"}
    {if $pagebar.isFullLink==false && $pagebar.PageNow==$k}
    <span class="prm-btn m-10">{$k}</span>
    {else}
    <a class="link-btn m-10" title="{$k}" href="{$v}"><span>{$k}</span></a>
    {/if}
    {/if}
    {/foreach}
    <a class="link-btn m-10 {if $pagebar.PageNow == $pagebar.PageLast}link-btn-disable{/if}"
        title="{$pagebar->buttons['›']}" href="{$pagebar->buttons['›']}">></a>
    {/if}
</div>

<script type="module">
new Vue({
    el: ".page-bar",
})
</script>