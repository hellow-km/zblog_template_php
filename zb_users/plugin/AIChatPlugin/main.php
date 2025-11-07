<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$zbp->LoadPlugins();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('AIChatPlugin')) {$zbp->ShowError(48);die();}
$blogtitle='功能设置';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['show_enable'])){
		$zbp->Config('AIChatPlugin')->show_enable ="1";
	}else{
		$zbp->Config('AIChatPlugin')->show_enable ="0";
	}

	$zbp->Config('AIChatPlugin')->use_model = $_POST['model_select'] ?? "Qwen/Qwen2.5-7B-Instruct";
    $zbp->SaveConfig('AIChatPlugin');
    $zbp->ShowHint('good','保存成功');
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<style>
.opt-line {
    display: flex;
    align-items: center;
    padding: 6px 0;
    font-size: 20px;
}

.opt-line .opt-line-ckb {
    margin-left: 10px;
    width: 20px;
    height: 20px;
}

#divMain2 .submit-btn {
    width: 100px;
    height: 40px;
}
</style>
<div id="divMain">
    <div class="divHeader"><?php echo $blogtitle;?></div>
    <div class="SubMenu">

    </div>

    <div id="divMain2">
        <br />
        <form method="post">
            <div style="margin-bottom:10px;">
                <div class="opt-line">
                    <span>选择模型: </span>
                    <select name="model_select" id="model-select" style="margin-left:10px;">
                        <option value="Qwen/Qwen2.5-7B-Instruct"
                            <?php echo $zbp->Config('AIChatPlugin')->use_model == "Qwen/Qwen2.5-7B-Instruct" ? "selected":""; ?>>
                            Qwen/Qwen2.5-7B-Instruct</option>
                        <option value="Qwen/Qwen3-8B"
                            <?php echo $zbp->Config('AIChatPlugin')->use_model == "Qwen/Qwen3-8B" ? "selected":""; ?>>
                            Qwen/Qwen3-8B</option>
                        <option value="deepseek-ai/DeepSeek-R1-0528-Qwen3-8B"
                            <?php echo $zbp->Config('AIChatPlugin')->use_model == "deepseek-ai/DeepSeek-R1-0528-Qwen3-8B" ? "selected":""; ?>>
                            deepseek-ai/DeepSeek-R1-0528-Qwen3-8B</option>
                    </select>
                </div>
                <div class="opt-line">
                    <span>是否显示: </span>
                    <input class="opt-line-ckb" type="checkbox" name="show_enable" value="1"
                        <?php if($zbp->Config('AIChatPlugin')->show_enable == '1') echo 'checked'; ?> />
                </div>
            </div>

            <div style="text-align:center;">
                <input class="submit-btn" type="submit" class="button" value="保存" />
            </div>
        </form>
    </div>

</div>


<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>