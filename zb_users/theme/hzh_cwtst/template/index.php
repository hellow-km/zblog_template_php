{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
    {template:header}
</head>


<body>
    <div id="app1">
        <div class="page">
            <div class="page-header">
                <div class="header-navbar header-left-normal">
                    {template:header2}
                </div>
            </div>
            <div class="page-main">
                <div class="page-content">
                  {template:content}
                </div>
                  <div class="page-footer">{template:footer}</div>
            </div>
        </div>
    </div>
</body>


</html>