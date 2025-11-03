<?php  /* Template Name:列表页模板 * Template Type:list,author */  ?>
<?php  include $this->GetTemplate('header');  ?>
<body class="<?php  echo $type;  ?>">
<div class="wrapper">
    <?php  include $this->GetTemplate('navbar');  ?>
    <div class="main<?php if ($zbp->Config('tpure')->PostFIXMENUON=='1') { ?> fixed<?php } ?>">
        <div class="mask"></div>
        <div class="wrap">
        <?php if ($zbp->Config('tpure')->PostSITEMAPON=='1') { ?>
            <div class="sitemap"><?php  echo $lang['tpure']['sitemap'];  ?><a href="<?php  echo $host;  ?>"><?php  echo $lang['tpure']['index'];  ?></a>
<?php if ($type == 'category') { ?>
<?php  echo tpure_navcate($category->ID);  ?>
<?php }else{  ?>
> <?php  echo $title;  ?>
<?php } ?>
            </div>
            <?php } ?>
            <div>
                <div class="content">
                    <div class="block">
                        <?php  foreach ( $articles as $article) { ?>
                            <?php if ($article->IsTop) { ?>
                            <?php  include $this->GetTemplate('post-istop');  ?>
                            <?php }else{  ?>
                            <?php  include $this->GetTemplate('post-multi');  ?>
                            <?php } ?>
                        <?php }   ?>
                    </div>
                    <?php if ($pagebar && $pagebar->PageAll > 1) { ?>
                    <div class="pagebar">
                        <?php  include $this->GetTemplate('pagebar');  ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="sidebar">
                    <?php  include $this->GetTemplate('sidebar2');  ?>
                </div>
            </div>
        </div>
    </div>
    <?php  include $this->GetTemplate('footer');  ?>