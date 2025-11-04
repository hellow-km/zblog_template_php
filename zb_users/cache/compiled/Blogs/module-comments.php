<div id="related-medias"><ul class="media-list">
<?php $i = $zbp->modulesbyfilename['comments']->MaxLi;if ($i == 0) $i = 6;
$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('=', 'comm_AuthorID','0')), array('comm_PostTime' => 'DESC'), $i, null);	 ?>

	<?php  foreach ( $comments as $comment) { ?>
		<?php $avatar = md5(strtolower($comment->Author->Email));
		$zmavatar=Blogs_tt_touxiang_generate_first_letter_uri($comment->Author->StaticName);
		$cmtxt = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($comment->Content,'[nohtml]'),40)).'');
		 ?>
		<li class="item"><a class="y-left img-wrap" rel="nofollow" target="_blank" href="<?php  echo $comment->Post->Url;  ?>#cmt<?php  echo $comment->ID;  ?>"><img alt='<?php  echo $comment->Author->Name;  ?>' src="https://cn.gravatar.com/avatar/<?php  echo $avatar;  ?>&amp;r=X&amp;s=56?d=404" onerror='javascript:this.src="<?php  echo $zmavatar;  ?>";this.onerror=null;' class='avatar avatar-56 photo' height='56' width='56' /></a> <div class="media-info"> <div class="media-inner"> <a rel="nofollow" target="_blank" class="media-name" href="<?php  echo $comment->Post->Url;  ?>#cmt<?php  echo $comment->ID;  ?>"><?php  echo $comment->Author->Name;  ?></a><p class="media-des"><a rel="nofollow" target="_blank" href="<?php  echo $comment->Post->Url;  ?>#cmt<?php  echo $comment->ID;  ?>"><?php echo Blogs_biaoqing($comment->Content) ?></a></p></div> </div> </li>
		
<?php }   ?>
</ul></div>
