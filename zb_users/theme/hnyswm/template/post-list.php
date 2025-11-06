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
        <h2 class="text-main title">{if $type=='category'}{template:post-breadcrumb}{/if}{if $type=='tag'}{if $zbp->Config('hnyswm')->enandch}Tags:{else}标签：{/if}{$tag.Name}{/if}</h2>
      </div>
      <div class="show_content "> {if $category.Metas.hnyswm_pro}
        <div class="show_list product_list_box">
          <div class="layout">
            <div class="line-big"> {foreach $articles as $article}
              <div class="xm3 xb3 xs4 xl6">
                <div class="pro-item">
                  <div class="portfolio-img"><a href="{$article.Url}" title="{$article.Title}"><img alt="{$article.Title}" src="{if $article->Metas->pic}{$article->Metas->pic}{else}{hnyswm_thumbnail($article)}{/if}"/></a></div>
                  <h2 class="text-center"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h2>
                  <p>{php}$intro= preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),50)).'');{/php}{$intro}</p>
                </div>
              </div>
              {/foreach} </div>
          </div>
        </div>
        {else}
        <div class="show_list">
          <ul class="article-media">
            {foreach $articles as $article}
            <li><span class='float-right hidden-l'>{$article.Time('Y-m-d')}</span><a href='{$article.Url}' title='{$article.Title}'>{$article.Title}</a></li>
            {/foreach}
          </ul>
        </div>{/if}
        <div class="text-center">
          <ul class="fenyetiao">
            {template:pagebar}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
