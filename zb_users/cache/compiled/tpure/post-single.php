<div class="content">
    <div data-cateurl="<?php if ($type=='article' && is_object($article->Category)) { ?><?php if ($article->Category->ParentID) { ?><?php  echo $article->Category->Parent->Url;  ?><?php }else{  ?><?php  echo $article->Category->Url;  ?><?php } ?><?php } ?>" class="block">
        <div class="post">
            <h1><?php  echo $article->Title;  ?></h1>
            <div class="info">
                <?php 
                $post_info = array(
                    'user' => '<a href="'.$article->Author->Url.'" rel="nofollow">'.$article->Author->StaticName.'</a>',
                    'date' => tpure_TimeAgo($article->Time(),$zbp->Config('tpure')->PostTIMESTYLE),
                    'cate' => '<a href="'.$article->Category->Url.'">'.$article->Category->Name.'</a>',
                    'view' => $article->ViewNums >= 10000 ? round($article->ViewNums / 10000,2).$lang['tpure']['viewunit']:$article->ViewNums,
                    'cmt' => $article->CommNums,
                    'edit' => '<a href="'.$host.'zb_system/cmd.php?act=ArticleEdt&id='.$article->ID.'" target="_blank">'.$lang['tpure']['edit'].'</a>',
                    'del' => '<a href="'.$host.'zb_system/cmd.php?act=ArticleDel&id='.$article->ID.'&csrfToken='.$zbp->GetToken().'" data-confirm="'.$lang['tpure']['delconfirm'].'">'.$lang['tpure']['del'].'</a>',
                );
                $article_info = json_decode($zbp->Config('tpure')->PostARTICLEINFO,true);
                if(count((array)$article_info)){
                    foreach($article_info as $key => $info){
                        if($info == '1'){
                            if($user->Level == '1' && isset($post_info[$key])){
                                echo '<span class="'.$key.'">'.$post_info[$key].'</span>';
                            }else{
                                if($key == 'edit' || $key == 'del'){
                                    echo '';
                                }else{
                                    echo '<span class="'.$key.'">'.$post_info[$key].'</span>';
                                }
                            }
                        }
                    }
                }else{
                    echo '<span class="user"><a href="'.$article->Author->Url.'" rel="nofollow">'.$article->Author->StaticName.'</a></span>
                    <span class="date">'.tpure_TimeAgo($article->Time(),$zbp->Config('tpure')->PostTIMESTYLE).'</span>
                    <span class="view">'.$article->ViewNums.'</span>';
                }
                 ?>
            </div>
            <div class="single postcon">
                <?php  echo $article->Content;  ?>
                <?php if (count($article->Tags)>0) { ?>
                <div class="tags">
                    <?php  echo $lang['tpure']['tags'];  ?>
                    <?php  foreach ( $article->Tags as $tag) { ?><a href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'><?php  echo $tag->Name;  ?></a><?php }   ?>
                </div>
                <?php } ?>
                <?php if ($zbp->Config('tpure')->PostSHARE) { ?>
                <div class="bdshare">
                    <?php  echo $zbp->Config('tpure')->PostSHARE;  ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="pages">
            <a href="<?php  echo $article->Category->Url;  ?>" class="backlist"><?php  echo $lang['tpure']['backlist'];  ?></a>
            <p><?php if ($article->Prev) { ?><?php  echo $lang['tpure']['prev'];  ?><a href="<?php  echo $article->Prev->Url;  ?>" class="single-prev"><?php  echo $article->Prev->Title;  ?></a><?php }else{  ?><span><?php  echo $lang['tpure']['noprev'];  ?></span><?php } ?></p>
            <p><?php if ($article->Next) { ?><?php  echo $lang['tpure']['next'];  ?><a href="<?php  echo $article->Next->Url;  ?>" class="single-next"><?php  echo $article->Next->Title;  ?></a><?php }else{  ?><span><?php  echo $lang['tpure']['nonext'];  ?></span><?php } ?></p>
        </div>
    </div>
<?php  include $this->GetTemplate('mutuality');  ?>
<?php if (!$article->IsLock && $zbp->Config('tpure')->PostARTICLECMTON=='1') { ?>
    <?php  include $this->GetTemplate('comments');  ?>
<?php } ?>
</div>
<div class="sidebar">
    <?php  include $this->GetTemplate('sidebar3');  ?>
</div>