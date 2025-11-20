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

        foreach ($data as $key => $value) {
            if (is_null($value) || '' == $value) {
                unset($data[$key]);
            }
        }

        $sql = $zbp->db->sql->get()->update('%pre%post')
            ->where('in', 'log_ID', trim(GetVars('post_ids'), ','))
            ->data($data)
            ->sql;

        $zbp->db->Query($sql);

        $zbp->ShowHint('good', '修改成功');
    } elseif ('delete' == GetVars('handle_type')) {
        $where = array();
        $where[] = array('in', 'log_ID', trim(GetVars('post_ids'), ','));
        $articles = $zbp->GetArticleList('*', $where);
        foreach ($articles as $article) {
            $article->Del(); // 触发式删除
        }

        $zbp->ShowHint('good', '删除成功');
    }
}

// select
$searchString = GetVars('search_string');
$searchStartAt = GetVars('search_start_at');
$searchEndAt = GetVars('search_end_at');
$searchStatus = GetVars('search_status');
$searchCategory = GetVars('search_category');
$searchSort = GetVars('search_sort');

$searchStatus = is_null($searchStatus) ? -1 : $searchStatus;
$searchCategory = is_null($searchCategory) ? -1 : $searchCategory;

$url = '{%host%}zb_users/plugin/iddahe_com_admin/main.php?action=articles-find-and-update{&page=%page%}';
$url .= '{&search_string=%search_string%}{&search_start_at=%search_start_at%}{&search_end_at=%search_end_at%}';
$url .= '{&search_status=%search_status%}{&search_category=%search_category%}{&search_sort=%search_sort%}';

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
$page->UrlRule->Rules['{%search_category%}'] = $searchCategory;
$page->UrlRule->Rules['{%search_sort%}'] = $searchSort;

$where = array(array('=', 'log_Type', 0)); // 仅文章

if ($searchString) {
    $where[] = array(
        'or',
        array(
            array('like', 'log_Content', "%{$searchString}%"),
            array('like', 'log_Title', "%{$searchString}%"),
        )
    );
}

if ($searchStartAt) {
    $where[] = array('>=', 'log_PostTime', strtotime($searchStartAt));
}

if ($searchEndAt) {
    $where[] = array('<=', 'log_PostTime', strtotime($searchEndAt));
}

if (-1 != $searchCategory) {
    $where[] = array('=', 'log_CateID', $searchCategory);
}

if (-1 != $searchStatus) {
    $where[] = array('=', 'log_Status', $searchStatus);
}

$searchSort = $searchSort ? $searchSort : 'log_PostTime desc';

$offset = array(($page->PageNow - 1) * $page->PageCount, $page->PageCount);
$sql = $zbp->db->sql->Select('%pre%post', '*', $where, $searchSort, $offset, array('pagebar' => $page));
$articles = $zbp->GetListType('Post', $sql);

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
      标题/内容:&nbsp
      <input name="search_string" style="width:200px;" type="text" value="<?php echo $searchString; ?>"/>
      &nbsp&nbsp日期:&nbsp
      <input type="text" id="admin_start_at" name="search_start_at" value="<?php echo $searchStartAt; ?>"/>
      -
      <input type="text" id="admin_end_at" name="search_end_at" value="<?php echo $searchEndAt; ?>"/>
      &nbsp&nbsp状态:&nbsp
      <select name="search_status">
        <option value="-1" <?php echo -1 == $searchStatus ? 'selected' : ''; ?>>全部</option>
        <option value="0" <?php echo 0 == $searchStatus ? 'selected' : ''; ?>>公开</option>
        <option value="1" <?php echo 1 == $searchStatus ? 'selected' : ''; ?>>草稿</option>
        <option value="2" <?php echo 2 == $searchStatus ? 'selected' : ''; ?>>审核</option>
      </select>
      &nbsp&nbsp分类:&nbsp
      <select name="search_category" style="width: 120px">
        <option value="-1" <?php echo -1 == $searchCategory ? 'selected' : ''; ?>>全部</option>
          <?php echo OutputOptionItemsOfCategories($searchCategory); ?>
      </select>
      &nbsp&nbsp排序:&nbsp
      <select name="search_sort">
        <option value="log_PostTime DESC" <?php echo 'log_PostTime DESC' == $searchSort ? 'selected' : ''; ?>>
          时间降序
        </option>
        <option value="log_PostTime ASC" <?php echo 'log_PostTime ASC' == $searchSort ? 'selected' : ''; ?>>
          时间升序
        </option>
        <option value="log_ID DESC" <?php echo 'log_ID DESC' == $searchSort ? 'selected' : ''; ?>>ID 降序</option>
        <option value="log_ID ASC" <?php echo 'log_ID ASC' == $searchSort ? 'selected' : ''; ?>>ID 升序</option>
        <option value="log_ViewNums DESC" <?php echo 'log_ViewNums DESC' == $searchSort ? 'selected' : ''; ?>>浏览数降序
        </option>
        <option value="log_ViewNums ASC" <?php echo 'log_ViewNums ASC' == $searchSort ? 'selected' : ''; ?>>浏览数升序
        </option>
        <option value="log_CommNums DESC" <?php echo 'logCommNums DESC' == $searchSort ? 'selected' : ''; ?>>评论数降序
        </option>
        <option value="log_CommNums ASC" <?php echo 'logCommNums ASC' == $searchSort ? 'selected' : ''; ?>>评论数升序
        </option>
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
<script src="<?php echo $zbp->host ?>zb_users/plugin/iddahe_com_admin/asset/list-update.js"
        type="text/javascript"></script>