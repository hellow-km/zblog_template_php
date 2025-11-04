<?php if ($type=='index') { ?>
<title><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $subname;  ?></title>
<meta name="Keywords" content="<?php  echo $zbp->Config('zbpNana')->Keywords;  ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('zbpNana')->Description;  ?>">
<?php }elseif($type=='category') {  ?> 
<title><?php if ($category->Metas->zbpNana_fltitle) { ?><?php  echo $category->Metas->zbpNana_fltitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php if ($category->Metas->zbpNana_flgjc) { ?><?php  echo $category->Metas->zbpNana_flgjc;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $category->Intro;  ?>">
<?php }elseif($type=='article') {  ?>
<title><?php  echo $title;  ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $article->Category->Name;  ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?></title>
  <?php 
    $aryTags = array();
    foreach($article->Tags as $key){
      $aryTags[] = $key->Name;
    }
    if(count($aryTags)>0){
        $keywords = implode(',',$aryTags);
    } else {
        $keywords = $zbp->name;
    }
	if (strlen($article->Intro)>0){
	$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),135)).'...');
	}else{
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
	}
   ?>
<meta name="keywords" content="<?php  echo $keywords;  ?>"/>
<meta name="description" content="<?php  echo $description;  ?>"/>
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
<?php }elseif($type=='page') {  ?>
<title><?php if ($article->Metas->zbpNana_pstitle) { ?><?php  echo $article->Metas->zbpNana_pstitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($article->Metas->zbpNana_psguanjianci) { ?><?php  echo $article->Metas->zbpNana_psguanjianci;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>"/>
  <?php 
	if (strlen($article->Metas->zbpNana_psmiaoshu)>0){
	$description = $article->Metas->zbpNana_psmiaoshu;
	}else{
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
	}
   ?>
<meta name="description" content="<?php  echo $description;  ?>"/>
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">  
<?php }elseif($type=='tag') {  ?>  
<title><?php if ($tag->Metas->zbpNana_bqtitle) { ?><?php  echo $tag->Metas->zbpNana_bqtitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php if ($tag->Metas->zbpNana_bqgjc) { ?><?php  echo $tag->Metas->zbpNana_bqgjc;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $tag->Intro;  ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $title;  ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('zbpNana')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>"> 
<?php } ?>