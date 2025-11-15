<div class="index-white-bg">
    <div class="index-text-box">
    <ul>
    {foreach [1,2,3] as $i}
        {template:content/components/content2Item}
     {/foreach}
</ul>
</div>
</div>


<style>
    .index-text-box ul {
    margin-left: -30px;
}
</style>