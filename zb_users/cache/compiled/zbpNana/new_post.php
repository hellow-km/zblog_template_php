
<?php $cmszxwznum=$zbp->Config('zbpNana')->cms_zxwz_num;$catelist=$zbp->Config('zbpNana')->cms_zxwz_eflid; ?>			
<?php if (empty($catelist)) { ?>
<?php  include $this->GetTemplate('new_postm');  ?>
<?php }else{  ?>
<?php  include $this->GetTemplate('new_postz');  ?>
<?php } ?>