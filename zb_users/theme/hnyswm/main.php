<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('hnyswm')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';
$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'bas' : $_GET['act'];
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<style>
.lianxi { padding: 10px; }
.lianxi p { line-height: 36px; }
.lianxi a { padding: 0 10px; }

input { margin: 5px 0; }
strong { background-color: #3a6ea5; padding: 5px 10px; color: #ffffff; }
p { margin: 5px 0; }
td { padding: 10px; }
</style>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
    <?php hnyswm_SubMenu($act);?>
 <a target="_blank" href="https://app.zblogcn.com/?auth=098236fa-3e93-4127-8a50-6c39ffb8d6a4" ><span class="m-right ">作者作品</span></a>

</div>
<div class="lianxi">
  <p> 本作品由<a target="_blank" href="https://www.finchui.com/">星岚工作室</a>原创发布，有问题或bug联系作者<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=914466480&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:914466480:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
</div>

  <div id="divMain2">
    <?php if(isset($_POST['clearSetting'])){
		    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
		    $zbp->Config('hnyswm')->favicon = $_POST['favicon'];
		    $zbp->Config('hnyswm')->logo = $_POST['logo'];
		    $zbp->Config('hnyswm')->labj = $_POST['labj'];
		    $zbp->Config('hnyswm')->labjon = $_POST['labjon'];
			$zbp->Config('hnyswm')->gonggao = $_POST['gonggao'];
			$zbp->Config('hnyswm')->gonggaourl = $_POST['gonggaourl'];
			$zbp->Config('hnyswm')->china = $_POST['china'];
			$zbp->Config('hnyswm')->english = $_POST['english'];
			$zbp->Config('hnyswm')->enandch = $_POST['enandch'];
			$zbp->Config('hnyswm')->clearSetting = $_POST['clearSetting'];
			$zbp->SaveConfig('hnyswm');
            $zbp->ShowHint('good');
			 }if ($act == 'bas'){  ?>
    <table width="100%" style='padding:0;margin:0;'  id="form1" name="form1" cellspacing='0' cellpadding='0' class="tableBorder">
        <form id="form1" name="form1" method="post">
      
      <tr>
        <td width="20%"  align="center"><p>favicon</p></td>
        <td><p><img src="<?php echo $zbp->Config('hnyswm')->favicon;?>" alt="favicon" style = "height:20px;"/></p>
          <p class="uploadimg">
            <input name="favicon" id="favicon" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->favicon;?>" />
            <strong>浏览文件</strong> </p></td>
      </tr>
      <tr>
        <td width="20%"  align="center"><p>网站LOGO</p></td>
        <td><p><img src="<?php echo $zbp->Config('hnyswm')->logo;?>" alt="logo" style = "height:80px;"/></p>
          <p class="uploadimg">
            <input name="logo" id="logo" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->logo;?>" />
            <strong>浏览文件</strong> </p></td>
      </tr>
      <tr>
        <td width="20%"  align="center"><p>网站列表页/内容页，导航下方大图背景（<span style="color:#f00;">建议上传尺寸：1920×160px</span>）</p></td>
        <td><p><img src="<?php echo $zbp->Config('hnyswm')->labj;?>" alt="labj" style = "height:80px;"/></p>
          <p class="uploadimg">
            <input name="labj" id="labj" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->labj;?>" />
            <strong>浏览文件</strong> </p>
          <p>
            <input type="text" id="labjon" name="labjon" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->labjon;?>"/>
            默认开启，关闭后将不显示</p></td>
      </tr>
      <tr>
        <td width="20%"  align="center"><p>网站公告</p></td>
        <td colspan="2"><p>文字&nbsp;&nbsp;
            <textarea name="gonggao" type="text" id="gonggao" style="width:98%;"><?php echo $zbp->Config('hnyswm')->gonggao;?></textarea>
          </p>
          <p>链接&nbsp;&nbsp;
            <textarea name="gonggaourl" type="text" id="gonggaourl" style="width:98%;height:"><?php echo $zbp->Config('hnyswm')->gonggaourl;?></textarea>
          </p></td>
      </tr>
      <tr>
        <td width="20%"  align="center"><p>中英文配置</p></td>
        <td colspan="2"><p>中文站地址（<span style="color:#f00;">不填写则不再网页显示中文站链接和图标！</span>）
            <textarea name="china" type="text" id="china" style="width:98%;"><?php echo $zbp->Config('hnyswm')->china;?></textarea>
          </p>
          <p>英文站地址（<span style="color:#f00;">不填写则不再网页显示英文站链接和图标！</span>）
            <textarea name="english" type="text" id="english" style="width:98%;"><?php echo $zbp->Config('hnyswm')->english;?></textarea>
          </p>
          <p>
            <input type="text" id="enandch" name="enandch" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->enandch;?>"/>
            开启英文站（<span style="color:#f00;">默认为中文站，开启英文站以后，模板自带的中文将转变为英文！</span>） </p></td>
      </tr>
      <tr>
        <td width="20%"  align="center"><p>清除主题配置</p></td>
        <td colspan="2"><p>
            <input type="text" id="clearSetting" name="clearSetting" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->clearSetting;?>"/>
            <span style="color:#f00;"> 开启后，当在主题管理中更换主题后，该主题的所有设置都将被清空，请谨慎操作！</span> </p></td>
      </tr>
    </table>
    <br>
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
    <input name="" type="Submit" class="button" value="保存"/>
    </form>
    
    <!--首页版块设置-->
    <?php   }if(isset($_POST['ysproduct'])){
		 if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
			$zbp->Config('hnyswm')->ysproduct = $_POST['ysproduct'];
			$zbp->Config('hnyswm')->ysproduct1 = $_POST['ysproduct1'];
			$zbp->Config('hnyswm')->ysabout = $_POST['ysabout'];
			$zbp->Config('hnyswm')->ysaboutzy = $_POST['ysaboutzy'];
			$zbp->Config('hnyswm')->yscase = $_POST['yscase'];
			$zbp->Config('hnyswm')->ysnews = $_POST['ysnews'];
			$zbp->SaveConfig('hnyswm');
            $zbp->ShowHint('good');
			 }if ($act == 'index'){  ?>
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;'  id="form1" name="form1" cellspacing='0' cellpadding='0' class="tableBorder">
       
        <tr>
          <td width="20%"  align="center"><p>产品版块</p></td>
          <td colspan="2"><p>选择所属分类
              <select name="ysproduct">
                <option><?php echo $zbp->Config('hnyswm')->ysproduct;?></option>
                <?php echo hnyswm_category();?>
              </select>
            </p>
            <p>一句话介绍（<span style="color:#f00;">在首页产品版块名称下面显示</span>）
              <textarea name="ysproduct1" type="text" id="ysproduct1" style="width:98%;"><?php echo $zbp->Config('hnyswm')->ysproduct1;?></textarea>
            </p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>公司介绍版块</p></td>
          <td colspan="2"><p>所属页面id
              <textarea name="ysabout" type="text" id="ysabout" style="width:98%;"><?php echo $zbp->Config('hnyswm')->ysabout;?></textarea>
            </p>
            <p>摘要内容（<span style="color:#f00;">在首页公司介绍版块名称下面显示</span>）
              <textarea name="ysaboutzy" type="text" id="ysaboutzy" style="width:98%;height:80px;"><?php echo $zbp->Config('hnyswm')->ysaboutzy;?></textarea>
            </p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>案例版块</p></td>
          <td colspan="2"><p>选择所属分类
              <select name="yscase">
                <option><?php echo $zbp->Config('hnyswm')->yscase;?></option>
                <?php echo hnyswm_category();?>
              </select>
            </p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>新闻/文章版块</p></td>
          <td colspan="2"><p>选择所属分类
              <select name="ysnews">
                <option><?php echo $zbp->Config('hnyswm')->ysnews;?></option>
                <?php echo hnyswm_category();?>
              </select>
            </p></td>
        </tr>
      </table>
      <br>
      <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    
    <!--首页seo设置-->
    <?php	 }if(isset($_POST['ystitle'])){
		 if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
		      $zbp->Config('hnyswm')->seo = $_POST['seo']; //seo开关
			  $zbp->Config('hnyswm')->ystitle = $_POST['ystitle']; //首页title标题
              $zbp->Config('hnyswm')->yskeywords = $_POST['yskeywords']; //首页keywords关键词
              $zbp->Config('hnyswm')->ysdescription = $_POST['ysdescription']; //首页description描述
              $zbp->SaveConfig('hnyswm');
              $zbp->ShowHint('good');
			 }if ($act == 'seo'){  ?>
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <td width="20%"  align="center"><p>主题SEO设置</p></td>
          <td><p>
              <input type="text" id="seo" name="seo" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->seo;?>"/>
              ON表示开启，OFF表示关闭，如果使用了SEO相关的插件，请在这里关闭主题自带的SEO设置 </p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>首页title标题</p></td>
          <td width="80%"><p>
              <textarea name="ystitle" type="text" id="ystitle" style="width:98%;"><?php echo $zbp->Config('hnyswm')->ystitle;?></textarea>
            </p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>首页keywords关键词</p></td>
          <td><p>
              <textarea name="yskeywords" type="text" id="yskeywords" style="width:98%;"><?php echo $zbp->Config('hnyswm')->yskeywords;?></textarea>
            </p></td>
        </tr>
        <tr>
          <td><p align="center">首页description描述</p></td>
          <td><p>
              <textarea name="ysdescription" type="text" id="ysdescription" style="width:98%;"><?php echo $zbp->Config('hnyswm')->ysdescription;?></textarea>
            </p></td>
        </tr>
      </table>
      <br>
      <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    
    <!--侧栏设置-->
    <?php	 }if(isset($_POST['clnav'])){
		 if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
		      $zbp->Config('hnyswm')->clnav = $_POST['clnav']; //自定义导航开关
			  $zbp->Config('hnyswm')->clnavon = $_POST['clnavon']; //自定义导航
              $zbp->SaveConfig('hnyswm');
              $zbp->ShowHint('good');
			 }if ($act == 'celan'){  ?>
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <td width="20%"><h3 align="center">独立页面</h3>
            <p align="center">独立页面指的是通过页面管理创建的页面</p></td>
          <td width="80%"><p>
              <textarea name="clnav" type="text" id="clnav" style="width:98%;height:100px;"><?php echo $zbp->Config('hnyswm')->clnav;?></textarea>
            </p>
            <p>
              <input type="text" id="clnavon" name="clnavon" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->clnavon;?>"/>
              <span style="color:#f00;"> 默认开启，你可以在这里设置关于我们、公司介绍、联系我们、公司招聘等内容的独立页面链接，会在侧栏显示</span> </p>
            <p>复制以下代码，修改链接、标题即可。不限行数！
            
            <pre class="prism-highlight prism-language-markup">&lt;li&gt;&lt;i class=&quot;iconfont icon-jiantouxiangyou&quot;&gt;&lt;/i&gt;&lt;a href=&quot;#链接&quot; title=&quot;关于我们&quot;&gt;关于我们&lt;/a&gt;&lt;/li&gt;</pre>
            </p></td>
        </tr>
      </table>
      <br>
      <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    <!--自定义导航设置-->
    <?php	 }if(isset($_POST['ysnav'])){
		 if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
		      $zbp->Config('hnyswm')->ysnavon = $_POST['ysnavon']; //自定义导航开关
			  $zbp->Config('hnyswm')->ysnav = $_POST['ysnav']; //自定义导航
			  $zbp->Config('hnyswm')->ysbnav = $_POST['ysbnav']; //自定义导航
              $zbp->Config('hnyswm')->ysbnavon = $_POST['ysbnavon']; //自定义导航开关
              $zbp->SaveConfig('hnyswm');
              $zbp->ShowHint('good');
			 }if ($act == 'nav'){  ?>
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <td width="20%"  align="center"><p>自定义导航</p></td>
          <td width="80%"><p>
              <textarea name="ysnav" type="text" id="ysnav" style="width:98%;height:100px;"><?php echo $zbp->Config('hnyswm')->ysnav;?></textarea>
            </p>
            <p>
              <input type="text" id="ysnavon" name="ysnavon" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->ysnavon;?>"/>
              <span style="color:#f00;"> 默认关闭，开启后将使用这里的导航链接，在这里你可以设置导航二级分类。</span> 如果你不慎清空了以上默认的内容，<a target="_blank" href="template/diydh.txt">→→ 点击这里查看 ←←</a></p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>网站底部自定义链接</p></td>
          <td><p>
              <textarea name="ysbnav" type="text" id="ysbnav" style="width:98%;height:50px;"><?php echo $zbp->Config('hnyswm')->ysbnav;?></textarea>
            </p>
            <p>
              <input type="text" id="ysbnavon" name="ysbnavon" class="checkbox" value="<?php echo $zbp->Config('hnyswm')->ysbnavon;?>"/>
              <span style="color:#f00;"> 默认关闭</span> 此处提供的默认链接仅供参考！你可以在<a target="_blank" href="/zb_system/cmd.php?act=PageMng">→→ 页面管理 ←←</a>中创建页面，把需要展示的页面链接在这里。</p></td>
        </tr>
      </table>
      <br>
      <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    
    <!--轮播图设置-->
    <?php	 }if(isset($_POST['banner1show'])){
		  if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
	          $zbp->Config('hnyswm')->banner1 = $_POST['banner1']; 
			  $zbp->Config('hnyswm')->banner2 = $_POST['banner2']; 
              $zbp->Config('hnyswm')->banner3 = $_POST['banner3']; 
			  $zbp->Config('hnyswm')->banner4 = $_POST['banner4']; 
			  $zbp->Config('hnyswm')->banner1url = $_POST['banner1url']; 
			  $zbp->Config('hnyswm')->banner2url = $_POST['banner2url']; 
              $zbp->Config('hnyswm')->banner3url = $_POST['banner3url']; 
			  $zbp->Config('hnyswm')->banner4url = $_POST['banner4url']; 
			  $zbp->Config('hnyswm')->banner1alt = $_POST['banner1alt']; 
			  $zbp->Config('hnyswm')->banner2alt = $_POST['banner2alt'];
              $zbp->Config('hnyswm')->banner3alt = $_POST['banner3alt']; 
			  $zbp->Config('hnyswm')->banner4alt = $_POST['banner4alt'];
			  $zbp->Config('hnyswm')->banner1show = $_POST['banner1show'];
			  $zbp->Config('hnyswm')->banner2show = $_POST['banner2show'];
              $zbp->Config('hnyswm')->banner3show = $_POST['banner3show'];
			  $zbp->Config('hnyswm')->banner4show = $_POST['banner4show'];
			  $zbp->SaveConfig('hnyswm');
              $zbp->ShowHint('good');
			 }if ($act == 'banner'){  ?>
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
      <tr>
        <td width="25%"><p align="center">图1</p></td>
        <td width="25%"><p align="center">图2</p></td>
        <td width="25%"><p align="center">图3</p></td>
        <td width="25%"><p align="center">图4</p></td>
      </tr><form id="form1" name="form1" method="post">
      <tr>
        <td><img src="<?php echo $zbp->Config('hnyswm')->banner1;?>" style = "height:100px;"/><br>
          <p align="left" class="uploadimg">
            <input name="banner1" id="banner1" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->banner1;?>" />
            <strong>浏览文件</strong> </p></td>
        <td><img src="<?php echo $zbp->Config('hnyswm')->banner2;?>" style = "height:100px;"/><br>
          <p align="left" class="uploadimg">
            <input name="banner2" id="banner2" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->banner2;?>" />
            <strong>浏览文件</strong> </p></td>
        <td><img src="<?php echo $zbp->Config('hnyswm')->banner3;?>" style = "height:100px;"/><br>
          <p align="left" class="uploadimg">
            <input name="banner3" id="banner3" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->banner3;?>" />
            <strong>浏览文件</strong> </p></td>
        <td><img src="<?php echo $zbp->Config('hnyswm')->banner4;?>" style = "height:100px;"/><br>
          <p align="left" class="uploadimg">
            <input name="banner4" id="banner4" type="text" class="uplod_img" style="width: 50%;" value="<?php echo $zbp->Config('hnyswm')->banner4;?>" />
            <strong>浏览文件</strong> </p></td>
      </tr>
       <tr>
          <td>链接
            <input name="banner1url" type="text" id="banner1url" value="<?php echo $zbp->Config('hnyswm')->banner1url; ?>" style="width:85%;"/></td>
          <td>链接
            <input name="banner2url" type="text" id="banner2url" value="<?php echo $zbp->Config('hnyswm')->banner2url; ?>" style="width:85%;" /></td>
          <td>链接
            <input name="banner3url" type="text" id="banner3url" value="<?php echo $zbp->Config('hnyswm')->banner3url; ?>" style="width:85%;" /></td>
          <td>链接
            <input name="banner4url" type="text" id="banner4url" value="<?php echo $zbp->Config('hnyswm')->banner4url; ?>" style="width:85%;" /></td>
        </tr>
        <tr>
          <td>标题
            <input name="banner1alt" type="text" id="banner1alt" value="<?php echo $zbp->Config('hnyswm')->banner1alt; ?>" style="width:85%;" /></td>
          <td>标题
            <input name="banner2alt" type="text" id="banner2alt" value="<?php echo $zbp->Config('hnyswm')->banner2alt; ?>" style="width:85%;" /></td>
          <td>标题
            <input name="banner3alt" type="text" id="banner3alt" value="<?php echo $zbp->Config('hnyswm')->banner3alt; ?>" style="width:85%;" /></td>
          <td>标题
            <input name="banner4alt" type="text" id="banner4alt" value="<?php echo $zbp->Config('hnyswm')->banner4alt; ?>" style="width:85%;" /></td>
        </tr>
        <tr>
          <td>是否显示
            <input name="banner1show" type="text" value="<?php echo $zbp->Config('hnyswm')->banner1show; ?>"	class="checkbox" style="display:none;" /></td>
          <td>是否显示
            <input name="banner2show" type="text" value="<?php echo $zbp->Config('hnyswm')->banner2show; ?>"	class="checkbox" style="display:none;" /></td>
          <td>是否显示
            <input name="banner3show" type="text" value="<?php echo $zbp->Config('hnyswm')->banner3show; ?>"	class="checkbox" style="display:none;" /></td>
          <td>是否显示
            <input name="banner4show" type="text" value="<?php echo $zbp->Config('hnyswm')->banner4show; ?>"	class="checkbox" style="display:none;" /></td>
        </tr> 
        <tr >
          <td colspan="4"><p align="center" style="padding:10px;">
              <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
              <input name="" type="Submit" class="button" value="保存"/>
            </p></td>
        </tr>
     </form>
    </table>
    
    <!--联系方式-->
    <?php	 }if(isset($_POST['yslx'])){
		 if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
              $zbp->Config('hnyswm')->yslx = $_POST['yslx']; //联系方式
			 $zbp->SaveConfig('hnyswm');
              $zbp->ShowHint('good');
			  }if ($act == 'contact'){  ?>
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <td colspan="3"><p style="color:#f00;text-align: center;font-size:14px;">以下各项，不填写则不显示！</p></td>
        </tr>
        <tr>
          <td width="20%"  align="center"><p>联系方式</p></td>
          <td><p>
              <textarea name="yslx" type="text" id="yslx" style="width:98%;height:150px;"><?php echo $zbp->Config('hnyswm')->yslx;?></textarea>
            </p>
            <pstyle="color:#f00;"> 复制以下代码填写到这里，汉字是可以修改的内容，顺序可以调整，不要的可以删除！以下联系方式带图标！<br>
            首页的联系方式最多只能显示7个。
            </p>
            <pre class="prism-highlight prism-language-markup">&lt;p&gt;&lt;i class=&quot;iconfont icon-icon-home&quot;&gt;&lt;/i&gt;填写公司名称&lt;/p&gt;    
&lt;p&gt;&lt;i class=&quot;iconfont icon-dizhi&quot;&gt;&lt;/i&gt;填写地址&lt;/p&gt;    
&lt;p&gt;&lt;i class=&quot;iconfont icon-lianxiren&quot;&gt;&lt;/i&gt;填写联系人&lt;/p&gt;    
&lt;p&gt;&lt;i class=&quot;iconfont icon-phone&quot;&gt;&lt;/i&gt;填写手机号&lt;/p&gt;    
&lt;p&gt;&lt;i class=&quot;iconfont icon-dianhua&quot;&gt;&lt;/i&gt;填写电话&lt;/p&gt; 
&lt;p&gt;&lt;i class=&quot;iconfont icon-qq&quot;&gt;&lt;/i&gt;填写QQ号&lt;/p&gt;
&lt;p&gt;&lt;i class=&quot;iconfont icon-weixin&quot;&gt;&lt;/i&gt;填写微信号&lt;/p&gt;
&lt;p&gt;&lt;i class=&quot;iconfont icon-facebook&quot;&gt;&lt;/i&gt;填写facebook&lt;/p&gt;
&lt;p&gt;&lt;i class=&quot;iconfont icon-tuitetwitter44&quot;&gt;&lt;/i&gt;填写twitter&lt;/p&gt;
&lt;p&gt;&lt;i class=&quot;iconfont icon-skype&quot;&gt;&lt;/i&gt;填写skype&lt;/p&gt;  
&lt;p&gt;&lt;i class=&quot;iconfont icon-chuanzhen&quot;&gt;&lt;/i&gt;填写传真&lt;/p&gt;    
&lt;p&gt;&lt;i class=&quot;iconfont icon-youxiang&quot;&gt;&lt;/i&gt;填写电子邮箱&lt;/p&gt;</pre></td>
        </tr>
      </table>
      <br>
      <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    <?php } ?>
  </div>
  <!--主题配置结束--> 
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_hnyswm");</script>
<?php
if ($zbp->CheckPlugin('UEditor')) {	
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/theme/hnyswm/style/js/lib.upload.js"></script>';
}
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
