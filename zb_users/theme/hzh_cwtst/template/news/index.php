{* Template Name:首页及列表页 *}

<div class="main">
    {if isset($article)}
    {template:news/single}
    {else}
    {template:news/content}
    {/if}
</div>
<div class="side">
    <div class="white-con">{template:sidebar}</div>
    <div class="white-con">{template:sidebar2}</div>
</div>

<style>
.main {
    width: 820px;
    float: left;
}

.side {
    width: 360px;
    float: right;
}
</style>