<?php  include $this->GetTemplate('header');  ?>
<div id="content" class="site-content">	
<div class="clear"></div>
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ($article->Type==0) { ?>
        <?php  include $this->GetTemplate('post-single');  ?>
            <?php }else{  ?>
            <?php  include $this->GetTemplate('post-page');  ?>
            <?php } ?>	
	</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php if (($zbp->Config('Blogs')->cebianlanbj !== '3') ) { ?>
<div id="sidebar" class="widget-area">	
<?php  include $this->GetTemplate('sidebar2');  ?>	
</div>
<?php } ?>
</div>
<div class="clear"></div>
<?php  include $this->GetTemplate('footer');  ?>