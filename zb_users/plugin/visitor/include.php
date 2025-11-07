<?php
#注册插件
RegisterPlugin("visitor","ActivePlugin_visitor");

function ActivePlugin_visitor()
{
	Add_Filter_Plugin('Filter_Plugin_ViewIndex_Begin','visitor_base');
}

//访客计数表
$table['visitor'] = '%pre%visitor';
$datainfo['visitor'] = array(
	'ID'		  => array('v_id', 'integer', '', 0), // 主键
	'TotalCount'  => array('v_total', 'integer', '', 0), // 总访问计数
	'LastIP'	  => array('v_lastip', 'string', 128, ''), // 最后访问的IP
	'LastTime'	=> array('v_lasttime', 'integer', '', 0), // 最后访问时间
);

function visitor_CreateTable()
{
	global $zbp;
	if(!$zbp->db->ExistTable($zbp->table['visitor'])) {
		$ct = $zbp->db->sql->CreateTable($zbp->table['visitor'], $zbp->datainfo['visitor']);
		$zbp->db->QueryMulit($ct);
		//创建默认数据
		$zbp->db->sql->get()->insert($zbp->table['visitor'])
		->data(array(
			'v_id' => 1,
			'v_total' => 0,
			'v_lastip' => '',
			'v_lasttime' => 0
		))
		->query;
	}
}

function visitor_DelTable()
{
	global $zbp;
	if($zbp->db->ExistTable($zbp->table['visitor'])) {
		$dt = $zbp->db->sql->DelTable($zbp->table['visitor']);
		$zbp->db->QueryMulit($dt);
	}
}

function visitor_update()
{
	global $zbp;
	if(!$zbp->Config('visitor')->update251020){
		visitor_CreateTable();
		$zbp->Config('visitor')->update251020 = true;
		$zbp->SaveConfig('visitor');
	}
}

// 文件计数
function visitor_FileCount($customCount = null)
{
	global $zbp;
	$path = $zbp->usersdir . 'cache/plugin/visitor/';
	$CounterFile = $path . "counter";
	$cookie_name = 'visitor_counted';

	// 检查并创建目录
	if (!file_exists($path) && !@mkdir($path, 0755, true)) {
		return false;
	}
	if (!file_exists($path)) {
		return false;
	}

	// 初始化计数文件（不存在则创建）
	if (!file_exists($CounterFile)) {
		$counter = 0;
		$cf = fopen($CounterFile, "w");
		fputs($cf, '0');
		fclose($cf);
	}

	// 打开文件并加锁
	$cf = fopen($CounterFile, "r+");
	if (!$cf || !flock($cf, LOCK_EX)) {
		fclose($cf);
		return false;
	}

	// 读取当前计数
	rewind($cf);
	$counter = trim(fgets($cf));
	$counter = (int)$counter;

	if ($customCount !== null) {
		$counter = (int)$customCount;
	} else {
		$is_new_visitor = !isset($_COOKIE[$cookie_name]);
		if ($is_new_visitor || $zbp->Config('visitor')->visitorRefreshCountOn) {
			$counter++;
			setcookie($cookie_name, '1', time() + 86400, '/');
		}
	}

	// 写入计数
	ftruncate($cf, 0);
	rewind($cf);
	fputs($cf, (string)$counter);
	fflush($cf);

	// 释放锁并关闭
	flock($cf, LOCK_UN);
	fclose($cf);

	return $counter;
}

// 数据表计数
function visitor_TableCount($customCount = null)
{
	global $zbp;
	$current_ip = GetGuestIP();
	if (empty($current_ip)) {
		return 0;
	}

	// 获取当前记录
	$row = $zbp->db->sql->get()
		->select($zbp->table['visitor'])
		->where(array('=', 'v_id', 1))
		->sql;
	$row = $zbp->db->query($row);

	// 初始化记录（若不存在）
	if (!$row) {
		$initCount = $customCount !== null ? (int)$customCount : 0;
		$zbp->db->sql->get()->insert($zbp->table['visitor'])
			->data(array(
				'v_id' => 1,
				'v_total' => $initCount,
				'v_lastip' => $current_ip,
				'v_lasttime' => time()
			))->query;
		return $initCount;
	}

	$total_count = $row[0]['v_total'];
	$last_ip = $row[0]['v_lastip'];

	// 核心：如果指定了自定义计数，则直接使用；否则按原逻辑自增
	if ($customCount !== null) {
		$total_count = (int)$customCount;
	} else {
		// 原逻辑：IP不同或允许刷新计数时自增
		if ($current_ip != $last_ip || $zbp->Config('visitor')->visitorRefreshCountOn) {
			$total_count++;
		}
	}

	// 更新记录
	$zbp->db->sql->get()->update($zbp->table['visitor'])
		->where('=', 'v_id', 1)
		->data(array(
			'v_total' => $total_count,
			'v_lastip' => $current_ip,
			'v_lasttime' => time()
		))->query;

	return $total_count;
}

// 计算今日新内容（文章+评论）
function visitor_postcmtCount()
{
	global $zbp;
	$today = strtotime(date("Y-m-d"));
	$new_posts = count($zbp->GetListType('Post', $zbp->db->sql->get()
		->select($zbp->table['Post'])
		->where(array(
			array('=', 'log_Status', '0'),
			array('>=', 'log_PostTime', $today)
		))->sql));
	$new_comments = count($zbp->GetCommentList('*', array(
		array('=', 'comm_IsChecking', 0),
		array('>=', 'comm_PostTime', $today)
	)));
	return $new_posts + $new_comments;
}

function visitor_base()
{
	global $zbp;
	$counter = '';
	$countType = $zbp->Config('visitor')->visitorType ? $zbp->Config('visitor')->visitorType : 0;
	if ($countType == 1) {
		$counter = visitor_TableCount();
	} else {
		$counter = visitor_FileCount();
		if ($counter === false) {
			return;
		}
	}

	if ($zbp->Config('visitor')->visitorCountOn == '1') {
		$visitorCount = "<span>您是本站第" . $counter . "名访客</span>";
	}
	if ($zbp->Config('visitor')->todayCountOn == '1') {
		$visitorPostCount = "<span>今日有" . visitor_postcmtCount() . "篇新文章/评论</span>";
	}

	$footercode = "<style>" . $zbp->Config('visitor')->visitorCSS . "</style>";
	$footercode .= "<p class='visitor'>" . $visitorCount . ' ' . $visitorPostCount . "</p>";
	$zbp->footer .= $footercode . "\r\n";
}


function InstallPlugin_visitor()
{
	global $zbp;
	if(!$zbp->Config('visitor')->HasKey('Version')){
		$array = array(
			'Version' => '1.0',
			'visitorCountOn' => '1',
			'visitorType' => '0',
			'visitorRefreshCountOn' => '0',
			'todayCountOn' => '1',
			'visitorCSS' => '.visitor span:first-child { margin-right:10px; }',
			'PostSAVECONFIG' => '1',
		);
		foreach($array as $value => $intro){
			$zbp->Config('visitor')->$value = $intro;
		}
		$zbp->SaveConfig('visitor');
	}
	visitor_CreateTable();
}

function UpdatePlugin_visitor()
{
	visitor_update();
}

function UninstallPlugin_visitor()
{
	global $zbp;
	if($zbp->Config('visitor')->PostSAVECONFIG == '0'){
		// 1.删除插件配置
		$zbp->DelConfig('visitor');
		// 2.删除计数表
		visitor_DelTable();
		// 3.清理$zbp->table中的引用
		if (isset($zbp->table['visitor'])) {
			unset($zbp->table['visitor']);
		}
		// 4.删除计数文件
		$countFile = $zbp->usersdir . 'cache/plugin/visitor/counter';
		if(file_exists($countFile)) {
			@unlink($countFile);
		}
		// 5.删除计数文件所在的空目录
		$countDir = $zbp->usersdir . 'cache/plugin/visitor/';
		if(is_dir($countDir) && count(scandir($countDir)) <= 2){
			@rmdir($countDir);
		}
	}
}