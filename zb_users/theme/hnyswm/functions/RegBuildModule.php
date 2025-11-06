<?php
function hnyswm_article_AE(){
global $zbp,$article;
	if($article->Type=="0"){
		echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/hnyswm/style/js/lib.upload.js\"></script>";
		echo '<div class="editmod">
		<label for="meta_Producttxt" class="editinputname">文章缩略图</label>
		<div class="uploadimg">
<input name="meta_pic" id="edtTitle" type="text" class="uplod_img" style="width:60%;" value="'.$article->Metas->pic.'" />
<strong style="color: #ffffff; font-size: 14px;padding: 5px 18px; background: #3a6ea5;border: 1px solid #3399cc; cursor: pointer;">浏览文件</strong>
</div>';
    echo '<label for="meta_Producttxt" class="editinputname" style="margin-top:15px;">产品描述</label>
	<input type="text" name="meta_Producttxt" style="width:99%;margin-top:5px;" value="'.htmlspecialchars($article->Metas->Producttxt).'"  placeholder="填写这里，将启用产品详情页！">';
	echo '<label for="meta_zixun" class="editinputname"  style="margin-top:15px;">在线预定</label>
	<input type="text" name="meta_zixun" style="width:99%;margin-top:5px;" value="'.htmlspecialchars($article->Metas->zixun).'" placeholder="自定义产品预定链接（带http://），填写这里，将开启预定按钮。仅在产品详情页有效。"></div>';
	}
}
Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','hnyswm_cate_pro');//分类自定义字段
function hnyswm_cate_pro(){
    global $zbp,$cate;
 echo '<div id="alias" class="editmod">
       <span class="title">开启产品列表页: 
	   <input name="meta_hnyswm_pro" type="text" value="'.$cate->Metas->hnyswm_pro.'" class="checkbox" style="display:none;" />
	   <font color="#FF0000">(选中这里，将默认文章列表改为产品列表)</font></span>
       </div>';
}

function hnyswm_cate_seo(){
    global $zbp,$cate;
	echo '<div id="alias" class="editmod">
       <p><span style="margin:0 15px 0 0;" class="title">SEO设置</span><font color="#FF0000">（* 该功能为主题自带，不填写则按主题默认显示）</font></p>
       <p><input type="text" style="width:200px;margin:0 30px 0 0;" name="meta_hycatetitle" value="'.htmlspecialchars($cate->Metas->hycatetitle).'" placeholder="SEO标题"/>
       <input type="text" style="width:300px;margin:0 30px 0 0;" name="meta_hycatekeywords" value="'.htmlspecialchars($cate->Metas->hycatekeywords).'" placeholder="SEO关键词"/>
       <input type="text" style="width:500px;" name="meta_hycatedescription" value="'.htmlspecialchars($cate->Metas->hycatedescription).'" placeholder="SEO描述"/>
	   </p>
       </div>';
}
function hnyswm_tag_seo(){
    global $zbp,$tag;
	echo '<div id="alias" class="editmod">
       <p><span style="margin:0 15px 0 0;" class="title">SEO设置</span><font color="#FF0000">（* 该功能为主题自带，不填写则按主题默认显示）</font></p>
       <p><input type="text" style="width:200px;margin:0 30px 0 0;" name="meta_hytagtitle" value="'.htmlspecialchars($tag->Metas->hytagtitle).'" placeholder="SEO标题"/>
       <input type="text" style="width:300px;margin:0 30px 0 0;" name="meta_hytagkeywords" value="'.htmlspecialchars($tag->Metas->hytagkeywords).'" placeholder="SEO关键词"/>
       <input type="text" style="width:500px;" name="meta_hytagdescription" value="'.htmlspecialchars($tag->Metas->hytagdescription).'" placeholder="SEO描述"/></p>
	    </div>';
}

?>