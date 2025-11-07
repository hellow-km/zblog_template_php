<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('toTop')) {$zbp->ShowError(48);die();}

// if (count($_POST) > 0) {
// CheckIsRefererValid();
// }
$defaultImg=$zbp->host.'zb_users/plugin/toTop/logo.png';
$newImg="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_FILES['topImg']['name'])) {
        $file = $_FILES['topImg'];

        // 生成新文件名（防止重名）
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = 'icon_' . time() . '.' . $ext;
        $newFilePath = $uploadDir . $newFileName;

        // 将文件移动到插件目录
        move_uploaded_file($file['tmp_name'], $newFilePath);

        // 保存可访问路径
        $zbp->Config('toTop')->topImg = $zbp->host . 'zb_users/plugin/toTop/' . $newFileName;

    } else {
        // 未上传文件时使用旧图或默认图
        $zbp->Config('toTop')->topImg = $zbp->Config('toTop')->topImg ?: $defaultImg;
    }
  if(isset($_POST['isCircle'])){
    $zbp->Config('toTop')->isCircle ="1";
  }else{
    $zbp->Config('toTop')->isCircle ="0";
  }
    $zbp->SaveConfig('toTop');
    $zbp->ShowHint('good','保存成功');
}

$blogtitle='返回顶部';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>

<style>
.opt-imgPreview {
    margin-top: 10px;
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<div id="divMain">
    <div class="divHeader"><?php echo $blogtitle;?></div>
    <div class="SubMenu">
    </div>
    <div id="divMain2">
        <form method="post" enctype="multipart/form-data">
            <!--代码-->
            <span>图标设置：</span> <input id="opt-uploadBtn" name="topImg" accept="image/*" type="file" />
            <div class="opt-imgPreview">
                <div> <span>预览:</span></div>
                <img style="display: <?php echo $zbp->Config('toTop')->topImg?"block":"none";?>;"
                    src="<?php echo $zbp->Config('toTop')->topImg??$defaultImg?>" width="150" height="150" alt="">
            </div>
            <div>
                <span>是否圆:</span>
                <input type="checkbox" name="isCircle" <?php echo $zbp->Config('toTop')->isCircle?"checked":"";?>
                    id="opt-isCircle">
            </div>
            <div style="text-align:center;">
                <input class="submit-btn" type="submit" class="button" value="保存" />
            </div>
        </form>
    </div>
</div>

<script>
const uploadBtn = document.getElementById('opt-uploadBtn');
const imgPreview = document.querySelector('.opt-imgPreview img');

uploadBtn.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});
</script>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>