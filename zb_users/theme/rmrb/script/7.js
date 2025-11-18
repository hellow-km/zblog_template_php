/*
 * Powered by xjflyttp.
 * 2009-07-30
 */
(function ($) {
    $.extend({
        myTime: {
            /**
             *鍙栧緱浠婂ぉ鏄熸湡鍑�
             */
            GetCurrentWeekDay: function () {
                return this.GetWeekByInt(new Date().getDay());
            },
            /**
             * 鍙栧緱鏄熸湡x 閫氳繃int
             * 0=鏃�
             * 1=涓€
             * 6=鍏�
             */
            GetWeekByInt: function (dayInt) {
                var _week = new Array(
                    "鏄熸湡鏃�",
                    "鏄熸湡涓€",
                    "鏄熸湡浜�",
                    "鏄熸湡涓�",
                    "鏄熸湡鍥�",
                    "鏄熸湡浜�",
                    "鏄熸湡鍏�",
                );
                return _week[dayInt];
            },
            /**
             * 鏃ユ湡 杞崲涓� Unix鏃堕棿鎴�
             * @param <int> year    骞�
             * @param <int> month   鏈�
             * @param <int> day     鏃�
             * @param <int> hour    鏃�
             * @param <int> minute  鍒�
             * @param <int> second  绉�
             * @return <int>        unix鏃堕棿鎴�(绉�)
             */
            DateToUnix: function (year, month, day, hour, minute, second) {
                var oDate = new Date(
                    Date.UTC(
                        parseInt(year),
                        parseInt(month),
                        parseInt(day),
                        parseInt(hour),
                        parseInt(minute),
                        parseInt(second),
                    ),
                );
                return oDate.getTime() / 1000;
            },
            /**
             * 鏃堕棿鎴宠浆鎹㈡棩鏈�
             * @param <int>     unixTime    寰呮椂闂存埑(绉�)
             * @param <bool>    isFull      杩斿洖瀹屾暣鏃堕棿(Y-m-d 鎴栬€� Y-m-d H:i:s)
             * @param <int>     timeZone    鏃跺尯
             */
            UnixToDate: function (unixTime, isFull, timeZone) {
                if (typeof timeZone == "number") {
                    unixTime =
                        parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
                }
                var time = new Date(unixTime * 1000);
                var ymdhis = "";
                ymdhis += time.getUTCFullYear() + "-";
                ymdhis += this.padLeft(time.getUTCMonth() + 1, 2) + "-";
                ymdhis += this.padLeft(time.getUTCDate(), 2);
                if (isFull === true) {
                    ymdhis += " " + this.padLeft(time.getUTCHours(), 2) + ":";
                    ymdhis += this.padLeft(time.getUTCMinutes(), 2) + ":";
                    ymdhis += this.padLeft(time.getUTCSeconds(), 2);
                }
                return ymdhis;
            },
            /**
             * 琛ラ浂鍑芥暟
             */
            padLeft: function (str, length) {
                //宸﹂倞瑁�0
                str = str.toString();
                if (str.length >= length) return str;
                else return this.padLeft("0" + str, length);
            },
        },
    });
})(jQuery);
