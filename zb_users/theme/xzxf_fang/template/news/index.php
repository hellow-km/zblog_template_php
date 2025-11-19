{* Template Name:首页及列表页 *}

<div class="main">
    {if isset($article)}
    {template:news/single}
    {else}
    {template:news/content}
    {/if}
</div>