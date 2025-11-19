$(function () {
    var tt = function () {
        var e = {};
        if (typeof shareWexnIcon !== "undefined") {
            e.shareWexnIcon = shareWexnIcon;
        } else {
            e.shareWexnIcon =
                "https://file.iqilu.com/custom/phone/m/ico/wxsharelogo2016.png";
        }
        if (typeof shareWexnTitle !== "undefined") {
            e.shareWexnTitle = shareWexnTitle.replace("_榻愰瞾缃�", "");
        } else {
            e.shareWexnTitle = "";
            try {
                title
                    ? (e.shareWexnTitle = title)
                    : (e.shareWexnTitle = document.title.replace(
                          "_榻愰瞾缃�",
                          "",
                      ));
            } catch (t) {
                e.shareWexnTitle = document.title.replace("_榻愰瞾缃�", "");
            }
        }
        if ("undefined" == typeof shareWexnDescription) {
            try {
                ((e.shareWexnDescription = ""),
                    (e.share_meta = document.getElementsByTagName("meta")));
                var t,
                    n = Ye(undefined.share_meta);
                try {
                    for (n.s(); !(t = n.n()).done; ) {
                        var r = t.value;
                        void 0 !== r.name &&
                            "description" === r.name.toLowerCase() &&
                            (e.shareWexnDescription = r.content);
                    }
                } catch (e) {
                    n.e(e);
                } finally {
                    n.f();
                }
            } catch (t) {
                e.shareWexnDescription = e.shareWexnTitle;
            }
        } else {
            e.shareWexnDescription = shareWexnDescription;
        }
        return (
            "undefined" == typeof shareWexnUrl
                ? (e.shareWexnUrl = window.location.href)
                : (e.shareWexnUrl = shareWexnUrl),
            "undefined" != typeof shareWexnNetworkCallback &&
                (shareWexnNetworkCallback instanceof Function
                    ? (e.shareWexnNetworkCallback = shareWexnNetworkCallback)
                    : (e.shareWexnNetworkCallback = null)),
            e
        );
    };

    //鍒嗕韩鍒皐eibo
    function sinaWeiBo(title, url, pic) {
        var param = {
            url: url,
            type: "3",
            count: "1" /** 鏄惁鏄剧ず鍒嗕韩鏁帮紝1鏄剧ず(鍙€�)*/,
            appkey: "" /** 鎮ㄧ敵璇风殑搴旂敤appkey,鏄剧ず鍒嗕韩鏉ユ簮(鍙€�)*/,
            title: title /** 鍒嗕韩鐨勬枃瀛楀唴瀹�(鍙€夛紝榛樿涓烘墍鍦ㄩ〉闈㈢殑title)*/,
            pic: pic /**鍒嗕韩鍥剧墖鐨勮矾寰�(鍙€�)*/,
            ralateUid:
                "" /**鍏宠仈鐢ㄦ埛鐨刄ID锛屽垎浜井鍗氫細@璇ョ敤鎴�(鍙€�)*/,
            rnd: new Date().valueOf(),
        };
        var temp = [];
        for (var p in param) {
            temp.push(p + "=" + encodeURIComponent(param[p] || ""));
        }
        var target_url =
            "http://service.weibo.com/share/share.php?" + temp.join("&");
        window.open(target_url, "sinaweibo");
    }

    //鍒嗕韩鍒癚Q绌洪棿
    function qZone(title, url, pic) {
        var p = {
            url: url,
            showcount: "1",
            /*鏄惁鏄剧ず鍒嗕韩鎬绘暟,鏄剧ず锛�'1'锛屼笉鏄剧ず锛�'0' */
            desc: "",
            /*榛樿鍒嗕韩鐞嗙敱(鍙€�)*/
            summary: "",
            /*鍒嗕韩鎽樿(鍙€�)*/
            title: title,
            /*鍒嗕韩鏍囬(鍙€�)*/
            site: "",
            /*鍒嗕韩鏉ユ簮 濡傦細鑵捐缃�(鍙€�)summary*/
            pics: pic,
            /*鍒嗕韩鍥剧墖鐨勮矾寰�(鍙€�)*/
            style: "101",
            width: 199,
            height: 30,
        };
        var s = [];
        for (var i in p) {
            s.push(i + "=" + encodeURIComponent(p[i] || ""));
        }
        var target_url =
            "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?" +
            s.join("&");
        window.open(target_url, "qZone");
    }

    //鍒嗕韩QQ濂藉弸
    function Qq(title, url, pic) {
        var p = {
            url: url,
            /*鑾峰彇URL锛屽彲鍔犱笂鏉ヨ嚜鍒嗕韩鍒癚Q鏍囪瘑锛屾柟渚跨粺璁�*/
            desc: "",
            /*鍒嗕韩鐞嗙敱(椋庢牸搴旀ā鎷熺敤鎴峰璇�),鏀寔澶氬垎浜闅忔満灞曠幇锛堜娇鐢▅鍒嗛殧锛�*/
            title: title,
            /*鍒嗕韩鏍囬(鍙€�)*/
            summary: title,
            /*鍒嗕韩鎻忚堪(鍙€�)*/
            pics: pic,
            /*鍒嗕韩鍥剧墖(鍙€�)*/
            flash: "",
            /*瑙嗛鍦板潃(鍙€�)*/
            //commonClient : true, /*瀹㈡埛绔祵鍏ユ爣蹇�*/
            site: "" /*鍒嗕韩鏉ユ簮 (鍙€�) 锛屽锛歈Q鍒嗕韩*/,
        };
        var s = [];
        for (var i in p) {
            s.push(i + "=" + encodeURIComponent(p[i] || ""));
        }
        var target_url =
            "http://connect.qq.com/widget/shareqq/iframe_index.html?" +
            s.join("&");
        window.open(target_url, "qq");
    }
    var sharedata = tt();
    //console.log(sharedata['shareWexnTitle']);
    //$('[data-cmd="weixin"').off();
    $(".bds_weixin").click(function (e) {
        if (!window._bd_share_main || window.location.protocol === "https:") {
            $(".xcodeBox").show();
        }
    });
    // var code = "0DNw";
    // var id = "22";
    // var cateId = '163'; // 闇€瑕佹覆鏌撴爮鐩甶d
    var shareTitle = sharedata["shareWexnTitle"]; //鍒嗕韩鏍囬
    // var shareDescription = "";
    var shareWIcon = sharedata["shareWexnIcon"]; //鍒嗕韩ico
    //console.log("-----shareTitle",shareTitle,shareWIcon);
    var shareUrl = sharedata["shareWexnUrl"];
    // 寰俊鍒嗕韩
    let str =
        '<div class="xcodeBox" style="width: 262px;height: 317px;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color: #FFF;border: solid 1px #d8d8d8;z-index: 11001;font-size: 12px;display: none;"><div class="xcodeBox_head" style="padding:5px 10px;display: flex;justify-content: space-between;"><span>鍒嗕韩鍒版湅鍙嬪湀</span><div class="xcodeBox_head_close" style="cursor: pointer;font-size:20px;">脳</div></div><div class="xcodeBox_code" style="display: flex;justify-content: center;"></div><div class="xcodeBox_text" style="padding-left:20px;box-sizing: border-box;margin-top:10px;color:#666;">鎵撳紑寰俊锛岀偣鍑诲簳閮ㄧ殑鈥滃彂鐜扳€濓紝</div><div class="xcodeBox_text" style="padding-left:20px;box-sizing: border-box;margin-top:10px;color:#666;">浣跨敤鈥滄壂涓€鎵€濆嵆鍙皢缃戦〉鍒嗕韩鑷虫湅鍙嬪湀銆�</div></div>';
    $("body").append(str);
    // 妫€娴嬫槸鍚﹀瓨鍦� qrcode 鎻掍欢
    if ($.fn.qrcode) {
    } else {
        //console.log('QRCode plugin is not loaded. Loading...');
        // 鍔ㄦ€佸姞杞� qrcode 鎻掍欢
        $.getScript(
            "https://file.iqilu.com/custom/v/js/jquery.qrcode.min.js",
            function () {
                //$(".xcodeBox_code").qrcode({text:shareUrl,width:200,height:200});
            },
        );
    }

    $(".xcodeBox_code").qrcode({ text: shareUrl, width: 200, height: 200 });

    $(".xcodeBox_head_close").click(function () {
        $(".xcodeBox").hide();
    });

    $(".share-zone").click(function () {
        qZone(shareTitle, shareUrl, shareWIcon);
    });
    $(".bds_tsina").click(function () {
        sinaWeiBo(shareTitle, shareUrl, shareWIcon);
    });
    $(".share-qq").click(function () {
        Qq(shareTitle, shareUrl, shareWIcon);
    });
    $(".bds_renren").hide();
    $(".bds_tqq").hide();
});

// 闃绘榛樿鐨勮〃鍗曟彁浜や簨浠讹紝瑙﹀彂鑷畾涔夌殑鎻愪氦閫昏緫
$(document).ready(function () {
    // 鏇存柊鎼滅储绫诲埆
    function updateSearchCategory(value) {
        $("#search-ct").val(value);
    }

    $("#search-all").submit(function (event) {
        event.preventDefault(); // 闃绘榛樿鐨勮〃鍗曟彁浜や簨浠�
        customFormSubmit(); // 璋冪敤鑷畾涔夌殑鎻愪氦閫昏緫
    });

    function customFormSubmit() {
        var form = document.getElementById("search-all");
        var baseUrl = "http://s.iqilu.com/cse/search"; // Use HTTPS instead of HTTP
        var queryString =
            "?q=" +
            encodeURIComponent(form.q.value) +
            "&entry=" +
            form.entry.value +
            "&s=" +
            form.s.value +
            "&nsid=" +
            form.nsid.value +
            "&sa=";
        // Open a new window with the secure URL
        window.open(baseUrl + queryString, "_blank");
        // Prevent the form from submitting in the traditional way
        return false;
    }
});
// 鑷畾涔夋悳绱㈣〃鍗曟彁浜�
