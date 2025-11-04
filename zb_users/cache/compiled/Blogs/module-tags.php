<?php $i = $zbp->modulesbyfilename['tags']->MaxLi;if ($i == 0) $i = 20;
	$tagArray = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($i),'');	 ?>
	
<?php if ($zbp->Config('Blogs')->cblbiaoqian=='1') { ?>
<ul id="divTags-1">
<?php  foreach ( $tagArray as $tag) { ?>
<li><a href="<?php  echo $tag->Url;  ?>"><?php  echo $tag->Name;  ?><span class="tag-count"> (<?php  echo $tag->Count;  ?>)</span></a></li>
<?php }   ?>
</ul>
<?php } ?>
<?php if ($zbp->Config('Blogs')->cblbiaoqian=='2') { ?>
<div class="tagcloud">
	<?php  foreach ( $tagArray as $tag) { ?>
		<?php $tagscolor = dechex(rand(0,16777215));$tagssize = rand(5,22)+rand(111,999)*0.001;
		 ?>
		<a href="<?php  echo $tag->Url;  ?>" title="<?php  echo $tag->Count;  ?>个话题" style="color:#<?php  echo $tagscolor;  ?>;font-size:<?php  echo $tagssize;  ?>pt;" target="_blank" rel="nofollow"><?php  echo $tag->Name;  ?></a>	
	<?php }   ?>
</div>
<?php } ?>
<?php if ($zbp->Config('Blogs')->cblbiaoqian=='3') { ?>
<div id="tag_cloud_widget">
	<?php  foreach ( $tagArray as $tag) { ?>
		<a href="<?php  echo $tag->Url;  ?>" title="<?php  echo $tag->Count;  ?>个话题" target="_blank" rel="nofollow"><?php  echo $tag->Name;  ?></a>
	<?php }   ?>
</div>
<?php } ?>
