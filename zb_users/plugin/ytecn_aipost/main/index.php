<?php
require '../../../../zb_system/function/c_system_base.php';
require '../../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('ytecn_aipost')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
CheckIsRefererValid();
}

$blogtitle=$zbp->Config('ytecn_aipost')->name;
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
    <div class="divHeader"><?php echo $blogtitle;?></div>
    <div class="SubMenu">
        <?php echo ytecn_aipost_SubMenu(0); ?>
    </div>
    <div id="divMain2">
        <form enctype="multipart/form-data" method="post" action="save.php?type=base">
            <input id="reset" name="reset" type="hidden" value="" />
            <table border="1" class="tableFull tableBorder">
                <tr>
                    <th class="td30">
                        <p align='left'><b>标题</b><br><span class='note'></span></p>
                    </th>
                    <th>说明</th>
                </tr>
                <tr>
                    <td class="td30">
                        <p align='left'><b>使用协议</b></p>
                    </td>
                    <td>当你使用此插件的时候，我们会获取你的《写作指令》，我们有权公开使用你的《写作指令》</td>
                </tr>
                <tr>
                    <td class="td30">
                        <p align='left'><b>ZBLOG主题/插件制作交流群</b></p>
                    </td>
                    <td><a target="_blank"
                            href="https://qm.qq.com/cgi-bin/qm/qr?k=P5e8rnNcCB8dZrHiShCRVoe5QTFeAZVb&jump_from=webapi"><img
                                border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="Z-BlogPHP独立博客交流群"
                                title="Z-BlogPHP独立博客交流群"></a> QQ群:4243058</td>
                </tr>
                <tr>
                    <td class="td30">
                        <p align='left'><b>技术支持</b></p>
                    </td>
                    <td><a target="_blank" href="https://www.ytecn.com/">豫唐网络</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>