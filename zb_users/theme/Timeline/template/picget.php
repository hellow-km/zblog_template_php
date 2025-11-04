{php}
$pattern="%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s";
if(isset($article->Content)){
	$content = $article->Content;
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0]))
	$temp=$matchContent[1][0];
	else
	$temp=$zbp->host."zb_users/theme/$theme/images/nopic.gif";
}
if(isset($toparticle->Content)){
	$content = $toparticle->Content;
	preg_match_all($pattern,$content,$matchContent);
	if(isset($matchContent[1][0]))
	$topp=$matchContent[1][0];
	else
	$topp=$zbp->host."zb_users/theme/$theme/images/nopic.gif";
}
{/php} 