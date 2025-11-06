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
  <div class="container  content_detail" id="fh5co-content_show">{template:post-left}
    <div class="xs8 xm9">
      <div class="title">
        <h2 class="text-main title">{template:post-breadcrumb}</h2>
      </div>
      <div class="show_content ">
        <div class="show_body detail">
          <h1>{$article.Title}</h1>
          <div class="article_content" >{$article.Content}</div>
        </div>
      </div>
    </div>
  </div>
</div>
