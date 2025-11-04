
<?php  include $this->GetTemplate('header');  ?>
	<div id="content" class="site-content">	
<?php if ($zbp->Config('zbpNana')->DisplayAd1=='1') { ?>
<div id="abcdh" class="abc-pc abc-site">
	<?php if (zbpNana_is_mobile()) { ?>
		<?php  echo $zbp->Config('zbpNana')->Adm1;  ?>
	<?php }else{  ?>
		<?php  echo $zbp->Config('zbpNana')->Ad1;  ?>
	<?php } ?>
</div>
<?php } ?><div id="contentab">	
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ($zbp->Config('zbpNana')->hdpsz_kg=='1') { ?>
		<?php if ($type=='index'&&$page=='1') { ?> 
		<?php  include $this->GetTemplate('slider');  ?>
			<?php } ?>
				<?php } ?>
<div id="post_list_box" class="border_gray">
<?php  foreach ( $articles as $keyd=>$article) { ?>
<?php  include $this->GetTemplate('post-multi');  ?>
<?php }   ?>			
</div>		
</main><!-- .site-main -->
<?php  include $this->GetTemplate('pagebar');  ?>	
	</section><!-- .content-area -->
<?php if (($zbp->Config('zbpNana')->cebianlanbj !== '3') ) { ?><div id="sidebar" class="widget-area">	<?php  include $this->GetTemplate('sidebar');  ?>	</div><?php } ?></div>
<div class="clear"></div>
</div>
<?php  include $this->GetTemplate('footer');  ?>