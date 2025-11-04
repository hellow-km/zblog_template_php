<footer>
{if $type=="index" && $page=="1"}
	<ul class="flink">
		{module:link}
	</ul>
{/if}
 {$copyright}
</footer>
<div class="gotop">&uarr;</div>
<script src="{$host}zb_users/theme/{$theme}/js/scrollReveal.min.js"></script>
<script>
if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
	(function(){
		window.scrollReveal = new scrollReveal({reset: true, move: '30px'});
	})();
};
</script>
</body>
</html>