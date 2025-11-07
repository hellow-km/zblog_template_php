<?php
require '../../../zb_system/function/c_system_base.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('visitor')) {$zbp->ShowError(48);die();}
$act = isset($_GET['act']) ? $_GET['act'] : '';

switch ($act) {
    case 'insetsql':
        visitor_update();
        $zbp->SetHint('good',"数据结构升级成功！");
        Redirect('./main.php?csrfToken='.$zbp->GetCSRFToken());
        break;
    default:
        # code...
        break;
}