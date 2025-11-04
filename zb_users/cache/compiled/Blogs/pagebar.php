<nav class="navigation pagination" role="navigation">
<?php if ($zbp->Config('Blogs')->fanyeanniu <='1') { ?>
<div class="nav-links">
<?php }else{  ?>
<div class="nav-links" style="display:none;">
<?php } ?>
<?php if ($pagebar) { ?>
<?php  foreach ( $pagebar->buttons as $k=>$v) { ?>
<?php if ($pagebar->PageAll>1) { ?>
<?php if ($pagebar->PageNow==$k) { ?>
<span class='page-numbers current'><?php  echo $k;  ?></span>
<?php }elseif($k=='‹') {  ?>
<span class="prev"><a class="page-numbers" href="<?php  echo $v;  ?>" title="上一页"><i class="fa fa-angle-left"></i></a></span>
<?php }elseif($k=='›') {  ?>
<span class="next"><a class="page-numbers" href="<?php  echo $v;  ?>" title="下一页"><i class="fa fa-angle-right"></i></a></span>
<?php }elseif($k=='‹‹') {  ?>
<?php if ($pagebar->PageNow!=1) { ?>
<a class="page-numbers" href="<?php  echo $v;  ?>" title="第1页"><i class="fa fa-angle-double-left"></i></a>
<?php } ?>
<?php }elseif($k=='››') {  ?>
<?php if ($pagebar->PageNow!=$pagebar->PageLast) { ?>
<a class="page-numbers" href="<?php  echo $v;  ?>" title="最后一页"><i class="fa fa-angle-double-right"></i></a>
<?php } ?>
<?php }else{  ?>
<a class="page-numbers" href="<?php  echo $v;  ?>" title="第<?php  echo $k;  ?>页"><?php  echo $k;  ?></a>
<?php } ?>
<?php }   ?>
<?php } ?>
<?php } ?>
</div>
</nav>
