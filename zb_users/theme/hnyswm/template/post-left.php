<div class="xs4 xm3 lefter">




{if $type == 'category'}
  {if $category->Parent}
  {$catId = $category->ParentID}
  <button class="button iconfont icon-daohang bg" data-target="#subnav"></button>
  <ul class="nav submenu nav-navicon" id="subnav">
    <div class="left_h"> <h2>{$categorys[$catId].Name}</h2>
    </div>
    {hnyswm_subCate($catId)}
  </ul>
  {elseif $category->SubCategorys}
  {$catId = $category->ID}
  <button class="button iconfont icon-daohang bg" data-target="#subnav"></button>
  <ul class="nav submenu nav-navicon" id="subnav">
    <div class="left_h"> <h2>{$categorys[$catId].Name}</h2>
    </div>
    {hnyswm_subCate($catId)}
  </ul>
  {/if}
  
  
  {elseif $type == 'article'}
  {if $article->Category->Parent}
  {$catId = $article->Category->Parent->ID}
  <button class="button iconfont icon-daohang bg" data-target="#subnav"></button>
  <ul class="nav submenu nav-navicon" id="subnav">
    <div class="left_h"> <h2>{$categorys[$catId].Name}</h2>
    </div>
    {hnyswm_subCate($catId)}
  </ul>
  {elseif $article->Category->SubCategorys}
  {$catId = $article->Category->ID}
  <button class="button iconfont icon-daohang bg" data-target="#subnav"></button>
  <ul class="nav submenu nav-navicon" id="subnav">
    <div class="left_h"> <h2>{$categorys[$catId].Name}</h2>
    </div>
    {hnyswm_subCate($catId)}
  </ul>
  {/if}
  {/if}
  
  {if $zbp->Config('hnyswm')->clnavon}
  {if $type=='page'} 
    <button class="button iconfont icon-daohang bg" data-target="#subnav"></button>
  <ul class="nav submenu nav-navicon" id="subnav">
    <div class="left_h"> <h2>{$article.Title}</h2></div>
     {$zbp->Config('hnyswm')->clnav}</ul>{/if}{/if}
    
  <div class="hidden-l">
    <div class="left_h">
      <h2>{if $zbp->Config('hnyswm')->enandch}Contact us{else}联系我们{/if}</h2>
    </div>
    <div class="contact-content"> {$zbp->Config('hnyswm')->yslx} </div>
  </div>
  
  
  
  
</div>
