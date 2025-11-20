<?php

if (!$zbp->CheckRights('root')) {
    $zbp->ShowError(6);
    die();
}

// update and delete
if (GetVars('post_ids')) {
    if (function_exists('CheckIsRefererValid')) {
        CheckIsRefererValid();// 检查 csrfToken
    }
    if ('update' == GetVars('handle_type')) {
        $data = array(
            'log_AuthorID' => GetVars('post_author_id'),
            'log_Status' => GetVars('post_status'),
            'log_IsTop' => GetVars('post_top'),
            'log_CateID' => GetVars('post_category'),
        );

        if (-1 == $data['log_Status']) {
            unset($data['log_Status']);
        }

        if (-1 == $data['log_CateID']) {
            unset($data['log_CateID']);
        }

        $sql = $zbp->db->sql->get()->update('%pre%post')
            ->where('in', 'log_ID', trim(GetVars('post_ids'), ','))
            ->data(array_filter($data))
            ->sql;

        $zbp->db->Query($sql);
    } elseif ('delete' == GetVars('handle_type')) {
        $where = array();
        $where[] = array('in', 'log_ID', trim(GetVars('post_ids'), ','));
        $articles = $zbp->GetArticleList('*', $where);
        foreach ($articles as $article) {
            $article->Del(); // 触发式删除
        }
    }

    $zbp->ShowHint('good', '处理成功');
}

$url = '{%host%}zb_users/plugin/iddahe_com_admin/main.php?action=articles-pro-repeat-clear{&page=%page%}';

$page = new Pagebar($url, false);
$page->PageCount = 20;
$page->PageBarCount = $zbp->pagebarcount;

if (GetVars('searchForm')) {
    $page->PageNow = 1; // 点击搜索按钮使用第一页，但是页码不会变
} else {
    $page->PageNow = (int)GetVars('page', 'GET') == 0 ? 1 : (int)GetVars('page', 'GET');
}

$where = array();
$inSql = "Select log_Title From `{$zbp->table['Post']}` Group By log_Title Having Count(*) > 1";
$where[] = array('IN', 'log_Title', $inSql);

$searchSort = array('log_Title' => 'DESC', 'log_PostTime' => 'desc');;
$offset = array(($page->PageNow - 1) * $page->PageCount, $page->PageCount);
$sql = $zbp->db->sql->Select('%pre%post', '*', $where, $searchSort, $offset, array('pagebar' => $page));
$articles = $zbp->GetListType('Post', $sql);

?>

<table
  id="admin-table"
  style="width:100%;padding:0;margin:0;text-align: center"
  class="tableBorder tableBorder-thcenter table_striped table_hover">
  <tr>
    <th>ID</th>
    <th style="width: 25%">标题</th>
    <th>分类</th>
    <th>作者</th>
    <th>状态</th>
    <th>浏览数</th>
    <th>评论数</th>
    <th>日期</th>
    <th>操作</th>
    <th><input type="checkbox" id="selected_all">&nbsp全选</th>
  </tr>
    <?php foreach ($articles as $article) { ?>
      <tr>
        <td><?php echo $article->ID; ?></td>
        <td style="text-align: left"><?php echo $article->Title; ?></td>
        <td><?php echo $article->Category->Name; ?></td>
        <td><?php echo $article->Author->Name; ?></td>
        <td><?php echo iddahe_com_admin_get_status_alias($article->Status); ?></td>
        <td><?php echo $article->ViewNums; ?></td>
        <td><?php echo $article->CommNums; ?></td>
        <td><?php echo date('Y-m-d H:i:s', $article->PostTime); ?></td>
        <td class="action">
          <a href="<?php echo $article->Url; ?>" target="_blank">
            <span class="view" data-key="<?php echo $article->ID; ?>">浏览</span>
          </a> |
          <a href="<?php echo $zbp->host; ?>zb_system/cmd.php?act=ArticleEdt&id=<?php echo $article->ID; ?>">
            <span class="edit" data-key="<?php echo $article->ID; ?>">编辑</span>
          </a> |
          <a href="#">
            <span
              class="del"
              delete_url="<?php echo '?action=articles-delete-a-post&post_id=' . $article->ID; ?>"
              data-key="<?php echo $article->ID; ?>">
              删除
            </span>
          </a>
        </td>
        <td>
          <input type="checkbox" value="<?php echo $article->ID; ?>" class="selected_row">
        </td>
      </tr>
    <?php } ?>
</table>
<?php echo iddahe_com_admin_get_pagebar($page); ?>
<form class="search" id="update_form" method="post" action="#" style="margin-top: -10px;margin-bottom: 30px">
    <?php
    if (function_exists('CheckIsRefererValid')) {
        echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
    }
    ?>
  <div style="padding: 0.2em 0 0.2em 0;text-align: right">
    <div style="display:inline-block;width:auto;">
      作者ID:&nbsp
      <input type="text" name="post_author_id" style="width: 100px">
      &nbsp&nbsp状态:&nbsp
      <select name="post_status">
        <option value="-1">不更新</option>
        <option value="0">公开</option>
        <option value="1">草稿</option>
        <option value="2">审核</option>
      </select>
      &nbsp&nbsp置顶:&nbsp
      <select name="post_top">
        <option value="0">无</option>
        <option value="2">首页</option>
        <option value="1">全局</option>
        <option value="4">分类</option>
      </select>
      &nbsp&nbsp分类:&nbsp
      <select name="post_category" style="width: 120px">
        <option value="-1">不更新</option>
          <?php echo OutputOptionItemsOfCategories(0); ?>
      </select>
      &nbsp&nbsp
      <input type="hidden" name="post_ids" value="">
      <input type="hidden" name="handle_type" value="">
      <input type="button" class="button" id="update_button" value="修改选中"/>
      &nbsp&nbsp
      <input type="button" class="button" id="delete_button" value="删除选中"/>
    </div>
  </div>
</form>
<script src="<?php echo $zbp->host ?>zb_users/plugin/iddahe_com_admin/asset/list-update.js" type="text/javascript"></script>