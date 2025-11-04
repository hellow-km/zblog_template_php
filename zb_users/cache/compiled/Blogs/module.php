<aside id="<?php  echo $module->HtmlID;  ?>" class="widget widget_<?php  echo $module->FileName;  ?>"><?php if ((!$module->IsHideTitle)&&($module->Name)) { ?><h3 class="widget-title"><span class="cat"><?php  echo $module->Name;  ?></span></h3><?php } ?>
<?php if (($module->Type=='div')) { ?>
<div class="textwidget" id="<?php  echo $module->HtmlID;  ?>-1"><?php  echo $module->Content;  ?><div class="clear"></div></div>
<?php } ?>
<?php if ($module->Type=='ul') { ?>
<?php if (($module->FileName=='previous')||($module->FileName=='comments')||($module->FileName=='tags')||($module->FileName=='authors')) { ?>
<?php  echo $module->Content;  ?>
<?php }else{  ?>
<ul id="<?php  echo $module->HtmlID;  ?>-1"><?php  echo $module->Content;  ?><div class="clear"></div></ul>
<?php } ?><?php } ?>
<div class="clear"></div>
</aside>