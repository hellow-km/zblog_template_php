<li class="<?php  echo $id;  ?>-item<?php if (count($item->subs)) { ?> subcate<?php } ?>">
<a href="<?php  echo $item->href;  ?>" target="<?php  echo $item->target;  ?>"<?php if ($item->title) { ?> title="<?php  echo $item->title;  ?>"<?php } ?>><?php  echo $item->ico;  ?><?php  echo $item->text;  ?></a>
    <?php if (count($item->subs)) { ?>
    <div class="subnav">
        <?php  foreach ( $item->subs as $itemSub) { ?>
        <a href="<?php  echo $itemSub->href;  ?>" target="<?php  echo $itemSub->target;  ?>"<?php if ($itemSub->title) { ?> title="<?php  echo $itemSub->title;  ?>"<?php } ?>><?php  echo $itemSub->ico;  ?><?php  echo $itemSub->text;  ?></a>
        <?php }   ?>
    </div>
    <?php } ?>
</li>