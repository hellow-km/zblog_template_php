
<div class="flexslider">
  <ul class="slides">
    {if $zbp->Config('hnyswm')->banner1show}
    <li><a href="{$zbp->Config('hnyswm')->banner1url}"><img src="{$zbp->Config('hnyswm')->banner1}" alt="{$zbp->Config('hnyswm')->banner1alt}"/></a> </li>
    {/if}
    {if $zbp->Config('hnyswm')->banner2show}
    <li><a href="{$zbp->Config('hnyswm')->banner2url}"><img src="{$zbp->Config('hnyswm')->banner2}" alt="{$zbp->Config('hnyswm')->banner2alt}"/></a> </li>
    {/if}
    {if $zbp->Config('hnyswm')->banner3show}
    <li><a href="{$zbp->Config('hnyswm')->banner3url}"><img src="{$zbp->Config('hnyswm')->banner3}" alt="{$zbp->Config('hnyswm')->banner3alt}"/></a> </li>
    {/if}
    {if $zbp->Config('hnyswm')->banner4show}
    <li><a href="{$zbp->Config('hnyswm')->banner4url}"><img src="{$zbp->Config('hnyswm')->banner4}" alt="{$zbp->Config('hnyswm')->banner4alt}"/></a> </li>
    {/if}
  </ul>
</div>
<script defer src="{$host}zb_users/theme/{$theme}/style/js/jquery.flexslider.js"></script> 
<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script> 
<div id="fh5co-product-list">
  <div class="layout ">
    <div class="container">
      <div class="line">
        <div class="x12 fh5co-heading">
          <h2><a href="{$categorys[$zbp->Config('hnyswm')->ysproduct].Url}" title="{if $zbp->Config('hnyswm')->enandch}Look at more{else}点击查看更多{/if}">{$categorys[$zbp->Config('hnyswm')->ysproduct].Name}</a></h2>
          {if $zbp->Config('hnyswm')->ysproduct1}
          <p>{$zbp->Config('hnyswm')->ysproduct1}</p>
          {/if} </div>
      </div>
      <div class="line-big show-list"> {foreach Getlist(8,$zbp->Config('hnyswm')->ysproduct,null,null,null,null,array('has_subcate'=>true)) as $related}
        <div class="xm3 xb3 xs4 xl6">
          <div class="pro-item">
            <div class="product-img"><a href="{$related.Url}" title="{$related.Title}"><img alt="{$related.Title}" src="{if $related->Metas->pic}{$related->Metas->pic}{else}{hnyswm_thumbnail($related)}{/if}"/></a></div>
            <h2><a href="{$related.Url}" title="{$related.Title}">{$related.Title}</a></h2>
          </div>
        </div>
        {/foreach} </div>
    </div>
  </div>
</div>
<!-- about us begin-->
<div id="fh5co-about-us">
  <div class="layout bg-about bg-inverse">
    <div class="show-content text-center"> {php}$array = explode(',',$zbp->Config('hnyswm')->ysabout);{/php}
      {foreach $array as $key=>$id} {$post=GetPost((int)$id);}
      <h2>{$post.Title}</h2>
      <div class="about-box" >
        <p>{$zbp->Config('hnyswm')->ysaboutzy}</p>
      </div>
      <a href="{$post.Url}" class="btn  view-all" role="button"><span class="rightward"></span>{if $zbp->Config('hnyswm')->enandch}More{else}查看更多{/if}</a>{/foreach}</div>
  </div>
</div>
<!--  about us  end--> 
<!-- news begin-->
<div id="fh5co-case-list">
  <div class="layout bg-case">
    <div class="container">
      <div class="line">
        <div class="x12 fh5co-heading text-center">
          <h2><a href="{$categorys[$zbp->Config('hnyswm')->yscase].Url}" title="{if $zbp->Config('hnyswm')->enandch}Look at more{else}点击查看更多{/if}">{$categorys[$zbp->Config('hnyswm')->yscase].Name}</a></h2>
        </div>
      </div>
      <div class="line-big show-list"> {foreach Getlist(4,$zbp->Config('hnyswm')->yscase,null,null,null,null,array('has_subcate'=>true)) as $related}
        <div class="xm3 xb3 xs4 xl6">
          <div class="portfolio-img"><a href="{$related.Url}" title="{$related.Title}" ><img alt="{$related.Title}" src="{if $related->Metas->pic}{$related->Metas->pic}{else}{hnyswm_thumbnail($related)}{/if}"/></a></div>
          <h2 class="text-center"><a href="{$related.Url}" title="{$related.Title}">{$related.Title}</a></h2>
        </div>
        {/foreach} </div>
    </div>
  </div>
</div>
<!-- bottom begin-->
<div id="fh5co-info-list" >
  <div class="layout ">
    <div class="container">
      <div class="line-big"> 
        <!-- news begin-->
        <div id="fh5co-news-list" class="xs7  news-box">
          <div class="fh5co-heading">
            <h2>{$categorys[$zbp->Config('hnyswm')->ysnews].Name}</h2>
          </div>
          <div class="show-list">
            <ul class="article-media clearfix">
              {foreach Getlist(5,$zbp->Config('hnyswm')->ysnews,null,null,null,null,array('has_subcate'=>true)) as $related}
              <li><span class='float-right hidden-l'>{$related.Time('m-d')}</span><i class="iconfont icon-jiantouxiangyou"></i><a href='{$related.Url}' title='{$related.Title}'>{$related.Title}</a></li>
              {/foreach}
            </ul>
          </div>
        </div>
        <!-- news end--> 
        <!-- contact us begin-->
        <div id="fh5co-contact-us" class="xs5  about-box">
          <div class="x12 fh5co-heading">
            <h2>{if $zbp->Config('hnyswm')->enandch}Contact us{else}联系我们{/if}</h2>
          </div>
          <div class="contact-content1"> {$zbp->Config('hnyswm')->yslx} </div>
        </div>
        <!-- contact us end--> 
      </div>
    </div>
  </div>
</div>
