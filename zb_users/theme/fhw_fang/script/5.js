$.extend({
    getUrlVars: function () {
        var vars = [],
            hash;
        var hashes = window.location.href
            .slice(window.location.href.indexOf("?") + 1)
            .split("&");
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split("=");
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    getUrlVar: function (name) {
        return $.getUrlVars()[name];
    },
});

function VersionHelper(config) {
    let o = new Object();
    o.config = {
        url: "",
    };
    o.config = jQuery.extend({}, o.config, config);
    let retryMaxCount = 5;
    let retryCount = 0;
    o.start = function () {
        let version = $.getUrlVar("version");
        if (typeof version === "undefined") {
            return true;
        }
        o.setVersion(version);
    };

    o.setVersion = function (version, successCallback) {
        if (version === "m") {
            $.cookie("version", version, {
                expires: 7,
                path: "/",
                secure: true,
            });
        } else {
            $.cookie("version", "deleted", {
                expires: 7,
                path: "/",
                secure: true,
            });
        }
        if (typeof successCallback === "function") {
            successCallback();
        }
    };
    return o;
}
