// JavaScript Document
document.write(
    "<style>.pages{text-align:center;font-family:arial; list-style:none}.pages a{text-decoration:none;}.pages li{display:inline-block; border:1px #1BB8FA solid;padding:3px 6px!important;margin:2px!important; background:none;width:15px!important;/*height:25px!important;*/}.pages li a{font-weight:normal!important;}.pages li:hover{background-color:#ccc;color:#1E90FF}.pages .page-active{background-color:#1BB8FA;}.pages .page-previous{width:55px!important;}.pages .page-next{width:55px!important;}.pages .page-all{width:65px!important;}#autopage{text-align:center;font-family:arial;}#autopage a{text-decoration:none;display:inline-block; border:1px #ddd solid;padding:3px 6px;margin:2px;}#autopage a:hover{background-color:#ccc;color:#1E90FF}#autopage span{background-color:#ccc;display:inline-block; border:1px #ddd solid;padding:3px 6px;margin:2px;}</style>",
);

$().ready(function () {
    str = "<li class='page'>...</li>";
    pages = $("ul.pages").attr("pages");
    cur = $(".page-active").text();
    cur = Number(cur); //杞负鏁板瓧
    if (pages > 10) {
        $("li.page").hide();
        $("li.page-previous").hide();
        $("li.page-next").hide();
        $("li.page1").show();
        if (cur > 5 && cur < pages - 4) {
            $("li.page" + (cur - 3)).show();
            $("li.page" + (cur - 2)).show();
            $("li.page" + (cur - 1)).show();
            $("li.page-active").show();
            $("li.page" + (cur + 1)).show();
            $("li.page" + (cur + 2)).show();
            $("li.page" + (cur + 3)).show();
            $("li.page" + pages).show();
            $("li.page1").after(str);
            $("li.page" + pages).before(str);
        } else if (cur <= 5) {
            $("li.page1").show();
            $("li.page2").show();
            $("li.page3").show();
            $("li.page4").show();
            $("li.page5").show();
            $("li.page6").show();
            $("li.page7").show();
            $("li.page8").show();
            $("li.page" + pages).show();
            $("li.page" + pages).before(str);
        } else {
            $("li.page" + (pages - 7)).show();
            $("li.page" + (pages - 6)).show();
            $("li.page" + (pages - 5)).show();
            $("li.page" + (pages - 4)).show();
            $("li.page" + (pages - 3)).show();
            $("li.page" + (pages - 2)).show();
            $("li.page" + (pages - 1)).show();
            $("li.page" + pages).show();
            $("li.page1").after(str);
        }
    }
});
