<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('TY_Pass')) {$zbp->ShowError(48);die();}

$blogtitle = '输入密码访问网站';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

$act = GetVars("act", "GET");
if ($act === "save") {
  CheckIsRefererValid();
  foreach ($_POST['ytecn'] as $key => $val) {
    $zbp->Config('TY_Pass')->$key = $val;
  }
  $zbp->SaveConfig('TY_Pass');
  $zbp->SetHint('good', '参数已保存');
  Redirect('./main.php');
}

?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle; ?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">

    <form id="form1" name="form1" method="post" action="main.php?act=save">
      <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
      <table width="100%" style='padding:0px;margin:0px;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <th width='20%'>
            <p align="center">设置</p>
          </th>
          <th width='70%'>
            <p align="center">内容</p>
          </th>
        </tr>

        <tr>
          <td><b><label for="typass">
                <p align="center">密码</p>
              </label></b></td>
          <td>
            <p align="left"><input id="typass" name="ytecn[typass]" type="text" value="<?php echo $zbp->Config('TY_Pass')->typass; ?>"></p>
          </td>
        </tr>
        <tr>
          <td><b><label for="typass">
                <p align="center">获取密码的URL</p>
              </label></b></td>
          <td>
            <p align="left"><input id="typass" name="ytecn[url]" type="text" value="<?php echo $zbp->Config('TY_Pass')->url; ?>"></p>
          </td>
        </tr>
        <tr>
          <td><b><label for="typass">
                <p align="center">备注</p>
              </label></b></td>
          <td>
            <p align="left">开启插件后，需要“[清空缓存并重新编译模板]”，默认插件模板样式在插件的demo/pass.php,可自行修改</p>
            <p align="left">如不需要获取密码的URL可以不填，不填不显示链接地址</p>
          </td>
        </tr>
      </table>
      <br />
      <input name="" type="Submit" class="button" value="保存" />
    </form>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>