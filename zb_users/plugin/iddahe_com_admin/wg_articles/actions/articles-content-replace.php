<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

if (GetVars('replace_form')) {
    if (function_exists('CheckIsRefererValid')) {
        CheckIsRefererValid();// 检查 csrfToken
    }

    $origin = GetVars('replace_origin');
    $result = GetVars('replace_result');

    $handle_title = GetVars('handle_title');
    $handle_content = GetVars('handle_content');

    $data = array();

    if ($handle_title) {
        $data['log_Title'] = 'REPLACE(log_Title,"' . $origin . '","' . $result . '")';
    }

    if ($handle_content) {
        $data['log_Content'] = 'REPLACE(log_Content,"' . $origin . '","' . $result . '")';
        $data['log_Intro'] = 'REPLACE(log_Intro,"' . $origin . '","' . $result . '")';
    }

    if ($data) {
        $sql = $zbp->db->sql->get()->update($zbp->table['Post'])->data($data)->sql;

        $sql = str_replace("'R", "R", $sql);
        $sql = str_replace(")'", ")", $sql);
        $sql = str_replace("\\", "", $sql);

        $array = $zbp->db->Query($sql);
    }

    iddahe_com_admin_hint('good', '替换成功!', '?action=articles-content-replace');
}
?>
<form method="post" class="iddahe_form_table">
    <?php
    if (function_exists('CheckIsRefererValid')) {
        echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
    }
    ?>
  <table>
    <tr style="font-weight: bold">
      <td class="table-td-right" style="width:10%">配置项</td>
      <td style="text-align: center">配置值（先看备注！！！）</td>
    </tr>
    <tr>
      <td class="table-td-right">替换前字符</td>
      <td>
        <input
          type="text"
          name="replace_origin"
          value="<?php echo GetVars('replace_origin') ?>"
          style="height: 40px;width: 250px">
        <span class="remark">&nbsp&nbsp标题 / 内容里面要被处理的字符（不要搞一些奇怪的字符）</span>
      </td>
    </tr>
    <tr>
      <td class="table-td-right">替换后字符</td>
      <td>
        <input
          type="text"
          name="replace_result"
          value="<?php echo GetVars('replace_result') ?>"
          style="height: 40px;width: 250px">
        <span class="remark">&nbsp&nbsp处理后的内容（不要搞一些奇怪的字符）</span>
      </td>
    </tr>
    <tr>
      <td class="table-td-right">处理范围</td>
      <td>
        &nbsp&nbsp
        <input type="text" class="checkbox" name="handle_title" value="<?php echo GetVars('handle_title') ?>">
        <span class="remark">文章标题</span>
        &nbsp&nbsp
        <input type="text" class="checkbox" name="handle_content" value="<?php echo GetVars('handle_content') ?>">
        <span class="remark">文章内容</span>
        <span style="color: red">（注意：该操作会直接修改数据库数据，且操作不可逆，务必备份好数据 ！！！）</span>
      </td>
    </tr>
    <tr style="text-align: center">
      <td colspan="2">
        <input type="submit" name="replace_form" value="执行替换" style="width: 200px">
      </td>
    </tr>
  </table>
</form>

