<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();

$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('Timeline')) {$zbp->ShowError(48);die();}
$blogtitle="Timeline主题配置";
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
//基本设置
if(isset($_POST['Items'])){
    foreach($_POST['Items'] as $key=>$val){
       $zbp->Config('Timeline')->$key = $val;
    }
    $zbp->SaveConfig('Timeline');
    $zbp->ShowHint('good');
    //Redirect('./main.php?act=config');
}
?>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
    	<a href="main.php"><span class="m-left m-now">基本设置</span></a>
        <a href="../../plugin/AppCentre/main.php?id=1582"><span class="m-left tvip" style="color:#F60">有收费版？</span></a>
        <a href="../../plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194"><span class="m-left">作者作品</span></a>
        <a href="http://www.yiwuku.com/diy-zblog.html" target="_blank"><span class="m-left">定制服务</span></a>
        <a href="http://www.yiwuku.com" target="_blank"><span class="m-right">联系作者</span></a>
    </div>
	<div id="divMain2">
<style type="text/css">
.tableBorder tr{height:60px}
.tableBorder td{padding:3px 8px;}
.tableBorder td textarea{padding:5px;}
.xytips{color:#999;margin-left:15px}
.upbtn{color:#fff;padding:3px 18px;margin:0 0.5em;background:#3a6ea5;border:1px solid #3399cc;cursor:pointer;}
.upbtn:hover{background:#39c;}
.pshow{vertical-align:middle;margin:-1px 0 0 15px;background:#eee;}
</style>
<link href="source/colpick.css" rel="stylesheet" type="text/css">
<script src="source/colpick.js" type="text/javascript"></script>
<script>
$(function(){
    //Color
    $(".colorint input").each(function() {
        $(this).css('border-color',"#"+$(this).val());
    });
    $('.colorint input').colpick({
    layout:'hex',
    submit:0,
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        $(el).css('border-color','#'+hex);
        if(!bySetColor) $(el).val(hex);
    }
    }).keyup(function(){
        $(this).colpickSetColor(this.value);
    });
});
</script>
<form id="form1" name="form1" method="post">
<table width="100%" class="tableBorder">
    <tr>
        <td width="180" align="right"><strong>主题主色设置：</strong></td>
        <td>
            <span class="colorint">#<input type="text" value="<?php echo $zbp->Config('Timeline')->mcolor;?>" name="Items[mcolor]"></span>
            <span class="xytips">网页背景和按钮颜色，必须为较深颜色（其它层次感色调均基于此颜色）</span>
        </td>
    </tr>
    <tr>
        <td align="right"><strong>上传Logo图片：</strong></td>
        <td><input name="Items[logopic]" type="text" class="up_img" value="<?php echo $zbp->Config('Timeline')->logopic;?>" size="60"><strong class="upbtn upbtn1" title="操作成功后将自动生成新的Logo地址，请注意保存设置">浏览</strong><span class="xytips">基于UEditor实现上传，建议图片尺寸300*50像素</span><img src="<?php echo $zbp->Config('Timeline')->logopic;?>" height="50" class="pshow"></td>
    </tr>
    <tr>
        <td align="right"><strong>首页图文展示分类：</strong></td>
        <td>
            <select name="Items[homepcid]">
            <?php
                global $zbp;
                $array=$zbp->GetCategoryList(null,null,array('cate_Order'=>'ASC'),null,null);
                echo '<option value="0">--请选择分类--</option>';
                foreach ($array as $cate){?>
                <option value="<?php echo $cate->ID;?>" <?php if($zbp->Config('Timeline')->homepcid == $cate->ID) echo 'selected';?>><?php echo $cate->Name;?></option>
            <?php } ?>
            </select>
            <span class="xytips">支持自动获取子分类内容</span>
        </td>
    </tr>
    <tr>
        <td align="right"><strong>网站首页描述：</strong></td>
        <td><textarea cols="62" rows="5" name="Items[description]"><?php echo $zbp->Config('Timeline')->description;?></textarea><span class="xytips">一段概括网站主题内容的简要文字，一般不超过100个汉字</span></td>
    </tr>
    <tr>
        <td align="right"><strong>网站首页关键词：</strong></td>
        <td><textarea cols="62" rows="5" name="Items[keywords]"><?php echo $zbp->Config('Timeline')->keywords;?></textarea><span class="xytips">多个关键词用半角逗号隔开，一般不超过50个汉字</span></td>
    </tr>
    <tr>
        <td align="right"><strong>主题配置初始化：</strong></td><td><input name="Items[setsave]" type="text" value="<?php echo $zbp->Config('Timeline')->setsave;?>" class="checkbox"><span class="xytips">开启后切换主题时所有设置将恢复到初始状态</span></td>
    </tr>
    <tr>
    	<td colspan="2">注：当前主题代码为原创撰写，默认所用Logo、背景等素材仅为示例，网站正式启用前请先替换，以防造成不利影响；<br>感谢您使用当前主题！主题定制修改以及当前主题相关问题敬请 <a href="http://www.yiwuku.com" target="_blank">点击这里</a> 联系洽询。</td>
    </tr>
</table>
<input type="Submit" class="button" value="保存基本设置" /><br /><br />
</form>
	</div>
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_Timeline");</script>
<?php if($zbp->CheckPlugin('UEditor')) { ?>
<script type="text/javascript" src="<?php echo $zbp->host; ?>zb_users/plugin/UEditor/ueditor.config.php"></script>
<script type="text/javascript" src="<?php echo $zbp->host; ?>zb_users/plugin/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="source/lib.upload.js"></script>
<?php } ?>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>