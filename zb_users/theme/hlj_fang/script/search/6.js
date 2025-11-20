$(function () {
    ucSearch = new UcSearch();
});
function UcSearch() {
    this.init();
}
function getCookie(name) {
    var strCookie = document.cookie;
    var arrCookie = strCookie.split("; ");
    for (var i = 0; i < arrCookie.length; i++) {
        var arr = arrCookie[i].split("=");
        if (arr[0] == name) return arr[1];
    }
    return "";
}

UcSearch.prototype = {
    textReg: /<\/?[^>]+>/g,
    spaceReg: /\s/g,
    datepicker: {
        language: "zh-CN",
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true,
        clearBtn: true,
    },
    init: function () {
        this.search(0);
        $(".select-search").on("click", "#search-img", this.searchClick);
        $(".select-search").on("keydown", "#search-input", this.keydown);
        $("#search-senior").on("click", this.searchParentShow);
        $(".search-btn").on("click", "button", this.searchActive);
        $(".search-remove").on("click", this.removeClick);
        $(".search-target").on("input", this.removeShow);
        $(".date-picker").datepicker(this.datepicker);
    },
    search: function (currentPage, params) {
        var url =
            document.location.protocol +
            "//" +
            window.location.host +
            "/xy/Search.do";
        var pagesize = 20;
        var keywords = $.trim($("#search-input").val());
        //var siteID = document.cookie.split("=")[1];
        var siteID = getCookie("xy_search_siteID");
        var paperID = getCookie("xy_search_paperID");
        var nodeID = getCookie("xy_search_nodeID");
        var param = null;
        if (paperID > 0) {
            param = {
                q: keywords,
                pageNo: currentPage,
                pageSize: pagesize,
                channel: 1,
                siteID: siteID,
                sort: "date",
                paperID: paperID,
            };
        } else {
            if (nodeID > 0) {
                param = {
                    q: keywords,
                    pageNo: currentPage,
                    pageSize: pagesize,
                    channel: 1,
                    sort: "date",
                    siteID: siteID,
                    nodeID: nodeID,
                };
            } else {
                param = {
                    q: keywords,
                    pageNo: currentPage,
                    pageSize: pagesize,
                    channel: 1,
                    sort: "date",
                    siteID: siteID,
                };
            }
        }
        if (params) {
            param = $.extend(true, param, params);
            // delete param['content'];
        } else {
        }
        $.post(url, param, function (data, textStatus, xhr) {
            if (data != null) {
                var json = data;
                var contents = "";
                var titleKeywords,
                    contKeywords,
                    authorKeywords,
                    keyWord,
                    channel;
                if (params) {
                    $("#omission").html("绗﹀悎涓婇潰楂樼骇鎼滅储鏉′欢");
                    titleKeywords = param.title;
                    contKeywords = param.content;
                    authorKeywords = param.author;
                    keyWord = param.keyWord;
                } else {
                    $("#omission").html(ucSearch.omission(keywords, 10));
                    titleKeywords = keywords;
                    contKeywords = keywords;
                    authorKeywords = keywords;
                    keyWord = keywords;
                }
                $("#news-number").html(json.foundNum);
                if (json.foundNum && json.article.length) {
                    var list = json.article;
                    var totalPages =
                        json.foundNum % pagesize
                            ? parseInt(json.foundNum / pagesize) + 1
                            : parseInt(json.foundNum / pagesize);
                    $.each(list, function (index, val) {
                        contents +=
                            "<li>" +
                            '<a target="_blank" href="' +
                            val.url +
                            '">' +
                            "<h2>" +
                            ucSearch.turnRed(val.title, titleKeywords) +
                            "</h2>" +
                            '<div class="search-content">' +
                            "<p>" +
                            ucSearch.turnRed(
                                ucSearch.filterText(
                                    val.enpcontent,
                                    contKeywords,
                                ),
                                contKeywords,
                            ) +
                            "</p>" +
                            "</div>" +
                            '<div class="corner clearfix">' +
                            '<span class="pull-right">' +
                            ucSearch.dateChange(val.date) +
                            "</span>" +
                            '<span class="pull-right">' +
                            ucSearch.turnRed(val.author, authorKeywords) +
                            "</span>" +
                            "</div>" +
                            "</a>" +
                            "</li>";
                    });
                    if (currentPage == 0) {
                        ucSearch.paginator(1, totalPages);
                    } else {
                        ucSearch.paginator(currentPage, totalPages);
                    }
                    // ucSearch.paging(currentPage, totalPages);
                    $("#search-about").show();
                } else {
                    contents = "<h1>未搜索到结果</h1>";
                    $("#pagin").html("");
                    $("#search-about").hide();
                }

                $("html, body").scrollTop(0);
            }
        });
    },
    omission: function (str, num) {
        return str.length > num ? str.slice(0, num) + "..." : str;
    },
    keydown: function (ev) {
        if (ev.keyCode == 13) {
            ucSearch.search(1);
        }
    },
    removeShow: function () {
        if ($(this).val() == "") {
            $(this).parent().find("strong").hide();
        } else {
            $(this).parent().find("strong").show();
        }
    },
    removeClick: function () {
        $(this).siblings("input").val("");
        $(this).hide();
    },
    searchClick: function () {
        ucSearch.search(1);
    },
    getParams: function () {
        if ($(".search-senior").is(":hidden")) {
            return null;
        }
        var startDate = new Date(
                $('.search-range input[name="startDate"]').val(),
            ).getTime(),
            endDate = new Date(
                $('.search-range input[name="endDate"]').val(),
            ).getTime();
        if (startDate > endDate) {
            alert(
                "瀵逛笉璧凤紝鍙戣〃鏃堕棿鐨勫紑濮嬫椂闂翠笉鑳藉ぇ浜庣粨鏉熸椂闂�",
            );
            return false;
        }
        var params = {};
        $(".search-senior input, .search-senior select").each(
            function (index, el) {
                params[this.name] = $.trim($(this).val());
            },
        );
        params.title = params.title;
        params.content = params.content;
        params.author = params.author;
        params.keyword = params.keyword;
        return params;
    },
    searchParentShow: function () {
        $(this)
            .parent()
            .fadeOut(0)
            .siblings()
            .fadeIn(500)
            .find(".search-btn button:first-child")
            .addClass("search-active")
            .siblings()
            .removeClass("search-active");
        $("#search-input").val("");
        $("#pagin").html("");
        $(".search-target").val("");
        $(".search-target").siblings(".search-remove").css("display", "none");

        $("#search-about").hide();
    },
    searchActive: function () {
        $(this)
            .addClass("search-active")
            .siblings()
            .removeClass("search-active");
        if (this.id === "advanced-search") {
            var params = ucSearch.getParams();
            if (
                params.title == "" &&
                params.content == "" &&
                params.author == "" &&
                params.keyword == ""
            ) {
                return false;
            }
            ucSearch.search(1, params);
        } else {
            $(this)
                .parents(".search-senior")
                .fadeOut(0)
                .siblings()
                .fadeIn(500)
                .find("input")
                .trigger("focus");
            $("#search-input").val("");
            $("#pagin").html("");
            $(".search-target").val("");
            $(".search-target")
                .siblings(".search-remove")
                .css("display", "none");

            $("#search-about").hide();
        }
    },
    dateChange: function (dateCg) {
        var dateArr = [];
        if (dateCg.split("-")) {
            dateArr = dateCg.split("-");
        }
        return dateArr[0] + "骞�" + dateArr[1] + "鏈�" + dateArr[2] + "鏃�";
    },
    filterText: function (content, contKeywords) {
        var content = content;
        var sentence = content
            .replace(this.textReg, "")
            .replace(this.spaceReg, "");
        var textIndex = sentence.indexOf(contKeywords);
        if (textIndex > -1) {
            var content = sentence.slice(textIndex, textIndex + 150);
            if (content.length < 150) {
                content =
                    sentence.slice(
                        textIndex - (150 - content.length),
                        textIndex,
                    ) + content;
            } else {
                content =
                    content + sentence.slice(textIndex + 150, textIndex + 200);
            }
            content = "..." + content + "...";
        } else {
            content =
                content
                    .replace(this.textReg, "")
                    .replace(this.spaceReg, "")
                    .slice(0, 200) + "...";
        }
        return content;
    },
    turnRed: function (content, target) {
        if (!target) return content;
        var redReg = new RegExp(target, "gm");
        return content.replace(
            redReg,
            '<span class="search-red">' + target + "</span>",
        );
    },
    paginator: function (currentPage, totalPages) {
        var num = 8;
        var options = {
            bootstrapMajorVersion: 3,
            currentPage: currentPage,
            numberOfPages: totalPages > num ? num : totalPages,
            totalPages: totalPages,
            size: "normal",
            itemTexts: function (type, page, current) {
                switch (type) {
                    case "first":
                        return "棣栭〉";
                    case "prev":
                        return "涓婁竴椤�";
                    case "next":
                        return "涓嬩竴椤�";
                    case "last":
                        return "鏈〉";
                    case "page":
                        return page;
                }
            },
            itemContainerClass: function (type, page, current) {
                return page === current ? "active" : "pointer-cursor";
            },
            tooltipTitles: function (type, page, current) {
                switch (type) {
                    case "first":
                        return "璺宠浆鍒伴椤�";
                    case "prev":
                        return "璺宠浆鍒颁笂涓€椤�";
                    case "next":
                        return "璺宠浆鍒颁笅涓€椤�";
                    case "last":
                        return "璺宠浆鍒版湯椤�";
                    case "page":
                        return page === current
                            ? "褰撳墠椤甸潰鏄" + page + "椤�"
                            : "璺宠浆鍒扮" + page + "椤�";
                }
            },
            pageUrl: function (type, page, current) {
                return "javascript:;";
            },
            onPageClicked: function (e, originalEvent, type, page) {
                var params = ucSearch.getParams();
                ucSearch.search(page, params);
            },
        };
        $("#pagin").bootstrapPaginator(options);
    },
};
