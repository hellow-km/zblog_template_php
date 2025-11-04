
<ul class="msg" id="cmt<?php  echo $comment->ID;  ?>">
	<li class="msgname"><img class="avatar" src="<?php  echo $comment->Author->Avatar;  ?>" alt="" width="32"><span class="commentname"><a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank" class="mcolor"><?php  echo $comment->Author->StaticName;  ?></a></span><small><?php  echo $comment->Time();  ?></small><span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')" title="回复该信息" class="reply">回复</a></span></li>
	<li class="msgarticle"><?php  echo $comment->Content;  ?>
<?php  foreach ( $comment->Comments as $comment) { ?>
<?php  include $this->GetTemplate('comment');  ?>
<?php }   ?>
	</li>
</ul>