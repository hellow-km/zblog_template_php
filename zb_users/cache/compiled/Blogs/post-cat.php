<?php  include $this->GetTemplate('header');  ?>
	<div id="content" class="site-content">	
	<div class="clear"></div>
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div id="post_list_box" class="border_gray">
<?php  foreach ( $articles as $keyd=>$article) { ?>
<?php  include $this->GetTemplate('post-multi');  ?>
<?php }   ?>			
</div>		
</main><!-- .site-main -->
<?php  include $this->GetTemplate('pagebar');  ?>	
	</section><!-- .content-area -->
<?php if (($zbp->Config('Blogs')->cebianlanbj !== '3') ) { ?><div id="sidebar" class="widget-area">	<?php  include $this->GetTemplate('sidebar');  ?>	</div><?php } ?>
<div class="clear"></div>
</div>
<?php  include $this->GetTemplate('footer');  ?>