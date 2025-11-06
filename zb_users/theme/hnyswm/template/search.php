{template:header} 
<div class="layout">{if $zbp->Config('hnyswm')->labjon}
  <div id="carousel-banner" class="slideshow"><img src="{$zbp->Config('hnyswm')->labj}"  alt=''></div>
  <script type="text/javascript">
$(window).bind("load resize",function(){
    $('#carousel-banner').carouFredSel({
        width       : '100%',
        auto: false,
        items: 1,
        scroll: {
            fx: 'fade',
            duration: 2000
        }
    });
});
</script>{/if}
  <div class="container " id="fh5co-content_show"> {template:post-left}
    <div class="xs8 xm9">
      <div class="title">
        <h2 class="text-main title">{if $zbp->Config('hnyswm')->enandch}Search results{else}{$article.Title}的结果{/if}</h2>
      </div>
      <div class="show_content ">
        <div class="show_list">
          <ul class="article-media">
            {foreach $articles as $article}
            <li><span class='float-right hidden-l'>{$article.Time('Y-m-d')}</span><a href='{$article.Url}' title='{$article.Title}'>{$article.Title}</a></li>
            {/foreach}
          </ul>
        </div>
        <div class="text-center">
          <ul class="fenyetiao">
            {template:pagebar}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
{template:footer} 