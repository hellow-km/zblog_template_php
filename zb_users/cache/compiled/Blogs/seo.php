<?php if ($type=='index') { ?>
<title><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $subname;  ?></title>
<meta name="Keywords" content="<?php  echo $zbp->Config('Blogs')->Keywords;  ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('Blogs')->Description;  ?>">
<?php }elseif($type=='category') {  ?> 
<title><?php if ($category->Metas->Blogs_fltitle) { ?><?php  echo $category->Metas->Blogs_fltitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php if ($category->Metas->Blogs_flgjc) { ?><?php  echo $category->Metas->Blogs_flgjc;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $category->Intro;  ?>">
<?php }elseif($type=='article') {  ?>
<title><?php  echo $title;  ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $article->Category->Name;  ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?></title>
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
<title><?php if ($article->Metas->Blogs_pstitle) { ?><?php  echo $article->Metas->Blogs_pstitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($article->Metas->Blogs_psguanjianci) { ?><?php  echo $article->Metas->Blogs_psguanjianci;  ?><?php }else{  ?><?php  echo $title;  ?>,<?php  echo $name;  ?><?php } ?>"/>
<?php 
	if (strlen($article->Metas->Blogs_psmiaoshu)>0){
	$description = $article->Metas->Blogs_psmiaoshu;
	}else{
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
	}
 ?>
<meta name="description" content="<?php  echo $description;  ?>"/>
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">  
<?php }elseif($type=='tag') {  ?>  
<title><?php if ($tag->Metas->Blogs_bqtitle) { ?><?php  echo $tag->Metas->Blogs_bqtitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php if ($tag->Metas->Blogs_bqgjc) { ?><?php  echo $tag->Metas->Blogs_bqgjc;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $tag->Intro;  ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $title;  ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?><?php  echo $name;  ?><?php if ($page>'1') { ?><?php  echo $zbp->Config('Blogs')->lianjiefu;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>"> 
<?php } ?>