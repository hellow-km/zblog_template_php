/**
 * Created by ShiQiWen on 2018/12/3.
 */
$(function () {
    window.newsListPageNum = 2;
    if (_) {
        _.formatTime = function (time) {
            time = typeof time !== "number" ? +time : time;
            var str = "",
                date = new Date(time),
                now = _.now(),
                interval = now - time,
                sevenDaysMill = 7 * 24 * 60 * 60 * 1000,
                thirdDaysMill = 3 * 24 * 60 * 60 * 1000,
                twoDaysMill = 2 * 24 * 60 * 60 * 1000,
                oneDaysMill = 24 * 60 * 60 * 1000,
                oneHourMill = 60 * 60 * 1000;
            if (interval >= sevenDaysMill) {
                str =
                    date.getFullYear() +
                    "-" +
                    (date.getMonth() + 1) +
                    "-" +
                    date.getDate();
            } else if (interval >= thirdDaysMill) {
                str = "3澶╁墠";
            } else if (interval >= twoDaysMill) {
                str = "鍓嶅ぉ";
            } else if (interval > oneDaysMill) {
                str = "鏄ㄥぉ";
            } else if (interval >= oneHourMill && interval <= oneDaysMill) {
                str = Math.floor(interval / 1000 / 60 / 60) + "灏忔椂鍓�";
            } else if (interval / 1000 / 60 > 1 && interval < oneHourMill) {
                str = Math.floor(interval / 1000 / 60) + "鍒嗛挓鍓�";
            } else {
                str = "鍒氬垰";
            }
            return str;
        };
        _.formatTcount = function (tcount) {
            tcount = typeof tcount !== "number" ? +tcount : tcount;
            if (tcount >= 10000) {
                tcount = tcount / 10000;
                tcount =
                    Math.round((tcount || 0) * Math.pow(10, 1 || 0)) /
                        Math.pow(10, 1 || 0) +
                    "涓�";
            }
            return tcount;
        };
    }
    //initData();
    initPageEvents();
    function initPageEvents() {
        var $win = $(window),
            $newsNav = $(".news-nav"),
            newsContentOffsetTop = $newsNav.offset().top,
            $newsNavList = $newsNav.find(".nav-list"),
            $newsSlider = $(".news-slider"),
            $loadBtn = $(".load-btn"),
            $mainWrapper = $("#mainWrapper"),
            $backTopBtn = $(".back-top-btn"),
            $scrollEle = $("html,body"),
            winHeight = $win.height(),
            backTopLeft =
                $mainWrapper.offset().left + $mainWrapper.width() + 10;
        $newsSlider
            .hover(
                function () {
                    var $this = $(this);
                    $this.addClass("slider-hover");
                },
                function () {
                    var $this = $(this);
                    $this.removeClass("slider-hover");
                },
            )
            .slide({
                mainCell: ".slider-list",
                titCell: ".slider-index",
                effect: "left",
                autoPage: true,
                autoPlay: true,
                prevCell: ".prev-btn",
                nextCell: ".next-btn",
            });
        $(".sctop-help").hover(
            function () {
                $(this).addClass("current");
            },
            function () {
                $(this).removeClass("current");
            },
        );
        $(".media-list")
            .find(".wx,.wb")
            .hover(
                function () {
                    var $this = $(this),
                        $mediaIcon = $this.find(".media-icon"),
                        $qrcodeImg = $this.find("img");
                    $qrcodeImg.css("display", "block");
                    $mediaIcon.css("display", "none");
                },
                function () {
                    var $this = $(this),
                        $mediaIcon = $this.find(".media-icon"),
                        $qrcodeImg = $this.find("img");
                    $qrcodeImg.css("display", "none");
                    $mediaIcon.css("display", "block");
                },
            );
        $win.on("scroll", function () {
            var scrollTop = $win.scrollTop();
            if (scrollTop >= newsContentOffsetTop) {
                $newsNavList.addClass("fixed-list");
            } else {
                $newsNavList.removeClass("fixed-list");
            }
            if (scrollTop > winHeight * 1.5) {
                $backTopBtn.fadeIn();
            } else {
                $backTopBtn.fadeOut();
            }
        });
        $loadBtn.click(function () {
            var $this = $(this),
                $activeNavItem = $(".news-nav .active");
            if (!$this.hasClass("loading")) {
                $this
                    .addClass("loading")
                    .find("span")
                    .text("鏁版嵁鍔犺浇涓�...");
                getData({
                    chname: $activeNavItem.data("chname"),
                    catid: $activeNavItem.data("catid"),
                });
            }
        });
        $backTopBtn.css("left", backTopLeft + "px").on("click", function () {
            $scrollEle.animate({ scrollTop: 0 });
        });
        $("#newsListContainer")
            .find("img.lazy")
            .lazyload({ effect: "fadeIn", placeholder: null });
    }
    function initData() {
        var $activeNavItem = $(".news-nav .active");
        getData({
            chname: $activeNavItem.data("chname"),
            catid: $activeNavItem.data("catid"),
        });
    }
    function getData(listReqData) {
        $.when(getListData(listReqData), getAdData()).always(function () {
            var listData = window.listData || {},
                adData = window.adData || {},
                $loadBtn = $(".load-btn");
            $loadBtn.removeClass("loading");
            if (
                listData.status === 1 &&
                listData.list &&
                listData.list.length
            ) {
                renderList(listData.list, adData.list);
                if (listData.page === listData.pagecount) {
                    $loadBtn
                        .hide()
                        .after(
                            '<div class="no-more-data">鎵€鏈夋暟鎹姞杞藉畬姣曪紒</div>',
                        );
                } else {
                    $loadBtn.find("span").text("鍔犺浇鏇村");
                }
            } else if (listData.status === 0) {
                $loadBtn
                    .hide()
                    .after('<div class="no-more-data">鏆傛棤鏁版嵁锛�</div>');
            } else {
                $loadBtn.find("span").text("鍔犺浇鏇村");
            }
            window.listData = null;
            window.adData = null;
        });
    }
    function getListData(reqData) {
        var dtd = $.Deferred();
        reqData["page"] = window.newsListPageNum++;
        if (window.as) {
            reqData["as"] = window.as;
        }
        $.ajax({
            url: "//news.guilinlife.com/api/channel/",
            data: reqData,
            dataType: "jsonp",
            success: function (data) {
                window.listData = data;
                dtd.resolve();
            },
            error: function () {
                window.newsListPageNum--;
                dtd.reject();
            },
        });
        return dtd;
    }
    function getAdData() {
        var url = "//m.guilinlife.com/home/?m=touch&a=ads",
            dtd = $.Deferred();
        if (window.areaid) {
            url = url + "&areaid=" + window.areaid;
        }
        $.ajax({
            url: url,
            dataType: "jsonp",
            success: function (data) {
                window.adData = data;
                dtd.resolve();
            },
            error: function () {
                dtd.reject();
            },
        });
        return dtd;
    }
    function renderList(list1, list2) {
        var $html,
            html = "",
            compiled1 = _.template($("#tpl1").html()),
            compiled2 = _.template($("#tpl2").html()),
            compiled3 = _.template($("#tpl3").html());
        _.each(list1, function (item1, i) {
            var dataType = item1.imgsrctype;
            if (dataType === 0 || dataType === 3 || dataType === 4) {
                html += compiled2({ data: item1 });
            } else if (dataType === 1) {
                html += compiled1({ data: item1 });
            } else if (dataType === 2) {
                html += compiled3({ data: item1 });
            }
            if (list2) {
                _.each(list2, function (item2) {
                    var adType = item2.adtype,
                        pos = item2.position;
                    if (pos - 2 === i) {
                        if (adType === 3 || adType === 4) {
                            html += compiled2({ data: item2 });
                        } else if (adType === 1) {
                            html += compiled1({ data: item2 });
                        } else if (adType === 2) {
                            html += compiled3({ data: item2 });
                        }
                    }
                });
            }
        });
        $html = $(html);
        $("#newsListContainer").append($html);
        $html
            .find("img.lazy")
            .lazyload({ effect: "fadeIn", placeholder: null });
    }
});
