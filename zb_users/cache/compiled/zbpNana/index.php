
<?php if ($type=='index') { ?>
<?php if ($zbp->Config('zbpNana')->shouyebuju=='2') { ?>
<?php  include $this->GetTemplate('cms');  ?>
<?php }elseif($zbp->Config('zbpNana')->shouyebuju=='3') {  ?>
<?php  include $this->GetTemplate('grid');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('blog');  ?>
<?php } ?>
<?php }else{  ?>
<?php if ($zbp->Config('zbpNana')->fltpbj_kg=='1') { ?>
<?php  include $this->GetTemplate('post-grid');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('post-cat');  ?>
<?php } ?>
<?php } ?>