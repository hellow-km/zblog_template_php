<footer>
<?php if ($type=="index" && $page=="1") { ?>
	<ul class="flink">
		<?php  if(isset($modules['link'])){echo $modules['link']->Content;}  ?>
	</ul>
<?php } ?>
 <?php  echo $copyright;  ?>
</footer>
<div class="gotop">&uarr;</div>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/js/scrollReveal.min.js"></script>
<script>
if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
	(function(){
		window.scrollReveal = new scrollReveal({reset: true, move: '30px'});
	})();
};
</script>
<?php  echo $footer;  ?></body>
</html>