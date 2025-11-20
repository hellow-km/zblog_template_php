<?php
RegisterPlugin("iddahe_com_admin", "ActivePlugin_iddahe_com_admin");

function ActivePlugin_iddahe_com_admin()
{
    Add_Filter_Plugin('Filter_Plugin_Admin_LeftMenu', 'iddahe_com_admin_left_menu');
    Add_Filter_Plugin('Filter_Plugin_Admin_Begin', 'iddahe_com_admin_admin_begin');
}

function InstallPlugin_iddahe_com_admin()
{
    // just so so
}

function UninstallPlugin_iddahe_com_admin()
{
    // just so so
}

function iddahe_com_admin_admin_begin()
{
    global $zbp;

    if ($zbp->Config('iddahe_com_admin')->reset_article_nav) {
        if (strpos($zbp->currenturl, 'zb_system/admin/index.php?act=ArticleMng')) {
            Redirect("{$zbp->host}zb_users/plugin/iddahe_com_admin/main.php?action=articles-find-and-update");
        }
    }

    if ($zbp->Config('iddahe_com_admin')->reset_comment_nav) {
        if (strpos($zbp->currenturl, 'zb_system/admin/index.php?act=CommentMng')) {
            Redirect("{$zbp->host}zb_users/plugin/iddahe_com_admin/main.php?action=comments");
        }
    }
}

function iddahe_com_admin_left_menu(&$menus)
{
    global $zbp;

    if ($zbp->Config('iddahe_com_admin')->reset_comment_nav) {
        $menus['nav_comment1'] = preg_replace(
            '/href\=\".*?\"/i',
            "href=\"{$zbp->host}zb_users/plugin/iddahe_com_admin/main.php?action=comments\"",
            $menus['nav_comment1']
        );
        if (isset($menus['nav_comment'])) {
            $menus['nav_comment'] = preg_replace(
                '/href\=\".*?\"/i',
                "href=\"{$zbp->host}zb_users/plugin/iddahe_com_admin/main.php?action=comments\"",
                $menus['nav_comment']
            );
        }
    }

    if ($zbp->Config('iddahe_com_admin')->reset_article_nav) {
        $menus['nav_article'] = preg_replace(
            '/href\=\".*?\"/i',
            "href=\"{$zbp->host}zb_users/plugin/iddahe_com_admin/main.php?action=articles-find-and-update\"",
            $menus['nav_article']
        );
    }
}

function iddahe_com_admin_get_status_alias($status)
{
    $maps = array(
        '0' => '公开',
        '1' => '草稿',
        '2' => '审核',
    );

    return isset($maps[$status]) ? $maps[$status] : '未知';
}

function iddahe_com_admin_get_pagebar($page)
{
    $bar = '<p class="pagebar">';

    foreach ($page->buttons as $key => $value) {
        $bar .= '<a href="' . $value . '">' . $key . '</a>&nbsp;&nbsp;';
    }

    return $bar . '</p>';
}

function iddahe_com_admin_rand_category_id()
{
    global $zbp;

    $categoryIds = array();

    $categories = $zbp->GetCategoryList(null, null, array('cate_Order' => 'ASC'), null, null);

    foreach ($categories as $category) {
        $categoryIds[] = $category->ID;
    }

    return $categoryIds[mt_rand(0, count($categoryIds) - 1)];
}

function iddahe_com_admin_rand_user_id()
{
    global $zbp;

    $members = $zbp->GetMemberList('*', array(array('=', 'mem_Level', 1))); // 必须是管理员

    $memberIds = array();
    foreach ($members as $member) {
        $memberIds[] = $member->ID;
    }

    return $memberIds[mt_rand(0, count($memberIds) - 1)];
}

function iddahe_com_admin_hint($status, $message, $action = null)
{
    register_shutdown_function(function () use ($status, $message, $action) {
        global $zbp;
        $zbp->SetHint($status, $message);
        $action && Redirect($action);
    });
}

function iddahe_com_admin_get_this_version()
{
    global $zbp;

    $app = new App();
    $app->LoadInfoByXml('plugin', 'iddahe_com_admin');

    return $app->version;
}
