if (typeof NProgressbar == "undefined") {
    var NProgressbar = {
        load: function (options) {
            var scorebar = options.scorebar;
            var scoreformInput = options.scoreformInput;
            var _avgScore = options.avgScore;
            var _progressbarImagesUrl = options.progressbarImagesUrl;
            var _article_id = options.article_id;
            var _articleScoreUrl = options.articleScoreUrl;

            //璇勫垎杩涘害鏉℃樉绀�
            $(scorebar).progressBar(_avgScore, {
                max: 10,
                steps: 10,
                stepDuration: 40,
                width: 250,
                showText: true,
                textFormat: "fraction",
                boxImage: _progressbarImagesUrl + "/images/progressbar.gif",
                barImage: {
                    0: _progressbarImagesUrl + "/images/progressbg_green.gif",
                    5: _progressbarImagesUrl + "/images/progressbg_orange.gif",
                    7: _progressbarImagesUrl + "/images/progressbg_red.gif",
                },
            });

            //璇勫垎鎸夐挳
            $(scoreformInput).click(function () {
                $.ajax({
                    url: _articleScoreUrl,
                    type: "get",
                    dataType: "json",
                    data: {
                        id: _article_id,
                        val: $(this).val(),
                    },
                    success: function (data) {
                        if (data.error) {
                            NNotify.error(data.message);
                        } else {
                            NNotify.success(data.message);
                        }
                    },
                });
            });
        },
    };
}
if (typeof NFavorite == "undefined") {
    var NFavorite = {
        //鏀惰棌鏍囪
        /**
         *璁剧疆鍔犺浇涓彁绀�
         */
        setLoading: function (offset) {
            var loading =
                '<div id="loadingdiv"><img id="loading" src="' +
                SITE_ROOT +
                'images/ajax-loader.gif" /><div>姝ｅ湪杞藉叆</div></div>';
            $("#loadingdiv").remove();
            $("div.container").prepend(loading);
            $("#loadingdiv")
                .css("top", offset.top + 15)
                .css("left", offset.left);
        },
        load: function (options) {
            var _this = this;
            var favoriteDialogUrl = options.dialogUrl;
            favoriteDialogUrl += "?jsoncallback=?";
            var favoriteCreateTag = options.createTagUrl;
            favoriteCreateTag += "?jsoncallback=?";

            $(".favoritedo").live("click", function () {
                $("#favoritedialog").remove();
                var objid = $(this).attr("id").split("_")[1];
                var act = $(this).attr("id").split("_")[0];
                var offset = $(this).offset();

                //鍔犺浇涓�
                _this.setLoading(offset);

                $.ajax({
                    type: "GET",
                    url: favoriteDialogUrl,
                    data: {
                        id: objid,
                        type: act,
                    },
                    dataType: "jsonp",
                    async: false,
                }).done(function (data) {
                    if (!data.error) {
                        $("#loadingdiv").remove();
                        $("div.container").after(data.message);
                        $("#favoritedialog").css("top", offset.top + 15);
                        $("#favoritedialog").css("left", offset.left);
                    } else {
                        var ok =
                            '<span class="title">' +
                            data.message +
                            "</span>" +
                            '<span class="s12 right close_fav_dialog"><a href="javascript:void(0)">鍏抽棴</a></span>';
                        $("#loadingdiv").html(ok);
                    }
                });
                //                .fail(function() {
                //                    var ok = '<span class="title">鍙戠敓閿欒璇疯仈绯荤鐞嗗憳</span>' +
                //                    '<span class="s12 right close_fav_dialog"><a href="javascript:void(0)">鍏抽棴</a></span>';
                //                    $('#loadingdiv').html(ok);
                //                });
            });

            //鏀惰棌妗嗗叧闂�
            $(".close_fav_dialog").live("click", function () {
                $("#favoritedialog").remove();
                $("#loadingdiv").remove();
            });

            //鏀惰棌鎻愪氦鏍囩
            $("#favoriteTagSubmit").live("click", function () {
                var textvalue = $("#favoriteTags").val();
                textvalue = textvalue.replace(",", " ");
                textvalue = textvalue.replace("锛�", " ");
                if (textvalue.split(" ").length > 2) {
                    NNotify.error("鏈€澶氬～鍐�2涓爣绛�");
                    return false;
                }
                var id = $("#id").val();

                $.ajax({
                    type: "GET",
                    url: favoriteCreateTag,
                    data: {
                        id: id,
                        tags: textvalue,
                    },
                    dataType: "jsonp",
                }).done(function (data) {
                    if (!data.error) {
                        $("#favoritedialog").remove();
                    } else {
                    }
                    NNotify.success(data.message);
                });
            });

            //鏀惰棌鏍囩 蹇€熸坊鍔�
            $(".ftags").live("click", function () {
                var _favoriteTags = $("#favoriteTags");
                if (_favoriteTags.val().split(" ").length >= 2) {
                    NNotify.error("鏈€澶氬～鍐�2涓爣绛�");
                    return false;
                }
                var objtext = $(this).text();
                if (_favoriteTags.val() == "") {
                    _favoriteTags.val(objtext);
                } else {
                    _favoriteTags.val(_favoriteTags.val() + " " + objtext);
                }
            });
        },
    };
}

if (typeof NStatusbar == "undefined") {
    var NStatusbar = {
        load: function (options) {
            var url = options.url;
            var currentUrl = options.currentUrl;
            var redirectUrl = options.redirectUrl;
            var module = options.module;
            var controller = options.controller;
            var action = options.action;

            //process
            var _url = url + "?jsoncallback=?";
            var target = $("#loginStatus");
            $.getJSON(_url, {
                currentUrl: currentUrl,
                redirectUrl: redirectUrl,
                module: module,
                controller: controller,
                action: action,
            }).done(function (data) {
                if (data.isLogin) {
                    target.html(data.data);
                }
            });
        },
    };
}
if (typeof NFCHelper == "undefined") {
    var NFCHelper = {
        //棣栭〉鑿滃崟鏍峰紡
        show: function (nodeId) {
            var node = $(nodeId);
            if (node.css("display") == "block") {
                node.fadeOut();
            } else {
                node.fadeIn();
            }
        },
        //棣栭〉鑿滃崟鏍峰紡
        setMenuStyle: function () {
            $("#menu a").hover(
                function () {
                    $(this).addClass("selected");
                },
                function () {
                    $(this).removeClass("selected");
                },
            );
        },
        //璁块棶璁℃暟鍣ㄩ摼鎺�
        loadCounter: function (counterUrl) {
            //閬垮厤褰卞搷鍥剧墖鍔犺浇
            if (typeof counterUrl == "string") {
                $.ajax({
                    url: counterUrl,
                    cache: false,
                });
            }
        },
        //鍙栧緱Get鍙傛暟
        getQuery: function (paramName) {
            paramName = paramName
                .replace(/[\[]/, "\\\[")
                .replace(/[\]]/, "\\\]")
                .toLowerCase();
            var reg = "[\\?&]" + paramName + "=([^&#]*)";
            var regex = new RegExp(reg);
            var regResults = regex.exec(window.location.href.toLowerCase());
            if (regResults == null) return "";
            else return regResults[1];
        },
        //褰撳墠閫夋嫨Menu
        setMenuCurrentCategory: function (categoryid) {
            jQuery("#menu_c_" + categoryid).addClass("selected");
        },
        /**
         * @param string //sina appkey
         * @param string //title 寰崥鍐呭
         */
        showShareToSina: function (appkey, title) {
            (function () {
                var _w = 16,
                    _h = 16;
                var param = {
                    url: location.href,
                    type: "3",
                    count: "" /**鏄惁鏄剧ず鍒嗕韩鏁帮紝1鏄剧ず(鍙€�)*/,
                    appkey: appkey /**鎮ㄧ敵璇风殑搴旂敤appkey,鏄剧ず鍒嗕韩鏉ユ簮(鍙€�)*/,
                    title: title /**鍒嗕韩鐨勬枃瀛楀唴瀹�(鍙€夛紝榛樿涓烘墍鍦ㄩ〉闈㈢殑title)*/,
                    pic: "" /**鍒嗕韩鍥剧墖鐨勮矾寰�(鍙€�)*/,
                    ralateUid:
                        "" /**鍏宠仈鐢ㄦ埛鐨刄ID锛屽垎浜井鍗氫細@璇ョ敤鎴�(鍙€�)*/,
                    language: "zh_cn" /**璁剧疆璇█锛寊h_cn|zh_tw(鍙€�)*/,
                    rnd: new Date().valueOf(),
                };
                var temp = [];
                for (var p in param) {
                    temp.push(p + "=" + encodeURIComponent(param[p] || ""));
                }
                document.write(
                    '<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?' +
                        temp.join("&") +
                        '" width="' +
                        _w +
                        '" height="' +
                        _h +
                        '"></iframe>',
                );
            })();
        },
    };
}
if (typeof NNotify == "undefined") {
    /**
     * 鎻愮ず宸ュ叿
     */
    var NNotify = {
        postMessage: function (type, title, message) {
            $.pnotify.defaults.delay = 3000;
            $.pnotify({
                title: title,
                text: message,
                type: type,
                history: false,
            });
        },
        notice: function (message) {
            this.postMessage("notice", "鎻愮ず", message);
        },
        success: function (message) {
            this.postMessage("success", "鎴愬姛", message);
        },
        error: function (message) {
            this.postMessage("error", "閿欒", message);
        },
    };
}
