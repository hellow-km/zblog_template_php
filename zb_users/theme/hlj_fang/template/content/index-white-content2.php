<div class="index-white-bg">
    <div class="index-text-box">
        <ul>
            {foreach $onceCates as $cat}
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