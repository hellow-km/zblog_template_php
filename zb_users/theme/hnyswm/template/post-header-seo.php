<?php echo'404';die();?>
{if $type=='article'}
<title>{$title}_{$article.Category.Name}_{$name}</title>
{php}
$aryTags = array();
foreach($article->Tags as $key){$aryTags[] = $key->Name;}
if(count($aryTags)>0){$keywords = implode(',',$aryTags);} else {$keywords = $zbp->name;}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{if $article.Prev}
<link rel="prev" title="{$article.Prev.Title}" href="{$article.Prev.Url}"/>
{/if}
{if $article.Next}
<link rel="next" title="{$article.Next.Title}" href="{$article.Next.Url}"/>
{/if}
<link rel="canonical" href="{$article.Url}"/>
{elseif $type=='page'}
<title>{$title}_{$name}_{$subname}</title>
<meta name="keywords" content="{$title},{$name}" />
{php}
$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...';
{/php}
<meta name="description" content="{$description}" />
<meta name="author" content="{$article.Author.StaticName}" />
{elseif $type=='index'}
<title>{if $zbp->Config('hnyswm')->ystitle&&$page=='1'}{$zbp->Config('hnyswm')->ystitle}{else}{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}{/if}</title>
{if $zbp->Config('hnyswm')->yskeywords}
<meta name="Keywords" content="{$zbp->Config('hnyswm')->yskeywords}" />
{/if}
{if $zbp->Config('hnyswm')->ysdescription}
<meta name="description" content="{$zbp->Config('hnyswm')->ysdescription}" />
{/if}
<meta name="author" content="{$zbp.members[1].StaticName}" />
{elseif $type=='tag'}
<title>{if $tag->Metas->hytagtitle}{$tag.Metas.hytagtitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$tag.Name}_{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}{/if}</title>
<meta name="Keywords" content="{if $tag->Metas->hytagkeywords}{$tag.Metas.hytagkeywords}{else}{$tag.Name}{/if}">
{if $tag.Intro || $tag->Metas->hytagdescription}
<meta name="description" content="{if $tag->Metas->hytagdescription}{$tag.Metas.hytagdescription}{else}{$tag.Intro}{/if}">
{/if}
{elseif $type=='category'}
<title>{if $category->Metas->hycatetitle}{$category->Metas->hycatetitle}{if $page>'1'}_第{$pagebar.PageNow}页{/if}{else}{$title}_{$name}{/if}</title>
<meta name="Keywords" content="{if $category->Metas->hycatekeywords}{$category.Metas.hycatekeywords}{else}{$title},{$name}{/if}" />
<meta name="description" content="{if $category->Metas->hycatedescription}{$category.Metas.hycatedescription}{else}{$title}_{$name}{/if}" />
{else}
<title>{$title}_{$name}</title>
<meta name="Keywords" content="{$title},{$name}" />
<meta name="description" content="{$title}_{$name}{if $page>'1'}_当前是第{$pagebar.PageNow}页{/if}" />
{/if}