/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194
*Author:             尔今 erx@qq.com
*update:             2017-12-26(Last:2017-12-26)
-------------------*/
$(function() {
	$(".topnav>li>a").append('<i class="bline"></i>');
	$(window).scroll(function(){
		var scrollht=$(window).scrollTop();
		//Gotop
		if(scrollht>300){
			$(".gotop").fadeIn(500);
		}else{
			$(".gotop").fadeOut(500);
		}
	});
	//Gotop
	$(".gotop").click(function(){
		$("html, body").animate({ scrollTop: 0 },300);
		$(this).fadeOut(300);
	});
	//Comment
	if($("#txaArticle").length){
		document.getElementById("txaArticle").onkeydown = function(e){
			e = e?e:window.event;
			if(e.ctrlKey && 13==e.keyCode){
	   			zbp.comment.post();
			}
		}
	}
});
//Comment
zbp.plugin.unbind("comment.reply", "system");
zbp.plugin.on("comment.reply", "Timeline", function(i) {
	$("#inpRevID").val(i);
	var frm = $('#divCommentPost'),
		cancel = $("#cancel-reply"),
		temp = $('#temp-frm');
	var div = document.createElement('div');
	div.id = 'temp-frm';
	div.style.display = 'none';
	frm.before(div);
	$('#AjaxComment' + i).before(frm);
	frm.addClass("reply-frm");
	cancel.show();
	cancel.click(function() {
		$("#inpRevID").val(0);
		var temp = $('#temp-frm'),
			frm = $('#divCommentPost');
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
zbp.plugin.on("comment.get", "Timeline", function(postid, page) {
	$('span.commentspage').html("Waiting...");
});
zbp.plugin.on("comment.got", "Timeline", function(formData, data, textStatus, jqXhr) {
	$('#AjaxCommentBegin').nextUntil('#AjaxCommentEnd').remove();
	$('#AjaxCommentEnd').before(data);
	$("#cancel-reply").click();
});
zbp.plugin.on("comment.postsuccess", "Timeline", function () {
	$("#cancel-reply").click();
});

//Tips:以上js代码已尽最大可能简写和优化，如无绝对把握，切勿擅自修改！
//wwww.yiwuku.com 尔今(erx@qq.com)