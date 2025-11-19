/**
 * Created by ShiQiWen on 2024/8/19.
 *
 * 妗傛灄鐢熸椿缃戝箍鍛婄粍浠讹紝浣跨敤鍓嶅繀椤诲紩鍏query
 *
 * 浣跨敤绀轰緥锛�
 * $(function(){
 *      new GlshwAd({
 *          adOptList:[
 *              {position_id:80010,container:'adTest1'},
 *              {position_id:80012,container:'adTest2'},
 *              {position_id:80014,container:'adTest3'}
 *           ]
 *       });
 * });
 *
 */
(function (window, $) {
    var GlshwAd = function (opts) {
        var _this = this,
            defaultOpts = {
                adDataUrl: "https://www.guilinlife.com/ad/ls",
                adOptList: [],
            };
        _this.opts = $.extend(defaultOpts, opts);
        window.GlshwAdData = {};
        _this.init();
    };
    GlshwAd.prototype.init = function () {
        var _this = this;
        _this.getAdData(function (data) {
            if (data && data.status === 1 && data.list && data.list.length) {
                _this.renderAdData(data.list);
            }
        }, _this.getAdOptPositionIds());
    };
    GlshwAd.prototype.getAdOptPositionIds = function () {
        var positionIds = [];
        $.each(this.opts.adOptList, function (index, item) {
            positionIds.push(item.position_id);
        });
        return positionIds;
    };
    GlshwAd.prototype.getAdData = function (cb, positionIds) {
        $.ajax({
            url: this.opts.adDataUrl,
            data: {
                positionIds: positionIds,
            },
            dataType: "jsonp",
            success: function (rs) {
                cb && cb(rs);
            },
            error: function () {
                cb && cb();
            },
        });
    };
    GlshwAd.prototype.renderAdData = function (list) {
        var _this = this;
        $.each(list, function (index1, item1) {
            $.each(_this.opts.adOptList, function (index2, item2) {
                var adItem, adIframeHtml;
                if (item1.position_id === item2.position_id) {
                    adItem = $.extend(item1, item2);
                    window.GlshwAdData[adItem.position_id] = adItem;
                    adIframeHtml = _this.getAdIframeHtml(adItem);
                    $("#" + adItem.container).html(adIframeHtml);
                }
            });
        });
    };
    GlshwAd.prototype.adIframeLoaded = function (adPositionId) {
        var adIframe = $("#glshw_ad_iframe_" + adPositionId)[0],
            adItem = window.GlshwAdData[adPositionId],
            adIframeDoc = adIframe.contentWindow.document;
        adIframeDoc.open("text/html", "replace");
        adIframeDoc.write(GlshwAd.prototype.getAHtml(adItem));
        adIframeDoc.close();
        adIframeDoc.body.style.backgroundColor = "transparent";
    };
    GlshwAd.prototype.getAdIframeHtml = function (adItem) {
        var html = [
            "<iframe",
            ' id="glshw_ad_iframe_' + adItem.position_id + '"',
            ' name="glshw_ad_iframe_' + adItem.position_id + '"',
            ' onload="GlshwAd.prototype.adIframeLoaded(' +
                adItem.position_id +
                ')"',
            ' src="about:blank"',
            ' width="' + adItem.width + '"',
            ' height="' + adItem.height + '"',
            ' align="center,center"',
            ' vspace="0"',
            ' hspace="0"',
            ' marginwidth="0"',
            ' marginheight="0"',
            ' scrolling="no"',
            ' frameborder="0"',
            ' style="border:0;vertical-align:bottom;margin:0;width:' +
                adItem.width +
                "px;height:" +
                adItem.height +
                'px"',
            ' allowtransparency="true">',
            "</iframe>",
        ].join("");
        return html;
    };
    GlshwAd.prototype.getAHtml = function (adItem) {
        var html =
            '<a href="' +
            adItem.click_url +
            '" target="_blank"><img src="' +
            adItem.file_url +
            '" title="' +
            adItem.title +
            '" alt="' +
            adItem.title +
            '" border="0" height="' +
            adItem.height +
            '" width="' +
            adItem.width +
            '"/></a>';
        return html;
    };
    window.GlshwAd = GlshwAd;
})(window, jQuery);
