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
    oldParams: {},
    nodeID: "",
    datepicker: {
        language: "zh-CN",
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true,
        clearBtn: true,
    },
    init: function () {
        this.search(0);
        this.setNodeList();
        $(".node-list-all").on("click", this.nodeAllClick);
        $(".node-list-item").on("click", "li", this.nodeListClick);
        $(".simple-search-btn").on("click", this.searchClick);
        $(".select-search").on("click", "#search-img", this.searchClick);
        $(".select-search").on("keydown", "#search-input", this.keydown);
        $(".search-tab").on("click", "li", this.searchTabClick);
        $("#search-senior").on("click", this.searchParentShow);
        $(".advanced-search-btn").on("click", this.searchActive);
        $(".search-remove").on("click", this.removeClick);
        $(".search-target").on("input", this.removeShow);
        $(".date-picker").datepicker(this.datepicker);
        $("#reset-condition").on("click", this.resetCondition);
        $(".simple-result-search-btn").on(
            "click",
            this.resultSearch.bind(this),
        );
        $(".advanced-result-search-btn").on(
            "click",
            this.resultSearch.bind(this),
        );
        $("#sort-type").on("click", "strong", this.sortType);
        $("#sort-type").on("click", "span", this.dateUpDown);
        // $('#search-senior').trigger('click');
    },
    setNodeList: function () {
        var nodeUrl =
            document.location.protocol +
            "//" +
            window.location.host +
            "/xy/NodeList.do";
        var siteID = getCookie("xy_search_siteID");
        var nodeListStr = "";
        $.ajax({
            type: "get",
            url: nodeUrl,
            data: { siteID: siteID },
            dataType: "json",
            success: function (response) {
                if (response) {
                    $.each(response, function (index, value) {
                        nodeListStr +=
                            '<li class="pull-left" colId="' +
                            value.colID +
                            '">' +
                            value.colName +
                            "锛�" +
                            value.artCount +
                            "锛�</li>";
                    });
                    $(".node-list-item").html(nodeListStr);
                }
            },
        });
    },
    nodeAllClick: function () {
        $(".node-list-item li.node-select").removeClass("node-select");
        $(this).addClass("node-select");
        ucSearch.nodeID = "";
        var params = ucSearch.getParams();
        ucSearch.search(1, params);
    },
    nodeListClick: function () {
        $(".node-list-all").removeClass("node-select");
        $(this).addClass("node-select").siblings().removeClass("node-select");
        ucSearch.nodeID = $(this).attr("colId");
        var params = ucSearch.getParams();
        ucSearch.search(1, params);
    },
    sortType: function () {
        $(this).addClass("active-sort").siblings().removeClass("active-sort");
        if ($(this).hasClass("sort-date")) {
            $(this)
                .find(".glyphicon-arrow-down")
                .show()
                .siblings(".glyphicon")
                .hide();
        } else {
            $(".sort-date .glyphicon").hide();
        }
        ucSearch.searchAgain();
    },
    dateUpDown: function () {
        $(this).hide().siblings(".glyphicon").show();
        ucSearch.searchAgain();
        return false;
    },
    searchAgain: function () {
        if ($("#search-normal").hasClass("tab-active")) {
            this.search(1);
        } else {
            this.searchActive();
        }
    },
    resultSearch: function () {
        var params = this.getParams();
        this.search(1, params, true);
    },
    search: function (currentPage, params, isResultSearch) {
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
                sort: "",
                paperID: paperID,
            };
        } else {
            if (nodeID > 0) {
                param = {
                    q: keywords,
                    pageNo: currentPage,
                    pageSize: pagesize,
                    channel: 1,
                    sort: "",
                    siteID: siteID,
                    nodeID: nodeID,
                };
            } else {
                param = {
                    q: keywords,
                    pageNo: currentPage,
                    pageSize: pagesize,
                    channel: 1,
                    sort: "",
                    siteID: siteID,
                    nodeID: this.nodeID,
                };
            }
        }
        if (params) {
            param = $.extend(true, param, params);
            // delete param['content'];
        } else {
            if (keywords === "" && this.nodeID === "") {
                $("#search-result").html(
                    "<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>",
                );
                $("#pagin").html("");
                $(
                    "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
                ).hide();
                this.oldParams = {};
                return false;
            }
        }
        if (isResultSearch) {
            if ($("#search-normal").hasClass("tab-active")) {
                param.q = this.getNotRepeating(param.q, this.oldParams.q);
            } else {
                param.title = this.getNotRepeating(
                    param.title,
                    this.oldParams.title,
                );
                param.content = this.getNotRepeating(
                    param.content,
                    this.oldParams.content,
                );
                param.author = this.getNotRepeating(
                    param.author,
                    this.oldParams.author,
                );
                param.journalist = this.getNotRepeating(
                    param.journalist,
                    this.oldParams.journalist,
                );
            }
        }
        if ($("#sort-type .active-sort").hasClass("sort-relativity")) {
            param.sort = "";
        } else {
            param.sort = "date desc";
            if ($("#sort-type .glyphicon-arrow-up").is(":visible")) {
                param.sort = "date asc";
            }
        }
        this.oldParams = param;
        $.post(url, this.oldParams, function (data, textStatus, xhr) {
            if (data != null) {
                var json = data;
                var contents = "";
                var titleKeywords,
                    contKeywords,
                    authorKeywords,
                    journalist,
                    channel;
                if (params) {
                    titleKeywords = param.title;
                    contKeywords = param.content;
                    authorKeywords = param.author;
                    journalist = param.journalist;
                } else {
                    titleKeywords = param.q;
                    contKeywords = param.q;
                    authorKeywords = param.q;
                    journalist = param.q;
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
                            ucSearch.setPhotoIcon(val.hasPic) +
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
                            ucSearch.setArtileType(val.type) +
                            '<span class="reporter-parent pull-left">' +
                            ucSearch.turnRed(
                                ucSearch.setJournalist(val.journalist),
                                journalist,
                            ) +
                            "</span>" +
                            '<span class="column-name pull-left">' +
                            (val.cascadeName
                                ? val.cascadeName.replace(/~/g, "-")
                                : "") +
                            "</span>" +
                            '<span class="search-date pull-right">' +
                            ucSearch.dateChange(val.date) +
                            "</span>" +
                            '<span class="pull-right">' +
                            ucSearch.setAuthor(val.author, authorKeywords) +
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
                    $(
                        "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
                    ).show();
                } else {
                    contents =
                        "<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>";
                    $("#pagin").html("");
                    $(
                        "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
                    ).hide();
                    this.oldParams = {};
                }
                $("#search-result").html(contents);
                $("html, body").scrollTop(0);
            }
        });
    },
    setPhotoIcon: function (hasPic) {
        var photoIcon = "";
        if (hasPic)
            photoIcon =
                '<img class="photo-icon" src="../bootstrap/images/photo-icon.png" alt="鍚浘鐗�" title="鍚浘鐗�">';
        return photoIcon;
    },
    getNotRepeating: function (newVal, oldVal) {
        var val = oldVal;
        if (newVal && newVal != oldVal) {
            if (val) {
                val += "&&" + newVal;
            } else {
                val = newVal;
            }
        }
        return val;
    },
    setArtileType: function (val) {
        var articleType = "";
        switch (val) {
            case 0:
                articleType = "鍥炬枃";
                break;
            case 1:
                articleType = "缁勫浘";
                break;
            case 2:
                articleType = "瑙嗛";
                break;
            case 3:
                articleType = "涓撻";
                break;
            case 4:
                articleType = "閾炬帴";
                break;
        }
        var articleTypeSpan =
            '<span class="article-type pull-left">' + articleType + "</span>";
        if (!articleType) articleTypeSpan = "";
        return articleTypeSpan;
    },
    setJournalist: function (val) {
        var journalist = "";
        if (val) {
            journalist =
                '璁拌€咃細<span class="reporter-name">' +
                val.split(";").join(" ") +
                "</span>";
        }
        return journalist;
    },
    setAuthor: function (val, authorKeywords) {
        var authorSpan = "";
        if (val) {
            authorSpan = "浣滆€咃細" + ucSearch.turnRed(val, authorKeywords);
        }
        return authorSpan;
    },
    omission: function (str, num) {
        return str.length > num ? str.slice(0, num) + "..." : str;
    },
    keydown: function (ev) {
        if (ev.keyCode == 13) {
            ucSearch.search(1);
            return false;
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
        if ($("#search-normal").hasClass("tab-active")) {
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
        return params;
    },
    searchTabClick: function () {
        var index = $(".search-tab li").index(this);
        $(this).addClass("tab-active").siblings().removeClass("tab-active");
        if (index === 0) {
            $(".search-senior")
                .fadeOut(0)
                .siblings(".search-normal")
                .fadeIn(500)
                .find("input")
                .trigger("focus");
            $("#search-input").val("");
            $("#pagin").html("");
            $(".search-target").val("");
            $(".search-target")
                .siblings(".search-remove")
                .css("display", "none");
            $("#search-result").html(
                "<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>",
            );
            $(
                "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
            ).hide();
            this.oldParams = {};
        } else {
            $(".search-normal")
                .fadeOut(0)
                .siblings(".search-senior")
                .fadeIn(500)
                .find(".search-btn button:first-child")
                .addClass("search-active")
                .siblings()
                .removeClass("search-active");
            $(".node-list-item li.node-select").removeClass("node-select");
            $(".node-list-all").addClass("node-select");
            $("#search-input").val("");
            $("#pagin").html("");
            $(".search-target").val("");
            $(".search-target")
                .siblings(".search-remove")
                .css("display", "none");
            $("#search-result").html(
                "<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>",
            );
            $(
                "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
            ).hide();
            this.oldParams = {};
        }
    },
    searchParentShow: function () {
        $(this)
            .addClass("search-active")
            .siblings()
            .removeClass("search-active");
        $("#search-input").val("");
        $("#pagin").html("");
        $(".search-target").val("");
        $(".search-target").siblings(".search-remove").css("display", "none");
        $("#search-result").html(
            "<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>",
        );
        $(
            "#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn",
        ).hide();
        this.oldParams = {};
    },
    resetCondition: function () {
        $("#pagin").html("");
        $(".search-target, .date-picker").val("");
        $(".search-target").siblings(".search-remove").css("display", "none");
        // $('#search-result').html('<h1>瀵逛笉璧凤紝骞舵病鏈変笌鎮ㄦ悳绱㈢殑鐩稿叧璇嶇浉鍖归厤鐨勫唴瀹广€�</h1>');
        // $('#search-about, #sort-type, .simple-result-search-btn, .advanced-result-search-btn').hide();
        this.oldParams = {};
    },
    searchActive: function () {
        var params = ucSearch.getParams();
        ucSearch.search(1, params);
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
        var sentence = $.trim(content.replace(this.textReg, ""));
        var contKeywordsAndArr = contKeywords.split("&&");
        contKeywords = contKeywordsAndArr[contKeywordsAndArr.length - 1];
        var contKeywordsSpaceArr = contKeywords
            .split(" ")
            .filter(function (item) {
                return item;
            });
        contKeywords = contKeywordsSpaceArr[0];
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
                $.trim(content.replace(this.textReg, "")).slice(0, 200) + "...";
        }
        return content;
    },
    turnRed: function (content, target) {
        if (!target) return content;
        var resultContent = content.replace(/<[^<>]+>/g, "");
        var targetAndArr = target.split("&&");
        var targetSpaceArr = [];
        var redReg = null;
        var isEnglishReg = /^(?!_)([A-Za-z0-9 ]+)$/g;
        $.each(targetAndArr, function (index, value) {
            targetSpaceArr = value.split(" ").filter(function (item) {
                return item;
            });
            if (isEnglishReg.test(value)) targetSpaceArr = [value];
            redReg = null;
            $.each(targetSpaceArr, function (indexInArray, valueOfElement) {
                redReg = new RegExp(valueOfElement, "gm");
                resultContent = resultContent.replace(
                    redReg,
                    '<span class="search-red">' + valueOfElement + "</span>",
                );
            });
        });
        return resultContent;
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
