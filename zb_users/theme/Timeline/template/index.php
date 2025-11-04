{* Template Name:首页和列表 *}
{template:header}
<article>
	<div class="content">
  		{if $type=='index'&&$page=='1'}
		<div class="plist">
			{foreach GetList(3,$zbp->Config('Timeline')->homepcid, null, null, null, null, array("has_subcate"  => true)) as $toparticle}
			{template:picget}
			<figure>
				<h4><a href="{$toparticle.Url}" title="{$toparticle.Title}" target="_blank" ><img src="{$topp}"><span>{$toparticle.Time('Y-m-d')}</span></a></h4>
				<p><a href="{$toparticle.Url}" title="{$toparticle.Title}" target="_blank" >{$toparticle.Title}</a></p>
				<figcaption>{php}$description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($toparticle->Intro,'[nohtml]'),56)).'...');{/php}{$description}</figcaption>
			</figure>
			{/foreach}
		</div>
		{else}
		<div class="pagenow listnav"><a href="{$host}">{$name}</a>{if $type=='category'}{if $category.Parent}<span>&gt;</span><a href="{$category.Parent.Url}">{$category.Parent.Name}</a>{/if}<span>&gt;</span><a href="{$category.Url}">{$category.Name}</a>{/if}{if $type=='author'||$type=='tag'||$type=='date'}<span>&gt;</span>{$title}{/if}{if $page>'1'}<span>&gt;</span>第{$pagebar.PageNow}页{/if}</div>
		{/if}
		<ul class="mainlist">
{foreach $articles as $article}
{template:picget}
{if $article.IsTop}
			<li class="up">
				<time class="ctime"><span>{$article.Time('m-d')}</span> <span>{$article.Time('Y')}</span></time>
				<div class="cdot"></div>
				<div class="cbox" data-scroll-reveal="enter right over 1s">
					<h3><a href="{$article.Url}" title="{$article.Title}" target="_blank" >{$article.Title}</a></h3>
					<div class="des">
						<span class="pic"><a href="{$article.Url}" target="_blank" title="{$article.Title}"><img src="{$temp}"></a></span>
						<p>{php}$description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),132)).'...');{/php}{$description}<br><a href="{$article.Url}" target="_blank" class="readmore">阅读全文&hellip;</a>{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag" class="tags">{$tag.Name}</a>{/foreach}</p>
					</div>
				</div>
			</li>
{else}
			<li>
				<time class="ctime"><span>{$article.Time('m-d')}</span> <span>{$article.Time('Y')}</span></time>
				<div class="cdot"></div>
				<div class="cbox" data-scroll-reveal="enter right over 1s">
					<h3><a href="{$article.Url}" title="{$article.Title}" target="_blank" >{$article.Title}</a></h3>
					<div class="des">
						<span class="pic"><a href="{$article.Url}" target="_blank" title="{$article.Title}"><img src="{$temp}"></a></span>
						<p>{php}$description = preg_replace('/[\r\n\s]|(\s|\&nbsp\;|　|\xc2\xa0)+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),132)).'...');{/php}{$description}<br><a href="{$article.Url}" target="_blank" class="readmore">阅读全文&hellip;</a>{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag" class="tags">{$tag.Name}</a>{/foreach}</p>
					</div>
				</div>
			</li>
{/if}
{/foreach}
		</ul>
		<div class="pages">{template:pagebar}</div>
	</div>
</article>
{template:footer}