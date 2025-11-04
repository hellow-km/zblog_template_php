
<div class="msg" id="cmt<?php  echo $comment->ID;  ?>">
<div id="anchor-cmt<?php  echo $comment->ID;  ?>"><div id="comment-cmt<?php  echo $comment->ID;  ?>"></div></div>
	<li class="comment even thread-even depth-<?php  echo $comment->Level;  ?>" id="comment-<?php  echo $comment->ID;  ?>">
	<div id="div-comment-<?php  echo $comment->ID;  ?>" class="comment-body">
	<?php 
	$avatar = md5(strtolower($comment->Author->Email));
	$zmavatar=zbpNana_tt_touxiang_generate_first_letter_uri($comment->Author->StaticName);
	if ($zbp->Config('zbpNana')->plwlgoto_kg == '1') {
		$plzurl = zbpNana_links_goto($comment->Author->HomePage);
	}else{
		$plzurl = $comment->Author->HomePage;
	}
 ?>
	<img alt='<?php  echo $comment->Author->StaticName;  ?>' src="https://cn.gravatar.com/avatar/<?php  echo $avatar;  ?>&amp;r=X&amp;s=50?d=404" onerror='javascript:this.src="<?php  echo $zmavatar;  ?>";this.onerror=null;' class='avatar avatar-50 photo' height='50' width='50' />
	<div class="comment-author">
	<strong><span class="duzhe"><a href="<?php  echo $plzurl;  ?>" rel="external nofollow" target="_blank" class="url"><?php  echo $comment->Author->StaticName;  ?></a></span></strong>
	<?php if ($zbp->Config('zbpNana')->Displaypldj=='1') { ?><?php  echo zbpNana_get_author_class($comment->Author->Email);  ?><?php } ?>
<?php if ($comment->ParentID!=0) { ?>
<?php 
$newc=$zbp->GetCommentByID($comment->ParentID);
$atid=$newc->ID;
$atname=$newc->Name;
$atid=$newc->AuthorID;
if ($atid>0){$atname=$zbp->members[$atid]->StaticName;}
 ?>
	<span class="reply_tz"><?php  echo $comment->Time();  ?><a rel="nofollow" class="comment-reply-link" href="#comment" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')" aria-label="回复给<?php  echo $comment->Author->StaticName;  ?>">&nbsp;<i class="fa fa-reply"></i>&nbsp;回复</a></span><br> </div> <p><a class="at" href="#comment-<?php  echo $comment->ID;  ?>">@<?php  echo $atname;  ?></a><?php echo zbpNana_biaoqing($comment->Content) ?></p>
<?php }else{  ?>
<?php 
if ($commentRootFloor==1){$louchenghao="&nbsp;<span class='pinglunqs plshafa'>沙发</span>";}
elseif ($commentRootFloor==2){$louchenghao="&nbsp;<span class='pinglunqs plbandeng'>板凳</span>";} 
elseif ($commentRootFloor==3){$louchenghao="&nbsp;<span class='pinglunqs pldiban'>地板</span>";}
else{$louchenghao="<span class='floor'>&nbsp;{$commentRootFloor}楼</span>";}              
 ?>
	<span class="revertcomment"><a rel="nofollow" class="comment-reply-link" href="#comment" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')" aria-label="回复给<?php  echo $comment->Author->StaticName;  ?>">&nbsp;@回复</a></span><br> <span class="comment-meta commentmetadata"> <span class="comment-aux"> <span class="xiaoshi">发表于</span><?php  echo $comment->Time();  ?><?php  echo $louchenghao;  ?></span></span> </div><p><?php echo zbpNana_biaoqing($comment->Content) ?></p>
	<?php } ?>
	</div>
<ul class="children"> 
<?php  foreach ( $comment->Comments as $comment) { ?>
<?php  include $this->GetTemplate('comment');  ?>
<?php }   ?>
</ul>
</li>
</div>