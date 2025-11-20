<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

if (!GetVars('comment_id')) {
    echo "<h2>参数错误</h2>";
    return;
}

$comment = new Comment();
$comment->LoadInfoByID(GetVars('comment_id'));

if (!$comment->ID) {
    echo "<h2>评论信息不存在</h2>";
    return;
}

if (GetVars('edit_comment')) {
    if (function_exists('CheckIsRefererValid')) {
        CheckIsRefererValid();// 检查 csrfToken
    }
    $comment->IsChecking = GetVars('is_checking');
    $comment->Email = GetVars('email');
    $comment->HomePage = GetVars('homepage');
    $comment->Content = GetVars('content');

    foreach ($GLOBALS['hooks']['Filter_Plugin_CheckComment_Core'] as $fpname => &$fpsignal) {
        @$fpname($comment);
    }

    $comment->Save();

    foreach ($GLOBALS['hooks']['Filter_Plugin_CheckComment_Succeed'] as $fpname => &$fpsignal) {
        @$fpname($comment);
    }

    @$zbp->AddBuildModule('comments');
    @$zbp->BuildModule();
    @$zbp->SaveCache();

    $zbp->SetHint('good', '修改成功');

    Redirect('?action=comments');
}

?>
<form id="edit" name="edit" method="post" action="#">
    <?php
    if (function_exists('CheckIsRefererValid')) {
        echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
    }
    ?>
  <input id="edtType" name="Type" type="hidden" value="0">
  <p>
    <span class="email">状态:</span>
    <br>
    <select class="edit" name="is_checking">
      <option value="0" <?php echo 0 == $comment->IsChecking ? 'selected' : ''; ?>>已审核</option>
      <option value="1" <?php echo 1 == $comment->IsChecking ? 'selected' : ''; ?>>未审核</option>
    </select>
  </p>
  <p>
    <span class="email">邮箱:</span>
    <br>
    <input class="edit" size="40" name="email" type="text" value="<?php echo $comment->Email; ?>">
  </p>
  <p>
    <span class="homepage">网站:</span>
    <br>
    <input class="edit" size="40" name="homepage" type="text" value="<?php echo $comment->HomePage; ?>">
  </p>
  <p>
    <span class="content"> 评论内容（*）:</span>
    <br>
    <textarea cols="3" rows="6" name="content" style="width:600px;"><?php echo $comment->Content; ?></textarea>
  </p>
  <p>
    <input type="submit" class="button" name="edit_comment" value="提交修改" id="btnPost">
  </p>
</form>