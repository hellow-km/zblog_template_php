(function ($) {
    $(function () {
        var rootEl = $(".hotArticleBox");
        rootEl
            .find(".list .tabsNav>a")
            .click(function () {
                show($(this));
            })
            .hover(
                function () {
                    show($(this));
                },
                function () {},
            );
        function show(_athis) {
            var a_id = _athis.attr("rel");
            rootEl.find(".tabsNav>a").removeClass("current");
            _athis.addClass("current");

            rootEl.find(".list ul").each(function (i) {
                var _this = $(this);
                if (_this.hasClass(a_id)) {
                    _this.css("display", "block");
                } else {
                    _this.css("display", "none");
                }
            });
        }
        $(function () {
            show(rootEl.find(".list .tabsNav>a").eq(0));
        });
    });
})(jQuery);
