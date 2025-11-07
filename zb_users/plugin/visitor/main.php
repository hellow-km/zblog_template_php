<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('visitor')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
	if (function_exists('CheckIsRefererValid')) {
		CheckIsRefererValid();
	}
	$zbp->Config('visitor')->visitorCountOn = $_POST['visitorCountOn'];
	if ($zbp->Config('visitor')->visitorType != $_POST['visitorType']) {
		$currentCount = 0;
		if ($zbp->Config('visitor')->visitorType == 0) {
			$currentCount = visitor_FileCount();
		} else {
			$row = $zbp->db->sql->get()
				->select($zbp->table['visitor'])
				->where(array('=', 'v_id', 1))
				->query;
			$currentCount = $row ? (int)$row[0]['v_total'] : 0;
		}

		if ($_POST['visitorType'] == 0) {
			visitor_FileCount($currentCount);
		} else {
			visitor_TableCount($currentCount);
		}
	}
	$zbp->Config('visitor')->visitorType = $_POST['visitorType'];
	$zbp->Config('visitor')->visitorRefreshCountOn = $_POST['visitorRefreshCountOn'];
	$zbp->Config('visitor')->todayCountOn = $_POST['todayCountOn'];
	$visitorCSS = preg_replace('/<\/?style[^>]*>/i', '', $_POST['visitorCSS']);
	$zbp->Config('visitor')->visitorCSS = $visitorCSS;
	$zbp->Config('visitor')->PostSAVECONFIG = $_POST['PostSAVECONFIG'];
	$zbp->SaveConfig('visitor');
	$zbp->SetHint('good');
	Redirect('./main.php');
}

$blogtitle='访客计数器插件设置';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<link rel="stylesheet" href="./admin.css">
<script src="./custom.js"></script>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu" style="display:block">
		<a href="./main.php"><span class="m-left m-now">基本设置</span></a>
		<a href="https://www.toyean.com/post/visitor.html" target="_blank"><span class="m-left">插件说明</span></a>
		<a href="<?php echo $zbp->host;?>zb_users/plugin/AppCentre/main.php?auth=e9210072-2342-4f96-91e7-7a6f35a7901e" target="_blank"><span class="m-left">更多作品</span></a>
		<a href="https://jq.qq.com/?_wv=1027&k=44zyTKi" target="_blank"><span class="m-left">ZBlog交流群</span></a>
		<?php
		if(!$zbp->Config('visitor')->update251020){
			echo '<a style="background-color: red;color: #fff;" href="save.php?act=insetsql"><span class="m-left " style="color: #fff;">请点此升级数据库结构</span></a>';
		}
		?>
	</div>
	<div id="divMain2">
		<form id="edit" name="edit" method="post" action="#">
			<?php if (function_exists('CheckIsRefererValid')) {
				echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';
			}?>
			<ul class="thead">
				<li class="center">功能</li>
				<li class="center">设置</li>
				<li>说明</li>
			</ul>
			<ol data-stretch="counton" class="tbody">
				<li class="center">
					<p align="center"><b>访客计数器</b></p>
				</li>
				<li class="center">
					<p><input type="text" name="visitorCountOn" class="checkbox" value="<?php echo $zbp->Config('visitor')->visitorCountOn; ?>"></p>
				</li>
				<li><p>开启后，在网页底部展示访客总数量，如：</p><p><b style="color:#f00">您是本站第 <?php if($zbp->Config('visitor')->visitorType == '0'){echo visitor_FileCount();}else{echo visitor_TableCount();}?> 名访客</b></p></li>
			</ol>
			<div class="countoninfo"<?php echo $zbp->Config('visitor')->visitorCountOn == 1 ? '' : ' style="display:none"'; ?>>
			<ol data-stretch="counttype" class="tbody">
				<li data-stretch="counton" class="center">
					<p align="center"><b>计数器类型</b></p>
				</li>
				<li class="center">
					<p><select name="visitorType" id="counttype">
							<option value="0"<?php if($zbp->Config('visitor')->visitorType == '0'){echo ' selected="selected"';}?>>文件计数</option>
							<?php
							if($zbp->Config('visitor')->update251020){?>
							<option value="1"<?php if($zbp->Config('visitor')->visitorType == '1'){echo ' selected="selected"';}?>>数据库计数</option><?php }?>
						</select></p>
				</li>
				<li><p><b>【文件计数】：</b>简单直接，几乎不占用服务器资源，不依赖数据库，高并发访问时可能计数不准确；使用Cookie形式，24小时内同一浏览器重复访问不计数。</p><p><b>【数据库计数】：</b>稳定可靠，大流量时会自动排队处理，不容易记错数字；通过IP判断，当访问者IP与数据表中最后访问者IP相同时不计数。</p><p><b>【说明】：</b>文件与数据库分开计数，切换计数器类型保存时会自动同步当前计数。</p></li>
			</ol>

			<ol class="tbody">
				<li class="center">
					<p align="center"><b>刷新即计数</b></p>
				</li>
				<li class="center">
					<p><input type="text" name="visitorRefreshCountOn" class="checkbox" value="<?php echo $zbp->Config('visitor')->visitorRefreshCountOn; ?>"></p>
				</li>
				<li><p><b>【开启】：</b>每次刷新或访问页面时计数+1。</p><p><b>【关闭】：</b>默认关闭，【文件计数】：24小时内重复访问不计数；【数据库计数】：访客IP与最后访问者IP相同时不计数。</p></li>
			</ol>
			</div>
			<ol class="tbody">
				<li class="center">
					<p align="center"><b>今日内容数量</b></p>
				</li>
				<li class="center">
					<p><input type="text" name="todayCountOn" class="checkbox" value="<?php echo $zbp->Config('visitor')->todayCountOn; ?>"></p>
				</li>
				<li><p>开启后，在网页底部展示今日内容数量，如：</p><p><b style="color:#f00">今日有 <?php echo visitor_postcmtCount();?> 篇新文章/评论</b></p></li>
			</ol>
			<ol class="tbody">
				<li class="center">
					<p align="center"><b>自定义CSS</b></p>
				</li>
				<li class="center">
					<p><textarea name="visitorCSS" class="textarea" style="width:100%;height:100px;"><?php echo $zbp->Config('visitor')->visitorCSS; ?></textarea></p>
				</li>
				<li><p>自定义CSS，有无&lt;style>标签均可，插件会自动过滤。</p></li>
			</ol>
			<ol class="tbody">
				<li data-stretch="counton" class="center">
					<p align="center"><b>停用插件后保留设置和计数？</b></p>
				</li>
				<li class="center">
					<p><input type="text" name="PostSAVECONFIG" class="checkbox" value="<?php echo $zbp->Config('visitor')->PostSAVECONFIG; ?>" /></p>
				</li>
				<li><p><b>【开启】：</b>默认开启，停用插件不会清空设置与计数；</p><p><b>【关闭】：</b>停用插件时清除以上设置与计数，并清空计数文件与计数表，再次启用时以默认设置加载并从0开始计数。</p></li>
			</ol>
			<p><input type="submit" class="button" value="提交"></p>
		</form>
	</div>
</div>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>