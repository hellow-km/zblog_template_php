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
            <div class="page-main clearfixed">
                <div class="page-content clearfixed">
                    {template:content}
                </div>
                <div class="page-footer">{template:footer}</div>
            </div>
        </div>
    </div>
</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var imgs = document.querySelectorAll("img");
    console.log("imgs",imgs);
    
    imgs.forEach((img)=> {
        img.onerror = function () {
            console.log("|this",this);
            
            this.onerror = null;  // 防止死循环
            this.src = "/imgs/defaultpic.gif";
        };
    });
});
</script>
</html>