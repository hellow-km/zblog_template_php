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
      <div class="detail"> {if $article->Metas->Producttxt}
        <div class="Productpic"> <img alt="" src="{if $article->Metas->pic}{$article->Metas->pic}{else}{hnyswm_thumbnail($article)}{/if}"></div>
        <div class="Producttxt">
          <h1>{$article.Title}</h1>
          <p> {$article->Metas->Producttxt}</p>
          {if $article.Tags}<div class="tags"><i class="iconfont icon-35"></i>{foreach $article.Tags as $tag}<a href="{$tag.Url}"title="{$tag.Name}">{$tag.Name}</a> {/foreach}</div>{/if}
         {if $article->Metas->zixun} <div class="zixun"><a href="{$article->Metas->zixun}" target="_blank"><i class="iconfont icon-beizhuweitianxie"></i>{if $zbp->Config('hnyswm')->enandch}Schedule{else}在线预定{/if}</a></div>{/if}
        </div>
        <div class="clear" ></div>
        {else}
        <h1>{$article.Title}</h1>
        {if $type=='article'}
        <div class="text-center qhd-title">{if $zbp->Config('hnyswm')->enandch}<span>Publisher:{$article.Author.StaticName}</span><span>Time:{$article.Time('Y-m-d')}</span><span>Number:{$article.ViewNums}</span>{else}<span>发布者：{$article.Author.StaticName}</span><span>发布时间：{$article.Time('Y-m-d')}</span><span>访问量：{$article.ViewNums}</span>{/if}</div>{/if}{/if}
        <div class="article_content" >{$article.Content}
         </div>{if $article->Metas->Producttxt}{else}{if $article.Tags}<div class="tags"><i class="iconfont icon-35"></i>{foreach $article.Tags as $tag}<a href="{$tag.Url}"title="{$tag.Name}">{$tag.Name}</a> {/foreach}</div>{/if}{/if}
        {if $type=='article'}
        <ul class="pager">
          <li>{if $article.Prev} <a href="{$article.Prev.Url}" title="{$article.Prev.Title}">{if $zbp->Config('hnyswm')->enandch}Prev:{else}上一篇：{/if}{$article.Prev.Title}</a>{/if}</li>
          <li>{if $article.Next} <a href="{$article.Next.Url}" title="{$article.Next.Title}">{if $zbp->Config('hnyswm')->enandch}Next:{else}下一篇：{/if}{$article.Next.Title}</a>{/if}</li>
        </ul>
         {/if}
         </div>
    </div>
  </div>
</div>
