<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

if (!isset($_GET['comment_id']) || empty($_GET['comment_id'])) {
    die('post Id error');
}

try {
    $comment = new Comment();
    $comment->LoadInfoByID($_GET['comment_id']);
    $comment->Del();

    $zbp->SetHint('good', "删除成功");

} catch (Exception $e) {
    $zbp->SetHint('good', '删除失败');
}

Redirect(GetVars('HTTP_REFERER', 'SERVER'));
