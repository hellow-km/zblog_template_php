<?php  include $this->GetTemplate('header');  ?>		
<div id="content" class="site-content">	
<div class="clear"></div>
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	
					<article id="page-search"  class="link-page page">
<div class="search">
   <div id="searchbarsy">
	<form id="searchformsy" name="search" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search">
	<input type="text" name="q" placeholder="输入搜索内容"> 
	<button type="submit" id="searchsubmitsy">搜索</button>
	</form>
</div>
            </div>
</article>	
				<ul class="search-page">
				<?php  foreach ( $articles as $article) { ?>
					<li class="search-inf"><?php  echo $article->Time('Y年m月d日');  ?></li>
					<li class="entry-title">
						<a href="<?php  echo $article->Url;  ?>" rel="bookmark" target="_blank"><?php  echo $article->Title;  ?></a>
					</li>
				<?php }   ?>	
		</main><!-- .site-main -->
		<?php  include $this->GetTemplate('pagebar');  ?>	
	</section><!-- .content-area -->
<?php if (($zbp->Config('Blogs')->cebianlanbj !== '3') ) { ?>
<div id="sidebar" class="widget-area">	
<?php  include $this->GetTemplate('sidebar');  ?>	
</div>
<?php } ?>
</div>
	<div class="clear"></div>
</div><!-- .site-content -->
<?php  include $this->GetTemplate('footer');  ?>
