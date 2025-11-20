<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

if (!isset($_GET['post_id']) || empty($_GET['post_id'])) {
    die('post Id error');
}

try {
    $article = new Post();
    $article->LoadInfoByID($_GET['post_id']);
    $title = $article->Title;
    $article->Del();

    $zbp->SetHint('good', "文章【{$title}】删除成功");

} catch (Exception $e) {
    $zbp->SetHint('good', '删除失败');
}

Redirect(GetVars('HTTP_REFERER', 'SERVER'));
