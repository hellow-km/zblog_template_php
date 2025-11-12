{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {template:header}
</head>

<style>
.page {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
}

.page-header {
    width: 100%;
    height: 60px;
    margin: 0;
    padding: 0;
    padding-top: 10px;
    border-bottom: 1px solid #eee;
}

.page-main {
    display: flex;
    width: 100%;
    height: calc(100vh - 140px);
}

.page-side {
    width: 200px;
    height: 100%;
    margin: 0;
    padding: 0;
}

.page-content {
    position: relative;
    flex: 1;
    height: 100%;
    margin: 0;
    padding: 0;
}

.page-footer {
    font-size: 14px;
    text-align: center;
    border-top: 1px solid #eee;
    height: 80px;
    padding-top: 5px;
}

[v-cloak] {
    display: none;
}
</style>

<body>
    <div id="app">
        <div class="page">
            <div class="page-header">{template:header2}</div>
            <div class="page-main">

                {php}
                $pathname = $_SERVER['REQUEST_URI'];
                {/php}

                {if $pathname == "/articles"}
                {template:content/articles}
                {elseif $pathname == "/AI"}
                <div class="page-side" style="width: 200px">{template:sidebar}</div>
                {template:content/AI}
                {/if}
            </div>

            <div class="page-footer">{template:footer}</div>
        </div>
    </div>
</body>

</html>