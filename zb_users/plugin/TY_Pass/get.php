<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
    global $zbp;
    $pass=$_POST['expressid'];
    $lodpass=$zbp->Config('TY_Pass')->typass;
    if($pass == $lodpass)
    {
        session_start();
        $_SESSION['pass'] = 1;
    }
    $passurl = isset($_SESSION['passurl'])?$_SESSION['passurl']:$zbp->host;
    Redirect($passurl);
?>