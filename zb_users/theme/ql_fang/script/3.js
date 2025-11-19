$(function () {
    $(".tab-option a").hover(function () {
        $(this).siblings().removeClass("cur");
        $(this).addClass("cur");
        $(this).parent().siblings(".tab-content").hide();
        $(this).parent().siblings(".tab-content").eq($(this).index()).show();
    });
});

$(function () {
    var len = $(".slider li").length;
    var index = 0;
    var picTimer;

    $(".slider-control li").mouseover(function () {
        index = $(".slider-control li").index(this);
        showPics(index);
    });

    $(".slider-wrapper")
        .hover(
            function () {
                clearInterval(picTimer);
            },
            function () {
                picTimer = setInterval(function () {
                    showPics(index);
                    index++;
                    if (index == len) {
                        index = 0;
                    }
                }, 5000);
            },
        )
        .trigger("mouseleave");

    //鏄剧ず鍥剧墖鍑芥暟锛屾牴鎹帴鏀剁殑index鍊兼樉绀虹浉搴旂殑鍐呭
    index = index + 1;
    function showPics(index) {
        $(".slider li").hide();
        $(".slider li").stop().eq(index).fadeIn(300);
        $(".slider-control li").removeClass("cur").eq(index).addClass("cur"); //涓哄綋鍓嶇殑鎸夐挳鍒囨崲鍒伴€変腑鐨勬晥鏋�
        $(".image-info li").hide();
        $(".image-info li").stop().eq(index).fadeIn(300);
    }
});
