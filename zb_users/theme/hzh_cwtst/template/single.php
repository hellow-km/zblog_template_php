{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {template:header}
</head>


<body>
    <div id="app">
        <div class="page">
            {php}
            $pathname = $_SERVER['REQUEST_URI'];
            {/php}
            <div class="page-header">
                {if $pathname != "/AI"}
                <div class="header-navbar">
                    {template:header2}</div>
                {template:searchIpt}
                {else}
                <div class="header-navbar">
                    {template:header2}</div>
                {/if}
            </div>
            <div class="page-main">
                <div class="page-side">{template:sidebar}</div>
                <div class="page-content">
                    {template:post-single}
                </div>
                <div class="page-side1">{template:sidebar2}</div>
                <div class="page-side1 page-side2">{template:sidebar3}</div>
            </div>
            <div class="page-footer">{template:footer}</div>
        </div>
    </div>
</body>

</html>