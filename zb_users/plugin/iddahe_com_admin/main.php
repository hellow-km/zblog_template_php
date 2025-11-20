<?php
require_once __DIR__ . '/../../../zb_system/function/c_system_base.php';

require_once __DIR__ . '/../../../zb_system/function/c_system_admin.php';

$zbp->Load();

$action = 'root';

if (!$zbp->CheckRights($action)) {
    $zbp->ShowError(6);
    die();
}

if (!$zbp->CheckPlugin('iddahe_com_admin')) {
    $zbp->ShowError(48);
    die();
}

if (count($_POST) > 0) {
    CheckIsRefererValid();
}

$blogtitle = '内容管理扩展 Version ' . iddahe_com_admin_get_this_version();

$action = isset($_GET['action']) ? $_GET['action'] : null;

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

?>
<style>
  table .table-td-right {
    text-align: right;
    font-weight: bold;
    width: 10%;
  }

  textarea {
    padding: 5px;
  }

  span.remark {
    font-size: 13px;
    color: grey;
  }

  div.iddahe_com_admin .navbar-item {
    padding: 18px;
    border: 1px solid #c2bbbb;
    text-align: center;
    font-size: 18px;
    margin-bottom: 10px;
    max-width: 55%;
  }
</style>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle; ?></div>
  <div class="SubMenu">
    <ul>
      <li>
        <a href="?action=articles-find-and-update">
          <span class="m-left  <?php echo ($action == 'articles-find-and-update' || empty($action)) ? 'm-now' : ''; ?>">
            文章搜索增强
          </span>
        </a>
      </li>
      <li>
        <a href="?action=articles-repeat-clear">
          <span class="m-left <?php echo $action == 'articles-repeat-clear' ? 'm-now' : ''; ?>">
            重复文章清理
          </span>
        </a>
      </li>
      <li>
        <a href="?action=articles-content-replace">
          <span class="m-left <?php echo $action == 'articles-content-replace' ? 'm-now' : ''; ?>">
           文章内容替换
          </span>
        </a>
      </li>
      <li>
        <a href="?action=articles-pro-import-and-export">
          <span class="m-left <?php echo $action == 'articles-pro-import-and-export' ? 'm-now' : ''; ?>">
           文章导入导出(+)
          </span>
        </a>
      </li>
      <li>
        <a href="?action=articles-pro-rand-add-content">
          <span class="m-left <?php echo $action == 'articles-pro-rand-add-content' ? 'm-now' : ''; ?>">
           文章首尾添加内容(+)
          </span>
        </a>
      </li>
      <li>
        <a href="?action=comments">
          <span class="m-left <?php echo $action == 'comments' ? 'm-now' : ''; ?>">
           文章评论管理增强
          </span>
        </a>
      </li>
      <li>
        <a href="?action=setting">
          <span class="m-left <?php echo $action == 'setting' ? 'm-now' : ''; ?>">
            导航设置
          </span>
        </a>
      </li>
      <li style="float: right">
        <a href="https://www.iddahe.com/apps/" target="_blank">
          <span class="m-left"># 其他作品 #</span>
        </a>
      </li>
      <li style="float: right">
        <a href="https://1024.iddahe.com/app/logs" target="_blank">
          <span class="m-left"># 更新日志 #</span>
        </a>
      </li>
    </ul>
  </div>
  <div id="divMain2">
      <?php

      $actionMaps = array(
          // 'articles' => __DIR__ . '/wg_articles/index.php',
          'articles-find-and-update' => __DIR__ . '/wg_articles/actions/articles-find-and-update.php',
          'articles-delete-a-post' => __DIR__ . '/wg_articles/actions/articles-delete-a-post.php',
          'articles-repeat-clear' => __DIR__ . '/wg_articles/actions/articles-repeat-clear.php',
          'articles-content-replace' => __DIR__ . '/wg_articles/actions/articles-content-replace.php',
          'articles-pro-import-and-export' => __DIR__ . '/../iddahe_com_adminx/wg_articles/articles-pro-import-and-export.php',
          'articles-pro-rand-add-content' => __DIR__ . '/../iddahe_com_adminx/wg_articles/articles-pro-rand-add-content.php',

          'comments' => __DIR__ . '/wg_comments/actions/comments-find-and-update.php',
          'comments-delete-a-post' => __DIR__ . '/wg_comments/actions/comments-delete-a-post.php',
          'comments-edit-a-post' => __DIR__ . '/wg_comments/actions/comments-edit-a-post.php',

          'categories' => __DIR__ . '/wg_categories/index.php',
          'tags' => __DIR__ . '/wg_tags/index.php',

          'setting' => __DIR__ . '/module/setting.php',
      );

      if (isset($actionMaps[$action])) {
          if (false !== strpos($actionMaps[$action], 'iddahe_com_adminx')) {
              if (!is_file($actionMaps[$action])) {
                  echo <<<HTML
<h3 style="padding: 15px 0 0 0">
  你好，该功能属于付费模块，如需使用请先安装 
  <a href='https://app.zblogcn.com/?id=24681' target="_blank">
  【 内容管理扩展(付费模块) 】
  </a>
  并在插件管理进行开启
</h3>
<h3 style="padding: 15px 0 0 0">如有疑问，可联系作者企鹅：2307903507 进行咨询，添加好友请道明来意</h3>
<h3 style="padding: 15px 0 0 0">（我的守望于斯结束）</h3>
HTML;
              } elseif (!$zbp->CheckPlugin('iddahe_com_adminx')) {
                  echo <<<HTML
<h3 style="padding: 15px 0 0 0">
  你好，该功能需要应用
  <a href='https://app.zblogcn.com/?id=24681' target="_blank">
  【 内容管理扩展(付费模块) 】
  </a>
  的支持，请先到插件管理进行开启
</h3>
<h3 style="padding: 15px 0 0 0">如有疑问，可联系作者企鹅：2307903507 进行咨询，添加好友请道明来意</h3>
<h3 style="padding: 15px 0 0 0">（我的守望于斯结束）</h3>
HTML;
              } else {
                  include_once $actionMaps[$action];
              }
          } elseif (is_file($actionMaps[$action])) {
              include_once $actionMaps[$action];
          } else {
              include_once __DIR__ . '/wg_articles/actions/articles-find-and-update.php';
          }
      } else {
          include_once __DIR__ . '/wg_articles/actions/articles-find-and-update.php';
      }
      ?>
  </div>
</div>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';

RunTime();
?>
<script type="text/javascript">
  AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/iddahe_com_admin/logo.png';?>");
</script>
<script type="text/javascript" src="/zb_system/script/jquery-ui-timepicker-addon.js"></script>
<script>
  $.datepicker.regional['zh-CN'] = {
    closeText: '完成',
    prevText: '上个月',
    nextText: '下个月',
    currentText: '现在',
    monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
    monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    dayNames: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
    dayNamesShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
    dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
    weekHeader: '周',
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: true,
    yearSuffix: ' 年  '
  };

  $.datepicker.setDefaults($.datepicker.regional['zh-CN']);

  $.timepicker.regional['zh-CN'] = {
    timeOnlyTitle: '时间',
    timeText: '时间',
    hourText: '小时',
    minuteText: '分钟',
    secondText: '秒钟',
    millisecText: '毫秒',
    currentText: '现在',
    closeText: '完成',
    timeFormat: 'HH:mm:ss',
    ampm: false
  };

  $.timepicker.setDefaults($.timepicker.regional['zh-CN']);

  $('#admin_start_at').datetimepicker({
    showSecond: true
  });
  $('#admin_end_at').datetimepicker({
    showSecond: true
  });
</script>
