<div class="new_cat" id="new_cat"><ul>
<?php $i = $zbp->modulesbyfilename['previous']->MaxLi;if ($i == 0) $i = 6; ?>
<?php  foreach ( getlist($i) as $article) { ?>
<li class="clr"><a href="<?php  echo $article->Url;  ?>"  title="<?php  echo $article->Title;  ?>" target="_blank"><div class="time"><span class="r"><?php  echo $article->Time('d');  ?></span>/<span class="y"><?php  echo $article->Time('m月');  ?></span></div><div class="title"><?php  echo $article->Title;  ?></div></a></li>
<?php }   ?>
</ul></div>