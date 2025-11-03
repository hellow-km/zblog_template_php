<?php  /* Template Name:首页模板(勿选) * Template Type:index */  ?>
<?php  include $this->GetTemplate('header');  ?>
<body class="<?php  echo $type;  ?>">
<div class="wrapper">
    <?php  include $this->GetTemplate('navbar');  ?>
    <div class="main<?php if ($zbp->Config('tpure')->PostFIXMENUON=='1') { ?> fixed<?php } ?>">
        <?php if ($zbp->Config('tpure')->PostBANNERON=='1') { ?>
        <div class="banner"<?php if ($zbp->Config('tpure')->PostBANNER) { ?> style="<?php if (!tpure_isMobile()) { ?>height:<?php  echo $zbp->Config('tpure')->PostBANNERPCHEIGHT ? $zbp->Config('tpure')->PostBANNERPCHEIGHT : 360;  ?>px;<?php }else{  ?>height:<?php  echo $zbp->Config('tpure')->PostBANNERMHEIGHT ? $zbp->Config('tpure')->PostBANNERMHEIGHT : 150;  ?>px;<?php } ?> background-image:url(<?php  echo $zbp->Config('tpure')->PostBANNER;  ?>);"<?php } ?>><div class="wrap"><div class="hellotip"><?php  echo $zbp->Config('tpure')->PostBANNERFONT;  ?></div></div></div>
        <?php } ?>
        <div class="mask"></div>
        <div class="wrap">
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
                <?php  include $this->GetTemplate('sidebar');  ?>
            </div>
        </div>
    </div>
    <?php  include $this->GetTemplate('footer');  ?>