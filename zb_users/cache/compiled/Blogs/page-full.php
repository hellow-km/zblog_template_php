<?php  /* Template Name:全面页面（无侧边栏） */  ?> 
<?php  include $this->GetTemplate('header');  ?>
<div id="content" class="site-content pagefull">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php  include $this->GetTemplate('post-page');  ?>
	</div><!-- .content-area -->
</div>
<div class="clear"></div>
</div><!-- .site-content -->
<?php  include $this->GetTemplate('footer');  ?>