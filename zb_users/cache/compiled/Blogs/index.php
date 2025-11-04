<?php if ($type=='index') { ?>
<?php  include $this->GetTemplate('blog');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('post-cat');  ?>
<?php } ?>