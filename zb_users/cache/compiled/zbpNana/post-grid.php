
<?php  include $this->GetTemplate('header');  ?>
	<div id="content" class="site-content">
		<div class="clear"></div>
		<div id="primarys" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="clear"></div>		
		<div class="cat-box">
			<div class="cat-site">
				<ul class="cat-one-list">
					
		<?php  foreach ( $articles as $article) { ?>
				<div class="cat-lists">						
						<div class="item-st">					
						<div class="thimg">
						<span class="pic-num"><?php echo zbpNana_get_post_images_number($article->ID) ?>图</span>	
						<?php echo zbpNana_thumbnail($article->ID,280,210,1); ?>	
						</div>
						<h3><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h3>						
						<div class="pricebtn">
								<span class="date"><?php  echo $article->Time('Y-m-d');  ?></span>
								<span class="views">  阅读 <?php  echo $article->ViewNums;  ?> 次  </span></div>
						</div>					
					</div>							
			<?php }   ?>	
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>				
		</main><!-- .site-main -->
		<?php  include $this->GetTemplate('pagebar');  ?>	
	</div><!-- .content-area -->
<div class="clear"></div>
	</div><!-- .site-content -->				
<?php  include $this->GetTemplate('footer');  ?>