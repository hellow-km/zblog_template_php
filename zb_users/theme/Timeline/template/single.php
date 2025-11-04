{* Template Name:文章和页面 *}
{template:header}
{if $article.Type==ZC_POST_TYPE_ARTICLE}
{template:post-single}
{else}
{template:post-page}
{/if}
{template:footer}