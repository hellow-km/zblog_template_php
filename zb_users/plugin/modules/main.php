<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
$appid = 'modules';
if (!$zbp->CheckRights($action)) {
    $zbp->ShowError(6);
    die();
}
if (!$zbp->CheckPlugin($appid)) {
    $zbp->ShowError(48);
    die();
}

//配置页标题
$blogtitle = '侧栏模块设置';
$act = $_GET['act'] == "base" ? 'base' : $_GET['act'];

require $zbp->path . 'zb_system/admin/admin_header.php';
require $zbp->path . 'zb_system/admin/admin_top.php';

?>
<link rel="stylesheet" href="./script/admin.css">
<script type="text/javascript" src="./script/custom.js"></script>
<script>window.theme = {ajaxpost:<?php if($zbp->Config('modules')->PostAJAXPOSTON == '0'){echo 0;}else{echo 1;}?>}</script>
<div class="twrapper">
<div class="theader">
	<div class="theadbg"><div class="tips">提示：<strong>Ctrl + S</strong> 可快速保存设置</div></div>
	<div class="tuser">
		<div class="tuserimg"><img src="style/images/sethead.png" alt="模块设置"></div>
		<div class="tusername"><?php echo $blogtitle; ?></div>
	</div>
	<div class="tmenu">
		<ul>
			<li><a href="?act=base" class="on">基本设置</a></li>
		</ul>
	</div>
</div>
<div class="tmain">
<?php
if ($act == 'base') {
    if (isset($_POST['PostSIDECMTDAY'])) {
        $zbp->Config('modules')->PostSIDEIMGON = $_POST['PostSIDEIMGON'];			//侧栏缩略图开关
        $zbp->Config('modules')->PostSIDEIMGMETA = $_POST['PostSIDEIMGMETA'];		//侧栏缩略图字段
        $zbp->Config('modules')->PostSIDETHUMB = $_POST['PostSIDETHUMB'];			//侧栏固定缩略图片
        $zbp->Config('modules')->PostSIDETHUMBON = $_POST['PostSIDETHUMBON'];		//侧栏固定缩略图开关
        $zbp->Config('modules')->PostSIDERANDTHUMBON = $_POST['PostSIDERANDTHUMBON'];//侧栏随机缩略图开关
        $zbp->Config('modules')->PostTIMESTYLE = $_POST['PostTIMESTYLE'];	        //侧栏日期时间样式
        $zbp->Config('modules')->PostSIDECMTDAY = $_POST['PostSIDECMTDAY'];			//侧栏热评文章模块指定天数
        $zbp->Config('modules')->PostSIDEVIEWDAY = $_POST['PostSIDEVIEWDAY'];		//侧栏热门文章模块指定天数
        $zbp->Config('modules')->PostSIDERECID = modules_FormatID($_POST['PostSIDERECID']);	//侧栏热推文章模块指定ID
        $zbp->Config('modules')->PostSIDEUSERBG = $_POST['PostSIDEUSERBG'];			//侧栏站长简介模块背景图片
        $zbp->Config('modules')->PostSIDEUSERIMG = $_POST['PostSIDEUSERIMG'];		//侧栏站长简介模块头像
        $zbp->Config('modules')->PostSIDEUSERNAME = $_POST['PostSIDEUSERNAME'];		//侧栏站长简介模块站长名称
        $zbp->Config('modules')->PostSIDEUSERINTRO = $_POST['PostSIDEUSERINTRO'];	//侧栏站长简介模块站长简介
        $zbp->Config('modules')->PostSIDEUSERQQ = $_POST['PostSIDEUSERQQ'];			//侧栏站长简介模块QQ号码
        $zbp->Config('modules')->PostSIDEUSERWECHAT = $_POST['PostSIDEUSERWECHAT'];	//侧栏站长简介模块微信二维码
        $zbp->Config('modules')->PostSIDEUSERDOUYIN = $_POST['PostSIDEUSERDOUYIN'];	//侧栏站长简介模块抖音
        $zbp->Config('modules')->PostSIDEUSEREMAIL = $_POST['PostSIDEUSEREMAIL'];	//侧栏站长简介模块邮箱地址
        $zbp->Config('modules')->PostSIDEUSERWEIBO = $_POST['PostSIDEUSERWEIBO'];	//侧栏站长简介模块微博URL
        $zbp->Config('modules')->PostSIDEUSERGROUP = $_POST['PostSIDEUSERGROUP'];	//侧栏站长简介模块QQ群链接
        $zbp->Config('modules')->PostSIDEUSERCOUNT = $_POST['PostSIDEUSERCOUNT'];	//侧栏站长简介模块底部统计信息
        $zbp->Config('modules')->PostCUSTOMCSS = $_POST['PostCUSTOMCSS'];           //自定义CSS
        $zbp->Config('modules')->PostSAVECONFIG = $_POST['PostSAVECONFIG'];			//保存插件设置
        @file_put_contents($zbp->path . 'zb_users/plugin/modules/style/skin.css', modules_skin());
        $zbp->SaveConfig('modules');
        $zbp->BuildTemplate();
        modules_CreateModule();
        $zbp->ShowHint('good');
    } ?>
<link rel="stylesheet" type="text/css" href="./plugin/codemirror/codemirror.css">
<link rel="stylesheet" type="text/css" href="./plugin/codemirror/default.css">
<script type="text/javascript" src="./plugin/codemirror/codemirror.js"></script>
<script type="text/javascript" src="./plugin/codemirror/active-line.js"></script>
<script type="text/javascript" src="./plugin/codemirror/placeholder.js"></script>
<script type="text/javascript" src="./plugin/codemirror/matchbrackets.js"></script>
<script type="text/javascript" src="./plugin/codemirror/css.js"></script>
<form name="side" method="post" class="setting">
	<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
<dl>
    <dt>侧栏缩略图设置</dt>
    <dd data-stretch="sideimg" class="half">
		<label>启用缩略图</label>
		<input type="text" id="PostSIDEIMGON" name="PostSIDEIMGON" class="checkbox" value="<?php echo $zbp->Config('modules')->PostSIDEIMGON; ?>">
		<i class="help"></i><span class="helpcon">选择是否使用侧栏缩略图，关闭时侧栏不显示缩略图。</span>
	</dd>
    <div class="sideimginfo"<?php echo $zbp->Config('modules')->PostSIDEIMGON == 1 ? '' : ' style="display:none"'; ?>>
    <dd class="half">
		<label>主题图片字段</label>
		<input type="text" id="PostSIDEIMGMETA" name="PostSIDEIMGMETA" value="<?php echo $zbp->Config('modules')->PostSIDEIMGMETA; ?>" class="settext">
		<i class="help"></i><span class="helpcon">主题缩略图字段，如主题自定义缩略图为：<br>$article->Metas->proimg，则填写proimg，<br>留空则调用文章内容首图。</span>
	</dd>
    <dd>
        <label for="PostSIDETHUMB">文章无图时：</label>
        <table>
            <tbody>
                <tr>
                    <th width="20%">固定缩略图</th>
                    <th width="35%">图片地址</th>
                    <th width="15%">上传</th>
                    <th width="25%">操作</th>
                </tr>
                <tr>
                    <td><?php if ($zbp->Config('modules')->PostSIDETHUMB) { ?><img src="<?php echo $zbp->Config('modules')->PostSIDETHUMB; ?>" alt="固定缩略图" width="100" class="thumbimg"><?php } else { ?><img src="style/images/thumb.png" alt="固定缩略图" width="100" class="thumbimg"><?php } ?></td>
                    <td><input type="text" id="PostSIDETHUMB" name="PostSIDETHUMB" value="<?php if ($zbp->Config('modules')->PostSIDETHUMB) {
    echo $zbp->Config('modules')->PostSIDETHUMB;
} else {
    echo $zbp->host . 'zb_users/plugin/modules/style/images/thumb.png';
} ?>" class="urltext thumbsrc"></td>
                    <td><input type="button" class="uploadimg format" value="上传"></td>
                    <td>使用固定缩略图：<input type="text" id="PostSIDETHUMBON" name="PostSIDETHUMBON" class="checkbox" value="<?php echo $zbp->Config('modules')->PostSIDETHUMBON; ?>"><br>使用随机缩略图：<input type="text" id="PostSIDERANDTHUMBON" name="PostSIDERANDTHUMBON" class="checkbox" value="<?php echo $zbp->Config('modules')->PostSIDERANDTHUMBON; ?>"></td>
                </tr>
            </tbody>
        </table>
        <i class="help"></i><span class="helpcon">全部关闭时仅调用文章内容首图，开启时文章无图调用固定或随机缩略图。</span>
    </dd>
    </div>
    <dt>侧栏模块日期时间样式</dt>
    <dd>
        <label for="PostTIMESTYLE">日期时间样式</label>
        <select size="1" name="PostTIMESTYLE" id="PostTIMESTYLE">
            <option value="0"<?php if($zbp->Config('modules')->PostTIMESTYLE == '0'){echo ' selected="selected"';}?>>1分钟前</option>
            <option value="1"<?php if($zbp->Config('modules')->PostTIMESTYLE == '1'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),1);?></option>
            <option value="2"<?php if($zbp->Config('modules')->PostTIMESTYLE == '2'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),2);?></option>
            <option value="3"<?php if($zbp->Config('modules')->PostTIMESTYLE == '3'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),3);?></option>
            <option value="4"<?php if($zbp->Config('modules')->PostTIMESTYLE == '4'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),4);?></option>
            <option value="5"<?php if($zbp->Config('modules')->PostTIMESTYLE == '5'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),5);?></option>
            <option value="6"<?php if($zbp->Config('modules')->PostTIMESTYLE == '6'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),6);?></option>
            <option value="7"<?php if($zbp->Config('modules')->PostTIMESTYLE == '7'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),7);?></option>
            <option value="8"<?php if($zbp->Config('modules')->PostTIMESTYLE == '7'){echo ' selected="selected"';}?>><?php echo modules_TimeAgo(date('Y-m-d H:i:s',time()),8);?></option>
        </select>
        <i class="help"></i><span class="helpcon">选择侧栏日期时间样式。</span>
    </dd>
    <dt>侧栏“热评文章”模块设置</dt>
	<dd>
		<label for="PostSIDECMTDAY">距今范围天数</label>
		<input type="number" id="PostSIDECMTDAY" name="PostSIDECMTDAY" value="<?php echo $zbp->Config('modules')->PostSIDECMTDAY; ?>" min="1" step="1" class="settext">
		<i class="help"></i><span class="helpcon">设置“热评文章”模块距离当前指定天数内评论最多的文章。</span>
	</dd>
	<dt>侧栏“热门阅读”模块设置</dt>
	<dd>
		<label for="PostSIDEVIEWDAY">距今范围天数</label>
		<input type="number" id="PostSIDEVIEWDAY" name="PostSIDEVIEWDAY" value="<?php echo $zbp->Config('modules')->PostSIDEVIEWDAY; ?>" min="1" step="1" class="settext">
		<i class="help"></i><span class="helpcon">设置“热门阅读”模块距离当前指定天数内浏览最多的文章。</span>
	</dd>
	<dt>侧栏“推荐阅读”模块设置<span>(多个ID之间使用逗号分隔)</span></dt>
	<dd>
        <label for="PostSIDERECID">热推文章ID</label>
        <input type="text" id="PostSIDERECID" name="PostSIDERECID" value="<?php echo $zbp->Config('modules')->PostSIDERECID; ?>" class="settext">
        <i class="help"></i><span class="helpcon">请填写侧栏“推荐阅读”模块文章ID，<br>多个文章ID之间用英文逗号分隔，首尾不加逗号。</span>
    </dd>
    <dt>侧栏“站长简介”模块设置</dt>
    <dd>
		<label for="PostSIDEUSERBG">背景图片</label>
		<table>
			<tbody>
				<tr>
					<th width="25%">缩略图(375x100px)</th>
					<th width="55%">图片地址</th>
					<th width="15%">上传</th>
				</tr>
				<tr>
					<td><?php if ($zbp->Config('modules')->PostSIDEUSERBG) { ?><img src="<?php echo $zbp->Config('modules')->PostSIDEUSERBG; ?>" alt="背景图片" width="100" class="thumbimg"><?php } else { ?><img src="style/images/banner.jpg" alt="背景图片" width="100" class="thumbimg"><?php } ?></td>
					<td><input type="text" id="PostSIDEUSERBG" name="PostSIDEUSERBG" value="<?php if ($zbp->Config('modules')->PostSIDEUSERBG) {
    echo $zbp->Config('modules')->PostSIDEUSERBG;
} else {
    echo $zbp->host . 'zb_users/theme/modules/style/images/banner.jpg';
} ?>" class="urltext thumbsrc"></td>
					<td><input type="button" class="uploadimg format" value="上传"></td>
				</tr>
			</tbody>
		</table>
		<i class="help"></i><span class="helpcon">侧栏“站长简介”模块背景图。</span>
	</dd>
	<dd>
		<label for="PostSIDEUSERIMG">站长头像</label>
		<table>
			<tbody>
				<tr>
					<th width="25%">缩略图(80x80px)</th>
					<th width="55%">图片地址</th>
					<th width="15%">上传</th>
				</tr>
				<tr>
					<td><?php if ($zbp->Config('modules')->PostSIDEUSERIMG) { ?><img src="<?php echo $zbp->Config('modules')->PostSIDEUSERIMG; ?>" alt="站长头像" width="100" class="thumbimg"><?php } else { ?><img src="style/images/sethead.png" alt="站长头像" width="100" class="thumbimg"><?php } ?></td>
					<td><input type="text" id="PostSIDEUSERIMG" name="PostSIDEUSERIMG" value="<?php if ($zbp->Config('modules')->PostSIDEUSERIMG) {
    echo $zbp->Config('modules')->PostSIDEUSERIMG;
} else {
    echo $zbp->host . 'zb_users/theme/modules/style/images/sethead.png';
} ?>" class="urltext thumbsrc"></td>
					<td><input type="button" class="uploadimg format" value="上传"></td>
				</tr>
			</tbody>
		</table>
		<i class="help"></i><span class="helpcon">侧栏“站长简介”模块头像。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSERNAME">站长名称</label>
		<input type="text" id="PostSIDEUSERNAME" name="PostSIDEUSERNAME" value="<?php echo $zbp->Config('modules')->PostSIDEUSERNAME; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块站长名称。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSERINTRO">站长简介</label>
		<input type="text" id="PostSIDEUSERINTRO" name="PostSIDEUSERINTRO" value="<?php echo $zbp->Config('modules')->PostSIDEUSERINTRO; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块介绍内容。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSERQQ">QQ号码</label>
		<input type="text" id="PostSIDEUSERQQ" name="PostSIDEUSERQQ" value="<?php echo $zbp->Config('modules')->PostSIDEUSERQQ; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块社交QQ号码，若没有请留空。</span>
	</dd>
    <dd class="half">
		<label for="PostSIDEUSERDOUYIN">抖音</label>
		<input type="text" id="PostSIDEUSERDOUYIN" name="PostSIDEUSERDOUYIN" value="<?php echo $zbp->Config('modules')->PostSIDEUSERDOUYIN; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块抖音用户主页链接，若没有请留空。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSEREMAIL">邮箱地址</label>
		<input type="text" id="PostSIDEUSEREMAIL" name="PostSIDEUSEREMAIL" value="<?php echo $zbp->Config('modules')->PostSIDEUSEREMAIL; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块社交邮箱地址，若没有请留空。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSERWEIBO">微博链接</label>
		<input type="text" id="PostSIDEUSERWEIBO" name="PostSIDEUSERWEIBO" value="<?php echo $zbp->Config('modules')->PostSIDEUSERWEIBO; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块社交微博链接，若没有请留空。</span>
	</dd>
	<dd class="half">
		<label for="PostSIDEUSERGROUP">QQ群链接</label>
		<input type="text" id="PostSIDEUSERGROUP" name="PostSIDEUSERGROUP" value="<?php echo $zbp->Config('modules')->PostSIDEUSERGROUP; ?>" class="settext">
		<i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块社交QQ群链接，若没有请留空。</span>
	</dd>
    <dd>
        <label for="PostSIDEUSERWECHAT">微信二维码</label>
        <table>
            <tbody>
                <tr>
                    <th width="25%">缩略图(120x120px)</th>
                    <th width="55%">图片地址</th>
                    <th width="15%">上传</th>
                </tr>
                <tr>
                    <td><?php if ($zbp->Config('modules')->PostSIDEUSERWECHAT) { ?><img src="<?php echo $zbp->Config('modules')->PostSIDEUSERWECHAT; ?>" alt="微信二维码" width="100" class="thumbimg"><?php } else { ?><img src="style/images/qr.png" alt="微信二维码" width="100" class="thumbimg"><?php } ?></td>
                    <td><input type="text" id="PostSIDEUSERWECHAT" name="PostSIDEUSERWECHAT" value="<?php if ($zbp->Config('modules')->PostSIDEUSERWECHAT) {
    echo $zbp->Config('modules')->PostSIDEUSERWECHAT;
} else {
    echo $zbp->host . 'zb_users/theme/modules/style/images/qr.png';
} ?>" class="urltext thumbsrc"></td>
                    <td><input type="button" class="uploadimg format" value="上传"></td>
                </tr>
            </tbody>
        </table>
        <i class="help"></i><span class="helpcon">设置侧栏“站长简介”模块社交微信图片，若没有请留空。</span>
    </dd>
	<dd>
		<label>底部统计信息</label>
		<input type="text" id="PostSIDEUSERCOUNT" name="PostSIDEUSERCOUNT" class="checkbox" value="<?php echo $zbp->Config('modules')->PostSIDEUSERCOUNT; ?>">
		<i class="help"></i><span class="helpcon">开启状态为开启“站长简介”模块底部统计信息；<br>关闭状态为关闭“站长简介”模块底部统计信息。</span>
	</dd>
    <dt>其他设置</dt>
    <dd>
		<label for="PostCUSTOMCSS">自定义CSS</label>
		<div class="codearea">
			<textarea name="PostCUSTOMCSS" id="PostCUSTOMCSS" cols="30" rows="5" placeholder="此处填写自定义CSS" class="setinput"><?php echo $zbp->Config('modules')->PostCUSTOMCSS; ?></textarea>
		</div>
		<i class="help"></i><span class="helpcon">自定义CSS，辅助配色与布局。</span>
	</dd>
    <dd>
		<label>保存配置</label>
		<input type="text" id="PostSAVECONFIG" name="PostSAVECONFIG" class="checkbox" value="<?php echo $zbp->Config('modules')->PostSAVECONFIG; ?>">
		<i class="help"></i><span class="helpcon">开启状态为停用插件时保留配置信息；<br>关闭状态为停用插件时删除配置信息。<br>若不再使用当前插件请关闭，停用插件时将自动清理插件配置。</span>
	</dd>
	<dd class="setok"><input type="submit" value="保存设置" class="setbtn"></dd>
</dl>
</form>
<?php } ?>
</div>
</div>
<div class="tfooter">
    <ul>
        <li><a href="https://www.toyean.com/advice.html" target="_blank">意见反馈</a></li>
        <li><a href="https://www.toyean.com/help.html" target="_blank">帮助说明</a></li>
        <li><a href="./style/fonts/demo_index.html" target="_blank">插件图标库</a></li>
        <li><a href="../../plugin/AppCentre/main.php?auth=e9210072-2342-4f96-91e7-7a6f35a7901e" target="_blank">更多作品</a></li>
        <li><a href="https://jq.qq.com/?_wv=1027&k=44zyTKi" target="_blank">主题交流群</a></li>
    </ul>
	<p>Copyright &copy; 2010-<script>document.write(new Date().getFullYear());</script> <a href="https://www.toyean.com/" target="_blank">拓源网</a> all rights reserved.</p>
</div>

<script type="text/javascript">ActiveTopMenu("topmenu_modules");</script>
<?php
require $zbp->path . 'zb_system/admin/admin_footer.php';
RunTime();
?>