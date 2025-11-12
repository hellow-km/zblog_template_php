$(function(){
	$('.nav ul li').mouseover(function(){
		$(this).children('ul').show();
	}).mouseleave(function(){
		$(this).find('ul').hide();
	});
	$('#navbtn').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.nav').removeClass('show');
		}else{
			$(this).addClass('active');
			$('.nav').addClass('show');
		}
	});
});
zbp.plugin.unbind("comment.reply", "system");
zbp.plugin.on("comment.reply", "zbpblueblog", function(id) {
	var i = id;
	$("#inpRevID").val(i);
	var frm = $('#comment'),
		cancel = $("#cancel-reply");

	frm.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");
	$('#AjaxComment' + i).before(frm);

	cancel.show().click(function() {
		var temp = $('#temp-frm');
		$("#inpRevID").val(0);
		if (!temp.length || !frm.length) return;
		temp.before(frm);
		temp.remove();
		$(this).hide();
		frm.removeClass("reply-frm");
		return false;
	});
	try {
		$('#txaArticle').focus();
	} catch (e) {}
	return false;
});

zbp.plugin.on("comment.get", "zbpblueblog", function (logid, page) {
	$('span.commentspage').html("Waiting...");
	$.get(bloghost + "zb_system/cmd.php?act=getcmt&postid=" + logid + "&page=" + page, function(data) {
		$('#AjaxCommentBegin').nextUntil('#AjaxCommentEnd').remove();
		$('#AjaxCommentEnd').before(data);
		$("#cancel-reply").click();
	});
})

zbp.plugin.on("comment.postsuccess", "zbpblueblog", function () {
	$("#cancel-reply").click();
});
