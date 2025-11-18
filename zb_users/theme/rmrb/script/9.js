var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split("&"),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split("=");

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

if (typeof jQuery != "undefined") {
    (function ($) {
        //BEGIN documentReady
        $(function () {
            //鑿滃崟椋庢牸
            NFCHelper.setMenuStyle();
            //begin
            //缁戝畾閾炬帴 鍘绘帀铏氱嚎杈规
            $("a").live("focus", function () {
                if (this.blur) {
                    this.blur();
                }
            });
            $('input[type="button"]').live("focus", function () {
                if (this.blur) {
                    this.blur();
                }
            });

            //BEGIN鏃堕棿
            var _time = Math.round(new Date().getTime() / 1000) + 8 * 60 * 60;
            $(".livetime_time").html($.myTime.UnixToDate(_time, true));
            window.setInterval(function () {
                $(".livetime_time").html($.myTime.UnixToDate(_time++, true));
            }, 1000);
            // $(".livetime_date").html($.myTime.GetCurrentWeekDay()); //鏄熸湡
            //END鏃堕棿

            //鎻愮ず
            $("a.tips-click-200").cluetip({
                width: "200px",
                showTitle: false,
                activation: "click",
                arrows: true,
            });

            //鏄剧ず鍒嗕韩
            //闅愯棌鍒嗕韩
            $(".pr").hover(
                function () {
                    $(this).find(".flow-clt2").show();
                },
                function () {
                    $(this).find(".flow-clt2").hide();
                },
            );

            //鍒嗙被鏍忚闃�
            $(".category-box ul li").hover(
                function () {
                    $(this).find(".categoryListSub").show();
                },
                function () {
                    $(this).find(".categoryListSub").hide();
                },
            );

            //video adjust iframe size
            $("div.article-content-box iframe").wrap(
                '<p class="article_video"></p>',
            );
        });
        //END documentReady
    })(jQuery);
}
