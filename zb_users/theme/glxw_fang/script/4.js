!function () {
    function x(a) {
        function b(b, c, d, e, f, g) {
            for (; f >= 0 && g > f; f += a) {
                var h = e ? e[f] : f;
                d = c(d, b[h], h, b);
            }
            return d;
        }
        return function (c, d, e, f) {
            d = p(d, f, 4);
            var g = !w(c) && o.keys(c),
                h = (g || c).length,
                i = a > 0 ? 0 : h - 1;
            return (
                arguments.length < 3 && ((e = c[g ? g[i] : i]), (i += a)),
                b(c, d, e, g, i, h)
            );
        };
    }
    function A(a) {
        return function (b, c, d) {
            var e, f;
            for (
                c = q(c, d), e = v(b), f = a > 0 ? 0 : e - 1;
                f >= 0 && e > f;
                f += a
            )
                if (c(b[f], f, b)) return f;
            return -1;
        };
    }
    function B(a, b, c) {
        return function (d, e, f) {
            var h = 0,
                i = v(d);
            if ("number" == typeof f)
                a > 0
                    ? (h = f >= 0 ? f : Math.max(f + i, h))
                    : (i = f >= 0 ? Math.min(f + 1, i) : f + i + 1);
            else if (c && f && i) return ((f = c(d, e)), d[f] === e ? f : -1);
            if (e !== e)
                return ((f = b(g.call(d, h, i), o.isNaN)), f >= 0 ? f + h : -1);
            for (f = a > 0 ? h : i - 1; f >= 0 && i > f; f += a)
                if (d[f] === e) return f;
            return -1;
        };
    }
    function F(a, b) {
        var c = E.length,
            e = a.constructor,
            f = (o.isFunction(e) && e.prototype) || d,
            g = "constructor";
        for (o.has(a, g) && !o.contains(b, g) && b.push(g); c--; )
            ((g = E[c]),
                g in a && a[g] !== f[g] && !o.contains(b, g) && b.push(g));
    }
    var p,
        q,
        r,
        s,
        t,
        u,
        v,
        w,
        y,
        z,
        C,
        D,
        E,
        G,
        H,
        I,
        J,
        K,
        L,
        M,
        N,
        O,
        P,
        a = this,
        b = a._,
        c = Array.prototype,
        d = Object.prototype,
        e = Function.prototype,
        f = c.push,
        g = c.slice,
        h = d.toString,
        i = d.hasOwnProperty,
        j = Array.isArray,
        k = Object.keys,
        l = e.bind,
        m = Object.create,
        n = function () {},
        o = function (a) {
            return a instanceof o
                ? a
                : this instanceof o
                  ? ((this._wrapped = a), void 0)
                  : new o(a);
        };
    ("undefined" != typeof exports
        ? ("undefined" != typeof module &&
              module.exports &&
              (exports = module.exports = o),
          (exports._ = o))
        : (a._ = o),
        (o.VERSION = "1.8.3"),
        (p = function (a, b, c) {
            if (void 0 === b) return a;
            switch (null == c ? 3 : c) {
                case 1:
                    return function (c) {
                        return a.call(b, c);
                    };
                case 2:
                    return function (c, d) {
                        return a.call(b, c, d);
                    };
                case 3:
                    return function (c, d, e) {
                        return a.call(b, c, d, e);
                    };
                case 4:
                    return function (c, d, e, f) {
                        return a.call(b, c, d, e, f);
                    };
            }
            return function () {
                return a.apply(b, arguments);
            };
        }),
        (q = function (a, b, c) {
            return null == a
                ? o.identity
                : o.isFunction(a)
                  ? p(a, b, c)
                  : o.isObject(a)
                    ? o.matcher(a)
                    : o.property(a);
        }),
        (o.iteratee = function (a, b) {
            return q(a, b, 1 / 0);
        }),
        (r = function (a, b) {
            return function (c) {
                var e,
                    f,
                    g,
                    h,
                    i,
                    j,
                    d = arguments.length;
                if (2 > d || null == c) return c;
                for (e = 1; d > e; e++)
                    for (
                        f = arguments[e], g = a(f), h = g.length, i = 0;
                        h > i;
                        i++
                    )
                        ((j = g[i]), (b && void 0 !== c[j]) || (c[j] = f[j]));
                return c;
            };
        }),
        (s = function (a) {
            if (!o.isObject(a)) return {};
            if (m) return m(a);
            n.prototype = a;
            var b = new n();
            return ((n.prototype = null), b);
        }),
        (t = function (a) {
            return function (b) {
                return null == b ? void 0 : b[a];
            };
        }),
        (u = Math.pow(2, 53) - 1),
        (v = t("length")),
        (w = function (a) {
            var b = v(a);
            return "number" == typeof b && b >= 0 && u >= b;
        }),
        (o.each = o.forEach =
            function (a, b, c) {
                var d, e, f;
                if (((b = p(b, c)), w(a)))
                    for (d = 0, e = a.length; e > d; d++) b(a[d], d, a);
                else
                    for (f = o.keys(a), d = 0, e = f.length; e > d; d++)
                        b(a[f[d]], f[d], a);
                return a;
            }),
        (o.map = o.collect =
            function (a, b, c) {
                var d, e, f, g, h;
                for (
                    b = q(b, c),
                        d = !w(a) && o.keys(a),
                        e = (d || a).length,
                        f = Array(e),
                        g = 0;
                    e > g;
                    g++
                )
                    ((h = d ? d[g] : g), (f[g] = b(a[h], h, a)));
                return f;
            }),
        (o.reduce = o.foldl = o.inject = x(1)),
        (o.reduceRight = o.foldr = x(-1)),
        (o.find = o.detect =
            function (a, b, c) {
                var d;
                return (
                    (d = w(a) ? o.findIndex(a, b, c) : o.findKey(a, b, c)),
                    void 0 !== d && -1 !== d ? a[d] : void 0
                );
            }),
        (o.filter = o.select =
            function (a, b, c) {
                var d = [];
                return (
                    (b = q(b, c)),
                    o.each(a, function (a, c, e) {
                        b(a, c, e) && d.push(a);
                    }),
                    d
                );
            }),
        (o.reject = function (a, b, c) {
            return o.filter(a, o.negate(q(b)), c);
        }),
        (o.every = o.all =
            function (a, b, c) {
                var d, e, f, g;
                for (
                    b = q(b, c),
                        d = !w(a) && o.keys(a),
                        e = (d || a).length,
                        f = 0;
                    e > f;
                    f++
                )
                    if (((g = d ? d[f] : f), !b(a[g], g, a))) return !1;
                return !0;
            }),
        (o.some = o.any =
            function (a, b, c) {
                var d, e, f, g;
                for (
                    b = q(b, c),
                        d = !w(a) && o.keys(a),
                        e = (d || a).length,
                        f = 0;
                    e > f;
                    f++
                )
                    if (((g = d ? d[f] : f), b(a[g], g, a))) return !0;
                return !1;
            }),
        (o.contains =
            o.includes =
            o.include =
                function (a, b, c, d) {
                    return (
                        w(a) || (a = o.values(a)),
                        ("number" != typeof c || d) && (c = 0),
                        o.indexOf(a, b, c) >= 0
                    );
                }),
        (o.invoke = function (a, b) {
            var c = g.call(arguments, 2),
                d = o.isFunction(b);
            return o.map(a, function (a) {
                var e = d ? b : a[b];
                return null == e ? e : e.apply(a, c);
            });
        }),
        (o.pluck = function (a, b) {
            return o.map(a, o.property(b));
        }),
        (o.where = function (a, b) {
            return o.filter(a, o.matcher(b));
        }),
        (o.findWhere = function (a, b) {
            return o.find(a, o.matcher(b));
        }),
        (o.max = function (a, b, c) {
            var f,
                g,
                h,
                i,
                d = -1 / 0,
                e = -1 / 0;
            if (null == b && null != a)
                for (
                    a = w(a) ? a : o.values(a), h = 0, i = a.length;
                    i > h;
                    h++
                )
                    ((f = a[h]), f > d && (d = f));
            else
                ((b = q(b, c)),
                    o.each(a, function (a, c, f) {
                        ((g = b(a, c, f)),
                            (g > e || (g === -1 / 0 && d === -1 / 0)) &&
                                ((d = a), (e = g)));
                    }));
            return d;
        }),
        (o.min = function (a, b, c) {
            var f,
                g,
                h,
                i,
                d = 1 / 0,
                e = 1 / 0;
            if (null == b && null != a)
                for (
                    a = w(a) ? a : o.values(a), h = 0, i = a.length;
                    i > h;
                    h++
                )
                    ((f = a[h]), d > f && (d = f));
            else
                ((b = q(b, c)),
                    o.each(a, function (a, c, f) {
                        ((g = b(a, c, f)),
                            (e > g || (1 / 0 === g && 1 / 0 === d)) &&
                                ((d = a), (e = g)));
                    }));
            return d;
        }),
        (o.shuffle = function (a) {
            var f,
                e,
                b = w(a) ? a : o.values(a),
                c = b.length,
                d = Array(c);
            for (e = 0; c > e; e++)
                ((f = o.random(0, e)), f !== e && (d[e] = d[f]), (d[f] = b[e]));
            return d;
        }),
        (o.sample = function (a, b, c) {
            return null == b || c
                ? (w(a) || (a = o.values(a)), a[o.random(a.length - 1)])
                : o.shuffle(a).slice(0, Math.max(0, b));
        }),
        (o.sortBy = function (a, b, c) {
            return (
                (b = q(b, c)),
                o.pluck(
                    o
                        .map(a, function (a, c, d) {
                            return { value: a, index: c, criteria: b(a, c, d) };
                        })
                        .sort(function (a, b) {
                            var c = a.criteria,
                                d = b.criteria;
                            if (c !== d) {
                                if (c > d || void 0 === c) return 1;
                                if (d > c || void 0 === d) return -1;
                            }
                            return a.index - b.index;
                        }),
                    "value",
                )
            );
        }),
        (y = function (a) {
            return function (b, c, d) {
                var e = {};
                return (
                    (c = q(c, d)),
                    o.each(b, function (d, f) {
                        var g = c(d, f, b);
                        a(e, d, g);
                    }),
                    e
                );
            };
        }),
        (o.groupBy = y(function (a, b, c) {
            o.has(a, c) ? a[c].push(b) : (a[c] = [b]);
        })),
        (o.indexBy = y(function (a, b, c) {
            a[c] = b;
        })),
        (o.countBy = y(function (a, b, c) {
            o.has(a, c) ? a[c]++ : (a[c] = 1);
        })),
        (o.toArray = function (a) {
            return a
                ? o.isArray(a)
                    ? g.call(a)
                    : w(a)
                      ? o.map(a, o.identity)
                      : o.values(a)
                : [];
        }),
        (o.size = function (a) {
            return null == a ? 0 : w(a) ? a.length : o.keys(a).length;
        }),
        (o.partition = function (a, b, c) {
            b = q(b, c);
            var d = [],
                e = [];
            return (
                o.each(a, function (a, c, f) {
                    (b(a, c, f) ? d : e).push(a);
                }),
                [d, e]
            );
        }),
        (o.first =
            o.head =
            o.take =
                function (a, b, c) {
                    return null == a
                        ? void 0
                        : null == b || c
                          ? a[0]
                          : o.initial(a, a.length - b);
                }),
        (o.initial = function (a, b, c) {
            return g.call(
                a,
                0,
                Math.max(0, a.length - (null == b || c ? 1 : b)),
            );
        }),
        (o.last = function (a, b, c) {
            return null == a
                ? void 0
                : null == b || c
                  ? a[a.length - 1]
                  : o.rest(a, Math.max(0, a.length - b));
        }),
        (o.rest =
            o.tail =
            o.drop =
                function (a, b, c) {
                    return g.call(a, null == b || c ? 1 : b);
                }),
        (o.compact = function (a) {
            return o.filter(a, o.identity);
        }),
        (z = function (a, b, c, d) {
            var g,
                h,
                i,
                j,
                k,
                e = [],
                f = 0;
            for (g = d || 0, h = v(a); h > g; g++)
                if (((i = a[g]), w(i) && (o.isArray(i) || o.isArguments(i))))
                    for (
                        b || (i = z(i, b, c)),
                            j = 0,
                            k = i.length,
                            e.length += k;
                        k > j;

                    )
                        e[f++] = i[j++];
                else c || (e[f++] = i);
            return e;
        }),
        (o.flatten = function (a, b) {
            return z(a, b, !1);
        }),
        (o.without = function (a) {
            return o.difference(a, g.call(arguments, 1));
        }),
        (o.uniq = o.unique =
            function (a, b, c, d) {
                var e, f, g, h, i, j;
                for (
                    o.isBoolean(b) || ((d = c), (c = b), (b = !1)),
                        null != c && (c = q(c, d)),
                        e = [],
                        f = [],
                        g = 0,
                        h = v(a);
                    h > g;
                    g++
                )
                    ((i = a[g]),
                        (j = c ? c(i, g, a) : i),
                        b
                            ? ((g && f === j) || e.push(i), (f = j))
                            : c
                              ? o.contains(f, j) || (f.push(j), e.push(i))
                              : o.contains(e, i) || e.push(i));
                return e;
            }),
        (o.union = function () {
            return o.uniq(z(arguments, !0, !0));
        }),
        (o.intersection = function (a) {
            var d,
                e,
                f,
                g,
                b = [],
                c = arguments.length;
            for (d = 0, e = v(a); e > d; d++)
                if (((f = a[d]), !o.contains(b, f))) {
                    for (g = 1; c > g && o.contains(arguments[g], f); g++);
                    g === c && b.push(f);
                }
            return b;
        }),
        (o.difference = function (a) {
            var b = z(arguments, !0, !0, 1);
            return o.filter(a, function (a) {
                return !o.contains(b, a);
            });
        }),
        (o.zip = function () {
            return o.unzip(arguments);
        }),
        (o.unzip = function (a) {
            var d,
                b = (a && o.max(a, v).length) || 0,
                c = Array(b);
            for (d = 0; b > d; d++) c[d] = o.pluck(a, d);
            return c;
        }),
        (o.object = function (a, b) {
            var d,
                e,
                c = {};
            for (d = 0, e = v(a); e > d; d++)
                b ? (c[a[d]] = b[d]) : (c[a[d][0]] = a[d][1]);
            return c;
        }),
        (o.findIndex = A(1)),
        (o.findLastIndex = A(-1)),
        (o.sortedIndex = function (a, b, c, d) {
            var e, f, g, h;
            for (c = q(c, d, 1), e = c(b), f = 0, g = v(a); g > f; )
                ((h = Math.floor((f + g) / 2)),
                    c(a[h]) < e ? (f = h + 1) : (g = h));
            return f;
        }),
        (o.indexOf = B(1, o.findIndex, o.sortedIndex)),
        (o.lastIndexOf = B(-1, o.findLastIndex)),
        (o.range = function (a, b, c) {
            var d, e, f;
            for (
                null == b && ((b = a || 0), (a = 0)),
                    c = c || 1,
                    d = Math.max(Math.ceil((b - a) / c), 0),
                    e = Array(d),
                    f = 0;
                d > f;
                f++, a += c
            )
                e[f] = a;
            return e;
        }),
        (C = function (a, b, c, d, e) {
            var f, g;
            return d instanceof b
                ? ((f = s(a.prototype)),
                  (g = a.apply(f, e)),
                  o.isObject(g) ? g : f)
                : a.apply(c, e);
        }),
        (o.bind = function (a, b) {
            var c, d;
            if (l && a.bind === l) return l.apply(a, g.call(arguments, 1));
            if (!o.isFunction(a))
                throw new TypeError("Bind must be called on a function");
            return (
                (c = g.call(arguments, 2)),
                (d = function () {
                    return C(a, d, b, this, c.concat(g.call(arguments)));
                })
            );
        }),
        (o.partial = function (a) {
            var b = g.call(arguments, 1),
                c = function () {
                    var g,
                        d = 0,
                        e = b.length,
                        f = Array(e);
                    for (g = 0; e > g; g++)
                        f[g] = b[g] === o ? arguments[d++] : b[g];
                    for (; d < arguments.length; ) f.push(arguments[d++]);
                    return C(a, c, this, this, f);
                };
            return c;
        }),
        (o.bindAll = function (a) {
            var b,
                d,
                c = arguments.length;
            if (1 >= c)
                throw new Error("bindAll must be passed function names");
            for (b = 1; c > b; b++)
                ((d = arguments[b]), (a[d] = o.bind(a[d], a)));
            return a;
        }),
        (o.memoize = function (a, b) {
            var c = function (d) {
                var e = c.cache,
                    f = "" + (b ? b.apply(this, arguments) : d);
                return (o.has(e, f) || (e[f] = a.apply(this, arguments)), e[f]);
            };
            return ((c.cache = {}), c);
        }),
        (o.delay = function (a, b) {
            var c = g.call(arguments, 2);
            return setTimeout(function () {
                return a.apply(null, c);
            }, b);
        }),
        (o.defer = o.partial(o.delay, o, 1)),
        (o.throttle = function (a, b, c) {
            var d,
                e,
                f,
                i,
                g = null,
                h = 0;
            return (
                c || (c = {}),
                (i = function () {
                    ((h = c.leading === !1 ? 0 : o.now()),
                        (g = null),
                        (f = a.apply(d, e)),
                        g || (d = e = null));
                }),
                function () {
                    var k,
                        j = o.now();
                    return (
                        h || c.leading !== !1 || (h = j),
                        (k = b - (j - h)),
                        (d = this),
                        (e = arguments),
                        0 >= k || k > b
                            ? (g && (clearTimeout(g), (g = null)),
                              (h = j),
                              (f = a.apply(d, e)),
                              g || (d = e = null))
                            : g || c.trailing === !1 || (g = setTimeout(i, k)),
                        f
                    );
                }
            );
        }),
        (o.debounce = function (a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i = function () {
                    var j = o.now() - g;
                    b > j && j >= 0
                        ? (d = setTimeout(i, b - j))
                        : ((d = null),
                          c || ((h = a.apply(f, e)), d || (f = e = null)));
                };
            return function () {
                ((f = this), (e = arguments), (g = o.now()));
                var j = c && !d;
                return (
                    d || (d = setTimeout(i, b)),
                    j && ((h = a.apply(f, e)), (f = e = null)),
                    h
                );
            };
        }),
        (o.wrap = function (a, b) {
            return o.partial(b, a);
        }),
        (o.negate = function (a) {
            return function () {
                return !a.apply(this, arguments);
            };
        }),
        (o.compose = function () {
            var a = arguments,
                b = a.length - 1;
            return function () {
                for (var c = b, d = a[b].apply(this, arguments); c--; )
                    d = a[c].call(this, d);
                return d;
            };
        }),
        (o.after = function (a, b) {
            return function () {
                return --a < 1 ? b.apply(this, arguments) : void 0;
            };
        }),
        (o.before = function (a, b) {
            var c;
            return function () {
                return (
                    --a > 0 && (c = b.apply(this, arguments)),
                    1 >= a && (b = null),
                    c
                );
            };
        }),
        (o.once = o.partial(o.before, 2)),
        (D = !{ toString: null }.propertyIsEnumerable("toString")),
        (E = [
            "valueOf",
            "isPrototypeOf",
            "toString",
            "propertyIsEnumerable",
            "hasOwnProperty",
            "toLocaleString",
        ]),
        (o.keys = function (a) {
            var b, c;
            if (!o.isObject(a)) return [];
            if (k) return k(a);
            b = [];
            for (c in a) o.has(a, c) && b.push(c);
            return (D && F(a, b), b);
        }),
        (o.allKeys = function (a) {
            var b, c;
            if (!o.isObject(a)) return [];
            b = [];
            for (c in a) b.push(c);
            return (D && F(a, b), b);
        }),
        (o.values = function (a) {
            var e,
                b = o.keys(a),
                c = b.length,
                d = Array(c);
            for (e = 0; c > e; e++) d[e] = a[b[e]];
            return d;
        }),
        (o.mapObject = function (a, b, c) {
            var g, d, e, f, h;
            for (
                b = q(b, c), d = o.keys(a), e = d.length, f = {}, h = 0;
                e > h;
                h++
            )
                ((g = d[h]), (f[g] = b(a[g], g, a)));
            return f;
        }),
        (o.pairs = function (a) {
            var e,
                b = o.keys(a),
                c = b.length,
                d = Array(c);
            for (e = 0; c > e; e++) d[e] = [b[e], a[b[e]]];
            return d;
        }),
        (o.invert = function (a) {
            var d,
                e,
                b = {},
                c = o.keys(a);
            for (d = 0, e = c.length; e > d; d++) b[a[c[d]]] = c[d];
            return b;
        }),
        (o.functions = o.methods =
            function (a) {
                var c,
                    b = [];
                for (c in a) o.isFunction(a[c]) && b.push(c);
                return b.sort();
            }),
        (o.extend = r(o.allKeys)),
        (o.extendOwn = o.assign = r(o.keys)),
        (o.findKey = function (a, b, c) {
            var e, d, f, g;
            for (b = q(b, c), d = o.keys(a), f = 0, g = d.length; g > f; f++)
                if (((e = d[f]), b(a[e], e, a))) return e;
        }),
        (o.pick = function (a, b, c) {
            var f,
                g,
                h,
                i,
                j,
                k,
                d = {},
                e = a;
            if (null == e) return d;
            o.isFunction(b)
                ? ((g = o.allKeys(e)), (f = p(b, c)))
                : ((g = z(arguments, !1, !1, 1)),
                  (f = function (a, b, c) {
                      return b in c;
                  }),
                  (e = Object(e)));
            for (h = 0, i = g.length; i > h; h++)
                ((j = g[h]), (k = e[j]), f(k, j, e) && (d[j] = k));
            return d;
        }),
        (o.omit = function (a, b, c) {
            if (o.isFunction(b)) b = o.negate(b);
            else {
                var d = o.map(z(arguments, !1, !1, 1), String);
                b = function (a, b) {
                    return !o.contains(d, b);
                };
            }
            return o.pick(a, b, c);
        }),
        (o.defaults = r(o.allKeys, !0)),
        (o.create = function (a, b) {
            var c = s(a);
            return (b && o.extendOwn(c, b), c);
        }),
        (o.clone = function (a) {
            return o.isObject(a)
                ? o.isArray(a)
                    ? a.slice()
                    : o.extend({}, a)
                : a;
        }),
        (o.tap = function (a, b) {
            return (b(a), a);
        }),
        (o.isMatch = function (a, b) {
            var e,
                f,
                g,
                c = o.keys(b),
                d = c.length;
            if (null == a) return !d;
            for (e = Object(a), f = 0; d > f; f++)
                if (((g = c[f]), b[g] !== e[g] || !(g in e))) return !1;
            return !0;
        }),
        (G = function (a, b, c, d) {
            var e, f, g, i, j, l, k;
            if (a === b) return 0 !== a || 1 / a === 1 / b;
            if (null == a || null == b) return a === b;
            if (
                (a instanceof o && (a = a._wrapped),
                b instanceof o && (b = b._wrapped),
                (e = h.call(a)),
                e !== h.call(b))
            )
                return !1;
            switch (e) {
                case "[object RegExp]":
                case "[object String]":
                    return "" + a == "" + b;
                case "[object Number]":
                    return +a !== +a
                        ? +b !== +b
                        : 0 === +a
                          ? 1 / +a === 1 / b
                          : +a === +b;
                case "[object Date]":
                case "[object Boolean]":
                    return +a === +b;
            }
            if (((f = "[object Array]" === e), !f)) {
                if ("object" != typeof a || "object" != typeof b) return !1;
                if (
                    ((g = a.constructor),
                    (i = b.constructor),
                    g !== i &&
                        !(
                            o.isFunction(g) &&
                            g instanceof g &&
                            o.isFunction(i) &&
                            i instanceof i
                        ) &&
                        "constructor" in a &&
                        "constructor" in b)
                )
                    return !1;
            }
            for (c = c || [], d = d || [], j = c.length; j--; )
                if (c[j] === a) return d[j] === b;
            if ((c.push(a), d.push(b), f)) {
                if (((j = a.length), j !== b.length)) return !1;
                for (; j--; ) if (!G(a[j], b[j], c, d)) return !1;
            } else {
                if (((k = o.keys(a)), (j = k.length), o.keys(b).length !== j))
                    return !1;
                for (; j--; )
                    if (((l = k[j]), !o.has(b, l) || !G(a[l], b[l], c, d)))
                        return !1;
            }
            return (c.pop(), d.pop(), !0);
        }),
        (o.isEqual = function (a, b) {
            return G(a, b);
        }),
        (o.isEmpty = function (a) {
            return null == a
                ? !0
                : w(a) && (o.isArray(a) || o.isString(a) || o.isArguments(a))
                  ? 0 === a.length
                  : 0 === o.keys(a).length;
        }),
        (o.isElement = function (a) {
            return !(!a || 1 !== a.nodeType);
        }),
        (o.isArray =
            j ||
            function (a) {
                return "[object Array]" === h.call(a);
            }),
        (o.isObject = function (a) {
            var b = typeof a;
            return "function" === b || ("object" === b && !!a);
        }),
        o.each(
            [
                "Arguments",
                "Function",
                "String",
                "Number",
                "Date",
                "RegExp",
                "Error",
            ],
            function (a) {
                o["is" + a] = function (b) {
                    return h.call(b) === "[object " + a + "]";
                };
            },
        ),
        o.isArguments(arguments) ||
            (o.isArguments = function (a) {
                return o.has(a, "callee");
            }),
        "function" != typeof /./ &&
            "object" != typeof Int8Array &&
            (o.isFunction = function (a) {
                return "function" == typeof a || !1;
            }),
        (o.isFinite = function (a) {
            return isFinite(a) && !isNaN(parseFloat(a));
        }),
        (o.isNaN = function (a) {
            return o.isNumber(a) && a !== +a;
        }),
        (o.isBoolean = function (a) {
            return a === !0 || a === !1 || "[object Boolean]" === h.call(a);
        }),
        (o.isNull = function (a) {
            return null === a;
        }),
        (o.isUndefined = function (a) {
            return void 0 === a;
        }),
        (o.has = function (a, b) {
            return null != a && i.call(a, b);
        }),
        (o.noConflict = function () {
            return ((a._ = b), this);
        }),
        (o.identity = function (a) {
            return a;
        }),
        (o.constant = function (a) {
            return function () {
                return a;
            };
        }),
        (o.noop = function () {}),
        (o.property = t),
        (o.propertyOf = function (a) {
            return null == a
                ? function () {}
                : function (b) {
                      return a[b];
                  };
        }),
        (o.matcher = o.matches =
            function (a) {
                return (
                    (a = o.extendOwn({}, a)),
                    function (b) {
                        return o.isMatch(b, a);
                    }
                );
            }),
        (o.times = function (a, b, c) {
            var e,
                d = Array(Math.max(0, a));
            for (b = p(b, c, 1), e = 0; a > e; e++) d[e] = b(e);
            return d;
        }),
        (o.random = function (a, b) {
            return (
                null == b && ((b = a), (a = 0)),
                a + Math.floor(Math.random() * (b - a + 1))
            );
        }),
        (o.now =
            Date.now ||
            function () {
                return new Date().getTime();
            }),
        (H = {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#x27;",
            "`": "&#x60;",
        }),
        (I = o.invert(H)),
        (J = function (a) {
            var b = function (b) {
                    return a[b];
                },
                c = "(?:" + o.keys(a).join("|") + ")",
                d = RegExp(c),
                e = RegExp(c, "g");
            return function (a) {
                return (
                    (a = null == a ? "" : "" + a),
                    d.test(a) ? a.replace(e, b) : a
                );
            };
        }),
        (o.escape = J(H)),
        (o.unescape = J(I)),
        (o.result = function (a, b, c) {
            var d = null == a ? void 0 : a[b];
            return (void 0 === d && (d = c), o.isFunction(d) ? d.call(a) : d);
        }),
        (K = 0),
        (o.uniqueId = function (a) {
            var b = ++K + "";
            return a ? a + b : b;
        }),
        (o.templateSettings = {
            evaluate: /<%([\s\S]+?)%>/g,
            interpolate: /<%=([\s\S]+?)%>/g,
            escape: /<%-([\s\S]+?)%>/g,
        }),
        (L = /(.)^/),
        (M = {
            "'": "'",
            "\\": "\\",
            "\r": "r",
            "\n": "n",
            "\u2028": "u2028",
            "\u2029": "u2029",
        }),
        (N = /\\|'|\r|\n|\u2028|\u2029/g),
        (O = function (a) {
            return "\\" + M[a];
        }),
        (o.template = function (a, b, c) {
            var d, e, f, g, i, j;
            (!b && c && (b = c),
                (b = o.defaults({}, b, o.templateSettings)),
                (d = RegExp(
                    [
                        (b.escape || L).source,
                        (b.interpolate || L).source,
                        (b.evaluate || L).source,
                    ].join("|") + "|$",
                    "g",
                )),
                (e = 0),
                (f = "__p+='"),
                a.replace(d, function (b, c, d, g, h) {
                    return (
                        (f += a.slice(e, h).replace(N, O)),
                        (e = h + b.length),
                        c
                            ? (f +=
                                  "'+\n((__t=(" +
                                  c +
                                  "))==null?'':_.escape(__t))+\n'")
                            : d
                              ? (f +=
                                    "'+\n((__t=(" + d + "))==null?'':__t)+\n'")
                              : g && (f += "';\n" + g + "\n__p+='"),
                        b
                    );
                }),
                (f += "';\n"),
                b.variable || (f = "with(obj||{}){\n" + f + "}\n"),
                (f =
                    "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" +
                    f +
                    "return __p;\n"));
            try {
                g = new Function(b.variable || "obj", "_", f);
            } catch (h) {
                throw ((h.source = f), h);
            }
            return (
                (i = function (a) {
                    return g.call(this, a, o);
                }),
                (j = b.variable || "obj"),
                (i.source = "function(" + j + "){\n" + f + "}"),
                i
            );
        }),
        (o.chain = function (a) {
            var b = o(a);
            return ((b._chain = !0), b);
        }),
        (P = function (a, b) {
            return a._chain ? o(b).chain() : b;
        }),
        (o.mixin = function (a) {
            o.each(o.functions(a), function (b) {
                var c = (o[b] = a[b]);
                o.prototype[b] = function () {
                    var a = [this._wrapped];
                    return (f.apply(a, arguments), P(this, c.apply(o, a)));
                };
            });
        }),
        o.mixin(o),
        o.each(
            ["pop", "push", "reverse", "shift", "sort", "splice", "unshift"],
            function (a) {
                var b = c[a];
                o.prototype[a] = function () {
                    var c = this._wrapped;
                    return (
                        b.apply(c, arguments),
                        ("shift" !== a && "splice" !== a) ||
                            0 !== c.length ||
                            delete c[0],
                        P(this, c)
                    );
                };
            },
        ),
        o.each(["concat", "join", "slice"], function (a) {
            var b = c[a];
            o.prototype[a] = function () {
                return P(this, b.apply(this._wrapped, arguments));
            };
        }),
        (o.prototype.value = function () {
            return this._wrapped;
        }),
        (o.prototype.valueOf = o.prototype.toJSON = o.prototype.value),
        (o.prototype.toString = function () {
            return "" + this._wrapped;
        }),
        "function" == typeof define &&
            define.amd &&
            define("underscore", [], function () {
                return o;
            }));
}.call(this);
