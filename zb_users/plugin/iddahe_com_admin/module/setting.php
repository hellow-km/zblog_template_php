<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

if (null !== GetVars('reset_article_nav')) {
    if (function_exists('CheckIsRefererValid')) {
        CheckIsRefererValid();// 检查 csrfToken
    }

    $zbp->Config('iddahe_com_admin')->reset_article_nav = GetVars('reset_article_nav');
    $zbp->Config('iddahe_com_admin')->reset_comment_nav = GetVars('reset_comment_nav');

    $zbp->SaveConfig('iddahe_com_admin');

    iddahe_com_admin_hint('good', '已保存', '?action=setting');
}

?>
<style>
  .iddahe_form_table tr:nth-child(n+1) td:first-child {
    text-align: right;
    font-weight: bold;
  }

  .iddahe_form_table {
    width: 800px;
    font-size: 16px
  }
</style>
<form method="post">
  <table class="iddahe_form_table">
      <?php
      if (function_exists('CheckIsRefererValid')) {
          echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
      }
      ?>
    <tr>
      <td style="width: 20%;">重置文章管理导航</td>
      <td>
        &nbsp&nbsp
        <input
          type="text"
          name="reset_article_nav"
          value="<?php echo $zbp->Config('iddahe_com_admin')->reset_article_nav; ?>"
          class="checkbox">
        <span style="font-size: 14px;color: grey">开启后，点击左侧文章管理将强制定向到此插件【文章搜索增强】功能</span>
      </td>
    </tr>
    <tr>
      <td style="width: 20%;">重置文章评论导航</td>
      <td>
        &nbsp&nbsp
        <input
          type="text"
          name="reset_comment_nav"
          value="<?php echo $zbp->Config('iddahe_com_admin')->reset_comment_nav; ?>"
          class="checkbox">
        <span style="font-size: 14px;color: grey">开启后，点击左侧评论管理将强制定向到此插件【文章评论管理增强】功能</span>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center">
        <input type="submit" value="保存设置" style="width: 150px">
      </td>
    </tr>
  </table>
</form>
