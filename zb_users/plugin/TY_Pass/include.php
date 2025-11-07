<?php
#注册插件
RegisterPlugin("PassWordChecker","ActivePlugin_PassWordChecker");

function ActivePlugin_PassWordChecker() {
    Add_Filter_Plugin('Filter_Plugin_Zbp_BuildTemplate','PassWordChecker_Temp');
    Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','PassWordChecker_Content');
    Add_Filter_Plugin('Filter_Plugin_ViewList_Template','PassWordChecker_Content');
}

function InstallPlugin_PassWordChecker() {
  global $zbp;
  $zbp->CheckTemplate(false, (bool)(1));
}

function PassWordChecker_Temp(&$templates) {
  global $zbp;
  $fullname=$zbp->usersdir .'plugin/TY_Pass/demo/pass.php';
  $templates['pass'] = file_get_contents($fullname);
}

function PassWordChecker_Content(&$template){
    global $zbp;
    session_start();
    $language = isset($_SESSION['pass'])?$_SESSION['pass']:0;
    $_SESSION['passurl']=$zbp->fullcurrenturl;
    if($language==0){
      $zbp->template->SetTemplate('pass');
    }
}

function UninstallPlugin_PassWordChecker() {}