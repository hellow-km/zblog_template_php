<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta charset="utf-8">
<title>本站开启了验证码保护</title>

<style type="text/css">
html{background-color:#FFF;}body,button,input{font:14px/20px "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif}body{color:#585858;letter-spacing:1px;margin: 0;}i{font-style:normal}p{margin:0}a{color:#007aff;text-decoration:none}a:hover{color:#0065ea;text-decoration:underline}button,i,img,input{vertical-align:middle}.tc{text-align:center}.auto{margin:0 auto}.mb20{margin-bottom:20px}.fl{float:left;display:inline}.oh{overflow:hidden}.fr{float:right}.i1{display:inline-block;margin-right:10px;width:80px;height:80px;border:1px solid #007aff;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%}.i1 img{margin-top:18px}.i2,.i2 span{position:absolute}.i2{left:123px;margin-top:-1px;bottom:-.5em;color:#dcdcdc;font:20px/1em Arial,Helvetica,sans-serif}.i2 span{color:#FFF;left:0;top:2px}.hd{font-weight:400;padding:20px 0;width:100%;margin-top:10%;border-bottom:1px solid #dcdcdc;position:relative}.bd{width:350px}.int1{border:1px solid #DDD;line-height:20px;padding:5px 10px;width:10em}.int1:focus{border-color:#007aff}.btn1{display:block;width:95%;line-height:20px;padding:5px 0;background-color:#007aff;color:#FFF;border:none 0}.btn1:hover{background-color:#0065ea}.p2_s1 img{margin:0 20px}.p2_s2{padding-top:5px}.p3{font-size:12px;color:#737373;margin-top:30px}.p2_mm{position: absolute;line-height: 32px;margin-left: 10px;}.p2_mm a{text-decoration: none;background-color: #007aff;color: #FFF;padding: 6px 49px;}footer {position: absolute;bottom: 0;width: 100%;background-color: #f9f9f9; /* 背景颜色 */padding: 10px 0; /* 内边距 */text-align: center;}
</style>


</head>
<body>
<h1 class="hd auto tc mb20"><i class="i1"><img src="{$host}zb_users/plugin/TY_Pass/demo/download.png" width="39" height="48" src="22"></i>本站开启了密码保护<i class="i2">◆<span>◆</span></i></h1>
<form id="captcha_form" class="bd auto" method="post" action="{$host}zb_users/plugin/TY_Pass/get.php">
<p class="mb20">请输入密码，继续浏览网站!</p>
<p class="mb20 oh">
<span class="fl p2_s1">
<input type="text" name="expressid" placeholder="密码" class="int1" autocomplete="off">
</span>
{if $zbp->Config('TY_Pass')->url}
<span class="p2_mm"><a href="{$zbp->Config('TY_Pass')->url}" target="_blank">获取密码</a></span>
{/if}

</p>
<button type="submit" class="btn1">提交密码</button>
</form>
<footer>
{$copyright}
</footer>
</body></html>