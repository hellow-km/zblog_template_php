<?php  /* Template Name:文章页/单页模板 * Template Type:single */  ?>
<?php  include $this->GetTemplate('header');  ?>
<body class="<?php  echo $type;  ?>">
<div class="wrapper">
    <?php  include $this->GetTemplate('navbar');  ?>
    <div class="main<?php if ($zbp->Config('tpure')->PostFIXMENUON=='1') { ?> fixed<?php } ?>">
        <div class="mask"></div>
        <div class="wrap">
            <?php if ($zbp->Config('tpure')->PostSITEMAPON=='1') { ?>
            <div class="sitemap"><?php  echo $lang['tpure']['sitemap'];  ?><a href="<?php  echo $host;  ?>"><?php  echo $zbp->Config('tpure')->PostSITEMAPTXT ? $zbp->Config('tpure')->PostSITEMAPTXT : $lang['tpure']['index'];  ?></a> &gt;
                <?php if ($type=='article') { ?><?php if (is_object($article->Category) && $article->Category->ParentID) { ?><a href="<?php  echo $article->Category->Parent->Url;  ?>"><?php  echo $article->Category->Parent->Name;  ?></a> &gt;<?php } ?> <a href="<?php  echo $article->Category->Url;  ?>"><?php  echo $article->Category->Name;  ?></a> &gt; <?php if ($zbp->Config('tpure')->PostSITEMAPSTYLE == '1') { ?><?php  echo $article->Title;  ?><?php }else{  ?><?php  echo $lang['tpure']['text'];  ?><?php } ?><?php }elseif($type=='page') {  ?><?php  echo $article->Title;  ?><?php } ?>
            </div>
            <?php } ?>
            <?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
                <?php  include $this->GetTemplate('post-single');  ?>
            <?php }else{  ?>
                <?php  include $this->GetTemplate('post-page');  ?>
            <?php } ?>
        </div>
    </div>
    <?php  include $this->GetTemplate('footer');  ?>