{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {template:header}
</head>


<body>
    <div id="app1">
        <div class="page">
            {php}
            $pathname = $_SERVER['REQUEST_URI'];
            {/php}
            <div class="page-header">
                {if $pathname != "/AI"}
                <div class="header-navbar header-left-normal">
                    {template:header2}</div>
                {template:searchIpt}
                {else}
                <div class="header-navbar header-left-normal">
                    {template:header2}
                </div>
                {/if}
            </div>
            <div class="page-main">

                {if $pathname == "/AI"}
                {template:AI/AI}
                {else}
                <div class="page-side">{template:sidebar}</div>
                <div class="page-content">


                    {foreach $articles as $article}

                    {if $article.TopType}
                    {template:post-istop}
                    {else}
                    {template:post-multi}
                    {/if}

                    {/foreach}
                </div>
                <div class="page-pagebar">{template:pagebar}</div>
                <div class="page-side1">{template:sidebar2}</div>
                <div class="page-side1 page-side2">{template:sidebar3}</div>
                {/if}
            </div>
            <div class="page-footer">{template:footer}</div>
        </div>
    </div>
</body>


</html>