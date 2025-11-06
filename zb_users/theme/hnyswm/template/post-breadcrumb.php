<!--文章页当前位置-->
{if $type!=='index'}<a href="{$host}" title="{$name}">{if $zbp->Config('hnyswm')->enandch}Home{else}首页{/if}</a> {if $type=='category'||$type=='article'}
{php}
$html='';
function navcate($id){
        global $html;
        $cate = new Category;
        $cate->LoadInfoByID($id);
        $html ='<i class="iconfont icon-jiantouxiangyou"></i><a href="' .$cate->Url.'" title="' .$cate->Name. '">' .$cate->Name. '</a>'.$html;
        if(($cate->ParentID)>0){navcate($cate->ParentID);}
}
if($type=='category'){navcate($category->ID);}else{navcate($article->Category->ID);}
global $html;
echo $html;
{/php}{if $type=='article'}<i class="iconfont icon-jiantouxiangyou"></i>{if $zbp->Config('hnyswm')->enandch}Content{else}正文{/if}{/if}
{elseif $type=='page'}<i class="iconfont icon-jiantouxiangyou"></i>{if $zbp->Config('hnyswm')->enandch}Content{else}正文{/if}
{else} <i class="iconfont icon-jiantouxiangyou"></i>{$title}
{/if}

{/if}