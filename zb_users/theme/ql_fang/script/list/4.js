/*!
 * share-js v1.1.0
 * 鍒嗕韩闆嗘垚宸ュ叿
 * Date: 2023/9/6 11:29:34
 */ (() => {
    "use strict";
    var e = function (e, t) {
        var n = document,
            r =
                n.head ||
                n.getElementsByTagName("head")[0] ||
                n.documentElement,
            o = n.createElement("script");
        ((o.onload = t),
            (o.onerror = function () {}),
            (o.async = !0),
            (o.src = e),
            r.appendChild(o));
    };
    function t(e, t) {
        return function () {
            return e.apply(t, arguments);
        };
    }
    const { toString: n } = Object.prototype,
        { getPrototypeOf: r } = Object,
        o =
            ((i = Object.create(null)),
            (e) => {
                const t = n.call(e);
                return i[t] || (i[t] = t.slice(8, -1).toLowerCase());
            });
    var i;
    const s = (e) => ((e = e.toLowerCase()), (t) => o(t) === e),
        a = (e) => (t) => typeof t === e,
        { isArray: c } = Array,
        u = a("undefined");
    const l = s("ArrayBuffer");
    const f = a("string"),
        p = a("function"),
        d = a("number"),
        h = (e) => null !== e && "object" == typeof e,
        m = (e) => {
            if ("object" !== o(e)) return !1;
            const t = r(e);
            return !(
                (null !== t &&
                    t !== Object.prototype &&
                    null !== Object.getPrototypeOf(t)) ||
                Symbol.toStringTag in e ||
                Symbol.iterator in e
            );
        },
        y = s("Date"),
        b = s("File"),
        g = s("Blob"),
        w = s("FileList"),
        v = s("URLSearchParams");
    function E(e, t, { allOwnKeys: n = !1 } = {}) {
        if (null == e) return;
        let r, o;
        if (("object" != typeof e && (e = [e]), c(e)))
            for (r = 0, o = e.length; r < o; r++) t.call(null, e[r], r, e);
        else {
            const o = n ? Object.getOwnPropertyNames(e) : Object.keys(e),
                i = o.length;
            let s;
            for (r = 0; r < i; r++) ((s = o[r]), t.call(null, e[s], s, e));
        }
    }
    function S(e, t) {
        t = t.toLowerCase();
        const n = Object.keys(e);
        let r,
            o = n.length;
        for (; o-- > 0; ) if (((r = n[o]), t === r.toLowerCase())) return r;
        return null;
    }
    const O =
            "undefined" != typeof globalThis
                ? globalThis
                : "undefined" != typeof self
                  ? self
                  : "undefined" != typeof window
                    ? window
                    : global,
        x = (e) => !u(e) && e !== O;
    const A =
        ((T = "undefined" != typeof Uint8Array && r(Uint8Array)),
        (e) => T && e instanceof T);
    var T;
    const R = s("HTMLFormElement"),
        j = (
            ({ hasOwnProperty: e }) =>
            (t, n) =>
                e.call(t, n)
        )(Object.prototype),
        C = s("RegExp"),
        N = (e, t) => {
            const n = Object.getOwnPropertyDescriptors(e),
                r = {};
            (E(n, (n, o) => {
                let i;
                !1 !== (i = t(n, o, e)) && (r[o] = i || n);
            }),
                Object.defineProperties(e, r));
        },
        P = "abcdefghijklmnopqrstuvwxyz",
        k = "0123456789",
        U = { DIGIT: k, ALPHA: P, ALPHA_DIGIT: P + P.toUpperCase() + k };
    const D = s("AsyncFunction"),
        _ = {
            isArray: c,
            isArrayBuffer: l,
            isBuffer: function (e) {
                return (
                    null !== e &&
                    !u(e) &&
                    null !== e.constructor &&
                    !u(e.constructor) &&
                    p(e.constructor.isBuffer) &&
                    e.constructor.isBuffer(e)
                );
            },
            isFormData: (e) => {
                let t;
                return (
                    e &&
                    (("function" == typeof FormData && e instanceof FormData) ||
                        (p(e.append) &&
                            ("formdata" === (t = o(e)) ||
                                ("object" === t &&
                                    p(e.toString) &&
                                    "[object FormData]" === e.toString()))))
                );
            },
            isArrayBufferView: function (e) {
                let t;
                return (
                    (t =
                        "undefined" != typeof ArrayBuffer && ArrayBuffer.isView
                            ? ArrayBuffer.isView(e)
                            : e && e.buffer && l(e.buffer)),
                    t
                );
            },
            isString: f,
            isNumber: d,
            isBoolean: (e) => !0 === e || !1 === e,
            isObject: h,
            isPlainObject: m,
            isUndefined: u,
            isDate: y,
            isFile: b,
            isBlob: g,
            isRegExp: C,
            isFunction: p,
            isStream: (e) => h(e) && p(e.pipe),
            isURLSearchParams: v,
            isTypedArray: A,
            isFileList: w,
            forEach: E,
            merge: function e() {
                const { caseless: t } = (x(this) && this) || {},
                    n = {},
                    r = (r, o) => {
                        const i = (t && S(n, o)) || o;
                        m(n[i]) && m(r)
                            ? (n[i] = e(n[i], r))
                            : m(r)
                              ? (n[i] = e({}, r))
                              : c(r)
                                ? (n[i] = r.slice())
                                : (n[i] = r);
                    };
                for (let e = 0, t = arguments.length; e < t; e++)
                    arguments[e] && E(arguments[e], r);
                return n;
            },
            extend: (e, n, r, { allOwnKeys: o } = {}) => (
                E(
                    n,
                    (n, o) => {
                        r && p(n) ? (e[o] = t(n, r)) : (e[o] = n);
                    },
                    { allOwnKeys: o },
                ),
                e
            ),
            trim: (e) =>
                e.trim
                    ? e.trim()
                    : e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, ""),
            stripBOM: (e) => (65279 === e.charCodeAt(0) && (e = e.slice(1)), e),
            inherits: (e, t, n, r) => {
                ((e.prototype = Object.create(t.prototype, r)),
                    (e.prototype.constructor = e),
                    Object.defineProperty(e, "super", { value: t.prototype }),
                    n && Object.assign(e.prototype, n));
            },
            toFlatObject: (e, t, n, o) => {
                let i, s, a;
                const c = {};
                if (((t = t || {}), null == e)) return t;
                do {
                    for (
                        i = Object.getOwnPropertyNames(e), s = i.length;
                        s-- > 0;

                    )
                        ((a = i[s]),
                            (o && !o(a, e, t)) ||
                                c[a] ||
                                ((t[a] = e[a]), (c[a] = !0)));
                    e = !1 !== n && r(e);
                } while (e && (!n || n(e, t)) && e !== Object.prototype);
                return t;
            },
            kindOf: o,
            kindOfTest: s,
            endsWith: (e, t, n) => {
                ((e = String(e)),
                    (void 0 === n || n > e.length) && (n = e.length),
                    (n -= t.length));
                const r = e.indexOf(t, n);
                return -1 !== r && r === n;
            },
            toArray: (e) => {
                if (!e) return null;
                if (c(e)) return e;
                let t = e.length;
                if (!d(t)) return null;
                const n = new Array(t);
                for (; t-- > 0; ) n[t] = e[t];
                return n;
            },
            forEachEntry: (e, t) => {
                const n = (e && e[Symbol.iterator]).call(e);
                let r;
                for (; (r = n.next()) && !r.done; ) {
                    const n = r.value;
                    t.call(e, n[0], n[1]);
                }
            },
            matchAll: (e, t) => {
                let n;
                const r = [];
                for (; null !== (n = e.exec(t)); ) r.push(n);
                return r;
            },
            isHTMLForm: R,
            hasOwnProperty: j,
            hasOwnProp: j,
            reduceDescriptors: N,
            freezeMethods: (e) => {
                N(e, (t, n) => {
                    if (
                        p(e) &&
                        -1 !== ["arguments", "caller", "callee"].indexOf(n)
                    )
                        return !1;
                    const r = e[n];
                    p(r) &&
                        ((t.enumerable = !1),
                        "writable" in t
                            ? (t.writable = !1)
                            : t.set ||
                              (t.set = () => {
                                  throw Error(
                                      "Can not rewrite read-only method '" +
                                          n +
                                          "'",
                                  );
                              }));
                });
            },
            toObjectSet: (e, t) => {
                const n = {},
                    r = (e) => {
                        e.forEach((e) => {
                            n[e] = !0;
                        });
                    };
                return (c(e) ? r(e) : r(String(e).split(t)), n);
            },
            toCamelCase: (e) =>
                e
                    .toLowerCase()
                    .replace(/[-_\s]([a-z\d])(\w*)/g, function (e, t, n) {
                        return t.toUpperCase() + n;
                    }),
            noop: () => {},
            toFiniteNumber: (e, t) => ((e = +e), Number.isFinite(e) ? e : t),
            findKey: S,
            global: O,
            isContextDefined: x,
            ALPHABET: U,
            generateString: (e = 16, t = U.ALPHA_DIGIT) => {
                let n = "";
                const { length: r } = t;
                for (; e--; ) n += t[(Math.random() * r) | 0];
                return n;
            },
            isSpecCompliantForm: function (e) {
                return !!(
                    e &&
                    p(e.append) &&
                    "FormData" === e[Symbol.toStringTag] &&
                    e[Symbol.iterator]
                );
            },
            toJSONObject: (e) => {
                const t = new Array(10),
                    n = (e, r) => {
                        if (h(e)) {
                            if (t.indexOf(e) >= 0) return;
                            if (!("toJSON" in e)) {
                                t[r] = e;
                                const o = c(e) ? [] : {};
                                return (
                                    E(e, (e, t) => {
                                        const i = n(e, r + 1);
                                        !u(i) && (o[t] = i);
                                    }),
                                    (t[r] = void 0),
                                    o
                                );
                            }
                        }
                        return e;
                    };
                return n(e, 0);
            },
            isAsyncFn: D,
            isThenable: (e) => e && (h(e) || p(e)) && p(e.then) && p(e.catch),
        };
    function F(e, t, n, r, o) {
        (Error.call(this),
            Error.captureStackTrace
                ? Error.captureStackTrace(this, this.constructor)
                : (this.stack = new Error().stack),
            (this.message = e),
            (this.name = "AxiosError"),
            t && (this.code = t),
            n && (this.config = n),
            r && (this.request = r),
            o && (this.response = o));
    }
    _.inherits(F, Error, {
        toJSON: function () {
            return {
                message: this.message,
                name: this.name,
                description: this.description,
                number: this.number,
                fileName: this.fileName,
                lineNumber: this.lineNumber,
                columnNumber: this.columnNumber,
                stack: this.stack,
                config: _.toJSONObject(this.config),
                code: this.code,
                status:
                    this.response && this.response.status
                        ? this.response.status
                        : null,
            };
        },
    });
    const W = F.prototype,
        B = {};
    ([
        "ERR_BAD_OPTION_VALUE",
        "ERR_BAD_OPTION",
        "ECONNABORTED",
        "ETIMEDOUT",
        "ERR_NETWORK",
        "ERR_FR_TOO_MANY_REDIRECTS",
        "ERR_DEPRECATED",
        "ERR_BAD_RESPONSE",
        "ERR_BAD_REQUEST",
        "ERR_CANCELED",
        "ERR_NOT_SUPPORT",
        "ERR_INVALID_URL",
    ].forEach((e) => {
        B[e] = { value: e };
    }),
        Object.defineProperties(F, B),
        Object.defineProperty(W, "isAxiosError", { value: !0 }),
        (F.from = (e, t, n, r, o, i) => {
            const s = Object.create(W);
            return (
                _.toFlatObject(
                    e,
                    s,
                    function (e) {
                        return e !== Error.prototype;
                    },
                    (e) => "isAxiosError" !== e,
                ),
                F.call(s, e.message, t, n, r, o),
                (s.cause = e),
                (s.name = e.name),
                i && Object.assign(s, i),
                s
            );
        }));
    const L = F;
    function I(e) {
        return _.isPlainObject(e) || _.isArray(e);
    }
    function q(e) {
        return _.endsWith(e, "[]") ? e.slice(0, -2) : e;
    }
    function M(e, t, n) {
        return e
            ? e
                  .concat(t)
                  .map(function (e, t) {
                      return ((e = q(e)), !n && t ? "[" + e + "]" : e);
                  })
                  .join(n ? "." : "")
            : t;
    }
    const z = _.toFlatObject(_, {}, null, function (e) {
        return /^is[A-Z]/.test(e);
    });
    const H = function (e, t, n) {
        if (!_.isObject(e)) throw new TypeError("target must be an object");
        t = t || new FormData();
        const r = (n = _.toFlatObject(
                n,
                { metaTokens: !0, dots: !1, indexes: !1 },
                !1,
                function (e, t) {
                    return !_.isUndefined(t[e]);
                },
            )).metaTokens,
            o = n.visitor || u,
            i = n.dots,
            s = n.indexes,
            a =
                (n.Blob || ("undefined" != typeof Blob && Blob)) &&
                _.isSpecCompliantForm(t);
        if (!_.isFunction(o)) throw new TypeError("visitor must be a function");
        function c(e) {
            if (null === e) return "";
            if (_.isDate(e)) return e.toISOString();
            if (!a && _.isBlob(e))
                throw new L("Blob is not supported. Use a Buffer instead.");
            return _.isArrayBuffer(e) || _.isTypedArray(e)
                ? a && "function" == typeof Blob
                    ? new Blob([e])
                    : Buffer.from(e)
                : e;
        }
        function u(e, n, o) {
            let a = e;
            if (e && !o && "object" == typeof e)
                if (_.endsWith(n, "{}"))
                    ((n = r ? n : n.slice(0, -2)), (e = JSON.stringify(e)));
                else if (
                    (_.isArray(e) &&
                        (function (e) {
                            return _.isArray(e) && !e.some(I);
                        })(e)) ||
                    ((_.isFileList(e) || _.endsWith(n, "[]")) &&
                        (a = _.toArray(e)))
                )
                    return (
                        (n = q(n)),
                        a.forEach(function (e, r) {
                            !_.isUndefined(e) &&
                                null !== e &&
                                t.append(
                                    !0 === s
                                        ? M([n], r, i)
                                        : null === s
                                          ? n
                                          : n + "[]",
                                    c(e),
                                );
                        }),
                        !1
                    );
            return !!I(e) || (t.append(M(o, n, i), c(e)), !1);
        }
        const l = [],
            f = Object.assign(z, {
                defaultVisitor: u,
                convertValue: c,
                isVisitable: I,
            });
        if (!_.isObject(e)) throw new TypeError("data must be an object");
        return (
            (function e(n, r) {
                if (!_.isUndefined(n)) {
                    if (-1 !== l.indexOf(n))
                        throw Error(
                            "Circular reference detected in " + r.join("."),
                        );
                    (l.push(n),
                        _.forEach(n, function (n, i) {
                            !0 ===
                                (!(_.isUndefined(n) || null === n) &&
                                    o.call(
                                        t,
                                        n,
                                        _.isString(i) ? i.trim() : i,
                                        r,
                                        f,
                                    )) && e(n, r ? r.concat(i) : [i]);
                        }),
                        l.pop());
                }
            })(e),
            t
        );
    };
    function J(e) {
        const t = {
            "!": "%21",
            "'": "%27",
            "(": "%28",
            ")": "%29",
            "~": "%7E",
            "%20": "+",
            "%00": "\0",
        };
        return encodeURIComponent(e).replace(/[!'()~]|%20|%00/g, function (e) {
            return t[e];
        });
    }
    function K(e, t) {
        ((this._pairs = []), e && H(e, this, t));
    }
    const V = K.prototype;
    ((V.append = function (e, t) {
        this._pairs.push([e, t]);
    }),
        (V.toString = function (e) {
            const t = e
                ? function (t) {
                      return e.call(this, t, J);
                  }
                : J;
            return this._pairs
                .map(function (e) {
                    return t(e[0]) + "=" + t(e[1]);
                }, "")
                .join("&");
        }));
    const G = K;
    function Q(e) {
        return encodeURIComponent(e)
            .replace(/%3A/gi, ":")
            .replace(/%24/g, "$")
            .replace(/%2C/gi, ",")
            .replace(/%20/g, "+")
            .replace(/%5B/gi, "[")
            .replace(/%5D/gi, "]");
    }
    function $(e, t, n) {
        if (!t) return e;
        const r = (n && n.encode) || Q,
            o = n && n.serialize;
        let i;
        if (
            ((i = o
                ? o(t, n)
                : _.isURLSearchParams(t)
                  ? t.toString()
                  : new G(t, n).toString(r)),
            i)
        ) {
            const t = e.indexOf("#");
            (-1 !== t && (e = e.slice(0, t)),
                (e += (-1 === e.indexOf("?") ? "?" : "&") + i));
        }
        return e;
    }
    const X = class {
            constructor() {
                this.handlers = [];
            }
            use(e, t, n) {
                return (
                    this.handlers.push({
                        fulfilled: e,
                        rejected: t,
                        synchronous: !!n && n.synchronous,
                        runWhen: n ? n.runWhen : null,
                    }),
                    this.handlers.length - 1
                );
            }
            eject(e) {
                this.handlers[e] && (this.handlers[e] = null);
            }
            clear() {
                this.handlers && (this.handlers = []);
            }
            forEach(e) {
                _.forEach(this.handlers, function (t) {
                    null !== t && e(t);
                });
            }
        },
        Z = {
            silentJSONParsing: !0,
            forcedJSONParsing: !0,
            clarifyTimeoutError: !1,
        },
        Y = {
            isBrowser: !0,
            classes: {
                URLSearchParams:
                    "undefined" != typeof URLSearchParams ? URLSearchParams : G,
                FormData: "undefined" != typeof FormData ? FormData : null,
                Blob: "undefined" != typeof Blob ? Blob : null,
            },
            isStandardBrowserEnv: (() => {
                let e;
                return (
                    ("undefined" == typeof navigator ||
                        ("ReactNative" !== (e = navigator.product) &&
                            "NativeScript" !== e &&
                            "NS" !== e)) &&
                    "undefined" != typeof window &&
                    "undefined" != typeof document
                );
            })(),
            isStandardBrowserWebWorkerEnv:
                "undefined" != typeof WorkerGlobalScope &&
                self instanceof WorkerGlobalScope &&
                "function" == typeof self.importScripts,
            protocols: ["http", "https", "file", "blob", "url", "data"],
        };
    const ee = function (e) {
        function t(e, n, r, o) {
            let i = e[o++];
            const s = Number.isFinite(+i),
                a = o >= e.length;
            if (((i = !i && _.isArray(r) ? r.length : i), a))
                return (
                    _.hasOwnProp(r, i) ? (r[i] = [r[i], n]) : (r[i] = n),
                    !s
                );
            (r[i] && _.isObject(r[i])) || (r[i] = []);
            return (
                t(e, n, r[i], o) &&
                    _.isArray(r[i]) &&
                    (r[i] = (function (e) {
                        const t = {},
                            n = Object.keys(e);
                        let r;
                        const o = n.length;
                        let i;
                        for (r = 0; r < o; r++) ((i = n[r]), (t[i] = e[i]));
                        return t;
                    })(r[i])),
                !s
            );
        }
        if (_.isFormData(e) && _.isFunction(e.entries)) {
            const n = {};
            return (
                _.forEachEntry(e, (e, r) => {
                    t(
                        (function (e) {
                            return _.matchAll(/\w+|\[(\w*)]/g, e).map((e) =>
                                "[]" === e[0] ? "" : e[1] || e[0],
                            );
                        })(e),
                        r,
                        n,
                        0,
                    );
                }),
                n
            );
        }
        return null;
    };
    const te = {
        transitional: Z,
        adapter: Y.isNode ? "http" : "xhr",
        transformRequest: [
            function (e, t) {
                const n = t.getContentType() || "",
                    r = n.indexOf("application/json") > -1,
                    o = _.isObject(e);
                o && _.isHTMLForm(e) && (e = new FormData(e));
                if (_.isFormData(e)) return r && r ? JSON.stringify(ee(e)) : e;
                if (
                    _.isArrayBuffer(e) ||
                    _.isBuffer(e) ||
                    _.isStream(e) ||
                    _.isFile(e) ||
                    _.isBlob(e)
                )
                    return e;
                if (_.isArrayBufferView(e)) return e.buffer;
                if (_.isURLSearchParams(e))
                    return (
                        t.setContentType(
                            "application/x-www-form-urlencoded;charset=utf-8",
                            !1,
                        ),
                        e.toString()
                    );
                let i;
                if (o) {
                    if (n.indexOf("application/x-www-form-urlencoded") > -1)
                        return (function (e, t) {
                            return H(
                                e,
                                new Y.classes.URLSearchParams(),
                                Object.assign(
                                    {
                                        visitor: function (e, t, n, r) {
                                            return Y.isNode && _.isBuffer(e)
                                                ? (this.append(
                                                      t,
                                                      e.toString("base64"),
                                                  ),
                                                  !1)
                                                : r.defaultVisitor.apply(
                                                      this,
                                                      arguments,
                                                  );
                                        },
                                    },
                                    t,
                                ),
                            );
                        })(e, this.formSerializer).toString();
                    if (
                        (i = _.isFileList(e)) ||
                        n.indexOf("multipart/form-data") > -1
                    ) {
                        const t = this.env && this.env.FormData;
                        return H(
                            i ? { "files[]": e } : e,
                            t && new t(),
                            this.formSerializer,
                        );
                    }
                }
                return o || r
                    ? (t.setContentType("application/json", !1),
                      (function (e, t, n) {
                          if (_.isString(e))
                              try {
                                  return ((t || JSON.parse)(e), _.trim(e));
                              } catch (e) {
                                  if ("SyntaxError" !== e.name) throw e;
                              }
                          return (n || JSON.stringify)(e);
                      })(e))
                    : e;
            },
        ],
        transformResponse: [
            function (e) {
                const t = this.transitional || te.transitional,
                    n = t && t.forcedJSONParsing,
                    r = "json" === this.responseType;
                if (e && _.isString(e) && ((n && !this.responseType) || r)) {
                    const n = !(t && t.silentJSONParsing) && r;
                    try {
                        return JSON.parse(e);
                    } catch (e) {
                        if (n) {
                            if ("SyntaxError" === e.name)
                                throw L.from(
                                    e,
                                    L.ERR_BAD_RESPONSE,
                                    this,
                                    null,
                                    this.response,
                                );
                            throw e;
                        }
                    }
                }
                return e;
            },
        ],
        timeout: 0,
        xsrfCookieName: "XSRF-TOKEN",
        xsrfHeaderName: "X-XSRF-TOKEN",
        maxContentLength: -1,
        maxBodyLength: -1,
        env: { FormData: Y.classes.FormData, Blob: Y.classes.Blob },
        validateStatus: function (e) {
            return e >= 200 && e < 300;
        },
        headers: {
            common: {
                Accept: "application/json, text/plain, */*",
                "Content-Type": void 0,
            },
        },
    };
    _.forEach(["delete", "get", "head", "post", "put", "patch"], (e) => {
        te.headers[e] = {};
    });
    const ne = te,
        re = _.toObjectSet([
            "age",
            "authorization",
            "content-length",
            "content-type",
            "etag",
            "expires",
            "from",
            "host",
            "if-modified-since",
            "if-unmodified-since",
            "last-modified",
            "location",
            "max-forwards",
            "proxy-authorization",
            "referer",
            "retry-after",
            "user-agent",
        ]),
        oe = Symbol("internals");
    function ie(e) {
        return e && String(e).trim().toLowerCase();
    }
    function se(e) {
        return !1 === e || null == e ? e : _.isArray(e) ? e.map(se) : String(e);
    }
    function ae(e, t, n, r, o) {
        return _.isFunction(r)
            ? r.call(this, t, n)
            : (o && (t = n),
              _.isString(t)
                  ? _.isString(r)
                      ? -1 !== t.indexOf(r)
                      : _.isRegExp(r)
                        ? r.test(t)
                        : void 0
                  : void 0);
    }
    class ce {
        constructor(e) {
            e && this.set(e);
        }
        set(e, t, n) {
            const r = this;
            function o(e, t, n) {
                const o = ie(t);
                if (!o)
                    throw new Error("header name must be a non-empty string");
                const i = _.findKey(r, o);
                (!i ||
                    void 0 === r[i] ||
                    !0 === n ||
                    (void 0 === n && !1 !== r[i])) &&
                    (r[i || t] = se(e));
            }
            const i = (e, t) => _.forEach(e, (e, n) => o(e, n, t));
            return (
                _.isPlainObject(e) || e instanceof this.constructor
                    ? i(e, t)
                    : _.isString(e) &&
                        (e = e.trim()) &&
                        !/^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(e.trim())
                      ? i(
                            ((e) => {
                                const t = {};
                                let n, r, o;
                                return (
                                    e &&
                                        e.split("\n").forEach(function (e) {
                                            ((o = e.indexOf(":")),
                                                (n = e
                                                    .substring(0, o)
                                                    .trim()
                                                    .toLowerCase()),
                                                (r = e.substring(o + 1).trim()),
                                                !n ||
                                                    (t[n] && re[n]) ||
                                                    ("set-cookie" === n
                                                        ? t[n]
                                                            ? t[n].push(r)
                                                            : (t[n] = [r])
                                                        : (t[n] = t[n]
                                                              ? t[n] + ", " + r
                                                              : r)));
                                        }),
                                    t
                                );
                            })(e),
                            t,
                        )
                      : null != e && o(t, e, n),
                this
            );
        }
        get(e, t) {
            if ((e = ie(e))) {
                const n = _.findKey(this, e);
                if (n) {
                    const e = this[n];
                    if (!t) return e;
                    if (!0 === t)
                        return (function (e) {
                            const t = Object.create(null),
                                n = /([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;
                            let r;
                            for (; (r = n.exec(e)); ) t[r[1]] = r[2];
                            return t;
                        })(e);
                    if (_.isFunction(t)) return t.call(this, e, n);
                    if (_.isRegExp(t)) return t.exec(e);
                    throw new TypeError(
                        "parser must be boolean|regexp|function",
                    );
                }
            }
        }
        has(e, t) {
            if ((e = ie(e))) {
                const n = _.findKey(this, e);
                return !(
                    !n ||
                    void 0 === this[n] ||
                    (t && !ae(0, this[n], n, t))
                );
            }
            return !1;
        }
        delete(e, t) {
            const n = this;
            let r = !1;
            function o(e) {
                if ((e = ie(e))) {
                    const o = _.findKey(n, e);
                    !o || (t && !ae(0, n[o], o, t)) || (delete n[o], (r = !0));
                }
            }
            return (_.isArray(e) ? e.forEach(o) : o(e), r);
        }
        clear(e) {
            const t = Object.keys(this);
            let n = t.length,
                r = !1;
            for (; n--; ) {
                const o = t[n];
                (e && !ae(0, this[o], o, e, !0)) || (delete this[o], (r = !0));
            }
            return r;
        }
        normalize(e) {
            const t = this,
                n = {};
            return (
                _.forEach(this, (r, o) => {
                    const i = _.findKey(n, o);
                    if (i) return ((t[i] = se(r)), void delete t[o]);
                    const s = e
                        ? (function (e) {
                              return e
                                  .trim()
                                  .toLowerCase()
                                  .replace(
                                      /([a-z\d])(\w*)/g,
                                      (e, t, n) => t.toUpperCase() + n,
                                  );
                          })(o)
                        : String(o).trim();
                    (s !== o && delete t[o], (t[s] = se(r)), (n[s] = !0));
                }),
                this
            );
        }
        concat(...e) {
            return this.constructor.concat(this, ...e);
        }
        toJSON(e) {
            const t = Object.create(null);
            return (
                _.forEach(this, (n, r) => {
                    null != n &&
                        !1 !== n &&
                        (t[r] = e && _.isArray(n) ? n.join(", ") : n);
                }),
                t
            );
        }
        [Symbol.iterator]() {
            return Object.entries(this.toJSON())[Symbol.iterator]();
        }
        toString() {
            return Object.entries(this.toJSON())
                .map(([e, t]) => e + ": " + t)
                .join("\n");
        }
        get [Symbol.toStringTag]() {
            return "AxiosHeaders";
        }
        static from(e) {
            return e instanceof this ? e : new this(e);
        }
        static concat(e, ...t) {
            const n = new this(e);
            return (t.forEach((e) => n.set(e)), n);
        }
        static accessor(e) {
            const t = (this[oe] = this[oe] = { accessors: {} }).accessors,
                n = this.prototype;
            function r(e) {
                const r = ie(e);
                t[r] ||
                    (!(function (e, t) {
                        const n = _.toCamelCase(" " + t);
                        ["get", "set", "has"].forEach((r) => {
                            Object.defineProperty(e, r + n, {
                                value: function (e, n, o) {
                                    return this[r].call(this, t, e, n, o);
                                },
                                configurable: !0,
                            });
                        });
                    })(n, e),
                    (t[r] = !0));
            }
            return (_.isArray(e) ? e.forEach(r) : r(e), this);
        }
    }
    (ce.accessor([
        "Content-Type",
        "Content-Length",
        "Accept",
        "Accept-Encoding",
        "User-Agent",
        "Authorization",
    ]),
        _.reduceDescriptors(ce.prototype, ({ value: e }, t) => {
            let n = t[0].toUpperCase() + t.slice(1);
            return {
                get: () => e,
                set(e) {
                    this[n] = e;
                },
            };
        }),
        _.freezeMethods(ce));
    const ue = ce;
    function le(e, t) {
        const n = this || ne,
            r = t || n,
            o = ue.from(r.headers);
        let i = r.data;
        return (
            _.forEach(e, function (e) {
                i = e.call(n, i, o.normalize(), t ? t.status : void 0);
            }),
            o.normalize(),
            i
        );
    }
    function fe(e) {
        return !(!e || !e.__CANCEL__);
    }
    function pe(e, t, n) {
        (L.call(this, null == e ? "canceled" : e, L.ERR_CANCELED, t, n),
            (this.name = "CanceledError"));
    }
    _.inherits(pe, L, { __CANCEL__: !0 });
    const de = pe;
    const he = Y.isStandardBrowserEnv
        ? {
              write: function (e, t, n, r, o, i) {
                  const s = [];
                  (s.push(e + "=" + encodeURIComponent(t)),
                      _.isNumber(n) &&
                          s.push("expires=" + new Date(n).toGMTString()),
                      _.isString(r) && s.push("path=" + r),
                      _.isString(o) && s.push("domain=" + o),
                      !0 === i && s.push("secure"),
                      (document.cookie = s.join("; ")));
              },
              read: function (e) {
                  const t = document.cookie.match(
                      new RegExp("(^|;\\s*)(" + e + ")=([^;]*)"),
                  );
                  return t ? decodeURIComponent(t[3]) : null;
              },
              remove: function (e) {
                  this.write(e, "", Date.now() - 864e5);
              },
          }
        : {
              write: function () {},
              read: function () {
                  return null;
              },
              remove: function () {},
          };
    function me(e, t) {
        return e && !/^([a-z][a-z\d+\-.]*:)?\/\//i.test(t)
            ? (function (e, t) {
                  return t
                      ? e.replace(/\/+$/, "") + "/" + t.replace(/^\/+/, "")
                      : e;
              })(e, t)
            : t;
    }
    const ye = Y.isStandardBrowserEnv
        ? (function () {
              const e = /(msie|trident)/i.test(navigator.userAgent),
                  t = document.createElement("a");
              let n;
              function r(n) {
                  let r = n;
                  return (
                      e && (t.setAttribute("href", r), (r = t.href)),
                      t.setAttribute("href", r),
                      {
                          href: t.href,
                          protocol: t.protocol
                              ? t.protocol.replace(/:$/, "")
                              : "",
                          host: t.host,
                          search: t.search ? t.search.replace(/^\?/, "") : "",
                          hash: t.hash ? t.hash.replace(/^#/, "") : "",
                          hostname: t.hostname,
                          port: t.port,
                          pathname:
                              "/" === t.pathname.charAt(0)
                                  ? t.pathname
                                  : "/" + t.pathname,
                      }
                  );
              }
              return (
                  (n = r(window.location.href)),
                  function (e) {
                      const t = _.isString(e) ? r(e) : e;
                      return t.protocol === n.protocol && t.host === n.host;
                  }
              );
          })()
        : function () {
              return !0;
          };
    const be = function (e, t) {
        e = e || 10;
        const n = new Array(e),
            r = new Array(e);
        let o,
            i = 0,
            s = 0;
        return (
            (t = void 0 !== t ? t : 1e3),
            function (a) {
                const c = Date.now(),
                    u = r[s];
                (o || (o = c), (n[i] = a), (r[i] = c));
                let l = s,
                    f = 0;
                for (; l !== i; ) ((f += n[l++]), (l %= e));
                if (
                    ((i = (i + 1) % e), i === s && (s = (s + 1) % e), c - o < t)
                )
                    return;
                const p = u && c - u;
                return p ? Math.round((1e3 * f) / p) : void 0;
            }
        );
    };
    function ge(e, t) {
        let n = 0;
        const r = be(50, 250);
        return (o) => {
            const i = o.loaded,
                s = o.lengthComputable ? o.total : void 0,
                a = i - n,
                c = r(a);
            n = i;
            const u = {
                loaded: i,
                total: s,
                progress: s ? i / s : void 0,
                bytes: a,
                rate: c || void 0,
                estimated: c && s && i <= s ? (s - i) / c : void 0,
                event: o,
            };
            ((u[t ? "download" : "upload"] = !0), e(u));
        };
    }
    const we = {
        http: null,
        xhr:
            "undefined" != typeof XMLHttpRequest &&
            function (e) {
                return new Promise(function (t, n) {
                    let r = e.data;
                    const o = ue.from(e.headers).normalize(),
                        i = e.responseType;
                    let s;
                    function a() {
                        (e.cancelToken && e.cancelToken.unsubscribe(s),
                            e.signal &&
                                e.signal.removeEventListener("abort", s));
                    }
                    _.isFormData(r) &&
                        (Y.isStandardBrowserEnv ||
                        Y.isStandardBrowserWebWorkerEnv
                            ? o.setContentType(!1)
                            : o.setContentType("multipart/form-data;", !1));
                    let c = new XMLHttpRequest();
                    if (e.auth) {
                        const t = e.auth.username || "",
                            n = e.auth.password
                                ? unescape(encodeURIComponent(e.auth.password))
                                : "";
                        o.set("Authorization", "Basic " + btoa(t + ":" + n));
                    }
                    const u = me(e.baseURL, e.url);
                    function l() {
                        if (!c) return;
                        const r = ue.from(
                            "getAllResponseHeaders" in c &&
                                c.getAllResponseHeaders(),
                        );
                        (!(function (e, t, n) {
                            const r = n.config.validateStatus;
                            n.status && r && !r(n.status)
                                ? t(
                                      new L(
                                          "Request failed with status code " +
                                              n.status,
                                          [
                                              L.ERR_BAD_REQUEST,
                                              L.ERR_BAD_RESPONSE,
                                          ][Math.floor(n.status / 100) - 4],
                                          n.config,
                                          n.request,
                                          n,
                                      ),
                                  )
                                : e(n);
                        })(
                            function (e) {
                                (t(e), a());
                            },
                            function (e) {
                                (n(e), a());
                            },
                            {
                                data:
                                    i && "text" !== i && "json" !== i
                                        ? c.response
                                        : c.responseText,
                                status: c.status,
                                statusText: c.statusText,
                                headers: r,
                                config: e,
                                request: c,
                            },
                        ),
                            (c = null));
                    }
                    if (
                        (c.open(
                            e.method.toUpperCase(),
                            $(u, e.params, e.paramsSerializer),
                            !0,
                        ),
                        (c.timeout = e.timeout),
                        "onloadend" in c
                            ? (c.onloadend = l)
                            : (c.onreadystatechange = function () {
                                  c &&
                                      4 === c.readyState &&
                                      (0 !== c.status ||
                                          (c.responseURL &&
                                              0 ===
                                                  c.responseURL.indexOf(
                                                      "file:",
                                                  ))) &&
                                      setTimeout(l);
                              }),
                        (c.onabort = function () {
                            c &&
                                (n(
                                    new L(
                                        "Request aborted",
                                        L.ECONNABORTED,
                                        e,
                                        c,
                                    ),
                                ),
                                (c = null));
                        }),
                        (c.onerror = function () {
                            (n(new L("Network Error", L.ERR_NETWORK, e, c)),
                                (c = null));
                        }),
                        (c.ontimeout = function () {
                            let t = e.timeout
                                ? "timeout of " + e.timeout + "ms exceeded"
                                : "timeout exceeded";
                            const r = e.transitional || Z;
                            (e.timeoutErrorMessage &&
                                (t = e.timeoutErrorMessage),
                                n(
                                    new L(
                                        t,
                                        r.clarifyTimeoutError
                                            ? L.ETIMEDOUT
                                            : L.ECONNABORTED,
                                        e,
                                        c,
                                    ),
                                ),
                                (c = null));
                        }),
                        Y.isStandardBrowserEnv)
                    ) {
                        const t =
                            (e.withCredentials || ye(u)) &&
                            e.xsrfCookieName &&
                            he.read(e.xsrfCookieName);
                        t && o.set(e.xsrfHeaderName, t);
                    }
                    (void 0 === r && o.setContentType(null),
                        "setRequestHeader" in c &&
                            _.forEach(o.toJSON(), function (e, t) {
                                c.setRequestHeader(t, e);
                            }),
                        _.isUndefined(e.withCredentials) ||
                            (c.withCredentials = !!e.withCredentials),
                        i && "json" !== i && (c.responseType = e.responseType),
                        "function" == typeof e.onDownloadProgress &&
                            c.addEventListener(
                                "progress",
                                ge(e.onDownloadProgress, !0),
                            ),
                        "function" == typeof e.onUploadProgress &&
                            c.upload &&
                            c.upload.addEventListener(
                                "progress",
                                ge(e.onUploadProgress),
                            ),
                        (e.cancelToken || e.signal) &&
                            ((s = (t) => {
                                c &&
                                    (n(!t || t.type ? new de(null, e, c) : t),
                                    c.abort(),
                                    (c = null));
                            }),
                            e.cancelToken && e.cancelToken.subscribe(s),
                            e.signal &&
                                (e.signal.aborted
                                    ? s()
                                    : e.signal.addEventListener("abort", s))));
                    const f = (function (e) {
                        const t = /^([-+\w]{1,25})(:?\/\/|:)/.exec(e);
                        return (t && t[1]) || "";
                    })(u);
                    f && -1 === Y.protocols.indexOf(f)
                        ? n(
                              new L(
                                  "Unsupported protocol " + f + ":",
                                  L.ERR_BAD_REQUEST,
                                  e,
                              ),
                          )
                        : c.send(r || null);
                });
            },
    };
    _.forEach(we, (e, t) => {
        if (e) {
            try {
                Object.defineProperty(e, "name", { value: t });
            } catch (e) {}
            Object.defineProperty(e, "adapterName", { value: t });
        }
    });
    const ve = (e) => {
        e = _.isArray(e) ? e : [e];
        const { length: t } = e;
        let n, r;
        for (
            let o = 0;
            o < t &&
            ((n = e[o]), !(r = _.isString(n) ? we[n.toLowerCase()] : n));
            o++
        );
        if (!r) {
            if (!1 === r)
                throw new L(
                    `Adapter ${n} is not supported by the environment`,
                    "ERR_NOT_SUPPORT",
                );
            throw new Error(
                _.hasOwnProp(we, n)
                    ? `Adapter '${n}' is not available in the build`
                    : `Unknown adapter '${n}'`,
            );
        }
        if (!_.isFunction(r)) throw new TypeError("adapter is not a function");
        return r;
    };
    function Ee(e) {
        if (
            (e.cancelToken && e.cancelToken.throwIfRequested(),
            e.signal && e.signal.aborted)
        )
            throw new de(null, e);
    }
    function Se(e) {
        (Ee(e),
            (e.headers = ue.from(e.headers)),
            (e.data = le.call(e, e.transformRequest)),
            -1 !== ["post", "put", "patch"].indexOf(e.method) &&
                e.headers.setContentType(
                    "application/x-www-form-urlencoded",
                    !1,
                ));
        return ve(e.adapter || ne.adapter)(e).then(
            function (t) {
                return (
                    Ee(e),
                    (t.data = le.call(e, e.transformResponse, t)),
                    (t.headers = ue.from(t.headers)),
                    t
                );
            },
            function (t) {
                return (
                    fe(t) ||
                        (Ee(e),
                        t &&
                            t.response &&
                            ((t.response.data = le.call(
                                e,
                                e.transformResponse,
                                t.response,
                            )),
                            (t.response.headers = ue.from(
                                t.response.headers,
                            )))),
                    Promise.reject(t)
                );
            },
        );
    }
    const Oe = (e) => (e instanceof ue ? e.toJSON() : e);
    function xe(e, t) {
        t = t || {};
        const n = {};
        function r(e, t, n) {
            return _.isPlainObject(e) && _.isPlainObject(t)
                ? _.merge.call({ caseless: n }, e, t)
                : _.isPlainObject(t)
                  ? _.merge({}, t)
                  : _.isArray(t)
                    ? t.slice()
                    : t;
        }
        function o(e, t, n) {
            return _.isUndefined(t)
                ? _.isUndefined(e)
                    ? void 0
                    : r(void 0, e, n)
                : r(e, t, n);
        }
        function i(e, t) {
            if (!_.isUndefined(t)) return r(void 0, t);
        }
        function s(e, t) {
            return _.isUndefined(t)
                ? _.isUndefined(e)
                    ? void 0
                    : r(void 0, e)
                : r(void 0, t);
        }
        function a(n, o, i) {
            return i in t ? r(n, o) : i in e ? r(void 0, n) : void 0;
        }
        const c = {
            url: i,
            method: i,
            data: i,
            baseURL: s,
            transformRequest: s,
            transformResponse: s,
            paramsSerializer: s,
            timeout: s,
            timeoutMessage: s,
            withCredentials: s,
            adapter: s,
            responseType: s,
            xsrfCookieName: s,
            xsrfHeaderName: s,
            onUploadProgress: s,
            onDownloadProgress: s,
            decompress: s,
            maxContentLength: s,
            maxBodyLength: s,
            beforeRedirect: s,
            transport: s,
            httpAgent: s,
            httpsAgent: s,
            cancelToken: s,
            socketPath: s,
            responseEncoding: s,
            validateStatus: a,
            headers: (e, t) => o(Oe(e), Oe(t), !0),
        };
        return (
            _.forEach(Object.keys(Object.assign({}, e, t)), function (r) {
                const i = c[r] || o,
                    s = i(e[r], t[r], r);
                (_.isUndefined(s) && i !== a) || (n[r] = s);
            }),
            n
        );
    }
    const Ae = "1.5.0",
        Te = {};
    ["object", "boolean", "number", "function", "string", "symbol"].forEach(
        (e, t) => {
            Te[e] = function (n) {
                return typeof n === e || "a" + (t < 1 ? "n " : " ") + e;
            };
        },
    );
    const Re = {};
    Te.transitional = function (e, t, n) {
        function r(e, t) {
            return (
                "[Axios v1.5.0] Transitional option '" +
                e +
                "'" +
                t +
                (n ? ". " + n : "")
            );
        }
        return (n, o, i) => {
            if (!1 === e)
                throw new L(
                    r(o, " has been removed" + (t ? " in " + t : "")),
                    L.ERR_DEPRECATED,
                );
            return (
                t &&
                    !Re[o] &&
                    ((Re[o] = !0),
                    console.warn(
                        r(
                            o,
                            " has been deprecated since v" +
                                t +
                                " and will be removed in the near future",
                        ),
                    )),
                !e || e(n, o, i)
            );
        };
    };
    const je = {
            assertOptions: function (e, t, n) {
                if ("object" != typeof e)
                    throw new L(
                        "options must be an object",
                        L.ERR_BAD_OPTION_VALUE,
                    );
                const r = Object.keys(e);
                let o = r.length;
                for (; o-- > 0; ) {
                    const i = r[o],
                        s = t[i];
                    if (s) {
                        const t = e[i],
                            n = void 0 === t || s(t, i, e);
                        if (!0 !== n)
                            throw new L(
                                "option " + i + " must be " + n,
                                L.ERR_BAD_OPTION_VALUE,
                            );
                    } else if (!0 !== n)
                        throw new L("Unknown option " + i, L.ERR_BAD_OPTION);
                }
            },
            validators: Te,
        },
        Ce = je.validators;
    class Ne {
        constructor(e) {
            ((this.defaults = e),
                (this.interceptors = { request: new X(), response: new X() }));
        }
        request(e, t) {
            ("string" == typeof e ? ((t = t || {}).url = e) : (t = e || {}),
                (t = xe(this.defaults, t)));
            const { transitional: n, paramsSerializer: r, headers: o } = t;
            (void 0 !== n &&
                je.assertOptions(
                    n,
                    {
                        silentJSONParsing: Ce.transitional(Ce.boolean),
                        forcedJSONParsing: Ce.transitional(Ce.boolean),
                        clarifyTimeoutError: Ce.transitional(Ce.boolean),
                    },
                    !1,
                ),
                null != r &&
                    (_.isFunction(r)
                        ? (t.paramsSerializer = { serialize: r })
                        : je.assertOptions(
                              r,
                              { encode: Ce.function, serialize: Ce.function },
                              !0,
                          )),
                (t.method = (
                    t.method ||
                    this.defaults.method ||
                    "get"
                ).toLowerCase()));
            let i = o && _.merge(o.common, o[t.method]);
            (o &&
                _.forEach(
                    ["delete", "get", "head", "post", "put", "patch", "common"],
                    (e) => {
                        delete o[e];
                    },
                ),
                (t.headers = ue.concat(i, o)));
            const s = [];
            let a = !0;
            this.interceptors.request.forEach(function (e) {
                ("function" == typeof e.runWhen && !1 === e.runWhen(t)) ||
                    ((a = a && e.synchronous),
                    s.unshift(e.fulfilled, e.rejected));
            });
            const c = [];
            let u;
            this.interceptors.response.forEach(function (e) {
                c.push(e.fulfilled, e.rejected);
            });
            let l,
                f = 0;
            if (!a) {
                const e = [Se.bind(this), void 0];
                for (
                    e.unshift.apply(e, s),
                        e.push.apply(e, c),
                        l = e.length,
                        u = Promise.resolve(t);
                    f < l;

                )
                    u = u.then(e[f++], e[f++]);
                return u;
            }
            l = s.length;
            let p = t;
            for (f = 0; f < l; ) {
                const e = s[f++],
                    t = s[f++];
                try {
                    p = e(p);
                } catch (e) {
                    t.call(this, e);
                    break;
                }
            }
            try {
                u = Se.call(this, p);
            } catch (e) {
                return Promise.reject(e);
            }
            for (f = 0, l = c.length; f < l; ) u = u.then(c[f++], c[f++]);
            return u;
        }
        getUri(e) {
            return $(
                me((e = xe(this.defaults, e)).baseURL, e.url),
                e.params,
                e.paramsSerializer,
            );
        }
    }
    (_.forEach(["delete", "get", "head", "options"], function (e) {
        Ne.prototype[e] = function (t, n) {
            return this.request(
                xe(n || {}, { method: e, url: t, data: (n || {}).data }),
            );
        };
    }),
        _.forEach(["post", "put", "patch"], function (e) {
            function t(t) {
                return function (n, r, o) {
                    return this.request(
                        xe(o || {}, {
                            method: e,
                            headers: t
                                ? { "Content-Type": "multipart/form-data" }
                                : {},
                            url: n,
                            data: r,
                        }),
                    );
                };
            }
            ((Ne.prototype[e] = t()), (Ne.prototype[e + "Form"] = t(!0)));
        }));
    const Pe = Ne;
    class ke {
        constructor(e) {
            if ("function" != typeof e)
                throw new TypeError("executor must be a function.");
            let t;
            this.promise = new Promise(function (e) {
                t = e;
            });
            const n = this;
            (this.promise.then((e) => {
                if (!n._listeners) return;
                let t = n._listeners.length;
                for (; t-- > 0; ) n._listeners[t](e);
                n._listeners = null;
            }),
                (this.promise.then = (e) => {
                    let t;
                    const r = new Promise((e) => {
                        (n.subscribe(e), (t = e));
                    }).then(e);
                    return (
                        (r.cancel = function () {
                            n.unsubscribe(t);
                        }),
                        r
                    );
                }),
                e(function (e, r, o) {
                    n.reason || ((n.reason = new de(e, r, o)), t(n.reason));
                }));
        }
        throwIfRequested() {
            if (this.reason) throw this.reason;
        }
        subscribe(e) {
            this.reason
                ? e(this.reason)
                : this._listeners
                  ? this._listeners.push(e)
                  : (this._listeners = [e]);
        }
        unsubscribe(e) {
            if (!this._listeners) return;
            const t = this._listeners.indexOf(e);
            -1 !== t && this._listeners.splice(t, 1);
        }
        static source() {
            let e;
            return {
                token: new ke(function (t) {
                    e = t;
                }),
                cancel: e,
            };
        }
    }
    const Ue = ke;
    const De = {
        Continue: 100,
        SwitchingProtocols: 101,
        Processing: 102,
        EarlyHints: 103,
        Ok: 200,
        Created: 201,
        Accepted: 202,
        NonAuthoritativeInformation: 203,
        NoContent: 204,
        ResetContent: 205,
        PartialContent: 206,
        MultiStatus: 207,
        AlreadyReported: 208,
        ImUsed: 226,
        MultipleChoices: 300,
        MovedPermanently: 301,
        Found: 302,
        SeeOther: 303,
        NotModified: 304,
        UseProxy: 305,
        Unused: 306,
        TemporaryRedirect: 307,
        PermanentRedirect: 308,
        BadRequest: 400,
        Unauthorized: 401,
        PaymentRequired: 402,
        Forbidden: 403,
        NotFound: 404,
        MethodNotAllowed: 405,
        NotAcceptable: 406,
        ProxyAuthenticationRequired: 407,
        RequestTimeout: 408,
        Conflict: 409,
        Gone: 410,
        LengthRequired: 411,
        PreconditionFailed: 412,
        PayloadTooLarge: 413,
        UriTooLong: 414,
        UnsupportedMediaType: 415,
        RangeNotSatisfiable: 416,
        ExpectationFailed: 417,
        ImATeapot: 418,
        MisdirectedRequest: 421,
        UnprocessableEntity: 422,
        Locked: 423,
        FailedDependency: 424,
        TooEarly: 425,
        UpgradeRequired: 426,
        PreconditionRequired: 428,
        TooManyRequests: 429,
        RequestHeaderFieldsTooLarge: 431,
        UnavailableForLegalReasons: 451,
        InternalServerError: 500,
        NotImplemented: 501,
        BadGateway: 502,
        ServiceUnavailable: 503,
        GatewayTimeout: 504,
        HttpVersionNotSupported: 505,
        VariantAlsoNegotiates: 506,
        InsufficientStorage: 507,
        LoopDetected: 508,
        NotExtended: 510,
        NetworkAuthenticationRequired: 511,
    };
    Object.entries(De).forEach(([e, t]) => {
        De[t] = e;
    });
    const _e = De;
    const Fe = (function e(n) {
        const r = new Pe(n),
            o = t(Pe.prototype.request, r);
        return (
            _.extend(o, Pe.prototype, r, { allOwnKeys: !0 }),
            _.extend(o, r, null, { allOwnKeys: !0 }),
            (o.create = function (t) {
                return e(xe(n, t));
            }),
            o
        );
    })(ne);
    ((Fe.Axios = Pe),
        (Fe.CanceledError = de),
        (Fe.CancelToken = Ue),
        (Fe.isCancel = fe),
        (Fe.VERSION = Ae),
        (Fe.toFormData = H),
        (Fe.AxiosError = L),
        (Fe.Cancel = Fe.CanceledError),
        (Fe.all = function (e) {
            return Promise.all(e);
        }),
        (Fe.spread = function (e) {
            return function (t) {
                return e.apply(null, t);
            };
        }),
        (Fe.isAxiosError = function (e) {
            return _.isObject(e) && !0 === e.isAxiosError;
        }),
        (Fe.mergeConfig = xe),
        (Fe.AxiosHeaders = ue),
        (Fe.formToJSON = (e) => ee(_.isHTMLForm(e) ? new FormData(e) : e)),
        (Fe.getAdapter = ve),
        (Fe.HttpStatusCode = _e),
        (Fe.default = Fe));
    const We = Fe,
        Be = "function" == typeof btoa,
        Le = "function" == typeof Buffer,
        Ie =
            ("function" == typeof TextDecoder && new TextDecoder(),
            "function" == typeof TextEncoder ? new TextEncoder() : void 0),
        qe = Array.prototype.slice.call(
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        ),
        Me =
            (((e) => {
                let t = {};
                e.forEach((e, n) => (t[e] = n));
            })(qe),
            String.fromCharCode.bind(String)),
        ze =
            ("function" == typeof Uint8Array.from &&
                Uint8Array.from.bind(Uint8Array),
            (e) =>
                e
                    .replace(/=/g, "")
                    .replace(/[+\/]/g, (e) => ("+" == e ? "-" : "_"))),
        He = (e) => {
            let t,
                n,
                r,
                o,
                i = "";
            const s = e.length % 3;
            for (let s = 0; s < e.length; ) {
                if (
                    (n = e.charCodeAt(s++)) > 255 ||
                    (r = e.charCodeAt(s++)) > 255 ||
                    (o = e.charCodeAt(s++)) > 255
                )
                    throw new TypeError("invalid character found");
                ((t = (n << 16) | (r << 8) | o),
                    (i +=
                        qe[(t >> 18) & 63] +
                        qe[(t >> 12) & 63] +
                        qe[(t >> 6) & 63] +
                        qe[63 & t]));
            }
            return s ? i.slice(0, s - 3) + "===".substring(s) : i;
        },
        Je = Be
            ? (e) => btoa(e)
            : Le
              ? (e) => Buffer.from(e, "binary").toString("base64")
              : He,
        Ke = Le
            ? (e) => Buffer.from(e).toString("base64")
            : (e) => {
                  let t = [];
                  for (let n = 0, r = e.length; n < r; n += 4096)
                      t.push(Me.apply(null, e.subarray(n, n + 4096)));
                  return Je(t.join(""));
              },
        Ve = (e) => {
            if (e.length < 2)
                return (t = e.charCodeAt(0)) < 128
                    ? e
                    : t < 2048
                      ? Me(192 | (t >>> 6)) + Me(128 | (63 & t))
                      : Me(224 | ((t >>> 12) & 15)) +
                        Me(128 | ((t >>> 6) & 63)) +
                        Me(128 | (63 & t));
            var t =
                65536 +
                1024 * (e.charCodeAt(0) - 55296) +
                (e.charCodeAt(1) - 56320);
            return (
                Me(240 | ((t >>> 18) & 7)) +
                Me(128 | ((t >>> 12) & 63)) +
                Me(128 | ((t >>> 6) & 63)) +
                Me(128 | (63 & t))
            );
        },
        Ge = /[\uD800-\uDBFF][\uDC00-\uDFFFF]|[^\x00-\x7F]/g,
        Qe = (e) => e.replace(Ge, Ve),
        $e = Le
            ? (e) => Buffer.from(e, "utf8").toString("base64")
            : Ie
              ? (e) => Ke(Ie.encode(e))
              : (e) => Je(Qe(e)),
        Xe = (e, t = !1) => (t ? ze($e(e)) : $e(e));
    var Ze = function (e, t) {
        var n =
            "https://wechat.litenews.cn/api/jssdkv4?visenon=" +
            new Date().getTime() +
            "&url=" +
            Xe(e) +
            "&b64=1";
        "undefined" != typeof shareWexnAppId &&
            "" !== shareWexnAppId &&
            (n += "&appid=" + shareWexnAppId);
        var r = (function (e) {
            for (var t = window.location.href, n = "", r = 0; r < e.length; r++)
                if (e[r].domain === t.split("/")[2]) {
                    n = e[r].appid;
                    break;
                }
            return n;
        })(t);
        return (
            "undefined" == typeof shareWexnAppId &&
                "" !== r &&
                (n += "&appid=" + r),
            "undefined" != typeof shareWexnDebug &&
                !0 === shareWexnDebug &&
                (n += "&debug=true"),
            n
        );
    };
    function Ye(e, t) {
        var n =
            ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
            e["@@iterator"];
        if (!n) {
            if (
                Array.isArray(e) ||
                (n = (function (e, t) {
                    if (!e) return;
                    if ("string" == typeof e) return et(e, t);
                    var n = Object.prototype.toString.call(e).slice(8, -1);
                    "Object" === n && e.constructor && (n = e.constructor.name);
                    if ("Map" === n || "Set" === n) return Array.from(e);
                    if (
                        "Arguments" === n ||
                        /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
                    )
                        return et(e, t);
                })(e)) ||
                (t && e && "number" == typeof e.length)
            ) {
                n && (e = n);
                var r = 0,
                    o = function () {};
                return {
                    s: o,
                    n: function () {
                        return r >= e.length
                            ? { done: !0 }
                            : { done: !1, value: e[r++] };
                    },
                    e: function (e) {
                        throw e;
                    },
                    f: o,
                };
            }
            throw new TypeError(
                "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.",
            );
        }
        var i,
            s = !0,
            a = !1;
        return {
            s: function () {
                n = n.call(e);
            },
            n: function () {
                var e = n.next();
                return ((s = e.done), e);
            },
            e: function (e) {
                ((a = !0), (i = e));
            },
            f: function () {
                try {
                    s || null == n.return || n.return();
                } finally {
                    if (a) throw i;
                }
            },
        };
    }
    function et(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
        return r;
    }
    var tt = function () {
        var e = {};
        if (
            ("undefined" == typeof shareWexnIcon
                ? (e.shareWexnIcon =
                      "https://file.iqilu.com/custom/phone/m/ico/wxsharelogo2016.png")
                : (e.shareWexnIcon = shareWexnIcon),
            "undefined" == typeof shareWexnTitle)
        ) {
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
        } else e.shareWexnTitle = shareWexnTitle.replace("_榻愰瞾缃�", "");
        if ("undefined" == typeof shareWexnDescription)
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
                e.shareWexnDescription = shareWexnTitle;
            }
        else e.shareWexnDescription = shareWexnDescription;
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
    function nt(e) {
        return (
            (nt =
                "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator
                    ? function (e) {
                          return typeof e;
                      }
                    : function (e) {
                          return e &&
                              "function" == typeof Symbol &&
                              e.constructor === Symbol &&
                              e !== Symbol.prototype
                              ? "symbol"
                              : typeof e;
                      }),
            nt(e)
        );
    }
    function rt(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            ((r.enumerable = r.enumerable || !1),
                (r.configurable = !0),
                "value" in r && (r.writable = !0),
                Object.defineProperty(
                    e,
                    ((o = r.key),
                    (i = void 0),
                    (i = (function (e, t) {
                        if ("object" !== nt(e) || null === e) return e;
                        var n = e[Symbol.toPrimitive];
                        if (void 0 !== n) {
                            var r = n.call(e, t || "default");
                            if ("object" !== nt(r)) return r;
                            throw new TypeError(
                                "@@toPrimitive must return a primitive value.",
                            );
                        }
                        return ("string" === t ? String : Number)(e);
                    })(o, "string")),
                    "symbol" === nt(i) ? i : String(i)),
                    r,
                ));
        }
        var o, i;
    }
    var ot = (function () {
        function e(t) {
            (!(function (e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
            })(this, e),
                (this.shareWexnTitle = t.shareWexnTitle),
                (this.shareWexnDescription = t.shareWexnDescription),
                (this.shareWexnUrl = t.shareWexnUrl),
                (this.shareWexnIcon = t.shareWexnIcon),
                (this.networkCallback = t.shareWexnNetworkCallback),
                this.init());
        }
        var t, n, r;
        return (
            (t = e),
            (n = [
                {
                    key: "init",
                    value: function () {
                        var e = {
                            title: this.shareWexnTitle,
                            desc: this.shareWexnDescription,
                            link: this.shareWexnUrl,
                            imgUrl: this.shareWexnIcon,
                            networkCallback: this.networkCallback,
                        };
                        (wx.error(function (e) {}),
                            wx.ready(function () {
                                var t = {
                                    title: e.title,
                                    desc: e.desc,
                                    link: e.link,
                                    imgUrl: e.imgUrl,
                                    success: function (e) {},
                                    cancel: function () {},
                                };
                                (e.networkCallback instanceof Function &&
                                    wx.getNetworkType({
                                        success: function (t) {
                                            var n = t.networkType;
                                            e.networkCallback(n);
                                        },
                                    }),
                                    wx.updateAppMessageShareData(t),
                                    wx.updateTimelineShareData(t));
                            }));
                    },
                },
            ]) && rt(t.prototype, n),
            r && rt(t, r),
            Object.defineProperty(t, "prototype", { writable: !1 }),
            e
        );
    })();
    function it(e) {
        return (
            (it =
                "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator
                    ? function (e) {
                          return typeof e;
                      }
                    : function (e) {
                          return e &&
                              "function" == typeof Symbol &&
                              e.constructor === Symbol &&
                              e !== Symbol.prototype
                              ? "symbol"
                              : typeof e;
                      }),
            it(e)
        );
    }
    function st(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            ((r.enumerable = r.enumerable || !1),
                (r.configurable = !0),
                "value" in r && (r.writable = !0),
                Object.defineProperty(
                    e,
                    ((o = r.key),
                    (i = void 0),
                    (i = (function (e, t) {
                        if ("object" !== it(e) || null === e) return e;
                        var n = e[Symbol.toPrimitive];
                        if (void 0 !== n) {
                            var r = n.call(e, t || "default");
                            if ("object" !== it(r)) return r;
                            throw new TypeError(
                                "@@toPrimitive must return a primitive value.",
                            );
                        }
                        return ("string" === t ? String : Number)(e);
                    })(o, "string")),
                    "symbol" === it(i) ? i : String(i)),
                    r,
                ));
        }
        var o, i;
    }
    var at = (function () {
        function e(t) {
            (!(function (e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
            })(this, e),
                this.init(t));
        }
        var t, n, r;
        return (
            (t = e),
            (n = [
                {
                    key: "init",
                    value: function (e) {
                        var t = {
                            title: e.shareWexnTitle,
                            desc: e.shareWexnDescription,
                            share_url: e.shareWexnUrl,
                            image_url: e.shareWexnIcon,
                        };
                        try {
                            window.mqq.data.setShareInfo(t);
                        } catch (e) {
                            console.log(e);
                        }
                    },
                },
            ]) && st(t.prototype, n),
            r && st(t, r),
            Object.defineProperty(t, "prototype", { writable: !1 }),
            e
        );
    })();
    function ct(e) {
        return (
            (ct =
                "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator
                    ? function (e) {
                          return typeof e;
                      }
                    : function (e) {
                          return e &&
                              "function" == typeof Symbol &&
                              e.constructor === Symbol &&
                              e !== Symbol.prototype
                              ? "symbol"
                              : typeof e;
                      }),
            ct(e)
        );
    }
    function ut(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            ((r.enumerable = r.enumerable || !1),
                (r.configurable = !0),
                "value" in r && (r.writable = !0),
                Object.defineProperty(
                    e,
                    ((o = r.key),
                    (i = void 0),
                    (i = (function (e, t) {
                        if ("object" !== ct(e) || null === e) return e;
                        var n = e[Symbol.toPrimitive];
                        if (void 0 !== n) {
                            var r = n.call(e, t || "default");
                            if ("object" !== ct(r)) return r;
                            throw new TypeError(
                                "@@toPrimitive must return a primitive value.",
                            );
                        }
                        return ("string" === t ? String : Number)(e);
                    })(o, "string")),
                    "symbol" === ct(i) ? i : String(i)),
                    r,
                ));
        }
        var o, i;
    }
    var lt = (function () {
        function e(t) {
            (!(function (e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
            })(this, e),
                this.init(t));
        }
        var t, n, r;
        return (
            (t = e),
            (n = [
                {
                    key: "init",
                    value: function (e) {
                        if (QZAppExternal && QZAppExternal.setShare) {
                            for (
                                var t = [], n = [], r = [], o = [], i = 0;
                                i < 5;
                                i++
                            )
                                (t.push(e.shareWexnIcon),
                                    o.push(e.shareWexnUrl),
                                    n.push(e.shareWexnTitle),
                                    r.push(e.shareWexnDescription));
                            QZAppExternal.setShare(function (e) {}, {
                                type: "share",
                                image: t,
                                title: n,
                                summary: r,
                                shareURL: o,
                            });
                        }
                    },
                },
            ]) && ut(t.prototype, n),
            r && ut(t, r),
            Object.defineProperty(t, "prototype", { writable: !1 }),
            e
        );
    })();
    function ft(e) {
        return (
            (ft =
                "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator
                    ? function (e) {
                          return typeof e;
                      }
                    : function (e) {
                          return e &&
                              "function" == typeof Symbol &&
                              e.constructor === Symbol &&
                              e !== Symbol.prototype
                              ? "symbol"
                              : typeof e;
                      }),
            ft(e)
        );
    }
    function pt(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            ((r.enumerable = r.enumerable || !1),
                (r.configurable = !0),
                "value" in r && (r.writable = !0),
                Object.defineProperty(
                    e,
                    ((o = r.key),
                    (i = void 0),
                    (i = (function (e, t) {
                        if ("object" !== ft(e) || null === e) return e;
                        var n = e[Symbol.toPrimitive];
                        if (void 0 !== n) {
                            var r = n.call(e, t || "default");
                            if ("object" !== ft(r)) return r;
                            throw new TypeError(
                                "@@toPrimitive must return a primitive value.",
                            );
                        }
                        return ("string" === t ? String : Number)(e);
                    })(o, "string")),
                    "symbol" === ft(i) ? i : String(i)),
                    r,
                ));
        }
        var o, i;
    }
    new ((function () {
        function t() {
            (!(function (e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
            })(this, t),
                this.init());
        }
        var n, r, o;
        return (
            (n = t),
            (r = [
                {
                    key: "init",
                    value: function () {
                        (navigator.userAgent.match(
                            /MicroMessenger\/([\d\.]+)/,
                        ) &&
                            e(
                                "https://res.wx.qq.com/open/js/jweixin-1.6.0.js",
                                function () {
                                    var t = window.location.href,
                                        n = [];
                                    "undefined" != typeof shareWexnAppId &&
                                    "" !== shareWexnAppId
                                        ? e(Ze(t, n), function () {
                                              new ot(tt());
                                          })
                                        : We.get(
                                              "https://img12.litenews.cn/js/share-js/domain.json",
                                          )
                                              .then(function (r) {
                                                  (200 === r.status &&
                                                      (n = r.data),
                                                      e(Ze(t, n), function () {
                                                          new ot(tt());
                                                      }));
                                              })
                                              .catch(function (r) {
                                                  e(Ze(t, n), function () {
                                                      new ot(tt());
                                                  });
                                              });
                                },
                            ),
                            navigator.userAgent.match(/QQ\/([\d\.]+)/) &&
                                e(
                                    "https://open.mobile.qq.com/sdk/qqapi.js?_bid=152",
                                    function () {
                                        new at(tt());
                                    },
                                ),
                            -1 !== navigator.userAgent.indexOf("Qzone/") &&
                                e(
                                    "https://qzonestyle.gtimg.cn/qzone/phone/m/v4/widget/mobile/jsbridge.js?_bid=339",
                                    function () {
                                        new lt(tt());
                                    },
                                ));
                    },
                },
            ]) && pt(n.prototype, r),
            o && pt(n, o),
            Object.defineProperty(n, "prototype", { writable: !1 }),
            t
        );
    })())();
})();
