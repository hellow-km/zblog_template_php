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
            'comm_IsChecking' => GetVars('comm_IsChecking'),
        );

        if (-1 == $data['comm_IsChecking']) {
            unset($data['comm_IsChecking']);
        }

        if ($data) {
            $sql = $zbp->db->sql->get()->update('%pre%comment')
                ->where('in', 'comm_ID', trim(GetVars('post_ids'), ','))
                ->data($data)
                ->sql;

            $zbp->db->Query($sql);
        }

        $zbp->ShowHint('good', '修改成功');
    } elseif ('delete' == GetVars('handle_type')) {
        $where = array();
        $where[] = array('in', 'comm_ID', trim(GetVars('post_ids'), ','));
        $comments = $zbp->GetCommentList('*', $where);
        foreach ($comments as $comment) {
            $comment->Del(); // 触发式删除
        }

        $zbp->ShowHint('good', '删除成功');
    }
}

// select
$searchString = GetVars('search_string');
$searchStartAt = GetVars('search_start_at');
$searchEndAt = GetVars('search_end_at');
$searchStatus = GetVars('search_status');
$searchSort = GetVars('search_sort');

$searchStatus = is_null($searchStatus) ? -1 : $searchStatus;

$url = '{%host%}zb_users/plugin/iddahe_com_admin/main.php?action=comments{&page=%page%}';
$url .= '{&search_string=%search_string%}{&search_start_at=%search_start_at%}{&search_end_at=%search_end_at%}';
$url .= '{&search_status=%search_status%}{&search_sort=%search_sort%}';

$page = new Pagebar($url, false);
$page->PageCount = 20;
$page->PageBarCount = $zbp->pagebarcount;

if (GetVars('searchForm')) {
    $page->PageNow = 1; // 点击搜索按钮使用第一页，但是页码不会变
} else {
    $page->PageNow = (int)GetVars('page', 'GET') == 0 ? 1 : (int)GetVars('page', 'GET');
}

$page->UrlRule->Rules['{%search_string%}'] = $searchString;
$page->UrlRule->Rules['{%search_start_at%}'] = $searchStartAt;
$page->UrlRule->Rules['{%search_end_at%}'] = $searchEndAt;
$page->UrlRule->Rules['{%search_status%}'] = $searchStatus;
$page->UrlRule->Rules['{%search_sort%}'] = $searchSort;

$where = array();

if ($searchString) {
    $where[] = array('like', 'comm_Content', "%{$searchString}%");
}

if ($searchStartAt) {
    $where[] = array('>=', 'comm_PostTime', strtotime($searchStartAt));
}

if ($searchEndAt) {
    $where[] = array('<=', 'comm_PostTime', strtotime($searchEndAt));
}

if (-1 != $searchStatus) {
    $where[] = array('=', 'comm_IsChecking', $searchStatus);
}

if (GetVars('parent_id')) {
    $where[] = array('=', 'comm_ID', GetVars('parent_id'));
}

$searchSort = $searchSort ? $searchSort : 'comm_IsChecking DESC';

$offset = array(($page->PageNow - 1) * $page->PageCount, $page->PageCount);
$sql = $zbp->db->sql->Select('%pre%comment', '*', $where, $searchSort, $offset, array('pagebar' => $page));
$comments = $zbp->GetListType('Comment', $sql);

?>

<form class="search" id="search" method="post" action="#">
    <?php
    if (function_exists('CheckIsRefererValid')) {
        echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
    }
    ?>
  <div style="padding: 0.2em 0 0.2em 0;">
    <div style="display:inline-block;width:auto;">
      <input type="hidden" name="searchForm" value="1">
      评论内容:&nbsp
      <input name="search_string" style="width:200px;" type="text" value="<?php echo $searchString; ?>"/>
      &nbsp&nbsp日期:&nbsp
      <input type="text" id="admin_start_at" name="search_start_at" value="<?php echo $searchStartAt; ?>"/>
      -
      <input type="text" id="admin_end_at" name="search_end_at" value="<?php echo $searchEndAt; ?>"/>
      &nbsp&nbsp状态:&nbsp
      <select name="search_status">
        <option value="-1" <?php echo -1 == $searchStatus ? 'selected' : ''; ?>>全部</option>
        <option value="1" <?php echo 1 == $searchStatus ? 'selected' : ''; ?>>未审核</option>
        <option value="0" <?php echo 0 == $searchStatus ? 'selected' : ''; ?>>已审核</option>
      </select>
      &nbsp&nbsp排序:&nbsp
      <select name="search_sort">
        <option value="comm_IsChecking ASC" <?php echo 'comm_IsChecking ASC' == $searchSort ? 'selected' : ''; ?>>
          未审核靠前
        </option>
        <option value="comm_PostTime DESC" <?php echo 'comm_PostTime DESC' == $searchSort ? 'selected' : ''; ?>>
          时间降序
        </option>
        <option value="comm_PostTime ASC" <?php echo 'comm_PostTime ASC' == $searchSort ? 'selected' : ''; ?>>
          时间升序
        </option>
        <option value="comm_ID DESC" <?php echo 'comm_ID DESC' == $searchSort ? 'selected' : ''; ?>>ID 降序</option>
        <option value="comm_ID ASC" <?php echo 'comm_ID ASC' == $searchSort ? 'selected' : ''; ?>>ID 升序</option>
      </select>
      &nbsp&nbsp
      <input type="submit" class="button" value="搜索"/>
    </div>
  </div>
</form>
<table
  id="admin-table"
  style="width:100%;padding:0;margin:0;text-align: center"
  class="tableBorder tableBorder-thcenter table_striped table_hover">
  <tr>
    <th>ID</th>
    <th>被回复 ID</th>
    <th>评论人</th>
    <th>邮箱</th>
    <th>网站</th>
    <th style="width: 20%">评论内容</th>
    <th style="max-width: 20%">评论文章</th>
    <th>IP地址</th>
    <th>状态</th>
    <th>时间</th>
    <th>操作</th>
    <th><input type="checkbox" id="selected_all">&nbsp全选</th>
  </tr>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <td><?php echo $comment->ID; ?></td>
        <td>
            <?php if (0 != $comment->ParentID) { ?>
              <a href="?action=comments&parent_id=<?php echo $comment->ParentID; ?>">
                  <?php echo $comment->ParentID; ?>
              </a>
            <?php } else { ?>
              无
            <?php } ?>
        </td>
        <td><?php echo $comment->Name; ?></td>
        <td><?php echo $comment->Email; ?></td>
        <td>
          <a href="<?php echo $comment->HomePage; ?>" target="_blank">
              <?php echo $comment->HomePage; ?>
          </a>
        </td>
        <td><?php echo $comment->Content; ?></td>
        <td>
            <?php
            $article = $zbp->GetPostByID($comment->LogID);
            if ('未命名' != $article->Title) {
                $display = mb_substr($article->Title, 0, 8);
                echo <<<HTML
          <a href="{$article->Url}" target="_blank" type="{$article->Title}">
            {$display}...
          </a>
HTML;
            } else {
                echo '文章不存在';
            }
            ?>
        </td>
        <td><?php echo $comment->IP; ?></td>
        <td><?php echo 0 == $comment->IsChecking ? '已审核' : '未审核'; ?></td>
        <td><?php echo date('Y-m-d H:i:s', $comment->PostTime); ?></td>
        <td class="action">
          <a href="?action=comments-edit-a-post&comment_id=<?php echo $comment->ID; ?>">
            <span class="edit" data-key="<?php echo $comment->ID; ?>">编辑</span>
          </a> |
          <a href="#">
            <span
              class="del"
              delete_url="<?php echo '?action=comments-delete-a-post&comment_id=' . $comment->ID; ?>"
              data-key="<?php echo $comment->ID; ?>">
              删除
            </span>
          </a>
        </td>
        <td>
          <input type="checkbox" value="<?php echo $comment->ID; ?>" class="selected_row">
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
      状态:&nbsp
      <select name="comm_IsChecking">
        <option value="-1">不更新</option>
        <option value="0">审核</option>
        <option value="1">待审</option>
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
<script src="<?php echo $zbp->host ?>zb_users/plugin/iddahe_com_admin/asset/list-update.js"
        type="text/javascript"></script>