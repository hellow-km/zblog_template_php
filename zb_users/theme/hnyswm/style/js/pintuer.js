$(function() {

    $(".win-backtop").click(function() {
        $("body,html").animate({
            scrollTop: 0
        }, 1000);
        return false
    });
	

  

    $showdialogs = function(e) {
        var trigger = e.attr("data-toggle");
        var getid = e.attr("data-target");
        var data = e.attr("data-url");
        var mask = e.attr("data-mask");
        var width = e.attr("data-width");
        var detail = "";
        var masklayout = $('<div class="dialog-mask"></div>');
        var temp = "";
        if (width == null) {
            width = "80%"
        }
        if (mask == "1") {
            $("body").append(masklayout)
        }
        detail = '<div class="dialog-win" style="position:fixed;width:' + width + ';z-index:11;">';
        if (getid != null) {
            detail = detail + $(getid).html();
            temp = $(getid).detach()
        }
        if (data != null) {
            detail = detail + $.ajax({
                url: data,
                async: false
            }).responseText
        }
        detail = detail + "</div>";
        var win = $(detail);
        win.find(".dialog").addClass("open");
        $("body").append(win);
        var x = parseInt($(window).width() - win.outerWidth()) / 2;
        var y = parseInt($(window).height() - win.outerHeight()) / 2;
        if (y <= 10) {
            y = 10
        }
        win.css({
            "left": x,
            "top": y
        });
        win.find(".dialog-close,.close").each(function() {
            $(this).click(function() {
                win.remove();
                $(".dialog-mask").remove();
                $("body").prepend(temp)
            })
        });
        masklayout.click(function() {
            win.remove();
            $(this).remove();
            $("body").prepend(temp)
        })
    };
    $(".tips").each(function() {
        var e = $(this);
        var title = e.attr("title");
        var trigger = e.attr("data-toggle");
        e.attr("title", "");
        if (trigger == "" || trigger == null) {
            trigger = "hover"
        }
        if (trigger == "hover") {
            e.mouseover(function() {
                $showtips(e, title)
            })
        } else {
            if (trigger == "click") {
                e.click(function() {
                    $showtips(e, title)
                })
            } else {
                if (trigger == "show") {
                    e.ready(function() {
                        $showtips(e, title)
                    })
                }
            }
        }
    });

    $(".alert .close").each(function() {
        $(this).click(function() {
            $(this).closest(".alert").remove()
        })
    });
    $(".radio label").each(function() {
        var e = $(this);
        e.click(function() {
            e.closest(".radio").find("label").removeClass("active");
            e.addClass("active")
        })
    });
    $(".checkbox label").each(function() {
        var e = $(this);
        e.click(function() {
            if (e.find("input").is(":checked")) {
                e.addClass("active")
            } else {
                e.removeClass("active")
            }
        })
    });
    $(".collapse .panel-head").each(function() {
        var e = $(this);
        e.click(function() {
            e.closest(".collapse").find(".panel").removeClass("active");
            e.closest(".panel").addClass("active")
        })
    });
    $(".collapse-toggle .panel-head").each(function() {
        var e = $(this);
        e.click(function() {
            e.closest(".panel").toggleClass("active")
        })
    });
    $(".icon-daohang").each(function() {
        var e = $(this);
        var target = e.attr("data-target");
        e.click(function() {
            $(target).toggleClass("nav-navicon")
        })
    });
   

    $(".spy a").each(function() {
        var e = $(this);
        var t = e.closest(".spy");
        var target = t.attr("data-target");
        var top = t.attr("data-offset-spy");
        var thistarget = "";
        var thistop = "";
        if (top == null) {
            top = 0
        }
        if (target == null) {
            thistarget = $(window)
        } else {
            thistarget = $(target)
        }
        thistarget.bind("scroll", function() {
            if (target == null) {
                thistop = $(e.attr("href")).offset().top - $(window).scrollTop() - parseInt(top)
            } else {
                thistop = $(e.attr("href")).offset().top - thistarget.offset().top - parseInt(top)
            } if (thistop < 0) {
                t.find("li").removeClass("active");
                e.parents("li").addClass("active")
            }
        })
    });
    $(".fixed").each(function() {
        var e = $(this);
        var style = e.attr("data-style");
        var top = e.attr("data-offset-fixed");
        if (top == null) {
            top = e.offset().top
        } else {
            top = e.offset().top - parseInt(top)
        } if (style == null) {
            style = "fixed-top"
        }
        $(window).bind("scroll", function() {
            var thistop = top - $(window).scrollTop();
            if (style == "fixed-top" && thistop < 0) {
                e.addClass("fixed-top")
            } else {
                e.removeClass("fixed-top")
            }
            var thisbottom = top - $(window).scrollTop() - $(window).height();
            if (style == "fixed-bottom" && thisbottom > 0) {
                e.addClass("fixed-bottom")
            } else {
                e.removeClass("fixed-bottom")
            }
        })
    });
    $(".wx-share-btn").click(function() {
        $(".wx-share").show()
    });
    $(".wx-share").click(function() {
        $(this).hide()
    });
    $(".wx-comments-input").keydown(function() {
        var txt_num = (120 - parseInt($(this).val().length));
        $(".wx-comments-num").html(txt_num)
    })
});